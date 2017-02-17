<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	public function index()
	{
		$data['register'] = (isset($_GET['register'])) ? $_GET['register'] : null;
		$this->load->view('form_register',$data);
		if($_POST){
			$this->load->model('model_users');
			$check = $this->model_users->checkUsername($_POST['users']['username']);
			if(!$check){
				$valid_user = $this->model_users->registerUser($_POST);
				redirect(base_url("?success"));
			}else{
				redirect(base_url("register/?register=errorUsername"));
			}
		}
	}
}
?>