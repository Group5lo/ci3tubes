<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  <br>
    <center>
      <h1><font color="blue"><?php echo ( $gadget->brand_name ) ?></font> <?php echo ( $gadget->post_name ) ?></h1>
              Ditulis <?php echo time_ago($gadget->post_date) ?><br>
      <?php if( $gadget->post_thumbnail ) : ?>
              <img class="card-img-top" width="400px" src="<?php echo base_url() .'uploads/'. $gadget->post_thumbnail ?>" alt="Card image cap">
              
              <!-- Jika tidak ada thumbnail, gunakan holder.js -->
              <?php ; else : ?>
              <img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
              <?php endif; ?><br>
              Kecepatan CPU :<br>
              <h3><?php echo ( $gadget->post_keccpu ) ?> GHz</h3>
              RAM :<br>
              <h3><?php echo ( $gadget->post_ram ) ?> GB</h3>
              Battery :<br>
              <h3><?php echo ( $gadget->post_battery ) ?></h3>
              Kamera Depan :<br>
              <h3><?php echo ( $gadget->post_frontcam ) ?> MP</h3>
              Kamera Belakang :<br>
              <h3><?php echo ( $gadget->post_backcam ) ?> MP</h3>
              Internal Memory :<br>
              <h3><?php echo ( $gadget->post_int ) ?> GB</h3>
              Harga :<br>
              <h3>Rp. <?php echo ( $gadget->price ) ?></h3>
              Stock :<br>
              <h3>Rp. <?php echo ( $gadget->stock ) ?></h3>
              <hr>
    </center>

  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>