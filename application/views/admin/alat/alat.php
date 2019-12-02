
<div class="content">
	<div class="container-fluid">
		<div class="row">
<!-- Notifikasi -->
<?php echo $this->session->flashdata('message'); ?>
<!-- End Notifikasi -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Table Alat</h4>
						<p class="category">Semua data Alat</p>
						<div align="center">
						<a href="<?php echo base_url('index.php/adminxalat/proses_tambah_alat') ?>" class="btn btn-info dropdown-toggle" type="button">+ Tambah Data</a>
						</div>
					</div>
					<div class="content table-responsive">
						<table id="example" class="table table-striped">
							<thead>
								<th>ID</th>
								<th>Qr code</th>
								<th>Key</th>
								<th>status alat</th>
								<th>Pemilik</th>
								<th>Aksi</th>
							</thead>
							<tbody>
							<?php $no=1;foreach($konten as $data){?>
								<tr>
									<td><?php echo $no; ?></td>
									<td>
										<img id="myImg" src="<?php echo base_url($data['qrcode']); ?>" onclick="myFunction(this);" alt="<?php echo $data['key_alat']; ?>" style="width:40px;" title="Zoom">
										<a href="<?php echo base_url($data['qrcode']); ?>" download title="Download">
											<span class="ti-download" style="padding-left:8px;font-size:large;"></span>
										</a>
									</td>
									<td><?php echo $data['key_alat']; ?></td>
									<td><?php echo $data['status_alat']; ?></td>
									<td><?php echo $data['id_user']; ?></td>
									<td>
									<div class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="ti-settings"></span> <span class="caret"></span></button>
										<ul class="dropdown-menu">
										  <li><a href="<?php echo base_url('index.php/adminxalat/proses_delete/').$data['id_alat']; ?>" data-toggle="confirmation" data-placement="left" data-popout="true">Delete</a></li>
										</ul>
									</div>
									</td>
								</tr>
							<?php $no++;} ?>
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

<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 3; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(3,215,252,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 60%;
  max-width: 300px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: black;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: black;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: white;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<!-- The Modal -->
<div id="myModal" class="modal tutup">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
function myFunction(imgs){
  modal.style.display = "block";
  modalImg.src = imgs.src;
  captionText.innerHTML = imgs.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("tutup")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>