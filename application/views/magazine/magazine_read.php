<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  <br>
    <center>
      <h1><font color="blue"><?php echo ( $detail->judul_magazine ) ?></font>
           
      <?php if( $detail->image ) : ?>
              <img class="card-img-top" width="400px" src="<?php echo base_url() .'uploads/'. $detail->image ?>" alt="image">
              
              <!-- Jika tidak ada thumbnail, gunakan holder.js -->
              <?php ; else : ?>
              <img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
              <?php endif; ?><br>
              
              Tanggal :<br>
              <h3><?php echo ( $detail->tanggal ) ?> </h3>
              Content :<br>
              <h3><?php echo ( $detail->content ) ?></h3>
              Sumber :<br>
               <h3><?php echo ( $detail->sumber ) ?></h3>
              <hr>
              <a href='magazine/edit/<?php echo $key->id_magazine;?>' class='btn-btn-sm btn-info'>edit</a>
              <a href='magazine/delete/<?php echo $key->id_magazine;?>' class='btn-btn-sm btn-danger'>Hapus</a>
              <hr>
    </center>

  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>