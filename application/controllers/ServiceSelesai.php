<?php 
/**
* 
*/
class ServiceSelesai extends CI_Controller	
{
	function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('M_service');
		}

	public function index()
	{
		$user = $this->session->userdata('ses_akun');
		if ($user == "") {
			redirect('login');
		}else{
			$data['selesai'] = $this->M_service->lihat_selesai();
			$this->load->view('template/temp_1');
			$this->load->view('service/selesai/v_selesai',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function update_status_selesai()
	{	
		$id = $_GET['us'];

		$data = array(
			'ID_selesai'	=> null,
			'ID_akun'		=> $this->session->userdata('ses_akun'),
			'ID_service'	=> $id,
			'selesai_tgl'	=> date('Y-m-d')
			);

		$this->M_service->tambah('tbl_service_selesai',$data);

		$data = array(
			'request_status'	=> "selesai"
			);

		$where = array(
			'ID_service'		=> $id
			);

		$this->M_service->update($where,$data,'tbl_service_request');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-primary alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Service Sudah Selesai
				</div>');
		redirect('ServiceProses');
	}
	
}
 ?>