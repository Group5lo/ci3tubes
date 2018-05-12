<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  </div>
  <div class="one">
  </div>
  <?php if( !empty($all_gadget) ) : ?>

    <?php
      foreach ($all_gadget as $key) :
    ?>
            <div class="one-third last">
              <hr>
                <center><h2><?php echo word_limiter($key->post_name, 10) ?></h2></center>
              
              <?php if( $key->post_thumbnail ) : ?><center>
              <img class="card-img-top" height="300px"  src="<?php echo base_url() .'uploads/'. $key->post_thumbnail ?>" alt="Card image cap">
              
              <!-- Jika tidak ada thumbnail, gunakan holder.js -->
              <?php ; else : ?>
              <img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
              <?php endif; ?>
              <center><?php echo time_ago($key->post_date) ?>
              <ul class="post_meta" style="margin:0">
                <li class="post_meta_admin"><a href="#"><?php echo $key->brand_name ?></a></li>
                <li class="post_meta_date"><a href="#"><?php echo $key->post_date ?></a></li>
              </ul>
              <p>Ini adalah gadget yang ada disini dan mangkanya ada lo hehehe bagus to.</p>
                  <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'gadget/read/'.$key->post_slug ?>" class="button"><span class="fa fa-info-circle"></span> Baca</a>
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