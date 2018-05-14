<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  <br>
    <center>
      <h1><font color="blue"><?php echo ( $gadget->brand_name ) ?></font> <?php echo ( $gadget->post_name ) ?></h1>
      <table class="table">
        <tr>
          <td rowspan="12"><img class="card-img-top" style="height:300px; width: 200px;  " src="<?php echo base_url() .'uploads/'. $gadget->post_thumbnail ?>" alt="Card image cap"></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><?php echo ( $gadget->price ) ?></td>
        </tr>
        <tr>
          <td>Stock Tersisa</td>
          <td><?php echo ( $gadget->stock ) ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text"    class="form-control" name="nama_pelanggan" required="required" placeholder="Nama Lengkap" ></td>
        </tr>
        <tr>
        <tr>
          <td>Alamat</td>
          <td><input type="text"    class="form-control" name="alamat" required="required" placeholder="Alamat" ></td>
        </tr>
        <tr>
          <td>No. HP</td>
          <td><input type="text"    class="form-control" name="nohp" required="required" placeholder="No. Tlp" ></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="Email"  class="form-control" name="Email" required="required" placeholder="Email" ></td>
        </tr>
        <tr>
        <tr>
        <tr>
          <td>Harga</td>
          <td><input type="number"  class="form-control" name="jumlah" required="required" max="<?php echo ( $gadget->price ) ?>" min="1" placeholder="jumlah" ></td>
        </tr>
        <tr>
          <td>Konfirmasi</td>
          <td>
              <button type="submit" class="btn btn-success" name="buy" ><span class="fa fa-dollar"> Buy</span></button>
          </td>
        </tr>
      </table>
    </center>

  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>