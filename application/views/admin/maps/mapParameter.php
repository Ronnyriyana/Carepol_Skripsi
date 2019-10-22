<div class="content">
	<div class="container-fluid">
		<div class="card card-map">
			<div class="header">
				<h4 class="title">Map</h4>
			</div>
			<div class="map">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script>
var mymap = L.map('map').setView([-6.885279, 107.613689], 15);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoicm9ubnlyaXlhbmEiLCJhIjoiY2p0cXB6dGJuMDlzbDRlcGVneWlpbmpjZCJ9._fQkFCua1w3UZMuWPHgqyA'
}).addTo(mymap);

function tambahbulat(Lat, Lng) {
  //var rectangle = new L.rectangle(L.circle([Lat,Lng], 500).getBounds()).addTo(mymap);
  var marker = new L.marker([Lat, Lng]).addTo(mymap);
}

<?php
  foreach($marker as $data){
    $lat = $data['lat'];
    $lon = $data['lon'];
    echo ("tambahbulat($lat, $lon);");                       
  }
?>

/*var circle = L.circle([-6.885279, 107.619689], {
	color: '',
	fillColor: '#f03',
	fillOpacity: 0.25,
	radius: 500
}).addTo(mymap);*/

//var marker = L.marker([-6.885279, 107.613689]).addTo(mymap);
</script>