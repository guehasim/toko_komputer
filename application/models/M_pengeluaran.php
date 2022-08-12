<?php 


class M_pengeluaran extends CI_Model
{
	
	public function lihat_data(){
		$query = $this->db->query("SELECT * FROM tbl_service_pengeluaran ORDER BY tgl_pengeluaran DESC");
		return $query;
	}

	public function tambah_data(){
		
		$data = array(
			'ID_pengeluaran'			=> null,
			'ID_akun'					=> $this->input->post('id_akun'),
			'tgl_pengeluaran'			=> $this->input->post('tgl'),
			'nama_pengeluaran'			=> $this->input->post('nama'),
			'biaya_pengeluaran'			=> $this->input->post('biaya'),
			'keterangan_pengeluaran'	=> $this->input->post('keterangan')
			);

		$this->db->insert('tbl_service_pengeluaran',$data);
	}

	public function getdata($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_service_pengeluaran WHERE ID_pengeluaran = $id ");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_pengeluaran',$id);
        $this->db->delete('tbl_service_pengeluaran');
    }
}
 ?>