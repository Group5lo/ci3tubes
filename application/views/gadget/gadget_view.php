<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h1><?php echo $page_title ?></h1>
  </div>
  </div>
  <div class="one">
  </div>
  <?php if( !empty($all_gadget) ) : ?>

    <?php
      foreach ($all_gadget as $key) :
    ?>
            <div style="margin-left: 50px" class="one-fourth">
              <hr>
                <center><h2><?php echo word_limiter($key->post_name, 10) ?></h2></center>
              
              <?php if( $key->post_thumbnail ) : ?><center>
              <img class="card-img-top" height="320px"  src="<?php echo base_url() .'uploads/'. $key->post_thumbnail ?>" alt="Card image cap">
              
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

                    <?php if(!$this->session->userdata('logged_in')) : ?>
                    <a href="<?php echo base_url(). 'gadget/read/'.$key->post_slug ?>" class="button"><span class="fa fa-info-circle"></span> Baca</a>
                    <?php endif; ?>

                    <?php if($this->session->userdata('logged_in')) : ?>
                    <a href="<?php echo base_url(). 'gadget/read/'.$key->post_slug ?>" class="button"><span class="fa fa-info-circle"></span> Baca</a>&nbsp&nbsp&nbsp
                    <a href="<?php echo base_url(). 'transaksi/beli/'.$key->post_slug ?>" class="button"><span class="fa fa-dollar"></span> Beli</a>
                    <?php endif; ?>

                </div>
                <hr>
            </div>
  <?php endforeach; ?>

    <?php else : ?>
    <p>Belum ada data.</p>
    <?php endif; ?>

  <div style="clear:both; height: 40px"></div><center>
  <?php 
    // $links ini berasal dari fungsi pagination 
    // Jika $links ada (data melebihi jumlah max per page), maka tampilkan
    if (isset($links)) {
      echo $links;
    } 
    ?>

</div>
