<?php 

class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_grafik');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_akun');
		if ($user == "") {
			redirect('login');
		}else{

			$data['request'] 		= $this->M_grafik->lihat_request();
			$data['masuk'] 			= $this->M_grafik->lihat_masuk();
			$data['proses'] 		= $this->M_grafik->lihat_proses();
			$data['selesai'] 		= $this->M_grafik->lihat_selesai();
			$data['terima'] 		= $this->M_grafik->lihat_terima();			

			$data['pengeluaran'] 	= $this->M_grafik->lihat_pengeluaran();
			$data['pemasukan'] 		= $this->M_grafik->lihat_pemasukan();
			$data['dp'] 			= $this->M_grafik->lihat_dp();
			$this->load->view('template/temp_1');
			$this->load->view('dashboard/v_dashboard',$data);
			$this->load->view('template/temp_2');
		}		
	}
}
 ?>