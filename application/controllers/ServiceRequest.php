<?php 
/**
* 
*/
class ServiceRequest extends CI_Controller	
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
			$data['request'] = $this->M_service->lihat_request();
			$this->load->view('template/temp_1');
			$this->load->view('service/request/v_request',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function newrequest()
	{
		$this->load->view('template/temp_1');
		$this->load->view('service/request/v_newrequest');
		$this->load->view('template/temp_2');
	}

	public function tambah_request()
	{
		if (isset($_POST)) {
				$this->M_service->tambah_request();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan
					</div>');
				
				redirect('ServiceRequest');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan
					</div>');
				
				redirect('ServiceRequest');
			}
	}

	public function getdata()
	{
		if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $data['request'] = $this->M_service->getdata_service($id);         
		            $this->load->view("template/temp_1");
					$this->load->view("service/request/v_updaterequest",$data);
					$this->load->view("template/temp_2");
		        }else{
		        	echo "no";
		        }
	}

	public function updatedata()
	{
		$tanggal = $this->input->post('tanggal');

			$data = array(				
				'ID_akun'			=> $this->input->post('id_akun'),
				'KODE_service'		=> $this->input->post('kode'),
				'tgl_request'		=> $this->input->post('tanggal'),
				'request_nama'		=> $this->input->post('nama'),
				'request_rusak'		=> $this->input->post('rusak'),
				'request_biaya'		=> $this->input->post('biaya'),
				'nama_pelanggan'	=> $this->input->post('pelanggan'),
				'request_status'	=> $this->input->post('status')
				);

			$where = array(
				'ID_service' 		=> $this->input->post('id')
				);

			$this->M_service->update($where,$data,'tbl_service_request');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Data Service Request
					</div>');
			redirect('ServiceRequest');
	}
	
	public function update_status_cancel()
	{	
		$id = $_GET['us'];

		$data = array(
			'request_status'	=> "gagal"
			);

		$where = array(
			'ID_service'		=> $id
			);

		$this->M_service->update($where,$data,'tbl_service_request');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Service Cancel
				</div>');
		redirect('ServiceRequest');
	}
}
 ?>