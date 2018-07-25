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
          <?php echo anchor('admin/user_create', 'Add', array('class' => 'btn btn-primary')); ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>tanggal buat</th>
                  <th>Alamat</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>avatar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>tanggal buat</th>
                  <th>Alamat</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>avatar</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($all_user) ) : ?>

              <?php
                foreach ($all_user as $key) :
              ?>
                <tr>
                  <td><?php echo $key->user_id ?></td>
                  <td><?php echo $key->nama ?> </td>
                  <td><?php echo $key->username ?></td>
                  <td><?php echo $key->email ?></td>
                  <td><?php echo $key->nohp ?></td>
                  <td><?php echo $key->register_date ?></td>
                  <td><?php echo $key->alamat ?></td>
                  <td><?php echo $key->password ?></td>
                  <td><?php echo $key->fk_level_id ?></td>
                  <td><img class="card-img-top" height="65px" width="70px"  src="<?php echo base_url() .'uploads/'. $key->avatar ?>" alt="Card image cap"></td>
                  <td>
                    <div class="btn-group">
                    <a href="<?php echo base_url(). 'admin/user_edit/' . $key->user_id ?>" class="btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
                    <a href="<?php echo base_url(). 'admin/user_delete/' . $key->user_id ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><span class="fa fa-trash"></span> Hapus</a>
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