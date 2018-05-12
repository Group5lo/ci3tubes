<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data user</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_title ?>
          </div>
          <?php echo anchor('#', 'Add', array('class' => 'btn btn-primary')); ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($all_user) ) : ?>

              <?php
                foreach ($all_user as $key) :
              ?>
                <tr>
                  <td><?php echo $key->post_id ?></td>
                  <td><?php echo $key->post_date ?> ( <?php echo time_ago($key->post_date)?>)</td>
                  <td><?php echo $key->brand_name ?></td>
                  <td><?php echo word_limiter($key->post_name, 10) ?></td>
                  <td><?php echo $key->post_status ?></td>
                  <td>
                    <div class="btn-group">
                    <!-- Untuk link detail -->
                    <a href="<?php echo base_url(). 'user/read/'.$key->post_slug ?>" class="btn btn-primary"><span class="fa fa-info-circle"></span> Baca</a>
                    <a href="<?php echo base_url(). 'user/edit/' . $key->post_id ?>" class="btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'user/delete/' . $key->post_id ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><span class="fa fa-trash"></span> Hapus</a>
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