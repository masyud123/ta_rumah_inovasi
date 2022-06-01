<?php 

class Model_pengumuman extends CI_Model{
	public function tampil_data(){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('status', 1);
		return $this->db->get();
	} 

	public function tampil_data_admin(){
		$this->db->select('*');
		$this->db->from('pengumuman');
		return $this->db->get();
	} 

	public function tambah_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function lihat($where,$table){
		return $this->db->get_where($table,$where);
	}
}

?>