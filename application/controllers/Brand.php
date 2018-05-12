<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		// Load custom helper applications/helpers/MY_helper.php
		$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('gadget_model');
		$this->load->model('brand_model');
	}

	public function index() 
	{

		// Judul Halaman
		$data['page_title'] = 'BRAND';

		// Dapatkan semua kategori
		$data['brand'] = $this->brand_model->get_all_brand();

		$this->load->view('templates/v_header');
		$this->load->view('brand/brand_view', $data);
		$this->load->view('templates/v_footer');
	}

	public function create() 
	{
		// Judul Halaman
		$data['page_title'] = 'ADD NEW BRAND';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'brand_name', 'Nama Brand','required|is_unique[brand.brand_name]',
			array(
				'required' => 'Isi %s donk, males amat.',
				'is_unique' => 'Judul <strong>' . $this->input->post('brand_name') . '</strong> sudah ada bos.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('brand/brand_create', $data);
			$this->load->view('templates/v_footer');
		} else {
			$this->brand_model->create_brand();
			redirect('brand');
		}
	}

	// Menampilkan semua artikel dalam kategori yang dipilih
	public function gadget($id) 
	{

		// Menampilkan judul berdasar nama kategorinya
		$data['page_title'] = $this->brand_model->get_brand_by_id($id)->brand_name;

		// Dapatkan semua artikel dalam kategori ini
		$data['all_gadget'] = $this->gadget_model->get_gadget_by_brand($id);

		// Kita gunakan view yang sama pada controller Blog
		$this->load->view('templates/v_header');
		$this->load->view('gadget/gadget_view', $data);
		$this->load->view('templates/v_footer');
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{

		$data['page_title'] = 'BRAND EDIT';

		// Get artikel dari model berdasarkan $id
		$data['brand'] = $this->brand_model->get_brand_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list brand
		if ( empty($id) || !$data['brand'] ) redirect('blog');

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('brand_name', 'Nama brand', 'required',
			array('required' => 'Isi %s donk, males amat.'));
	    $this->form_validation->set_rules('brand_description', 'Deskripsi', 'required');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('brand/brand_edit', $data);
	        $this->load->view('templates/v_footer');

	    } else {

	    	$post_data = array(
	    	    'brand_name' => $this->input->post('brand_name'),
	    	    'brand_description' => $this->input->post('brand_description'),
	    	);

		    $this->load->view('templates/v_header');
    		
    		// Update kategori sesuai post_data dan id-nya
	        if ($this->brand_model->update_brand($post_data, $id)) {
		        $this->load->view('gadget/gadget_success', $data);
	        } else {
		        $this->load->view('gadget/gadget_failed', $data);
	        }
	        $this->load->view('templates/v_footer'); 

	    }
	}


	public function delete($id)
	{

		$data['page_title'] = 'HAPUS BRAND';

		$this->brand_model->delete_brand($id);

		$this->load->view('templates/v_header');
		$this->load->view('gadget/gadget_success', $data);
		$this->load->view('templates/v_footer'); 

	}
}
