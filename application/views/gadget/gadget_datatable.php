<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Gadget DataTables</h1>
			
		</div>
    </section>
    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="dt-basic" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Gadget</th>
                            <th>Tanggal Created</th>
                            <th>Nama Brand</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?php echo $d->post_id ?></td>
                            <td><?php echo $d->post_date ?></td>
                            <td><?php echo $d->brand_name ?></td>
                            <td><?php echo $d->post_name ?></td>
                            <td><?php echo $d->post_status ?></td>
                            <td>
                                <a href="<?php echo base_url(). 'gadget/read/'.$d->post_slug ?>" class="btn btn-sm btn-outline-primary"><span class="fa fa-info-circle"></span> Baca</a>
                                 <a href="<?php echo base_url(). 'gadget/edit/' . $d->post_id ?>" class="btn btn-sm btn-outline-danger"><span class="fa fa-edit"></span> Edit</a>
                                 <a href="<?php echo base_url(). 'gadget/delete/' . $d->post_id ?>" class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
	
</main>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap4.min.js"></script>
<script>
    jQuery(document).ready(function(){

        // Contoh inisialisasi Datatable tanpa konfigurasi apapun
        // #dt-basic adalah id html dari tabel yang diinisialisasi
        $('#dt-basic').DataTable();
    });

</script>
