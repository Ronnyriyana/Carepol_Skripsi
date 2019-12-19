<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap.min.css">
<style>
	.btn-group{
		margin-left:10px;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<!-- Notifikasi -->
		<?php echo $this->session->flashdata('message'); ?>
		<!-- End Notifikasi -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Tabel Pengelola</h4>
						<p class="category"></p>
						<div align="center">
						<a href="<?php echo base_url('index.php/pengelola/tambah') ?>" class="btn btn-success btn-fill dropdown-toggle" type="button">+ Tambah Data</a>
						</div>
					</div>
					<div class="content table-responsive">
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<th>ID</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Instansi</th>
								<th>Jumlah Alat</th>
								<th>Aksi</th>
							</thead>
							<tbody>
							<?php $no=1;foreach($konten as $data){?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['nama_pengelola']; ?></td>
									<td><?php echo $data['username']; ?></td>
									<td><?php echo $data['instansi']; ?></td>
									<td><?php echo $data['jumlah']; ?></td>
									<td>
									<div class="dropdown">
										<button class="btn btn-success btn-xs btn-fill dropdown-toggle" type="button" data-toggle="dropdown"><span class="ti-settings"></span> <span class="caret"></span></button>
										<ul class="dropdown-menu">
										  <li><a href="<?php echo base_url('index.php/pengelola/detail/').$data['id_pengelola']; ?>">Detail</a></li>
										  <li><a href="<?php echo base_url('index.php/pengelola/edit/').$data['id_pengelola']; ?>">Edit</a></li>
										  <li><a href="<?php echo base_url('index.php/pengelola/proses_delete/').$data['id_pengelola']; ?>"  data-toggle="confirmation" data-placement="left" data-popout="true">Delete</a></li>
										</ul>
									</div>
									</td>
								</tr>
							<?php $no++;} ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
<script>
  $('[data-toggle=confirmation]').confirmation({
	rootSelector: '[data-toggle=confirmation]',
	container: 'body',
	title: 'Ingin menghapus data ini ?',
	btnOkIcon: 'glyphicon glyphicon-trash'
  });
</script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        buttons: [
			{
					extend: 'copy', className: 'btn btn-success btn-sm'
			},
			{
					extend: 'excel', className: 'btn btn-success btn-sm'
			},
			{
					extend: 'pdf', className: 'btn btn-success btn-sm'
			}
		]
    } );
 
    table.buttons().container()
        .appendTo( '#example_length ' );
} );
</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>