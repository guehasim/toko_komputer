<?php 


class M_service extends CI_Model
{
	
	//service request

	public function lihat_request(){
		$query = $this->db->query("SELECT * 
									FROM tbl_service_request i
									LEFT JOIN m_akun ii ON i.ID_akun = ii.ID_akun
									WHERE i.request_status = 'request' ORDER BY i.ID_service DESC");
		return $query;
	}

	public function getdata_service($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_service_request WHERE ID_service = $id ");
		return $query;
	}

	public function tambah_request(){

		$tgl 	= date('Ymd');
		$kode = mt_rand(1000,9999);

		$kodeservice = $tgl."".$kode;
		
		$data = array(
			'ID_service'		=> null,
			'ID_akun'			=> $this->input->post('id_akun'),
			'KODE_service'		=> $kodeservice,
			'nama_pelanggan'	=> $this->input->post('pelanggan'),
			'tgl_request'		=> date('Y-m-d'),
			'request_nama'		=> $this->input->post('nama'),
			'request_rusak'		=> $this->input->post('rusak'),
			'request_biaya'		=> $this->input->post('biaya'),
			'request_status'	=> "request"
			);

		$this->db->insert('tbl_service_request',$data);
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


    //service masuk

    public function lihat_masuk(){
		$query = $this->db->query("SELECT * FROM 
									tbl_service_masuk i
									LEFT JOIN tbl_service_request ii ON i.ID_service = ii.ID_service
									LEFT JOIN m_akun iii ON i.ID_akun = iii.ID_akun 
									WHERE ii.request_status = 'masuk' ORDER BY i.ID_masuk DESC");
		return $query;
	}

	public function tambah_masuk(){
		
		$data = array(
			'ID_masuk'				=> null,
			'ID_akun'				=> $this->input->post('id_akun'),
			'ID_service'			=> $this->input->post('id_service'),
			'masuk_tgl'				=> date('Y-m-d'),
			'masuk_serial'			=> $this->input->post('serial'),
			'masuk_kelengkapan'		=> $this->input->post('kelengkapan'),
			'masuk_biaya_dp'		=> $this->input->post('biaya')
			);

		$this->db->insert('tbl_service_masuk',$data);
	}

	public function getdata_masuk($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_service_masuk WHERE ID_Service = $id ");
		return $query;
	}


	//service proses

	public function lihat_proses(){
		$query = $this->db->query("SELECT * FROM 
									tbl_service_proses i
									LEFT JOIN tbl_service_masuk ii ON i.ID_service = ii.ID_service
									LEFT JOIN tbl_service_request iii ON i.ID_service = iii.ID_service
									LEFT JOIN m_akun iv ON i.ID_akun = iv.ID_akun 
									WHERE iii.request_status = 'proses' ORDER BY i.ID_proses DESC");
		return $query;
	}

	public function tambah($table,$data)
	{
		$this->db->insert($table,$data);
	}


	//service selesai

	public function lihat_selesai(){
		$query = $this->db->query("SELECT * FROM 
									tbl_service_selesai i
									LEFT JOIN tbl_service_masuk ii ON i.ID_service = ii.ID_service
									LEFT JOIN tbl_service_request iii ON i.ID_service = iii.ID_service
									LEFT JOIN m_akun iv ON i.ID_akun = iv.ID_akun 
									WHERE iii.request_status = 'selesai' ORDER BY i.ID_selesai DESC");
		return $query;
	}

	//service Diterima

	public function lihat_terima(){
		$query = $this->db->query("SELECT * FROM 
									tbl_service_terima i
									LEFT JOIN tbl_service_masuk ii ON i.ID_service = ii.ID_service
									LEFT JOIN tbl_service_request iii ON i.ID_service = iii.ID_service
									LEFT JOIN m_akun iv ON i.ID_akun = iv.ID_akun 
									WHERE iii.request_status = 'terima' ORDER BY i.ID_terima DESC");
		return $query;
	}

	public function tambah_terima(){

		$dp 	= $this->input->post('dp');
		$terima	= $this->input->post('biaya');
		$total 	= $dp + $terima;
		
		$data = array(
			'ID_terima'				=> null,
			'ID_akun'				=> $this->input->post('id_akun'),
			'ID_service'			=> $this->input->post('id_service'),
			'terima_tgl'			=> date('Y-m-d'),
			'terima_biaya'			=> $terima,
			'total_biaya'			=> $total
			);

		$this->db->insert('tbl_service_terima',$data);
	}

	public function getdata_terima($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_service_terima WHERE ID_service = $id ");
		return $query;
	}

}
 ?>