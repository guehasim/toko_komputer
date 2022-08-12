<?php 
/**
* 
*/
class ServiceTerima extends CI_Controller	
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
			$data['terima'] = $this->M_service->lihat_terima();
			$this->load->view('template/temp_1');
			$this->load->view('service/terima/v_terima',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function newterima()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['terima'] = $this->M_service->getdata_masuk($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('service/terima/v_newterima',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function tambah_terima()
	{
		if (isset($_POST)) {
				$this->M_service->tambah_terima();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan
					</div>');

				$data = array(
					'request_status'	=> "terima"
					);

				$where = array(
					'ID_service'		=> $this->input->post('id_service')
					);

				$this->M_service->update($where,$data,'tbl_service_request');
				
				redirect('ServiceSelesai');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan
					</div>');
				
				redirect('ServiceSelesai');
			}
	}


	public function get_terima()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['terima'] = $this->M_service->getdata_terima($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('service/terima/v_updateterima',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function update_terima()
	{
		$dp 	= $this->input->post('dp');
		$terima	= $this->input->post('biaya');
		$total 	= $dp + $terima;

		$data = array(
			'ID_akun'			=> $this->input->post('id_akun'),
			'ID_service'		=> $this->input->post('id_service'),
			'terima_tgl'		=> $this->input->post('tanggal'),	
			'terima_biaya'		=> $terima,
			'total_biaya'		=> $total
			);

		$where = array(
			'ID_terima'		=> $this->input->post('id')
			);

		$this->M_service->update($where,$data,'tbl_service_terima');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('ServiceTerima');
	}
	
}
 ?>