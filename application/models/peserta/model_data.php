<?php 

class Model_data extends CI_Model{

	public function tambah_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data_usulan($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data_usulan($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
