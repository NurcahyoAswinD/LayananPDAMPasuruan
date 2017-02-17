<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pasangbaru extends CI_Model {
	function add($data){
		$this->db->insert('pasangbaru',$data);
	}
	function all(){
		$this->db->order_by('id_daftar', 'desc');
		$this->db->select()->from('pasangbaru as pb');
		$this->db->join('jobpasangbaru as jp', 'jp.id_jobpasangbaru = pb.id_daftar', 'left');
		$this->db->join('pegawai as pg', 'pg.nip = jp.nip', 'left');
		$this->db->join('users as us', 'us.id_user = pg.id_user', 'left');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function update($id_daftar, $data){
		$this->db->where('id_daftar', $id_daftar);
		$this->db->update('pasangbaru', $data);
	}
	public function getUsers(){
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->order_by('tanggaldaftar', 'desc');
		$hasil = $this->db->get('pasangbaru');
		return $hasil->result();
	}
}

