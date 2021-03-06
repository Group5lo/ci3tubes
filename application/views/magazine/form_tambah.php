<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="container">
  <div class="one">
    <div class="heading_bg">
      <h2><strong><?php echo $page_title ?></strong></h2>
    </div>
  </div>
  <div class="one-half">
    
            <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
          <?php echo form_open_multipart( 'magazine/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
          <div class="form-group">
            <label for="title">Judul Magazine</label>
            <input type="text" class="form-control" name="judul_magazine" value="<?php echo set_value('judul_magazine') ?>" required>
            <div class="invalid-feedback">Isi judul dulu ya</div>
          </div>
          <div class="form-group">
            <label for="title">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?php echo set_value('tanggal') ?>" required>
            <div class="invalid-feedback">Isi tanggal</div>
          </div>
          <div class="form-group">
            <label for="title">Content</label>
            <input type="text" class="form-control" name="content" value="<?php echo set_value('content') ?>" required>
            <div class="invalid-feedback">Isi content</div>
          </div>
          <div class="form-group">
            <label for="title">Image</label>
            <input type="file" class="form-control" name="image" value="<?php echo set_value('image') ?>" required>
            <div class="invalid-feedback">Isi gambar</div>
          </div>
          <div class="form-group">
            <label for="title">Sumber</label>
            <input type="text" class="form-control" name="sumber" value="<?php echo set_value('sumber') ?>" required>
            <div class="invalid-feedback">Isi sumber</div>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <?php echo form_dropdown('id_category', $category, set_value('id_category'), 'class="form-control" required' ); ?>
            <div class="invalid-feedback">Pilih dulu kategorinya gan</div>
          </div>
          <button id="submitBtn" type="submit" class="btn btn-primary">Post Magazine</button>
        </form>
    
  </div>
  <div style="clear:both; height: 40px"></div>
</div>
  

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

  <script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>