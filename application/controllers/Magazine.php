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
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/v_header');
	        $this->load->view('magazine/form_tambah', $data);
	        $this->load->view('templates/v_footer');
	    } 
	    else {            
		 	 	$this->artikel->create();            
		 	 	redirect('magazine');        
		}    
	}

	

		public function delete($id_magazine){
		$this->load->model('artikel');
		$this->artikel->delete($id_magazine);
		redirect('magazine');
	}

		public function edit($id){
		$data['page_title'] = 'Edit Magazine';

		// Kita butuh helper dan library berikut
		$this->load->library('form_validation');
		$this->load->model("artikel");
		$data['tipe'] = "Edit";
		$data['default'] = $this->artikel->get_single($id);

		if(isset($_POST['simpan'])){
			$this->artikel->update($_POST, $id);
			redirect("magazine");
		}

		$this->load->view("templates/v_header");
		$this->load->view('magazine/form_edit',$data);
		$this->load->view("templates/v_footer");
	}

//Gunakan fungsi dari model untuk mengisi data dalam dropdown

}