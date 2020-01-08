<style>
	#map{
		height:300px;
	}
	.container-fluid{
		margin-top:20px;
	}
</style>
<div class="container-fluid">
	<div class="col-lg-6">
		<div class="card card-map">
			<div class="header">
				<h5 class="title">Pilih Zona</h5>
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
						<h4 class="title">Grafik Zona.</h4>
					</div>
					<div class="content table-responsive">
                        <div id="lat"></div>
                        <div id="lon"></div>
            <div id="myfirstchart" style="height: 250px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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

function tambahbulat(Lat, Lng, warna) {
  var circle = new L.circle([Lat, Lng], {
    color:'',
    fillOpacity: 0,
    radius: 70
  }).addTo(mymap);

  var rectangle = new L.Rectangle(circle.getBounds(),{color:"grey", fillColor:warna, fillOpacity:0.2, weight: 1}).addTo(mymap);
  
  var url = "<?= base_url('index.php/grafik/grafik'); ?>";
      var data = {
          Lat: Lat,
          Lon: Lng 
      };
  
  rectangle.on('click', function(){
    $("#myfirstchart").text("");
        $.post(url, data, function(data, status){
            //$('#lat').text(data.Lat);
            //$('#lon').text(data.data);
          grafik(data.data);
        });
    });
}

<?php
  foreach($konten as $data){
    $ispu = $data['ispu'];
    if($ispu==0){
      $color="'white'";
    }elseif($ispu<=50){
      $color="'green'";
    }elseif($ispu<=100){
      $color="'blue'";
    }elseif($ispu<=199){
      $color="'yellow'";
    }elseif($ispu<=299){
      $color="'red'";
    }elseif($ispu>=300){
      $color="'black'";
    }

    echo "tambahbulat(".$data['lat'].", ".$data['lon'].", $color);";                       
  }
?>

function grafik(data){
      new Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'myfirstchart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      data: data,
      // The name of the data record attribute that contains x-values.
      xkey: 'waktu_pengujian',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['co'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['co','waktu_pengujian']
    });
}
</script>