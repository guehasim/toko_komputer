<?php 

/**
* 
*/
class Akun extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_akun');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_akun');
		if ($user == "") {
			redirect('login');
		}else{
			$data['akun'] = $this->M_akun->lihat_data_aktif();
			$this->load->view('template/temp_1');
			$this->load->view('akun/v_akun',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function nonaktif()
	{
		$user = $this->session->userdata('ses_akun');
		if ($user == "") {
			redirect('login');
		}else{
			$data['akun'] = $this->M_akun->lihat_data_nonaktif();
			$this->load->view('template/temp_1');
			$this->load->view('akun/v_akun_nonaktif',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function newakun()
	{
		$this->load->view('template/temp_1');
		$this->load->view('akun/v_newakun');
		$this->load->view('template/temp_2');
	}

	public function tambah_akun()
	{
		if (isset($_POST)) {
				$this->M_akun->tambah_data();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan
					</div>');
				
				redirect('Akun');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan
					</div>');
				
				redirect('Akun');
			}
	}

	public function get_akun()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['akun'] = $this->M_akun->getdata($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('akun/v_updateakun',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function update_akun()
	{		
		$data = array(
			'nama_akun'		=> $this->input->post('nama'),
			'username'		=> $this->input->post('user'),
			'password'		=> base64_encode($this->input->post('pass')),
			'jenis_akun'	=> $this->input->post('jenis')
			);

		$where = array(
			'ID_akun'		=> $this->input->post('id')
			);

		$this->M_akun->update($where,$data,'m_akun');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('Akun');
	}



	public function update_status()
	{

		$status = $_GET['uss'];
		$akun 	= $_GET['us'];

	       if ($status == 1) {

				$data = array(
				'status_akun'	=> 0
				);

			} else {
				
				$data = array(
				'status_akun'	=> 1
				);

			}

		$where = array(
			'ID_akun'		=> $akun
			);

		$this->M_akun->update($where,$data,'m_akun');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('Akun');
		
	    
	}
}
 ?>