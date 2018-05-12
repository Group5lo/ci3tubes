<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Brand</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_title ?>
          </div>
          <?php echo anchor('brand/create', 'Add', array('class' => 'btn btn-primary')); ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nama Brand</th>
                  <th>Deskripsi</th>
                  <th>Tanggal Buat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Nama Brand</th>
                  <th>Deskripsi</th>
                  <th>Tanggal Buat</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($all_brand) ) : ?>

              <?php
                foreach ($all_brand as $key) :
              ?>
                <tr>
                  <td><?php echo $key->brand_id ?></td>
                  <td><?php echo $key->brand_name ?></td>
                  <td><?php echo $key->brand_description ?></td>
                  <td><?php echo $key->date_created ?> ( <?php echo time_ago($key->date_created)?>)</td>
                  <td>
                    <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'brand/gadget/'.$key->brand_id ?>" class="btn btn-primary"><span class="fa fa-info-circle"></span> Lihat</a>
                    <a href="<?php echo base_url(). 'brand/edit/' . $key->brand_id ?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'brand/delete/' . $key->brand_id ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span> Hapus</a>
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