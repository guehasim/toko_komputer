<?php 
/**
* 
*/
class ServicePengeluaran extends CI_Controller	
{
	function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('M_pengeluaran');
		}

	public function index()
	{
		$user = $this->session->userdata('ses_akun');
		if ($user == "") {
			redirect('login');
		}else{
			$data['pengeluaran'] = $this->M_pengeluaran->lihat_data();
			$this->load->view('template/temp_1');
			$this->load->view('pengeluaran/v_pengeluaran',$data);
			$this->load->view('template/temp_2');
		}
	}

	public function newkeluar()
	{
		$this->load->view('template/temp_1');
		$this->load->view('pengeluaran/v_newpengeluaran');
		$this->load->view('template/temp_2');
	}

	public function tambah_keluar()
	{
		if (isset($_POST)) {
				$this->M_pengeluaran->tambah_data();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan
					</div>');
				
				redirect('ServicePengeluaran');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan
					</div>');
				
				redirect('ServicePengeluaran');
			}
	}

	public function get_keluar()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['keluar'] = $this->M_pengeluaran->getdata($id);         
	            $this->load->view('template/temp_1');
				$this->load->view('pengeluaran/v_updatepengeluaran',$data);
				$this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
	}

	public function update_keluar()
	{		
		$data = array(
			'ID_akun'				=> $this->input->post('id_akun'),
			'tgl_pengeluaran'		=> $this->input->post('tgl'),
			'nama_pengeluaran'		=> $this->input->post('nama'),
			'biaya_pengeluaran'		=> $this->input->post('biaya'),
			'keterangan_pengeluaran'=> $this->input->post('keterangan')
			);

		$where = array(
			'ID_pengeluaran'		=> $this->input->post('id')
			);

		$this->M_pengeluaran->update($where,$data,'tbl_service_pengeluaran');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('ServicePengeluaran');
	}

	public function hapus_keluar()
	{
		$id = $this->input->post('id');
        $this->M_pengeluaran->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus data pengeluaran
				</div>');
        redirect('ServicePengeluaran');
	}
	
}
 ?>