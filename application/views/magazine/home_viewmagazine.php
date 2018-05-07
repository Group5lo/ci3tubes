<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  </div>
  <div class="one">
    <?php echo anchor('Magazine/create', 'Tambah ', array('class' => 'button')); ?>
  </div>
  <div class="one">
    <div class="heading_bg">
      <h2><?php foreach ($artikel as $key) :  ?></h2>
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <table style="margin-bottom: 30px;">
            <tr>
              <td>
                <a href="magazine/detail/<?php echo $key->id_magazine ?>" style="color: black;">
                  <img src="img/<?php echo $key->image;?>" alt="Image" width="500" height="400">
                  <br>
                  <?php echo $key->judul_magazine ?>
                </a>
                <br><br>
                <a href='magazine/edit/<?php echo $key->id_magazine;?>' class='btn-btn-sm btn-info'>edit</a>
                <a href='magazine/delete/<?php echo $key->id_magazine;?>' class='btn-btn-sm btn-danger'>Hapus</a>
              </td>
            </tr>
          </table>
    </div>
    <?php endforeach; ?>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>

