<div class="templatemo_lightgrey" id="templatemo_contact">
    	<div class="templatemo_paracenter">
    	<h2>Map</h2></div>
        <div class="clear"></div>
        <div class="container">
        	<div class="templatemo_paracenter">
				Map sebaran polusi udara yang dibagi menjadi beberapa zonasi.<br>
				Keterangan warna : <i class="fa fa-square" style="color:green;"></i> Hijau : Sehat | 
				<i class="fa fa-square" style="color:blue;"></i> Biru : Sedang | 
				<i class="fa fa-square" style="color:yellow;"></i> Kuning : Kurang Sehat | 
				<i class="fa fa-square" style="color:red;"></i> Merah : Tidak Sehat | 
				<i class="fa fa-square" style="color:black;"></i> Hitam : Berbahaya | 
            </div>
            <div class="clear"></div>
            <div class="container">
		<style>
			.map {
				height: 800px;
				padding-top: 20px;
			}
		</style>
        <div class="row">
          <div class="col-md-12">
            <div class="templatemo_maps">
				<div class="fluid-wrapper">
					<div id="map" class="map"></div>
				</div>
            </div>
          </div>
          <div class="container">
      </div>
        </div>
      </div>
        </div>
  </div>
<link href="<?php echo base_url(); ?>assets/leaflet/leaflet.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/leaflet/leaflet.js"></script>
<script>
var mymap = L.map('map').setView([-6.885279, 107.613689], 15);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoicm9ubnlyaXlhbmEiLCJhIjoiY2p0cXB6dGJuMDlzbDRlcGVneWlpbmpjZCJ9._fQkFCua1w3UZMuWPHgqyA'
}).addTo(mymap);

function tambahbulat(Lat, Lng, warna, keterangan) {
  var circle = new L.circle([Lat, Lng], {
    color:'',
    fillOpacity: 0,
    radius: 110
  }).addTo(mymap);

  var rectangle = new L.Rectangle(circle.getBounds(),{color:"grey", fillColor:warna, fillOpacity:0.2, weight: 1}).addTo(mymap);
  rectangle.bindPopup(keterangan);
  
  /*var circle = new L.circle([Lat, Lng], {
    color: '',
    fillColor: 'green',
    fillOpacity: 0.3,
    radius: 157
  }).addTo(mymap);*/
}

<?php
  foreach($map as $data){
    $lat = $data['lat'];
    $lon = $data['lon'];
    $co = $data['co'];
    $no = $data['id'];
    if($co==null){
      $color="'grey'";
      $keterangan="<br>Area ini belum termonitoring.";
    }elseif($co<=50){
      $color="'green'";
      $keterangan="ISPU : Baik<br>Udara pada area ini terindikasi Sehat.";
    }elseif($co<=100){
      $color="'blue'";
      $keterangan="ISPU : Sedang<br>Udara pada area ini terindikasi Kurang sehat.";
    }elseif($co<=199){
      $color="'yellow'";
      $keterangan="ISPU : Tidak Sehat<br>Udara pada area ini terindikasi Tidak sehat.";
    }elseif($co<=299){
      $color="'red'";
      $keterangan="ISPU : Sangat Tidak Sehat<br>Udara pada area ini terindikasi Tidak sehat.";
    }elseif($co>=300){
      $color="'black'";
      $keterangan="ISPU : Berbahaya<br>Udara pada area ini terindikasi Tidak sehat.";
    }

    echo ("tambahbulat($lat, $lon, $color, '$keterangan');");                       
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