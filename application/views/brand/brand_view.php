<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  </div>
  <div class="one">
    <?php echo anchor('brand/create', 'Tambah Brand', array('class' => 'button')); ?>
  </div>
  <?php if( !empty($brand) ) : ?>

    <?php
      foreach ($brand as $key) :
    ?>
            <div class="one-third last">
              <hr>
              <div class="heading_bg">
                <h2><?php echo ( $key->brand_name ) ?></h2>
              </div>
              Dipost tanggal <?php echo ($key->date_created) ?><br>
              <h4><?php echo ( $key->brand_description ) ?></h4><br>
                  <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'brand/gadget/'.$key->brand_id ?>" class="button">Lihat Gadget</a>
                    <a href="<?php echo base_url(). 'brand/edit/' . $key->brand_id ?>" class="button">Edit</a>
                </div>
                <hr>
            </div>
  <?php endforeach; ?>

    <?php else : ?>
    <p>Belum ada data.</p>
    <?php endif; ?>


  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>