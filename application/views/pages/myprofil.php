<div class="container" ">
<h3><span class="fa fa-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="databarang.php"><span class="fa fa-arrow-left"></span>  Kembali</a>
<div class="row">  
  <div class = "col-lg-6">       
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>" />
      <table class="table">
        <tr>
          <td>Nama Barang</td>
          <td><input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama_barang'] ?>"></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><input type="text" class="form-control" name="harga" required="required" value="<?php echo $d['harga'] ?>"></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td><input type="file" class="form-control" name="gambar" value="../images/<?php $d['gambar'] ?>"</td>
        </tr>
        <tr>
          <td>Detail</td>
          <td><input type="text" class="form-control" name="detail" required="required" value="<?php echo $d['detail'] ?>"></td>
        </tr>
        <tr>
          <td>Qty</td>
          <td><input type="text" class="form-control" name="qty" required="required" value="<?php echo $d['qty'] ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" class="btn btn-info" value="Simpan" name="simpan" ></td>
        </tr>
      </table>
    </form>
  </div>
  <div class="col-lg-6">
    <img style='width:200px;height:280px' src="<?php echo "../images/".$d['gambar']; ?>"> 
  </div>
</div>
</div>