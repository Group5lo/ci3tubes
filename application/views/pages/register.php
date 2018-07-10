<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
			
	<section>
		<div class="container">
		<center>
		<h1 class="jumbotron-heading"><?php	echo $page_title ?></h1>
		</center>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<?php
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>
					<?php echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label>Kodepos</label>
						<input type="text" class="form-control" name="kodepos" placeholder="Kodepos">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
					</div>
					<div class="form-group">
					    <label for="">Pilih Paket Membership</label>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="goldmember" value="3" checked>
					        <label class="form-check-label" for="goldmember">Member Silver</label>
					    </div>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="silvermember" value="2">
					        <label class="form-check-label" for="silvermember">Member Premium</label>
					    </div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
</main>
<br><br>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

	<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>