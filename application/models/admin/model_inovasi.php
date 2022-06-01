<?php 

class Model_inovasi extends CI_Model{

	public function tampil_subevent(){
		return $this->db->get('subevent');
	}

	public function edit_indikator_penilaian($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function edit_ket_indikator($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_keterangan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function update_indikator($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function ambil_id_subevent($id_subevent)
	{
		$result = $this->db->where('id', $id_subevent)->limit(1)->get('subevent');
		if($result->num_rows() >= 0){
			return $result->row();
		}else{
			return false; 
		}
	}

	public function ambil_id_inovasi($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('indikator_penilaian');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	public function tambah_nominator($data,$table){
			$this->db->insert($table,$data);
		}


	public function tambah_inovasi($data,$table){
		$this->db->insert($table,$data);
	}

	public function hapus_nominator($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	public function ambil_id_indikator($id_indikator_penilaian)
	{
		$result = $this->db->where('id_indikator_penilaian', $id_indikator_penilaian)->limit(1)->get('indikator_penilaian');
		if($result->num_rows() >= 0){
			return $result->row();
		}else{
			return false; 
		}
	}

	public function ambil_id_keterangan($id_indikator_penilaian)
	{
		$result = $this->db->where('id_indikator_penilaian', $id_indikator_penilaian)->get('keterangan_indikator');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	public function hapus_indikator_inovasi($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function hapus_keterangan($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getUsulan($id_subevent)
	{
		$this->db->select('id');
		$this->db->from('usulan');
		$this->db->where('id_subevent', $id_subevent);
		// $this->db->like('status', 2);
		return $this->db->get();
	}

	public function getTotalNilai()
	{
		$this->db->select('id_usulan');
		$this->db->from('total_nilai');
		return $this->db->get();
	}

	
}
?>