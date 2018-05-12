<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  </div>
  <div class="one">
  </div>
  <div class="one">
    <div class="heading_bg">
      <h2><?php foreach ($artikel as $key) :  ?></h2>
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <table style="margin-bottom: 30px;">
            <tr>
              <td>
                <a href="<?php echo base_url(). 'magazine/detail/' . $key->id_magazine ?>" style="color: black;">
                  <!-- src="img/<?php echo $key->image;?>" -->
                  <img src="<?php echo base_url().'img/'?><?php echo $key->image; ?>" alt="Image" width="400" height="300">
                  <br>
                  <?php echo $key->judul_magazine ?> 
                </a>
                <br><br>
                <a href="<?php echo base_url(). '/magazine/detail/'.$key->id_magazine ?>" class="button"><span class="fa fa-info-circle"></span> Baca</a>
              </td>
            </tr>
          </table>
    </div>
    <?php endforeach; ?>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

