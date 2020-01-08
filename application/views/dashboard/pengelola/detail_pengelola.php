<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Detail User</h4>
						<?php if($this->session->userdata('level')=="Pemilik_Alat"){?><br/><br/>
						<div align="center">
							<a href="<?php echo base_url('index.php/pengelola/edit/').$this->session->userdata('id_pengelola'); ?>" class="btn btn-success btn-fill jarak" type="button">+ Edit Data</a>
						</div>
						<?php }?>
					</div>
					<div class="content table-responsive">
						<table class="table table-striped">
							<tbody>
							<?php foreach($konten as $data){?>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $data['nama_pengelola']; ?></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>:</td>
									<td><img src="<?= "http://android.polusi.id".$data['photo']; ?>" class="img-thumbnail img-responsive" alt="your image" width="250"/></td>
								</tr>
								<tr>
									<td>Instansi</td>
									<td>:</td>
									<td><?= $data['instansi']; ?></td>
								</tr>
								<tr>
									<td>Jumlah Alat</td>
									<td>:</td>
									<td><?= $data['jumlah']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align:text-top;">Key Alat</td>
									<td style="vertical-align:text-top;">:</td>
									<td>
										<?= $data['key_alat']; if($data['level']=="Pemilik_Alat"){?><br/><br/>
										<button type="button" class="btn btn-success btn-fill btn-sm" data-toggle="modal" data-target="#myModal">+ Registrasi Alat</button>
										<button type="button" class="btn btn-danger btn-fill btn-sm" data-toggle="modal" data-target="#modalhapus">- Unregistrasi Alat</button>
										<?php }else{ echo "-";}?>
									</td>
								</tr>
								<tr>
									<td>Username</td>
									<td>:</td>
									<td><?= $data['username']; ?></td>
								</tr>
								<tr>
									<td>Level</td>
									<td>:</td>
									<td><?= $data['level']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.modal-backdrop {
	z-index: -1;
	}
</style>
<!-- Modal registrasi -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrasikan key alat lainnya !</h4>
        </div>
        <div class="modal-body">
			<form action="<?php echo ($this->session->userdata('level')=='Pemilik_Alat')?base_url('index.php/profil/tambah_alat'):base_url('index.php/pengelola/tambah_alat'); ?>" method="POST">
			<input type="hidden" name="id_pengelola" value="<?= $id_pengelola;?>">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Key Alat</label>
							<input type="text" name="key_alat" class="form-control border-input" placeholder="Key Alat" required>
						</div>
					</div>
				</div>

        </div>
        <div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

		  		
					<button type="submit" id="myBtn" class="btn btn-info btn-fill btn-wd">Submit</button>
				<div class="clearfix"></div>
			</form>

        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal unregistrasi-->
<div class="modal fade" id="modalhapus" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Unregistrasi key alat !</h4>
        </div>
        <div class="modal-body">
			<p>Masukan key alat untuk proses unregistrasi.</p>
			<form action="<?php echo ($this->session->userdata('level')=='Pemilik_Alat')?base_url('index.php/profil/hapus_alat'):base_url('index.php/pengelola/hapus_alat'); ?>" method="POST">
			<input type="hidden" name="id_pengelola" value="<?= $id_pengelola;?>">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Key Alat</label>
							<input type="text" name="key_alat" class="form-control border-input" placeholder="Key Alat" required>
						</div>
					</div>
				</div>

        </div>
        <div class="modal-footer">
		  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
		  		
					<button type="submit" id="myBtn" class="btn btn-danger btn-fill btn-wd">Unregistrasi</button>
				<div class="clearfix"></div>
			</form>

        </div>
      </div>
      
    </div>
  </div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
	//swal berhasil
	<?php if($this->session->flashdata('berhasil')){ ?>
	    swal("Berhasil !", "<?= $this->session->flashdata('berhasil'); ?>", "success")
	<?php } ?>

	 //swal gagal
	<?php if($this->session->flashdata('gagal')){ ?>
	    swal("Gagal !", "<?= $this->session->flashdata('gagal'); ?>", "error")
	<?php } ?>
</script>