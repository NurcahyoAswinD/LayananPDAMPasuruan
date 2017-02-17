<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortalUser extends CI_Controller {

	public function index()
	{
		$this->load->view('portal', [], FALSE);
	}

}

/* End of file portalUser.php */
/* Location: ./application/controllers/portalUser.php */