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
						<form action="<?php echo base_url('index.php/pengelola/proses_tambah'); ?>" method="POST">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama_pengelola" class="form-control border-input" placeholder="Nama">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Level Akun</label>
										<select name="level" class="form-control  border-input">
											<option selected disabled style="color:silver;">Pilih Level Akun</option>
											<option value="Admin">Admin</option>
											<option value="Teknisi">Teknisi</option>
											<option value="Pemilik_Alat">Pemilik Alat</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Instansi</label>
									<input type="text" name="instansi" class="form-control border-input" placeholder="Instansi">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Key Alat</label>
									<input type="text" name="key_alat" class="form-control border-input" placeholder="Key Alat">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control border-input" placeholder="Username">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="password" name="password" class="form-control border-input" placeholder="Password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" id="confirm_password" class="form-control border-input" onkeyup='check();' placeholder="Confirm Password">
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
  var check = function() {
	  if (document.getElementById('password').value ==
		document.getElementById('confirm_password').value) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Matching';
		document.getElementById("myBtn").disabled = false; 
	  } else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Not matching';
		document.getElementById("myBtn").disabled = true; 
	  }
	}
  </script>