

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2>Anda Telah Berhasil Mendaftar</h2>
    <div class="row"> 
      <div class="col-lg-6">
        <br><br>
          <td><label for="thumbnail">Silahkan Ganti Foto Profil Anda</label></td>
          <td><input type="file" class="form-control-file" name="thumbnail"></td><br><br><br><br><br><br>
          <a href="<?php echo base_url().'user/ganti_gambar'; ?>" class="btn btn-info" role="button">Ganti</a>
          <a href="<?php echo base_url()?>" class="btn btn-danger" role="button">Nanti Saja</a>
      </div>
      <div class="col-lg-6">
        <img style='width:280px;height:280px; border-radius: 50%;' src="<?php echo "../img/default.jpg" ?>"> 
      </div>
    </div>
  </div>
  <br>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>