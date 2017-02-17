<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pengaduan extends CI_Model {

	public function getUsers(){
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->order_by('tanggalpengaduan', 'desc');
		$hasil = $this->db->get('pengaduan');
		return $hasil->result();
	}
	public function all(){
		$this->db->order_by('id_pengaduan', 'desc');
		$this->db->select()->from('pengaduan as pd');
		$this->db->join('jobpengaduan as jp', 'jp.id_jobpengaduan = pd.id_pengaduan', 'left');
		$this->db->join('pegawai as pg', 'pg.nip = jp.nip', 'left');
		$this->db->join('users as us', 'us.id_user = pg.id_user', 'left');
		$hasil = $this->db->get();
		return $hasil->result();
	}
	
	public function create($data_pengaduan){
		$this->db->insert('pengaduan', $data_pengaduan);
	}

	public function update($id_pengaduan, $data){
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan', $data);
	}
	
}