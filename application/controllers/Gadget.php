<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gadget extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		$this->load->helper('MY');
		$this->load->model('gadget_model');
		$this->load->model('brand_model');
	}
	public function index()
	{
		$data['page_title'] = 'GADGET LIST'; 
		
		// Dapatkan data dari model Blog
		$data['all_gadget'] = $this->gadget_model->get_all_gadget();
		$this->load->view("templates/v_header");
		$this->load->view('gadget/gadget_view',$data);
		$this->load->view("templates/v_footer");
	}
	public function lihat_detail($kategori, $id)
	{
		// Jika kita akses:
		// http://localhost/ci3-course/blog/lihat_detail/berita/2
		// Maka "lihat_detail" adalah fungsi ini, "berita" adalah "kategori" dan 2 dianggap id berita
		echo $kategori;
		echo '<br>';
		echo $id;
	}
	public function read($slug='')
	{
		// Mendapatkan data dari model
		$data['page_title'] = 'GADGET DETAIL'; 
		$data['gadget'] = $this->gadget_model->get_gadget_by_slug($slug);
		// Jika slug kosong atau tidak ada di db, lempar user ke halaman 404
		if ( empty($slug) || !isset($data['gadget']) ) show_404();
		$this->load->view("templates/v_header");
		// Passing data ke view
		$this->load->view('gadget/gadget_read', $data);
		$this->load->view("templates/v_footer");
	}
	public function create()
	{
		$data['page_title'] = 'ADD GADGET';
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
		$this->load->library('form_validation');
		// Gunakan fungsi dari model untuk mengisi data dalam dropdown
		$data['brand'] = $this->brand_model->generate_brand_dropdown();
	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
	    $this->form_validation->set_rules('tipe', 'Tipe', 'required|is_unique[gadget_table.post_name]',
			array(
				'required' 		=> 'Isi %s donk, males amat.',
				'is_unique' 	=> 'Tipe <strong>' .$this->input->post('tipe'). '</strong> sudah ada bosque.'
			));
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('gadget/gadget_create', $data);
	        $this->load->view('templates/v_footer');
	    } else {
    		// Apakah user upload gambar?
    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('templates/v_header');
    	            $this->load->view('gadget/gadget_create', $data);
    	            $this->load->view('templates/v_footer'); 
    	        } else {
    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {
    			// User tidak upload gambar, jadi kita kosongkan field ini
    			$post_image = '';
    		}
	    	// Memformat slug sebagai alamat URL, 
	    	// Misal judul: "Hello World", kita format menjadi "hello-world"
	    	// Nantinya, URL blog kita menjadi mudah dibaca 
	    	// http://localhost/ci3-course/blog/hello-world
	    	$slug = url_title($this->input->post('tipe'), 'dash', TRUE);
	    	$post_data = array(
				'fk_brand_id' => $this->input->post('brand_id'),
	    	    'post_name' => $this->input->post('tipe'),
	    	   	'post_date' => date("Y-m-d H:i:s"),
	    	    'post_slug' => $slug,
	    	    'post_keccpu' => $this->input->post('keccpu'),
	    	    'post_ram' => $this->input->post('ram'),
	    	    'post_battery' => $this->input->post('battery'),
	    	    'post_frontcam' => $this->input->post('frontcam'),
	    	    'post_backcam' => $this->input->post('backcam'),
	    	    'post_int' => $this->input->post('int'),
	    	    'post_thumbnail' => $post_image,
	    	   	'date_created' => date("Y-m-d H:i:s"),
	    	);
	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->gadget_model->create_gadget($post_data);
		        $this->load->view('templates/v_header');
		        $this->load->view('gadget/gadget_success', $data);
		        $this->load->view('templates/v_footer'); 
	    	}
	    }
	}
	public function edit($id = NULL)
	{
		$data['page_title'] = 'GADGET EDIT';
		// Get artikel dari model berdasarkan $id
		$data['gadget'] = $this->gadget_model->get_gadget_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['gadget'] ) redirect('gadget');
		// Gunakan fungsi dari model untuk mengisi data dalam dropdown
		$data['brand'] = $this->brand_model->generate_brand_dropdown();
		// Kita simpan dulu nama file yang lama
		$old_image = $data['gadget']->post_thumbnail;
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('tipe', 'Tipe', 'required',
			array(
				'required' 		=> 'Isi %s donk, males amat.'
			));
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('gadget/gadget_edit', $data);
	        $this->load->view('templates/v_footer');
	    } else {
    		// Apakah user upload gambar?
    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        $config['max_width']            = 1000;
    	        $config['max_height']           = 2000;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('templates/v_header');
    	            $this->load->view('gadget/gadget_edit', $data);
    	            $this->load->view('templates/v_footer'); 
    	        } else {
    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}
    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {
    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			$post_image = ( !empty($old_image) ) ? $old_image : '';
    		}
    		$slug = url_title($this->input->post('tipe'), 'dash', TRUE);
	    	$post_data = array(
	    	    'fk_brand_id' => $this->input->post('brand_id'),
	    	    'post_name' => $this->input->post('tipe'),
	    	    'post_slug' => $slug,
	    	    'post_keccpu' => $this->input->post('keccpu'),
	    	    'post_ram' => $this->input->post('ram'),
	    	    'post_battery' => $this->input->post('battery'),
	    	    'post_frontcam' => $this->input->post('frontcam'),
	    	    'post_backcam' => $this->input->post('backcam'),
	    	    'post_int' => $this->input->post('int'),
	    	    'post_thumbnail' => $post_image,
	    	);
	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {
	    		// Update artikel sesuai post_data dan id-nya
		        $this->gadget_model->update_gadget($post_data, $id);
		        $this->load->view('templates/v_header');
		        $this->load->view('gadget/gadget_success', $data);
		        $this->load->view('templates/v_footer'); 
	    	}
	    }
	}
	public function delete($id)
	{
		$data['page_title'] = 'HAPUS GADGET';
		// Get artikel dari model berdasarkan $id
		$data['gadget'] = $this->gadget_model->get_gadget_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['gadget'] ) show_404();
		// Kita simpan dulu nama file yang lama
		$old_image = $data['gadget']->post_thumbnail;
    	// Hapus file image yang lama jika ada
    	if( !empty($old_image) ) {
    		if ( file_exists( './uploads/'.$old_image ) ){
    		    unlink( './uploads/'.$old_image );
    		} else {
    		    echo 'File tidak ditemukan.';
    		}
    	}
		// Hapus artikel sesuai id-nya
        if( ! $this->gadget_model->delete_gadget($id) )
        {
        	// Jika gagal, tampilkan failnya
	        $this->load->view('templates/v_header');
	        $this->load->view('gadget/gadget_failed', $data);
	        $this->load->view('templates/v_footer'); 
	    } else {
	    	// Ok, sudah terhapus
	    	$this->load->view('templates/v_header');
	        $this->load->view('gadget/gadget_success', $data);
	        $this->load->view('templates/v_footer'); 
	    }
	}
}