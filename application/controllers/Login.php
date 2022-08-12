<?php 

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login/temp_login');
		$this->load->view('login/v_loginadmin');
	}

	public function aksi_login()
	{
		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));

		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$this->db->where('status_akun', 1);

		$query = $this->db->get('m_akun');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_akun' 		=> $row->ID_akun,
				'ses_nama'		=> $row->nama_akun,
				'ses_status'	=> $row->jenis_akun,
				);
			$this->session->set_userdata($data);			

			redirect('Dashboard');
		}else{
			
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Pastikan Akun Sudah Aktif dan Periksa Username atau Password');
			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_akun');
		$this->session->unset_userdata('ses_nama');
		$this->session->unset_userdata('ses_status');
		session_destroy();

		redirect('Login');
	}
}
 ?>