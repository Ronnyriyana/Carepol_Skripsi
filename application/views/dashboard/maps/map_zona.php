<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
<style>
  .leaflet-popup-content { 
    min-width:200px; 
  } 
</style>
<div class="content">
	<div class="container-fluid">
		<?php if($this->session->userdata('level')=="Admin"){ ?>
		<a href="<?php echo base_url('index.php/map/update_zona'); ?>" class="btn btn-success btn-fill">Update</a><hr/>
		<?php } ?>
		<div class="card card-map">
			<div class="header">
        <h4 class="title">Map Zonasi</h4>
        <p class="category">Map sebaran polusi udara yang dibagi menjadi beberapa zonasi.</p><br/>
        Keterangan warna : <i class="fa fa-square" style="color:green;"></i> Hijau : Baik | 
				<i class="fa fa-square" style="color:blue;"></i> Biru : Sedang | 
				<i class="fa fa-square" style="color:yellow;"></i> Kuning : Tidak Sehat | 
				<i class="fa fa-square" style="color:red;"></i> Merah : Sangat Tidak Sehat | 
				<i class="fa fa-square" style="color:black;"></i> Hitam : Berbahaya | 
			</div>
			<div class="map">
				<div id="map"></div>
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

function tambahbulat(Lat, Lng, warna, keterangan, co, co2, suhu, kelembaban, updated_at) {
  var circle = new L.circle([Lat, Lng], {
    color:'',
    fillOpacity: 0,
    radius: 70
  }).addTo(mymap);

  var popup = L.popup()
    .setContent(
      "Diperbarui : <b>"+ updated_at +"</b><br/>"+
      "Co : "+ co +"<br/>"+
      "Co2 : "+ co2 +"<br/>"+
      "Suhu : "+ suhu +" &#8451;<br/>"+
      "Kelembaban : "+ kelembaban +"<br/>"+
       keterangan +"<br/>"
    );

  var rectangle = new L.Rectangle(circle.getBounds(),{color:"grey", fillColor:warna, fillOpacity:0.2, weight: 1}).addTo(mymap);
  rectangle.bindPopup(popup);
  
  /*var circle = new L.circle([Lat, Lng], {
    color: '',
    fillColor: 'green',
    fillOpacity: 0.3,
    radius: 140
  }).addTo(mymap);*/
}

<?php
  foreach($marker as $data){
    $ispu = $data['ispu'];
    if($ispu==0){
      $color="'white'";
      $keterangan="<br>Area ini belum termonitoring.";
    }elseif($ispu<=50){
      $color="'green'";
      $keterangan="ISPU : Baik<br>Udara pada area ini terindikasi sehat.";
    }elseif($ispu<=100){
      $color="'blue'";
      $keterangan="ISPU : Sedang<br>Udara pada area ini terindikasi sedang.";
    }elseif($ispu<=199){
      $color="'yellow'";
      $keterangan="ISPU : Tidak Sehat<br>Udara pada area ini terindikasi tidak sehat.";
    }elseif($ispu<=299){
      $color="'red'";
      $keterangan="ISPU : Sangat Tidak Sehat<br>Udara pada area ini terindikasi sangat tidak sehat.";
    }elseif($ispu>=300){
      $color="'black'";
      $keterangan="ISPU : Berbahaya<br>Udara pada area ini terindikasi berbahaya.";
    }

    echo "tambahbulat(".$data['lat'].", ".$data['lon'].", $color, '$keterangan',".$data['co'].", ".$data['co2'].", ".$data['suhu'].", ".$data['kelembaban'].", '".$data['updated_at']."');";                       
  }
?>
//tambahbulat(-6.88581048, 107.61195039742, 'white', '<br>Area ini belum termonitoring.',0.00, 0.00, 0.00, 0.00, '2020-01-08 08:58:56');
/*var circle = L.circle([-6.88581048, 107.61195039742], {
	color: '',
	fillColor: '#f03',
	fillOpacity: 0.25,
	radius: 300
}).addTo(mymap);*/

//var marker = L.marker([-6.88581048, 107.61195039742]).addTo(mymap);
</script>