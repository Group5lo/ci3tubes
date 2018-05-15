<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Transaksi</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_title ?>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tanggal buat</th>
                  <th>Costumer</th>
                  <th>No Telpon</th>
                  <th>Email</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Harga satuan</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Tanggal buat</th>
                  <th>Costumer</th>
                  <th>No Telpon</th>
                  <th>Email</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Harga satuan</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($transaksi) ) : ?>

              <?php
                foreach ($transaksi as $key) :
              ?>
                <tr>
                  <td><?php echo $key->id_transaksi ?></td>
                  <td><?php echo $key->data_created ?></td>
                  <td><?php echo $key->nama_pembeli ?></td>
                  <td><?php echo $key->no_hp ?></td>
                  <td><?php echo $key->email ?></td>
                  <td><?php echo $key->nama_barang ?></td>
                  <td><?php echo $key->jumlah ?></td>
                  <td><?php echo $key->harga_satuan ?></td>
                  <td><?php echo $key->total_bayar ?></td>
                  <td>
                    <?php 
                    $status=$key->status;
                    ?>
                    <?php if ($status=='baru') :?>
                      <?php echo form_open( 'admin/transaksi_kurang_stock/'. $key->id_transaksi, array('class' => 'needs-validation', 'novalidate' => '') ); ?>
                      <input type="submit" class="btn btn-default" value="Baru">
                      </form>
                    <?php ; else : ?>
                      <input type="submit" class="btn btn-warning" value="Lunas">
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'admin/transaksi_edit/' . $key->id_transaksi ?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'admin/transaksi_delete/' . $key->id_transaksi ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span> Hapus</a>
                    </div>
                </div>
                  </td>
                </tr>
              <?php endforeach; ?>

              <?php else : ?>
              <p>Belum ada data.</p>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <script>
    jQuery(document).ready(function(){

        // Contoh inisialisasi Datatable tanpa konfigurasi apapun
        // #dt-basic adalah id html dari tabel yang diinisialisasi
        $('#dt-basic').DataTable();
    });
  </script>