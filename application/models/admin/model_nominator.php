<?php 

class Model_nominator extends CI_Model{

	public function tampil_subevent(){
		return $this->db->get('subevent');
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

	public function ambil_id_nominator($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('indikator_penilaian_pemenang');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	public function tambah_nominator($data,$table){
		$this->db->insert($table,$data);
	}

	public function hapus_nominator($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_indikator($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_indikator($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//get data untuk cek sudah dinilai atau belum
	public function cek_data_nilai_nominator($id_subevent){
		$this->db->select('penilaian_pemenang.*');
		$this->db->from('penilaian_pemenang');
		$this->db->join('usulan', 'usulan.id = penilaian_pemenang.id_usulan');
		$this->db->where('usulan.id_subevent', $id_subevent);
		$data = $this->db->get()->result_array();
		if($data != null){
			return "ada";
		}else{
			return "kosong";
		}
	}

	public function get_usulan($param)
	{
		$this->db->select('id');
		$this->db->from('usulan');
		$this->db->where('id_subevent', $param);
		return $this->db->get();
	}

	public function get_nominator($param)
	{
		$this->db->select('id_usulan');
		$this->db->from('nominator');
		$this->db->where('id_subevent', $param);
		return $this->db->get();
	}
}
?>