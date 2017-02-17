<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_job extends CI_Model {

	function add($job,$data){
		$this->db->insert("job".$job, $data);
	}

}

/* End of file model_job.php */
/* Location: ./application/models/model_job.php */