<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/main_controller.php");
class Login extends Main_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('user_data')){
            redirect('/main_controller');
        }
	}
	
	public function index()
	{
		$data = array(
			"main_form" => 'login/auth',
			"btn_action" => 'Entrar',
			"switch_info" => 'Não possui uma conta?',
			"switch_url" => 'login/create_acc',
			"switch_text" => ' Cadastre-se',
			"switch_hint" => 'Cadastre-se'
		);

		$this->render("login/login", $data);
	}

	public function auth()
	{
		$this->load->model("users_model");
		$user = $this->input->post("user");
		$password = $this->input->post("password");

		$db_user = $this->users_model->auth($user, $password);
		
		if($db_user){
			$this->session->set_userdata("user_data", $db_user);
			redirect('/features');
		}else{
			$this->session->set_flashdata("danger", "Usuário ou senha inválidos!");
			redirect('/login');
		}
	}

	public function create_acc(){
		$data = array(
			"main_form" => 'login/new_acc',
			"btn_action" => 'Cadastrar',
			"switch_info" => 'Já possui uma conta?',
			"switch_url" => 'login',
			"switch_text" => ' Conectar',
			"switch_hint" => 'Conectar'
		);

		$this->render("login/login", $data);
	}

	public function new_acc()
	{
		$this->load->model("users_model");
		$user = $this->input->post("user");
		$password = $this->input->post("password");

		$db_user = $this->users_model->auth($user, $password);
		
		if($db_user){
			$this->session->set_flashdata("create_error", "Este nome de usuário já existe!");
			redirect('login/create_acc');
		}
		else if(strlen($user) < 4){
			$this->session->set_flashdata("create_error", "O nome de usuário deve conter no mínimo 4 caracteres!");
			redirect('login/create_acc');
		}
		else if(strlen($password) < 4){
			$this->session->set_flashdata("create_error", "A senha deve conter no mínimo 4 caracteres!");
			redirect('login/create_acc');
		}
		else{
			$this->session->set_flashdata("user_created", "Usuário criado com sucesso!");
			$password = md5($password);
			$new_user = array(
				"user" => $user,
				"password" => $password
			);

			$this->users_model->create_acc($new_user);

			redirect('/login');
		}
		
	}

	
}
