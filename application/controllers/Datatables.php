<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gadget_model');
	}

	public function index()
	{
		// Dapatkan data artikel dari model
		$data['data'] = $this->gadget_model->get_all_gadget();

		$this->load->view("templates/v_header");
		$this->load->view('gadget/gadget_datatable', $data);
		$this->load->view("templates/v_footer");
	}

}
