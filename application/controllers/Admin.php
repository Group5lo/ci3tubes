<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		$this->load->helper('MY');
		$this->load->model('gadget_model');
		$this->load->model('brand_model');
		$this->load->model('user_model');
		$this->load->model('transaksi_model');
		$this->load->model('stockprice_model');
	}

	public function index()
	{

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/v_dashboard');
		$this->load->view("templates/v_admin_footer");
	}

	public function user(){
		$data['page_title'] = 'User List'; 

		$data['all_user'] = $this->user_model->get_all_user();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/user_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function gadget(){
		$data['page_title'] = 'Gadget List'; 

		$data['all_gadget'] = $this->gadget_model->get_all_gadget();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/gadget_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function brand(){
		$data['page_title'] = 'Brand List'; 

		$data['all_brand'] = $this->brand_model->get_all_brand();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/brand_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function stockprice(){
		$data['page_title'] = 'Stock and Price Gadget'; 

		$data['all_stockprice'] = $this->stockprice_model->get_all_stockprice();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/stockprice_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function stockprice_create() 
	{
		// Judul Halaman
		$data['page_title'] = 'ADD STOCK and PRICE';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['stockprice'] = $this->gadget_model->generate_gadget_dropdown();

		$this->form_validation->set_rules(
			'fk_tipe', 'tipe','is_unique[stockprice.fk_tipe]',
			array(
				'is_unique' => 'Tipe ini sudah diberi harga.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('admin/stockprice_create', $data);
			$this->load->view('templates/v_footer');
		} else {
			$this->stockprice_model->create_stockprice();
			redirect('admin/stockprice');
		}
	}

	public function stockprice_delete($id)
	{
		$this->stockprice_model->delete_stockprice($id);
		redirect('admin/stockprice');

	}

	public function magazine(){
		$data['page_title'] = 'Magazine'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('artikel');
		$data['artikel'] = $this->artikel->get_artikel();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/magazine_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function transaksi(){
		$data['page_title'] = 'Transaksi'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->get_transaksi();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/transaksi_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function transaksi_kurang_stock($id){
		$data['page_title'] = 'Transaksi'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->get_transaksi();
		$data['ganti'] = $this->transaksi_model->get_kurang_stock($id);

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/transaksi_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function transaksi_delete($id)
	{
		$this->transaksi_model->delete_transaksi($id);
		redirect('admin/transaksi');
	}
}
