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
		$this->load->library('session');
	}

	public function beli($slug='')
	{
		$data['page_title'] = 'Pembelian';

		$data['gadget'] = $this->transaksi_model->get_transaksi_by_slug($slug); 

		// $this->session->set_userdata('stock', echo ($gadget->stock) );

		$this->load->view("templates/v_header");
		$this->load->view('transaksi/v_transaksi', $data);
		$this->load->view("templates/v_footer");

	}

	public function konfirmasi($id='')
	{
		$data['page_title'] = 'Konfirmasi Pembelian';


		$this->session->set_userdata('post_id', $this->input->post('post_id'));
		$this->session->set_userdata('nama_pembeli', $this->input->post('nama_pembeli'));
		$this->session->set_userdata('alamat', $this->input->post('alamat'));
		$this->session->set_userdata('nohp', $this->input->post('nohp'));
		$this->session->set_userdata('email', $this->input->post('email'));
		$this->session->set_userdata('jumlah', $this->input->post('jumlah'));

		$data['gadget'] = $this->transaksi_model->get_transaksi_by_id($id); 

		$this->load->view("templates/v_header");
		$this->load->view('transaksi/v_konfirmasi', $data);
		$this->load->view("templates/v_footer");
	}

	public function fix() 
	{
		// Judul Halaman
		$data['page_title'] = 'Pembelian berhasil';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');

		// Form validasi untuk Nama Kategori

		$this->transaksi_model->insert_transaksi();
        $this->load->view('templates/v_header');
        $this->load->view('transaksi/v_transaksi_success', $data);
        $this->load->view('templates/v_footer'); 
	}
}
