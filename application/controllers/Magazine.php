<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		$this->load->helper('MY');
		$this->load->model('artikel');
	}

	public function index()
	{

		$data['page_title'] = 'Magazine'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('artikel');
		$data['artikel'] = $this->artikel->get_artikel();

		$this->load->view("templates/v_header");
		$this->load->view('magazine/home_viewmagazine',$data);
		$this->load->view("templates/v_footer");
	}

	public function detail($id)
	{
		$data['page_title'] = 'Magazine'; 

		$this->load->model('artikel');
		$data['detail'] = $this->artikel->get_single($id);

		$this->load->view("templates/v_header");
		$this->load->view('magazine/magazine_read', $data);
		$this->load->view("templates/v_footer");
	}

	public function create()
	{

		$data['page_title'] = 'ADD Magazine';

		// Kita butuh helper dan library berikut
		$this->load->library('form_validation');
		$this->load->model('artikel');
		// Gunakan fungsi dari model untuk mengisi data dalam dropdown
		

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
	    $this->form_validation->set_rules('judul_magazine', 'judul magazine', 'required|is_unique[magazine.judul_magazine]',
			array(
				'required' 		=> 'Isi %s donk, males amat.',
				'is_unique' 	=> 'judul_magazine <strong>' .$this->input->post('judul_magazine'). '</strong> sudah ada bosque.'
			));

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.',
			));

		$this->form_validation->set_rules('content', 'content', 'required|min_length[8]',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.',
				'min_length' 	=> 'Isi %s kurang panjang bosque.',
			));


		$this->form_validation->set_rules('sumber', 'sumber', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.',
			));
	    
		if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('magazine/form_tambah', $data);
	        $this->load->view('templates/v_footer');
	    } else {
    		// Apakah user upload gambar?
    		if ( isset($_FILES['image']) && $_FILES['image']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './img/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('image'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('templates/v_header');
    	            $this->load->view('magazine/form_tambah', $data);
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
	    	$post_data = array(
	    	    'judul_magazine' => $this->input->post('judul_magazine'),
	    	    'tanggal' => $this->input->post('tanggal'),
	    	    'content' => $this->input->post('content'),
	    	    'image' => $post_image,
	    	    'sumber' => $this->input->post('sumber'),
	    	);
	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->artikel->create_magazine($post_data);
		        $this->load->view('templates/v_header');
		        $this->load->view('magazine/magazine_success', $data);
		        $this->load->view('templates/v_footer'); 
	    	}
	    }
	}

	

		public function delete($id_magazine){
		$this->load->model('artikel');
		$this->artikel->delete($id_magazine);
		redirect('magazine');
	}

	

		public function edit($id = NULL)
	{

		$data['page_title'] = 'MAGAZINE EDIT';

		// Get artikel dari model berdasarkan $id
		$data['artikel'] = $this->artikel->get_magazine_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list brand
		if ( empty($id) || !$data['artikel'] ) redirect('magazine');

		$old_image = $data['artikel']->image;
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('judul_magazine', 'Judul Magazine', 'required',
			array('required' => 'Isi %s donk, males amat.'));
	    	$this->form_validation->set_rules('tanggal', 'Tanggal', 'required',
			array('required' => 'Isi %s donk, males amat.'));
				$this->form_validation->set_rules('content', 'content', 'required',
			array('required' => 'Isi %s donk, males amat.'));
				$this->form_validation->set_rules('image', 'image', 'required',
			array('required' => 'Isi %s donk, males amat.'));
					$this->form_validation->set_rules('sumber', 'sumber', 'required',
			array('required' => 'Isi %s donk, males amat.'));


	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('magazine/form_edit', $data);
	        $this->load->view('templates/v_footer');
	    } else {
    		// Apakah user upload gambar?
    		if ( isset($_FILES['image']) && $_FILES['image']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './img/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        $config['max_width']            = 1000;
    	        $config['max_height']           = 2000;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('image'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('templates/v_header');
    	            $this->load->view('magazine/form_edit', $data);
    	            $this->load->view('templates/v_footer'); 
    	        } else {
    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './img/'.$old_image ) ){
    	        		    unlink( './img/'.$old_image );
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

	    	$post_data = array(
	    	    'judul_magazine' => $this->input->post('judul_magazine'),
	    	    'tanggal' => $this->input->post('tanggal'),
	    	    'content' => $this->input->post('content'),
	    	    'image' => $post_image,
	    	    'sumber' => $this->input->post('sumber'),
	    	);
	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {
	    		// Update artikel sesuai post_data dan id-nya
		        $this->artikel->update_magazine($post_data, $id);
		        $this->load->view('templates/v_header');
		        $this->load->view('magazine/magazine_success', $data);
		        $this->load->view('templates/v_footer'); 
	    	}
	    }
	}


}