<?php 

/**
* 
*/
class M_grafik extends CI_Model
{
	public function lihat_request()
	{
		$query = $this->db->query("SELECT count(*) as 'total' FROM tbl_service_request WHERE request_status='request'");
		return $query->result();
	}

	public function lihat_masuk()
	{
		$query = $this->db->query("SELECT count(*) as 'total' FROM tbl_service_request WHERE request_status='masuk'");
		return $query->result();
	}

	public function lihat_proses()
	{
		$query = $this->db->query("SELECT count(*) as 'total' FROM tbl_service_request WHERE request_status='proses'");
		return $query->result();
	}

	public function lihat_selesai()
	{
		$query = $this->db->query("SELECT count(*) as 'total' FROM tbl_service_request WHERE request_status='selesai'");
		return $query->result();
	}

	public function lihat_terima()
	{
		$query = $this->db->query("SELECT count(*) as 'total' FROM tbl_service_request WHERE request_status='terima'");
		return $query->result();
	}

	//bayar

	public function lihat_pengeluaran()
	{
		$query = $this->db->query("SELECT SUM(biaya_pengeluaran) as 'total' FROM tbl_service_pengeluaran");
		return $query->result();
	}

	public function lihat_dp()
	{
		$query 	= $this->db->query("SELECT SUM(biaya_pengeluaran) as 'keluar' FROM tbl_service_pengeluaran");
		$query2 = $this->db->query("SELECT SUM(total_biaya) as 'masuk' FROM tbl_service_terima");
		return $query->result();
		return $query2->result();
	}

	public function lihat_pemasukan()
	{
		$query = $this->db->query("SELECT SUM(total_biaya) as 'total' FROM tbl_service_terima");
		return $query->result();
	}
}
 ?>