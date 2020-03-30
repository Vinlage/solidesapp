<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/main_controller.php");
class Features extends Main_Controller {

	function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user_data')){
            redirect('/main_controller');
        }
    }

	public function index(){
		$user_data = $this->session->userdata('user_data');

		$this->load->model("points_model");
		$db_points = $this->points_model->get_points($user_data['uid']);

		date_default_timezone_set('America/Recife');
		$timestamp = $today = date("Y-m-d");

		$params = array("company_in", "company_out", "lunch_in", "lunch_out");

		if($db_points){
			for($i=0; $i<count($params); ++$i){
				if (!($timestamp === substr($db_points[$params[$i]], 0, 10))) 
				{
					$db_points[$params[$i]] = '';
				}
			}
		}

		$data = array("db_points" => $db_points);

		$this->render("features/points", $data);
	}

	public function insert_point(){
		$user_data = $this->session->userdata('user_data');
		$uid = $user_data['uid'];

		$this->load->model("points_model");
		$db_points = $this->points_model->get_points($uid);

		
		if(!$db_points){
			$this->points_model->init_points($uid);
		}

		date_default_timezone_set ("America/Recife");
		$timestamp = $today = date("Y-m-d");
		$params = array("company_in", "lunch_out", "lunch_in", "company_out");

		$point = $this->input->post("time");

		for($i=0; $i<count($params); ++$i){
			if (($timestamp === substr($db_points[$params[$i]], 0, 10)) && $point == $params[$i]) 
			{
				echo "Este apontamento já foi atribuído!";
				exit();
			}
		}

		for($i=1; $i<count($params); ++$i){
			if (!($timestamp === substr($db_points[$params[$i-1]], 0, 10)) && $point == $params[$i]) 
			{
				echo "O apontamento anterior precisa estar atribuído!";
				exit();
			}
		}

		$this->points_model->insert_points($point, $uid);

		$db_points = $this->points_model->get_points($uid);
		echo $db_points[$point];
		
	}

	public function history(){
		$user_data = $this->session->userdata('user_data');
		$uid = $user_data['uid'];

		$this->load->model("points_model");
		$db_points = $this->points_model->get_all_points($uid);
		$data = array("db_points" => $db_points);

		$this->render("features/history", $data);
	}

	public function logout(){
		$this->session->unset_userdata("user_data");
		redirect('/');
	}
}
