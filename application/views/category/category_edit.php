<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->

<div id="container">
  <div class="one">
    <div class="heading_bg">
      <h2><strong><?php	echo $page_title ?></strong></h2>
    </div>
  </div>
  <div class="one-half">
					<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

					<div class="form-group">
						<label for="cat_name">Nama category</label>
						<input type="text" class="form-control" name="category_name" value="<?php echo set_value('category_name', $category->category_name) ?>" required>
						<div class="invalid-feedback">Isi judul dulu gan</div>
					</div>
					<div class="form-group">
						<label for="text">Deskripsi</label>
						<input type="text" class="form-control" name="category_description" value="<?php echo set_value('category_description', $category->category_description) ?>" required>
						<div class="invalid-feedback">Isi deskripsinya dulu gan</div>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
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