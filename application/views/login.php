<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/carepollogo.png">
  <title>Login | Carepol</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/login/');?>css/style.css">
  <?php echo $script_captcha; // javascript recaptcha ?>
</head>
<body>

  <div class="login-page">
  <div class="form">
    <form action="<?php echo base_url('index.php/login/cek'); ?>" method="POST" class="register-form">
	  <div class="header">Registrasi</div>
	  <p class="message">Masukan Key Alat</p><br/>
      <input type="text" name="key" placeholder="Key" required disabled/>
      <button type="submit" disabled>Cek</button>
      <p class="message">Back to <a href="<?php echo base_url('index.php/frontend'); ?>">Frontend</a></p>
    </form>
	<form action="<?php echo base_url('index.php/login/login'); ?>" method="POST" class="login-form">
	  <div class="header">Login</div>
      <input type="text" name="username" placeholder="username" required />
      <input type="password" name="password" placeholder="password" required />
		<!-- Notifikasi -->
			<?php echo $this->session->flashdata('message'); ?>
		<!-- End Notifikasi -->
	  <div class="captcha"><?php echo $captcha // tampilkan recaptcha ?></div>
      <button type="submit">Login</button>
      <p class="message"> << Back to <a href="<?php echo base_url('index.php/frontend'); ?>">Frontend</a></p>
	</form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?php echo base_url('assets/login/');?>js/index.js"></script>
</body>
</html>
