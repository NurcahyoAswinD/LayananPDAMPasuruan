<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->load->model('model_users');

		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = (isset($_GET['login'])) ? $_GET['login'] : null;
			$this->load->view('form_login',$data);
		} else {
			$valid_user = $this->model_users->check_credential();

			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect(base_url("?login=error"));
			} else {
				$this->session->set_userdata('id_user', $valid_user->id_user);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('nama', $valid_user->nama);
				$this->session->set_userdata('group', $valid_user->privilege);
				if($valid_user->privilege == 1){
					$pegawai = $this->model_users->getPegawai($valid_user->id_user);
					$this->session->set_userdata('nip', $pegawai->nip);
				}
			}
		}
		if($this->session->userdata('group')){
			$this->session->userdata('group')==1? redirect('pengaduan'):redirect('portalUser');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

