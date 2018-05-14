<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		$this->load->helper('MY');
		$this->load->model('gadget_model');
		$this->load->model('brand_model');
		$this->load->model('transaksi_model');
	}

	public function beli($slug='')
	{
		$data['page_title'] = 'Pembelian';

		$data['gadget'] = $this->transaksi_model->get_transaksi_by_slug($slug); 

		$this->load->view("templates/v_header");
		$this->load->view('transaksi/v_transaksi', $data);
		$this->load->view("templates/v_footer");
	}
}
