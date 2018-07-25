

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h1>
      <?php if ($user->fk_level_id=='2' || $user->fk_level_id=='1'|| $user->fk_level_id=='3') :?>
      <a class="btn" href="<?php echo base_url().'user/user_edit/'.$user->user_id ?>">
      <span  class="fa fa-gear"></span>
      <?php endif; ?>
    </a>
    <?php echo $page_title ?>
    </h1>
      
  </div>
  <br>
      <div class="row">  
      <div class = "col-lg-6">      
        <table>
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
          <td>Kode Pos :</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->kodepos ) ?>" readonly></td>
          </tr>
          </fieldset>
          <fieldset>
          <tr>
          <td>No HP</td>
          <td><input type="text" class="form-control" name="tipe" value="<?php echo ( $user->nohp ) ?>" readonly></td>
          </tr>
          </fieldset>
          </table>
          <center>
          <?php echo anchor(base_url().'user/user_edit/'.$user->user_id, 'Edit Profil', array('class' => 'btn btn-primary')); ?>
      </div>
      <div class="col-lg-6">
      <center>
        <img style='width:400px;height:400px; border-radius: 50%;' src="<?php echo base_url() ."uploads/".$user->avatar; ?>"> <br><br>
        <?php if ($user->fk_level_id=='2' || $user->fk_level_id=='1') :?>
          <?php echo anchor(base_url().'user/ganti_gambar/'.$user->user_id, 'Change Picture', array('class' => 'btn btn-primary')); ?>
        <?php endif; ?>
      </center>
      </div>
    </div>
  </div>

  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>