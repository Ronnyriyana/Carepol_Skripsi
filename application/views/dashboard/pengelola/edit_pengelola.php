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
                    <?php foreach($konten as $data){?>
						<form action="<?php echo base_url('index.php/pengelola/proses_edit'); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id_pengelola" value="<?= $data['id_pengelola'];?>">
                            <div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama_pengelola" class="form-control border-input" value="<?= $data['nama_pengelola'];?>" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Level Akun</label>
										<select name="level" class="form-control  border-input" disabled>
											<option selected disabled style="color:silver;">Pilih Level Akun</option>
											<option value="Admin" <?php echo ($data['level'] == 'Admin' ? 'selected': '')?>>Admin</option>
											<option value="Pemilik_Alat" <?php echo ($data['level'] == 'Pemilik_Alat' ? 'selected': '')?>>Pemilik Alat</option>
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
									<img id="foto" src="<?= "http://android.polusi.id".$data['photo']; ?>" class="img-thumbnail img-responsive" alt="your image" width="250"/>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Instansi</label>
									<input type="text" name="instansi" class="form-control border-input" value="<?= $data['instansi'];?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Key Alat</label>
									<input type="text" name="key_alat" class="form-control border-input" placeholder="Key alat" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control border-input" value="<?= $data['username'];?>" required>
									<label style="color:red;"><?php echo $this->session->flashdata('username'); ?></label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password Baru</label>
									<input type="password" id="password" name="password" onkeyup="check();" class="form-control border-input" placeholder="Password Baru">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm Password Baru</label>
									<input type="password" id="confirm_password" class="form-control border-input" onkeyup="check();" placeholder="Confirm Password Baru">
									<span id='message' class="message" align="left"></span>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" id="myBtn" class="btn btn-info btn-fill btn-wd">Submit</button>
							</div>
							<div class="clearfix"></div>
						</form>
                    <?php } ?>
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
	  if (document.getElementById('password').value == "" && document.getElementById('confirm_password').value == "") {
		document.getElementById('message').style.color = 'blue';
		document.getElementById('message').innerHTML = 'Password tidak dirubah';
		document.getElementById("myBtn").disabled = false; 
	  } else if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Password cocok';
		document.getElementById("myBtn").disabled = false; 
	  } else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Pasword tidak cocok';
		document.getElementById("myBtn").disabled = true; 
	  }
	}
  </script>