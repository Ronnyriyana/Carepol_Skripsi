<style>
	#map{
		height:200px;
	}
	.container-fluid{
		margin-top:20px;
	}
</style>
<div class="container-fluid">
	<div class="col-lg-5">
		<div class="card card-map">
			<div class="header">
				<h5 class="title">Lokasi laporan</h5>
			</div>
			<div>
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Detail laporan.</h4>
					</div>
					<div class="content table-responsive">
						<table class="table table-striped">
							<tbody>
							<?php foreach($konten as $data){?>
								<tr>
									<td>Waktu</td>
									<td>:</td>
									<td><?= $data['created_at']; ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $data['nama_lengkap']; ?></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>:</td>
									<td><img src="<?= $data['photo'] ?>" class="img-thumbnail img-responsive" alt="Foto Laporan" width="250"/></td>
								</tr>
								<tr>
									<td>Caption</td>
									<td>:</td>
									<td><?= $data['caption']; ?></td>
								</tr>
								<tr>
									<td>Latitude</td>
									<td>:</td>
									<td><?= $lat = $data['lat']; ?></td>
								</tr>
								<tr>
									<td>Longitude</td>
									<td>:</td>
									<td><?= $lon = $data['lon']; ?></td>
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

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script>
	var Lat = <?= $lat; ?>;
	var Lon = <?= $lon; ?>;
var mymap = L.map('map').setView([Lat, Lon], 16);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoicm9ubnlyaXlhbmEiLCJhIjoiY2p0cXB6dGJuMDlzbDRlcGVneWlpbmpjZCJ9._fQkFCua1w3UZMuWPHgqyA'
}).addTo(mymap);

  var marker = new L.marker([Lat, Lon]).addTo(mymap);

</script>