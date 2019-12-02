
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
									<td><?php echo $data['nama_pengelola']; ?></td>
								</tr>
								<tr>
									<td>Username</td>
									<td>:</td>
									<td><?php echo $data['username']; ?></td>
								</tr>
								<tr>
									<td>Instansi</td>
									<td>:</td>
									<td><?php echo $data['instansi']; ?></td>
								</tr>
								<tr>
									<td>Level</td>
									<td>:</td>
									<td><?php echo $data['status']; ?></td>
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