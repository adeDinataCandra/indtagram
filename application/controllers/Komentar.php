<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Komentar extends CI_Controller {
	
	 function __construct(){
 			parent::__construct();
			$this->load->model('komentar_model');
			$this->load->helper('url_helper');
 		  session_start();
	}
	public function create($id)
	{
    			$this->load->helper('form');
          if( isset($_SESSION["email_user"]) ){
          				$this->komentar_model->create($id);
                  redirect('Gambar/detail/'.$id);
    			}
          else {
            	redirect('Home');
          }
	}
}