

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
    <a class="btn" href="<?php echo base_url().'user/edit_user' ?>">
      <?php if ($user->fk_level_id=='2' || $user->fk_level_id=='1') :?>
      <span class="fa fa-gear"></span>
      <?php endif; ?>
    </a>
  </div>
  <br>
      <div class="row">  
      <div class = "col-lg-6">       
        <form action="#" id="contact_form" method="post">
          <fieldset>
          <tr>
          <td>Nama :</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->nama ) ?>" readonly></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Username :</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->username ) ?>" readonly></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Email :</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->email ) ?>" readonly></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>Alamat :</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->alamat ) ?>" readonly></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>No HP</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->nohp ) ?>" readonly></td>
          </tr>
          </fieldset>
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