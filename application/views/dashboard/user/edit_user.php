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
						<form action="<?php echo base_url('index.php/user/proses_edit'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?= $data['id_user'];?>">
                            <div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="jenis_kelamin">No. KTP</label>
										<input type="text" name="no_ktp" class="form-control border-input" value="<?= $data['no_ktp'];?>" placeholder="No. KTP" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama_lengkap" class="form-control border-input" value="<?= $data['nama_lengkap'];?>" placeholder="Nama Lengkap" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Foto</label>
										<input type="file" name="photo" onchange="readURL(this);" class="form-control border-input" value="<?= $data['photo'];?>" placeholder="Foto">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<img id="foto" src="<?= "http://android.polusi.id".$data['photo']; ?>" class="img-thumbnail img-responsive" alt="your image" width="250"/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Instansi</label>
										<textarea rows="3" name="instansi" class="form-control border-input" placeholder="Instansi"><?= $data['instansi'];?></textarea>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<label>Alamat</label>
										<textarea rows="3" name="alamat" class="form-control border-input" placeholder="Alamat" required><?= $data['alamat'];?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>No. Kontak</label>
										<input type="text" name="no_hp" class="form-control border-input" placeholder="No Kontak" value="<?= $data['no_hp'];?>" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control border-input" placeholder="Email" value="<?= $data['email'];?>" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="password" name="password" onkeyup="check();" class="form-control border-input" placeholder="Password" >
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
								<button type="submit" id="myBtn" class="btn btn-info btn-fill btn-wd">Edit Profile</button>
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