<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
				
		$this->load->library('form_validation');
		$this->load->helper('MY');
		$this->load->model('user_model');
		$this->load->model('gadget_model');
	}

	// Register user
	public function register(){
		$data['page_title'] = 'Sign Up';

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nohp', 'Nohp', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('pages/register', $data);
			$this->load->view('templates/v_footer');
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('home');
		}
	}

	// Log in user
	public function login(){
		$data['page_title'] = 'Sign In Tong';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('pages/login',$data);
			$this->load->view('templates/v_footer');
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	$password = md5($this->input->post('password'));

	// Login user
	$user_id = $this->user_model->login($username, $password);

	if($user_id){
		// Buat session
		$user_data = array(
			'user_id' => $user_id,
			'username' => $username,
			'logged_in' => true,
			'fk_level_id' => $this->user_model->get_user_level($user_id),
		);

		$this->session->set_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedin', 'Anda sudah login loo');

		redirect('user/dashboard');
	} else {
		// Set message
		$this->session->set_flashdata('login_failed', 'Login gagal, periksa username dan password anda');

		redirect('user/login');
	}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('user/login');
	}


	public function get_user(){
		$this->load->model('transaksi_model');
		$data['user'] = $this->transaksi_model->get_users_by_id($id); 
		$this->load->view("templates/v_header",$data);
	}

	public function get_userdata(){
        $userData = $this->session->userdata();
        return $userData;
       }
	// Fungsi Dashboard
	function dashboard()
	{
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('user/login');

		$user_id = $this->session->userdata('user_id');
        // Dapatkan detail user
        $data['user'] = $this->user_model->get_user_details( $user_id );
 		$userData = $this->get_userdata();
        if ($userData['fk_level_id'] === '1'){
            redirect('admin');
        } else if ($userData['fk_level_id'] === '2'){
            $this->load->view('templates/v_header');
            $this->load->view('pages/v_home', $data);
            $this->load->view('templates/v_footer');
        } else if ($userData['fk_level_id'] === '3') {
            $this->load->view('templates/v_header');
            $this->load->view('pages/v_home', $data);
            $this->load->view('templates/v_footer');
        }
	}

	public function detail($id=''){

		$data['page_title'] = 'Profil User';


		$data['user'] = $this->user_model->get_users_by_id($id); 

		$this->load->view('templates/v_header');
		$this->load->view('pages/myprofil', $data);
		$this->load->view('templates/v_footer');
	}

	public function ganti_gambar($id=NULL){

		$data['page_title'] = 'Change Your Picture';
		// Get artikel dari model berdasarkan $id
		$data['user'] = $this->user_model->get_user_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['user'] ) redirect('user');
		// Kita simpan dulu nama file yang lama
		$old_image = $data['user']->avatar;
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('password', 'password', 'required',
			array(
				'required' 		=> 'Isi %s anda lagi.'
			));
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/v_header');
			$this->load->view('pages/ganti_gambar', $data);
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
    	        $config['max_width']            = 1000;
    	        $config['max_height']           = 2000;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
					$this->load->view('templates/v_admin_header');
					$this->load->view('pages/ganti_gambar', $data);
					$this->load->view('templates/v_admin_footer'); 
    	        } else {
    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
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
	            'avatar' => $post_image,
	    	);
	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {
	    		// Update artikel sesuai post_data dan id-nya
		        $this->user_model->update_user($post_data, $id);
		        redirect('home');
	    	}
	    }
	}

	public function user_edit($id = NULL)
	{
		$data['page_title'] = 'Edit User';
		// Get artikel dari model berdasarkan $id
		$data['user'] = $this->user_model->get_user_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['user'] ) redirect('user');
		// Kita simpan dulu nama file yang lama
		$old_image = $data['user']->avatar;
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('password', 'password', 'required',
			array(
				'required' 		=> 'Isi %s anda lagi.'
			));
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/v_header');
			$this->load->view('pages/edit_user', $data);
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
    	        $config['max_width']            = 1000;
    	        $config['max_height']           = 2000;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
					$this->load->view('templates/v_admin_header');
					$this->load->view('pages/edit_user',$data);
					$this->load->view('templates/v_admin_footer'); 
    	        } else {
    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
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
    		$enc_password = md5($this->input->post('password'));
	    	$post_data = array(
	    	    'nama' => $this->input->post('nama'),
	            'email' => $this->input->post('email'),
	            'username' => $this->input->post('username'),
	            'alamat' => $this->input->post('alamat'),
	            'nohp' => $this->input->post('nohp'),
	            'password' => $enc_password,
	            'kodepos' => $this->input->post('kodepos'),
	            'avatar' => $post_image,
	    	);
	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {
	    		// Update artikel sesuai post_data dan id-nya
		        $this->user_model->update_user($post_data, $id);
		        redirect('home');
	    	}
	    }
		
	}


}