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
		$data['all_artikel'] = $this->gadget_model->get_all_gadget();

		$this->load->view("templates/v_header");
		$this->load->view('gadget/gadget_view',$data);
		$this->load->view("templates/v_footer");
	}

	public function create()
	{

		$data['page_title'] = 'ADD GADGET';

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
		$this->load->library('form_validation');

		// Gunakan fungsi dari model untuk mengisi data dalam dropdown
		$data['categories'] = $this->brand_model->generate_cat_dropdown();

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
	    $this->form_validation->set_rules('title', 'Judul', 'required|is_unique[blogs.post_title]',
			array(
				'required' 		=> 'Isi %s donk, males amat.',
				'is_unique' 	=> 'Judul <strong>' .$this->input->post('title'). '</strong> sudah ada bosque.'
			));

		$this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.',
				'min_length' 	=> 'Isi %s kurang panjang bosque.',
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
    	            $this->load->view('templates/header');
    	            $this->load->view('blogs/blog_create', $data);
    	            $this->load->view('templates/footer'); 

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
	    	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    	$post_data = array(
				'fk_cat_id' => $this->input->post('cat_id'),
	    	    'post_title' => $this->input->post('title'),
	    	   	'post_date' => date("Y-m-d H:i:s"),
	    	    'post_slug' => $slug,
	    	    'post_content' => $this->input->post('text'),
	    	    'post_thumbnail' => $post_image,
	    	   	'date_created' => date("Y-m-d H:i:s"),
	    	);

	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->blog_model->create_gadget($post_data);

		        $this->load->view('templates/header');
		        $this->load->view('blogs/blog_success', $data);
		        $this->load->view('templates/footer'); 
	    	}
	    }
	}

}
