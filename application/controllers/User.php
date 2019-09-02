<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
		session_start();

	}
	
	public function login()
	{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email','Email','required', array('required' => 'Kamu Harus Isi Email') );
			$this->form_validation->set_rules('password','Password','required', array('required' => 'Kamu Harus Isi Password') );

			if( $this->form_validation->run()=== FALSE )	
			{
				
							$this->load->helper('url');
								$this->load->view('partials/header');
									$this->load->view('user/login');
										$this->load->view('partials/footer');

			} else {
				if( $this->user_model->login() ) {
					redirect('home');
				} else {
					$data['login_invalid'] = "Tidak berhasil login, data kamu salah";
					$this->load->helper('url');
					$this->load->view('partials/header');
					$this->load->view('user/login', $data );
					$this->load->view('partials/footer');
				}
			}
	}
	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]',
				array('required' => 'Kamu harus mengisi email',
 							'is_unique'     => 'Email ini telah ada.'
				)
			);

		$this->form_validation->set_rules('password', 'Password', 'required',  array('required' => 'Kamu harus mengisi password') );

		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',  array('required' => 'Kamu harus mengisi konfirmasi password dengan benar') );

		if( $this->form_validation->run()===FALSE ) 
		{
			$this->load->helper('url');
		  $this->load->view('partials/header');
		  $this->load->view('user/register');
		  $this->load->view('partials/footer');

		} else {
			$this->user_model->create();
				redirect('Home');
		}
	}

	public function logout(){
		session_start();
		$_SESSION = array();
		session_destroy();
			redirect('Home');
	}

}