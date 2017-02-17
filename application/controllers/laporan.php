<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->load->model('model_pengaduan');
		$this->load->model('model_pasangbaru');
		$pengaduan = $this->model_pengaduan->getUsers();
		$pasangbaru = $this->model_pasangbaru->getUsers();
		$no = 0;
		$data['hasil'] = [];
		foreach ($pengaduan as $key => $value) {
			$data['hasil'][$no] = new stdClass();
			$data['hasil'][$no]->id = $value->id_pengaduan;
			$data['hasil'][$no]->tanggal = $value->tanggalpengaduan;
			$data['hasil'][$no]->status = $value->status;
			$data['hasil'][$no]->latitude = $value->latitude;
			$data['hasil'][$no]->longitude = $value->longitude;
			$data['hasil'][$no]->tipe = "pengaduan";
			$no++;
		}
		foreach ($pasangbaru as $key => $value) {
			$data['hasil'][$no] = new stdClass();
			$data['hasil'][$no]->id = $value->id_daftar;
			$data['hasil'][$no]->tanggal = $value->tanggaldaftar;
			$data['hasil'][$no]->status = $value->status;
			$data['hasil'][$no]->latitude = $value->latitude;
			$data['hasil'][$no]->longitude = $value->longitude;
			$data['hasil'][$no]->tipe = "pasangbaru";
			$no++;
		}

			$data['content'] = $this->load->view("laporanku" ,$data, TRUE);
		$this->load->view('masterpage', $data, FALSE);
		
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */