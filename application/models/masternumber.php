<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masternumber extends CI_Model {

	public function getID($kode){
		$this->db->query('call masternum("'.$kode.'",@hasil)');
		$query=$this->db->query('select @hasil as hasil');
		return $query->first_row('array');
	}

}

/* End of file masternumber.php */
/* Location: ./application/models/masternumber.php */