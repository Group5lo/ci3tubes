

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h1><?php echo $page_title ?></h1>
    <div class="row"> 
      <div class="col-lg-6"><br>
        <img style='width:400px;height:400px; border-radius: 50%;' src="<?php echo base_url()."uploads/".$user->avatar ?>"> 
      </div>
      <div class="col-lg-6">
        <br><br>
        <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
          <fieldset>
          <td><label for="thumbnail">Change Picture :</label></td>
          <td><input type="file" class="form-control-file" name="thumbnail"></td>
          </fieldset><br>
          <fieldset>
          <tr>
          <td><label for="thumbnail">Password :</label></td>
          <td><input type="password" required="required" class="form-control" name="password"  required></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td><label for="thumbnail">Ulang Password :</label></td>
          <td><input type="password" required="required" class="form-control" name="password2"  required></td>
          </tr>
          </fieldset>
          <br><br><br><br>
          <button id="submitBtn" type="submit" class="btn btn-primary">Change</button>
          <a href="<?php echo base_url()?>" class="btn btn-danger" role="button">Nanti Saja</a>
          </form>
      </div>
    </div>
  </div>
  <br>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>