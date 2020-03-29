<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('user_data')){
			redirect('/login');
		}else{
			$this->render("features/points", '');
		}
	}

	public function render($view, $data){
		$this->load->view('templates/header', $data);
		$this->load->view($view, $data);
		$this->load->view('templates/footer', $data);
	}
}
