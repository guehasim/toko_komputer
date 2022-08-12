<?php 
/**
* 
*/
class ServiceProses extends CI_Controller	
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
			$data['proses'] = $this->M_service->lihat_proses();
			$this->load->view('template/temp_1');
			$this->load->view('service/proses/v_proses',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function update_status_proses()
	{	
		$id = $_GET['us'];

		$data = array(
			'ID_proses'		=> null,
			'ID_akun'		=> $this->session->userdata('ses_akun'),
			'ID_service'	=> $id,
			'proses_tgl'	=> date('Y-m-d')
			);

		$this->M_service->tambah('tbl_service_proses',$data);

		$data = array(
			'request_status'	=> "proses"
			);

		$where = array(
			'ID_service'		=> $id
			);

		$this->M_service->update($where,$data,'tbl_service_request');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil di Proses
				</div>');
		redirect('ServiceMasuk');
	}
	
}
 ?>