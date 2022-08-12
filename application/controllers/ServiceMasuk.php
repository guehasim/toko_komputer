<?php 
/**
* 
*/
class ServiceMasuk extends CI_Controller
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
			$data['masuk'] = $this->M_service->lihat_masuk();
			$this->load->view('template/temp_1');
			$this->load->view('service/masuk/v_masuk',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function newmasuk()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['masuk'] = $this->M_service->getdata_service($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('service/masuk/v_newmasuk',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function tambah_masuk()
	{
		if (isset($_POST)) {
				$this->M_service->tambah_masuk();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan
					</div>');

				$data = array(
					'request_status'	=> "masuk"
					);

				$where = array(
					'ID_service'		=> $this->input->post('id_service')
					);

				$this->M_service->update($where,$data,'tbl_service_request');
				
				redirect('ServiceMasuk');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan
					</div>');
				
				redirect('ServiceMasuk');
			}			
	}


	public function getdata()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['masuk'] = $this->M_service->getdata_masuk($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('service/masuk/v_updatemasuk',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function update_masuk()
	{		
		$data = array(
			'ID_akun'			=> $this->input->post('id_akun'),
			'ID_service'		=> $this->input->post('id_service'),
			'masuk_tgl'			=> $this->input->post('tanggal'),	
			'masuk_serial'		=> $this->input->post('serial'),
			'masuk_kelengkapan'	=> $this->input->post('kelengkapan'),
			'masuk_biaya_dp'	=> $this->input->post('biaya')
			);

		$where = array(
			'ID_masuk'		=> $this->input->post('id')
			);

		$this->M_service->update($where,$data,'tbl_service_masuk');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('ServiceMasuk');
	}	
	
}
 ?>