<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Stock and Price</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_title ?>
          </div>
          <?php echo anchor('admin/stockprice_create', 'Add', array('class' => 'btn btn-primary')); ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tipe Gadget</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Tipe Gadget</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($all_stockprice) ) : ?>

              <?php
                foreach ($all_stockprice as $key) :
              ?>
                <tr>
                  <td><?php echo $key->id_sh ?></td>
                  <td><?php echo $key->post_name ?></td>
                  <td><?php echo $key->stock ?></td>
                  <td>Rp. <?php echo $key->price ?>,00</td>
                  <td>
                    <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'admin/stockprice_edit/' . $key->id_sh ?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'admin/stockprice_delete/' . $key->id_sh ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span> Hapus</a>
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