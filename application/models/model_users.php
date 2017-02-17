<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {
	public function _construct(){
		parent::_construct();
	}
	public function check_credential()
	{
		
		$username 	= set_value('username');
		$password 	= set_value('password');
		
		$this->db->where(['username'=> $username,'password'=> $password]);
		$query = $this->db->get('users');
		return $query->first_row();
	}
	public function checkUsername($username){
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	public function registerUser($data){
		$this->db->insert('users', $data['users']);
		if(isset($data['pegawai'])){
			$data['pegawai']['id_user'] = $this->db->insert_id();
			$this->db->insert('pegawai', $data['pegawai']);
		}
	}
	public function getPegawai($id_user){
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('pegawai');
		return $query->first_row();
	}
}