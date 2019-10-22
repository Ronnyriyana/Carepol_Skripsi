
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<!-- Notifikasi -->
					<?php echo $this->session->flashdata('message'); ?>
				<!-- End Notifikasi -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">History Table</h4>
						<p class="category">Semua data history</p>
						<div align="center">
						
						</div>
					</div>
					<div class="content table-responsive">
						<table id="example" class="table table-striped">
							<thead>
								<th>No</th>
								<th>Latitude</th>
								<th>longitude</th>
								<th>CO</th>
								<th>CO2</th>
								<th>Suhu</th>
								<th>Kelembaban</th>
								<th>ISPU</th>
								<th>Waktu</th>
							</thead>
							<tbody>
							<?php 
								if(count($konten) > 0){
								$no=1;foreach($konten as $data){?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['lat']; ?></td>
										<td><?php echo $data['lon']; ?></td>
										<td><?php echo $data['co']; ?></td>
										<td><?php echo $data['co2']; ?></td>
										<td><?php echo $data['suhu']; ?></td>
										<td><?php echo $data['kelembaban']; ?></td>
										<td><?php echo $data['ispu']; ?></td>
										<td><?php echo $data['waktu_pengujian']; ?></td>
									</tr>
							<?php 
								$no++;}}
							 ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
  $('[data-toggle=confirmation]').confirmation({
	rootSelector: '[data-toggle=confirmation]',
	container: 'body',
	title: 'Ingin menghapus data ini ?',
	btnOkIcon: 'glyphicon glyphicon-trash'
  });
</script>