<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<br><div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_title ?>
          </div>
        <div class="card-body">
          <div class="table-responsive">
					<?php
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>
					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
					<?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', $user->nama) ?>" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label>Kodepos</label>
						<input type="text" class="form-control" name="kodepos" value="<?php echo set_value('kodepos', $user->kodepos) ?>" placeholder="Kodepos">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo set_value('email', $user->email) ?>" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat', $user->alamat) ?>" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label>No Telpon</label>
						<input type="number" class="form-control" name="nohp" value="<?php echo set_value('nohp', $user->nohp) ?>" placeholder="No HP">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username', $user->username) ?>"  placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" value="<?php echo set_value('password', $user->password) ?>" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control" value="<?php echo set_value('password', $user->password) ?>" name="password2" placeholder="Ulangi Password">
					</div>
					<div class="form-group">
					    <label for="">Pilih Paket Membership</label>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="goldmember" value="1" checked>
					        <label class="form-check-label" for="goldmember">Administrator</label>
					    </div>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="goldmember" value="3" checked>
					        <label class="form-check-label" for="goldmember">Member Silver</label>
					    </div>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="silvermember" value="2">
					        <label class="form-check-label" for="silvermember">Member Premium</label>
					    </div>
					</div>
					<div class="form-group">

						<label for="thumbnail">Gambar Profil</label><br>
						<?php if( $user->avatar ) : ?>
						<img src="<?php echo base_url() .'uploads/'. $user->avatar ?>" alt="Card image cap" width="100px" height="100px">
						<?php endif; ?>

						<input type="file" class="form-control-file" name="thumbnail">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
</main>
<br><br>
