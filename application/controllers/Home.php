<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

		$this->load->view("templates/v_header");
		$this->load->view('pages/v_home');
		$this->load->view("templates/v_footer");
	}
}
