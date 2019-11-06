<div class="content">
	<div class="container-fluid">
		<?php if($this->session->userdata('status')=="Admin"){ ?>
		<a href="<?php echo base_url('index.php/adminxmaps/update_zona'); ?>" class="btn btn-success btn-fill">Update</a><hr/>
		<?php } ?>
		<div class="card card-map">
			<div class="header">
				<h4 class="title">Map</h4>
        <table align="center">
          <tr>
            <td class="sign hijau">&nbsp;</td>
            <td class="tsign thijau">Sehat</td>
            <td class="sign biru">&nbsp;</td>
            <td class="tsign tbiru">Sedang</td>
            <td class="sign kuning">&nbsp;</td>
            <td class="tsign tkuning">Tidak Sehat</td>
            <td class="sign merah">&nbsp;</td>
            <td class="tsign tmerah">Sangat Tidak Sehat</td>
            <td class="sign hitam">&nbsp;</td>
            <td class="tsign">Berbahaya</td>
          </tr>
        </table>
			</div>
			<div class="map">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<link href="<?php echo base_url(); ?>assets/leaflet/leaflet.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/leaflet/leaflet.js"></script>
<script>
var mymap = L.map('map').setView([-6.885279, 107.613689], 15).locate({setView: true, maxZoom: 16});
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
  foreach($marker as $data){
    $lat = $data['lat'];
    $lon = $data['lon'];
    $co = $data['co'];
    $no = $data['id'];
    if($co==0){
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