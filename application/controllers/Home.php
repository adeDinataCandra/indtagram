<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
					// $this->load->model('gambar_model');
					$this->load->helper('url_helper');
					session_start();
	}
	
	public function index()
	{
		// $data["datas_gambar"] = $this->Gambar_model->get_all();
		$this->load->view('partials/header');
		$this->load->view('index');
		$this->load->view('partials/footer');

	}
}