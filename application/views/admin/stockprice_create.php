<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
					<?php echo form_open_multipart( 'admin/stockprice_create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
					<!--Jika tipe yang dipilih sudah diberi harga maka tidak bisa ditambah lagi karena field dari fk_tipe itu unik tidak boleh sama-->
						<label>Tipe</label>
						<?php echo form_dropdown('post_id', $stockprice, set_value('post_id'), 'class="form-control" required' ); ?>
						<div class="invalid-feedback">Pilih dulu tipenya gan</div>
					</div>
					<div class="form-group">
						<label for="title">Stock</label>
						<input type="number" class="form-control" name="stock" value="<?php echo set_value('stock') ?>" required>
						<div class="invalid-feedback">Isi Stock Gadget</div>
					</div>
					<div class="form-group">
						<label for="title">Harga</label>
						<input type="number" class="form-control" name="price" value="<?php echo set_value('price') ?>" required>
						<div class="invalid-feedback">Isi Harga Gadget</div>
					</div>

					
					<button id="submitBtn" type="submit" class="btn btn-primary">ADD</button>
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