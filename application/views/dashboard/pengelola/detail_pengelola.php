
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
									<td>Nama</td>
									<td>:</td>
									<td><?= $data['nama_pengelola']; ?></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>:</td>
									<td><img src="<?= base_url($data['photo']); ?>" class="img-thumbnail img-responsive" alt="your image" width="250"/></td>
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
									<td>Key Alat</td>
									<td>:</td>
									<td><?= $data['key_alat']; ?></td>
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