<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  </div>
  <div class="one">
  </div>
  <?php if( !empty($category) ) : ?>

    <?php
      foreach ($category as $key) :
    ?>
            <div class="one-third last">
              <hr>
              <div class="heading_bg">
                <h2><?php echo ( $key->category_name ) ?></h2>
              </div>
              Dipost tanggal <?php echo ($key->datecreated) ?><br>
              <h4><?php echo ( $key->category_description ) ?></h4><br>
                  <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'category/magazine/'.$key->id_category ?>" class="button"><span class="fa fa-info-circle"></span> Lihat category</a>
                    <a href="<?php echo base_url(). 'category/edit/' . $key->id_category ?>" class="button"><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'category/hapus/' . $key->id_category ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="button"><span class="fa fa-trash"></span> Hapus</a>
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