<link defer rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.bootstrap.min.css">
<link defer rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/css/buttons.bootstrap.min.css">
<link defer rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/css/responsive.bootstrap.min.css">
<style>
	#map{
		height:300px;
	}

  .btn-group{
		margin-left:10px;
	}

	.pagination > li.active > a, .pagination > li.active > span{background-color:#7ac29a;border-color:#7ac29a;}

  .col-centered{
      float: none;
      margin: 0 auto;
  }

  .templatemo_maps{
      height:300px;
  }
</style>
<div class="container-fluid" style="margin-top:20px;">
	<div class="col-lg-10 col-centered">
		<div class="card card-map">
			<div class="header">
				<h5 class="title" style="text-align:center;">Pilih Zona</h5>
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
						<h4 class="title">Grafik Zona  : <span id="id_zona1"></span></h4>
					</div>
					<div class="content table-responsive">
            <div id="myfirstchart"></div>
					</div>
				</div>
			</div>
		</div>
    <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Tabel Zona : <span id="id_zona2"></span></h4>
					</div>
					<div class="content table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link defer rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script defer src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script defer src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<link href="<?php echo base_url(); ?>assets/leaflet/leaflet.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/leaflet/leaflet.js"></script>

<script>
$(document).ready( function () {
var mymap = L.map('map').setView([-6.885279, 107.613689], 15).locate({setView: true, maxZoom: 16});
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoicm9ubnlyaXlhbmEiLCJhIjoiY2p0cXB6dGJuMDlzbDRlcGVneWlpbmpjZCJ9._fQkFCua1w3UZMuWPHgqyA'
}).addTo(mymap);

function tambahbulat(Lat, Lng, warna, id) {
  var circle = new L.circle([Lat, Lng], {
    color:'',
    fillOpacity: 0,
    radius: 70,
    text:id
  }).addTo(mymap);

  /*var icon = new L.marker([Lat,Lng], {
      icon: L.divIcon({
          className: 'my-custom-icon',
          html: id
      })
    }).addTo(mymap);*/


  var popup = L.popup()
  .setContent("ID Zona : "+id
  );

  var rectangle = new L.Rectangle(circle.getBounds(),{color:"grey", fillColor:warna, fillOpacity:0.2, weight: 1}).addTo(mymap);
  rectangle.bindPopup(popup);

  var url = "<?= base_url('index.php/grafik/grafik'); ?>";
  var data = {
      Lat: Lat,
      Lon: Lng 
  };
  
  rectangle.on('click', function(){
        $("#myfirstchart").text("");
        $('#id_zona1').text(id);
        $('#id_zona2').text(id);
        $.post(url, data, function(data, status){
          //$('#id_zona').text(data.data.id);
          //$('#lon').text(data.data);
          grafik(data.data);
          table(data.data,id);
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

    echo "tambahbulat(".$data['lat'].", ".$data['lon'].", $color, ".$data['id'].");";                       
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
      ykeys: ['ispu'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['ISPU','Waktu Pengujian']
    });
}
});

function table(data,id){
  var table = $('#example').DataTable( {
            destroy: true,
            data: data,
            columns: [
              {defaultContent: id, title: 'ID Zona'},
              {data:'waktu_pengujian', title: 'Waktu Pengujian'},
              {data:'ispu', title: 'ISPU'},
              {data:'co', title: 'CO'},
              {data:'co2', title: 'CO2'},
              {data:'suhu', title: 'Suhu'},
              {data:'kelembaban', title: 'Kelembaban'}
            ],
            buttons: [
              {extend: 'copy', className: 'btn btn-success btn-sm btn-fill'},
              {extend: 'excel', className: 'btn btn-success btn-sm'},
              {extend: 'pdf', className: 'btn btn-success btn-sm btn-fill'},
              {extend: 'csv', className: 'btn btn-success btn-sm'}
            ]
          } );
      
          table.buttons().container()
              .appendTo( '#example_length ' );
}
</script>
<script defer src="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.bootstrap.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.print.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/js/dataTables.responsive.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/js/responsive.bootstrap.min.js"></script>