
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Detail User</h4>
					</div>
					<div class="content table-responsive">
						<table class="table table-striped">
							<tbody>
							<?php foreach($konten as $data){?>
								<tr>
									<td>No. KTP</td>
									<td>:</td>
									<td><?php echo $data['no_ktp']; ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $data['nama_lengkap']; ?></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>:</td>
									<td><img src="<?= "http://android.polusi.id".$data['photo']; ?>" class="img-thumbnail img-responsive" alt="your image" width="250" /></td>
								</tr>
								<tr>
									<td>Instansi</td>
									<td>:</td>
									<td><?php echo $data['instansi']; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?php echo $data['alamat']; ?></td>
								</tr>
								<tr>
									<td>No. Kontak</td>
									<td>:</td>
									<td><?php echo $data['no_hp']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $data['email']; ?></td>
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