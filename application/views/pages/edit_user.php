

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
    <a class="btn" href="user/edit_user">
      <?php if ($user->fk_level_id=='2') :?>
      <span class="fa fa-gear"></span>
      <?php endif; ?>
    </a>
  </div>
  <br>
      <div class="row">  
      <div class = "col-lg-6">       
        <form action="<?php echo base_url().'user/edit_user' ?>" id="contact_form" method="post">
          <?php echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
                    <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
          <fieldset>
          <tr>
          <td>Nama :</td>
          <td><input type="text" required="required" class="form-control" name="nama" value="<?php echo ( $user->nama ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Username :</td>
          <td><input type="text" required="required" class="form-control" name="username" value="<?php echo ( $user->username ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Email :</td>
          <td><input type="text" required="required" class="form-control" name="email" value="<?php echo ( $user->email ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Alamat :</td>
          <td><input type="text" required="required" class="form-control" name="alamat" value="<?php echo ( $user->alamat ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>No HP</td>
          <td><input type="number" required="required" class="form-control" name="nohp" value="<?php echo ( $user->nohp ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Kodepos</td>
          <td><input type="number" required="required" class="form-control" name="kodepos" value="<?php echo ( $user->kodepos ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Password</td>
          <td><input type="password" required="required" class="form-control" name="password" value="<?php echo ( $user->password ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Konfirmasi Password</td>
          <td><input type="password" required="required" class="form-control" name="password2" value="<?php echo ( $user->password ) ?>" requirement></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td><label for="thumbnail">Gambar thumbnail</label></td>
          <td><input type="file" class="form-control-file" name="thumbnail"></td>
          </tr>
          </fieldset>
          <br>
          <button id="submitBtn" type="submit" class="btn btn-primary">Post Gadget</button>
        </form>
      </div>
      <div class="col-lg-6">
        <img style='width:280px;height:280px; border-radius: 50%;' src="<?php echo "../img/".$user->avatar; ?>"> 
      </div>
    </div>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>