<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-md-7">
				<div class="card">
					<div class="header">
						<h4 class="title">Tambah User</h4>
					</div>
					<div class="content">
						<form action="<?php echo base_url('index.php/pengelola/proses_tambah'); ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama_pengelola" class="form-control border-input" placeholder="Nama" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Level Akun</label>
										<select id="level" name="level" class="form-control  border-input" onchange="coba();" required>
											<option selected disabled style="color:silver;">Pilih Level Akun</option>
											<option value="Admin">Admin</option>
											<option value="Pemilik_Alat">Pemilik Alat</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="photo" onchange="readURL(this);" class="form-control border-input" placeholder="Foto">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<img id="foto" src="<?= base_url() ?>assets/img/upload/pengelola/default.jpg" class="img-thumbnail img-responsive" alt="your image" width="250"/>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Instansi</label>
									<input type="text" name="instansi" class="form-control border-input" placeholder="Instansi" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Key Alat</label>
									<input type="text" name="key_alat" id="key_alat" class="form-control border-input" placeholder="Key Alat" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control border-input" placeholder="Username" required>
									<label style="color:red;"><?php echo $this->session->flashdata('username'); ?></label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="password" name="password" class="form-control border-input" placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" id="confirm_password" class="form-control border-input" onkeyup='check();' placeholder="Confirm Password" required>
									<span id='message' class="message" align="left"></span>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" id="myBtn" disabled class="btn btn-info btn-fill btn-wd">Tambah Profile</button>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
//untuk foto
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#foto')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
    }

	//untuk password
  var check = function() {
	  if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Pasword cocok';
		document.getElementById("myBtn").disabled = false; 
	  } else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Pasword tidak cocok';
		document.getElementById("myBtn").disabled = true; 
	  }
	}

	var coba = function() {
	  if (document.getElementById("level").value == "Pemilik_Alat") {
		document.getElementById("key_alat").disabled = false; 
	  } else {
		document.getElementById("key_alat").disabled = true; 
	  }
	}
  </script>