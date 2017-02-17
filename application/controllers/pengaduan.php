<?php
class Pengaduan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('model_pengaduan');
	}
	
	public function index()
	{
		if($this->session->userdata('group')!=1){
			redirect(base_url("welcome/logout"),'refresh');
		}else{
			$data['hasil'] = $this->model_pengaduan->all();
			$data['content'] = $this->load->view('pengaduan', $data,true);
			$this->load->view('masterpage', $data, FALSE);
		}
	}
	public function statusUpdate($id_pengaduan,$status){
		if($this->session->userdata('group')!=1){
			redirect(base_url("welcome/logout"),'refresh');
		}else{
			$this->load->model('model_job');
			$this->model_job->add("pengaduan",['nip'=>$this->session->userdata('nip'),'id_jobpengaduan'=>$id_pengaduan]);
			$this->model_pengaduan->update($id_pengaduan,['status'=>$status]);
			redirect(base_url("pengaduan"));
		}
	}

	public function create(){
		if(!$_POST){
			$data['content']=$this->load->view('formpengaduan',[],true);
			$this->load->view('masterpage', $data, FALSE);
		}else{
			$this->form_validation->set_rules('tanggalpengaduan', 'Tanggal Pengaduan', 'required');
			$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('kerusakan', 'Jenis Kerusakan', 'required');
			if ($this->form_validation->run() == TRUE)
			{
				$id_pengaduan = $this->masternumber->getID("IDP")['hasil'];
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png|bmp';
				$config['max_size']	= '3000'; 
				$config['max_width']  = '2000'; 
				$config['max_height']  = '2000'; 
				$config['file_name']  = $id_pengaduan; 

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$this->load->view(base_url());
				} else {
					$gambar = $this->upload->data();
					$data_pengaduan =	array(
						'id_pengaduan'				=> $id_pengaduan,
						'id_user'					=> $this->session->userdata('id_user'),
						'tanggalpengaduan'			=> set_value('tanggalpengaduan'),
						'namalengkap'				=> set_value('namalengkap'),
						'alamat	'					=> set_value('alamat'),
						'pic'						=> $gambar['file_name'],
						'kerusakan'					=> set_value('kerusakan'),
						'keterangan'				=> set_value('keterangan'),
						'latitude'					=> set_value('latitude'),
						'longitude'					=> set_value('longitude'),
						'status'					=> 'proses'
						);

					$this->model_pengaduan->create($data_pengaduan);
					if ($this->session->userdata('group')==2) {
						redirect(base_url().'portaluser');
					} else {
						redirect(base_url().'pengaduan');
					}
				}

			}
		}
	}
}

?>