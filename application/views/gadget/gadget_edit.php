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
					<?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
					<div class="form-group">
						<label>Brand</label>
						<?php echo form_dropdown('brand_id', $brand, set_value('brand_id', $gadget->fk_brand_id), 'class="form-control" required' ); ?>
						<div class="invalid-feedback">Pilih dulu kategorinya gan</div>
					</div>
					<div class="form-group">
						<label for="title">Tipe</label>
						<input type="text" class="form-control" name="tipe" value="<?php echo set_value('tipe', $gadget->post_name) ?>" required>
						<div class="invalid-feedback">Isi tipe dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Kecepatan CPU</label>
						<input type="text" class="form-control" name="keccpu" value="<?php echo set_value('keccpu', $gadget->post_keccpu) ?>" required>
						<div class="invalid-feedback">Isi kecepatannya</div>
					</div>
					<div class="form-group">
						<label for="title">RAM</label>
						<input type="number" class="form-control" name="ram" value="<?php echo set_value('ram', $gadget->post_ram) ?>" required>
						<div class="invalid-feedback">Isi RAM dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Battery</label>
						<input type="text" class="form-control" name="battery" value="<?php echo set_value('battery', $gadget->post_battery) ?>" required>
						<div class="invalid-feedback">Isi detail batrenya dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Kamera Depan</label>
						<input type="text" class="form-control" name="frontcam" value="<?php echo set_value('frontcam', $gadget->post_frontcam) ?>" required>
						<div class="invalid-feedback">Isi kamera depannya dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Kamera Belakang</label>
						<input type="text" class="form-control" name="backcam" value="<?php echo set_value('backcam', $gadget->post_backcam) ?>" required>
						<div class="invalid-feedback">Isi kamera belakang dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Internal Memory</label>
						<input type="number" class="form-control" name="int" value="<?php echo set_value('int', $gadget->post_int) ?>" required>
						<div class="invalid-feedback">Isi memory internalnya ya</div>
					</div>
					<div class="form-group">
						<label for="title">Stock</label>
						<input type="number" class="form-control" name="stock" value="<?php echo set_value('stock', $gadget->stock) ?>" required>
						<div class="invalid-feedback">Isi Stock dulu ya</div>
					</div>
					<div class="form-group">
						<label for="title">Harga</label>
						<input type="number" class="form-control" name="price" value="<?php echo set_value('price', $gadget->price) ?>" required>
						<div class="invalid-feedback">Isi Harga dulu ya</div>
					</div>
					<div class="form-group">
						<?php if( $gadget->post_thumbnail ) : ?>
						<img class="card-img-top" src="<?php echo base_url() .'uploads/'. $gadget->post_thumbnail ?>" alt="Card image cap" width=300>
						<?php endif; ?>

						<label for="thumbnail">Gambar thumbnail</label>
						<input type="file" class="form-control-file" name="thumbnail">
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Post Gadget</button>
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