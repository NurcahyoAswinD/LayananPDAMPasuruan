<?php
class Pasangbaru extends CI_Controller
{
	function index(){
		if($this->session->userdata('group')!=1){
			redirect(base_url("welcome/logout"),'refresh');
		}else{
			$this->load->model('model_pasangbaru');
			$data['hasil'] = $this->model_pasangbaru->all();
			
			$data['content'] = $this->load->view('pasangbaru', $data,true);
		}
		$this->load->view('masterpage', $data, FALSE);
	}
	public function statusUpdate($id_daftar,$status){
		if($this->session->userdata('group')!=1){
			redirect(base_url("welcome/logout"),'refresh');
		}else{
			$this->load->model('model_pasangbaru');
			$this->load->model('model_job');
			$this->model_job->add("pasangbaru",['nip'=>$this->session->userdata('nip'),'id_jobpasangbaru'=>$id_daftar]);
			$this->model_pasangbaru->update($id_daftar,['status'=>$status]);
			redirect(base_url("pasangbaru"));
		}
	}
	function create(){
		if($_POST){
			$this->load->model('model_pasangbaru');
			$id_daftar 			= $this->masternumber->getID("IDN")['hasil'];
			$id_user 			= $this->session->userdata('id_user');
			$tanggaldaftar 		= $_POST['tanggaldaftar'];
			$namalengkap 		= $_POST['namalengkap'];	
			$alamatrumah 		= $_POST['alamatrumah'];
			$pekerjaan 			= $_POST['pekerjaan'];
			$penghunitetap 		= $_POST['penghunitetap'];
			$penghunitidaktetap = $_POST['penghunitidaktetap'];
			$jnsbangunan 		= ($_POST['jnsbangunan']!=1)?$_POST['jnsbangunan']:$_POST['jnsbangunandll'];
			$jmlkran 			= $_POST['jmlkran'];
			$jualair			= $_POST['jualair'];
			$alamatpenagihan	= $_POST['alamatpenagihan'];
			$latitude			= $_POST['latitude'];
			$longitude			= $_POST['longitude'];
			$fotoKtp			= $this->uploadFoto('fotoKtp',$id_daftar);
			$fotoKK				= $this->uploadFoto('fotoKK',$id_daftar);

			$data = array (
				'id_daftar' 			=> $id_daftar,
				'id_user' 				=> $id_user,
				'tanggaldaftar' 		=> $tanggaldaftar,
				'namalengkap' 			=> $namalengkap,	
				'alamatrumah'	 		=> $alamatrumah,
				'pekerjaan' 			=> $pekerjaan,
				'penghunitetap'			=> $penghunitetap,
				'penghunitidaktetap' 	=> $penghunitidaktetap,
				'jnsbangunan' 			=> $jnsbangunan,
				'jmlkran' 				=> $jmlkran,
				'jualair'				=> $jualair,
				'alamatpenagihan'		=> $alamatpenagihan,
				'fotoKtp'				=> $fotoKtp,
				'latitude'				=> $latitude,
				'longitude'				=> $longitude,
				'fotoKK'				=> $fotoKK
				);	
			$this->model_pasangbaru->add($data);
			if ($this->session->userdata('group')==2) {
				redirect(base_url().'laporan');
			}else{
				redirect(base_url().'pasangbaru');
			}
		}
		$data['content']=$this->load->view('form_pasangbaru',[],true);
		$this->load->view('masterpage', $data, FALSE);
	}
	function uploadFoto($name,$filename){
		$config['upload_path'] = './uploads/attachment/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']  = '5000';
		$config['max_width']  = '15000';
		$config['file_name']  = $filename;
		$config['max_height']  = '15000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($name)){
			return array('error' => $this->upload->display_errors());
		}
		else{
			return $this->upload->data('file_name');
		}
	}
}
?>