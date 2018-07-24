<?php echo form_open_multipart(base_url('transaksi/konfirmasi/')); ?> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h2><?php echo $page_title ?></h2>
  </div>
  <br>
    <center>
      <Form method="POST">
      <h1><font color="blue"><?php echo ( $gadget->brand_name ) ?></font> <?php echo ( $gadget->post_name ) ?></h1>
      <table class="table">

        <input type="hidden" name="post_id" value="<?php echo $gadget->post_id ?>" />
        <tr>
          <td rowspan="12"><img class="card-img-top" style="height:300px; width: 200px;  " src="<?php echo base_url() .'uploads/'. $gadget->post_thumbnail ?>" alt="Card image cap"></td>
        </tr>

        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>" />
        <tr>
          <td>Harga</td>
          <td>Rp. <?php echo ( $gadget->price ) ?></td>
        </tr>
        <tr>
          <td>Stock Tersisa</td>
          <td><?php echo ( $gadget->stock ) ?> Item</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><?php echo ( $user->nama ) ?></td>
          <input type="hidden" name="nama_pembeli" value="<?php echo $user->nama ?>" >
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo ( $user->email ) ?></td>
        </tr>
        <tr>
        <tr>
          <td>Alamat</td>
          <td><input type="text"    class="form-control" name="alamat" required="required" placeholder="Alamat" ></td>
        </tr>
        <tr>
          <td>No. HP</td>
          <td><input type="number"    class="form-control" name="nohp" required="required" placeholder="No. Tlp" ></td>
        </tr>
        <tr>
        <tr>
        <tr>
          <td>Jumlah</td>
          <td><input type="number"  class="form-control" name="jumlah" required="required" max="<?php echo ( $gadget->stock ) ?>" min="1" placeholder="jumlah" ></td>
        </tr>
        <tr>
          <td>Konfirmasi</td>
          <td>
              <button type="submit" class="btn btn-success"  name="buy" ><span class="fa fa-dollar"> Buy</span></button>
          </td>
        </tr>
      </table>
    </form>
    </center>

  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>