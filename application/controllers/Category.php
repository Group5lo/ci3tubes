<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		// Load custom helper applications/helpers/MY_helper.php
		$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('gadget_model');
		$this->load->model('category_model');
	}

	public function index() 
	{

		// Judul Halaman
		$data['page_title'] = 'Category';

		// Dapatkan semua kategori
		$data['category'] = $this->category_model->get_all_category();

		$this->load->view('templates/v_header');
		$this->load->view('category/category_view', $data);
		$this->load->view('templates/v_footer');
	}

	public function create() 
	{
		// Judul Halaman
		$data['page_title'] = 'ADD NEW Category';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'category_name', 'Nama Category','required|is_unique[category.category_name]',
			array(
				'required' => 'Isi %s donk, males amat.',
				'is_unique' => 'Judul <strong>' . $this->input->post('category_name') . '</strong> sudah ada bos.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('category/category_create', $data);
			$this->load->view('templates/v_footer');
		} else {
			$this->category_model->create_category();
			redirect('category');
		}
	}

	// Menampilkan semua artikel dalam kategori yang dipilih
	public function magazine($id) 
	{

		// Menampilkan judul berdasar nama kategorinya
		$data['page_title'] = $this->category_model->get_category_by_id($id)->category_name;

		// Dapatkan semua artikel dalam kategori ini
		$this->load->model('artikel');
		$data['artikel'] = $this->artikel->get_magazine_by_category($id);

		// Kita gunakan view yang sama pada controller Blog
		$this->load->view('templates/v_header');
		$this->load->view('magazine/home_viewmagazine', $data);
		$this->load->view('templates/v_footer');
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{

		$data['page_title'] = 'Category EDIT';

		// Get artikel dari model berdasarkan $id
		$data['category'] = $this->category_model->get_category_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list brand
		if ( empty($id) || !$data['category'] ) redirect('blog');

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('category_name', 'Nama category', 'required',
			array('required' => 'Isi %s donk, males amat.'));
	    $this->form_validation->set_rules('category_description', 'Deskripsi', 'required');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('category/category_edit', $data);
	        $this->load->view('templates/v_footer');

	    } else {

	    	$post_data = array(
	    	    'category_name' => $this->input->post('category_name'),
	    	    'category_description' => $this->input->post('category_description'),
	    	);

		    $this->load->view('templates/v_header');
    		
    		// Update kategori sesuai post_data dan id-nya
	        if ($this->category_model->update_category($post_data, $id)) {
		        $this->load->view('magazine/magazine_success', $data);
	        } else {
		        $this->load->view('magazine/magazine_failed', $data);
	        }
	        $this->load->view('templates/v_footer'); 

	    }
	}


	public function hapus($id)
	{

		$data['page_title'] = 'Hapus category';

		$this->category_model->hapus_category($id);

		$this->load->view('templates/v_header');
		$this->load->view('magazine/magazine_success', $data);
		$this->load->view('templates/v_footer'); 

	}
}
