<?php echo form_open_multipart(base_url('transaksi/fix/'));
$total_bayar = $gadget->price * $this->session->userdata('jumlah');
$this->session->set_userdata('total_bayar', $total_bayar);
 ?> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

<div id="container">
  <div class="one">
  <div class="heading_bg">
    <h1><?php echo $page_title ?></h1>
  </div>
  <br>
    <center>
      <Form method="POST">
      <table class="table">
      	 <tr>
          <td rowspan="10"><center><br><img class="card-img-top" style="height:300px; width: 300px;  " src="<?php echo base_url() .'uploads/'. $gadget->post_thumbnail ?>" alt="Card image cap"></td>
        </tr>
        <tr>
          <td>
          	<!-- <span class="fa fa-circle">Barang yang akan dipesan : <?php echo ( $gadget->post_name ) ?></span> -->
          	<input type="hidden" name="nama_pembeli" value="<?php echo $this->session->userdata('nama_pembeli') ?>" />
          	<input type="hidden" name="alamat" value="<?php echo $this->session->userdata('alamat') ?>" />
          	<input type="hidden" name="no_hp" value="<?php echo $this->session->userdata('nohp') ?>" />
          	<input type="hidden" name="email" value="<?php echo $this->session->userdata('email') ?>" />
          	<input type="hidden" name="nama_barang" value="<?php echo ( $gadget->post_name ) ?>" />
          	<input type="hidden" name="jumlah" value="<?php echo $this->session->userdata('jumlah') ?>" />
          	<input type="hidden" name="harga_satuan" value="<?php echo ( $gadget->price ) ?>" />
          	<input type="hidden" name="total_bayar" value="<?php echo $total_bayar ?>" />
            <li>Nama Pembeli : <?php echo $this->session->userdata('nama_pembeli') ?></li><br>
            <li>Barang yang akan dipesan : <?php echo ( $gadget->post_name ) ?></li><br>
            <li>Dengan jumlah: <?php echo $this->session->userdata('jumlah') ?> item</li><br> 
            <li>Barang akan dikirim ke alamat : <?php echo $this->session->userdata('alamat') ?></li><br> 
            <li>Nomor yang bisa dihubungi : <?php echo $this->session->userdata('nohp') ?></li><br> 
            <li>Harga per item Rp. <?php echo ( $gadget->price ) ?></li><br>  
            <li>Total yang harus dibayar sebesesar Rp. <?php echo $total_bayar ?></li><br> 
            <li>Silahkan tranfer uang ke rekening bca : 123456789</li><br>
            <button  type="submit" class="btn btn-success"  name="konfirmasi" ><span class="fa fa-check"> konfirmasi</span></button>
          </td>
        </tr>
        <tr> 
      </table>
    </form>
    </center>

  </div>
  <div style="clear:both; height: 40px"></div>
</div>

<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>