<?php 


class M_akun extends CI_Model
{
	
	public function lihat_data_aktif()
	{
		$query = $this->db->query("SELECT * FROM m_akun WHERE status_akun=1 ORDER BY ID_akun DESC");
		return $query;
	}

	public function lihat_data_nonaktif()
	{
		$query = $this->db->query("SELECT * FROM m_akun WHERE status_akun=0 ORDER BY ID_akun DESC");
		return $query;
	}

	public function tambah_data()
	{
		$data = array(
			'ID_akun'		=> null,
			'nama_akun'		=> $this->input->post('nama'),
			'username'		=> $this->input->post('user'),
			'password'		=> base64_encode($this->input->post('pass')),
			'jenis_akun'	=> $this->input->post('jenis'),
			'status_akun'	=> 1
			);

		$this->db->insert('m_akun',$data);
	}

	public function getdata($id)
	{
		$query = $this->db->query("SELECT * FROM m_akun WHERE ID_akun = $id ");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// status akun :
	// 1. master admin
	// 2. Kasir
}
 ?>