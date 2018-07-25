

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h1><?php echo $page_title ?></h1>
      <span class="fa fa-gear"></span>
  </div>
  <br>
      <div class="row">  
      <div class="col-lg-6">
      <center>
        <img style='width:400px;height:400px; border-radius: 50%;' src="<?php echo base_url() ."uploads/".$user->avatar; ?>"> 
      </center>
      </div>
      <div class = "col-lg-6">       
          <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
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
          <td><input type="password" required="required" class="form-control" name="password"  required></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Konfirmasi Password</td>
          <td><input type="password" required="required" class="form-control" name="password2"  required></td>
          </tr>
          </fieldset>
          <br>
          <button id="submitBtn" type="submit" class="btn btn-primary">Change</button>
        </form>
      </div>
    </div>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>