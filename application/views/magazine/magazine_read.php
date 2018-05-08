<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo ( $detail->judul_magazine ) ?>
                <a href="<?php echo base_url(). 'magazine/edit/' . $detail->id_magazine ?>" class="button"><span class="fa fa-edit"></span></a>
                <a href="<?php echo base_url(). 'magazine/delete/' . $detail->id_magazine ?>" class="button" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span></a>
          </h1>

          <hr>

          <!-- Date/Time -->
          <p class="text-justify">Posted on <?php echo ( $detail->tanggal ) ?> </p>

          <hr>

          <!-- Preview Image -->
          <p>Sumber : <a href="#"><?php echo ( $detail->sumber ) ?> </a></p>
              <?php if( $detail->image ) : ?>
              <img class="card-img-top" width="400px" src="<?php echo base_url() .'img/'. $detail->image ?>" alt="image"><br><br>
              
              <!-- Jika tidak ada thumbnail, gunakan holder.js -->
              <?php ; else : ?>
              <img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
              <?php endif; ?>
 

          <hr>

          <!-- Post Content -->

          <p style="text-align: justify; "><?php echo ( $detail->content ) ?></p>


          <hr>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Category</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <?php
                      foreach ($category as $key) :
                  ?>
                    <li>
                      <a href="<?php echo base_url(). 'category/magazine/'.$key->id_category ?>"><?php echo ( $key->category_name ) ?></a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </div>
<!--                 <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
  </div>
  </div>
</div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>
