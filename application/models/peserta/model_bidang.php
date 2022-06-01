<?php 

class Model_bidang extends CI_Model{

	public function tampil_bidang($id_subevent){
		$this->db->select('*');
		$this->db->from('bidang');
		$this->db->where('id_subevent', $id_subevent);
		$this->db->where('status', 1);
		return $this->db->get();
	}

	public function tampil_event(){
		return $this->db->get('event');
	}

	public function tampil_sub($id){
		$this->db->select('*');
		$this->db->from('subevent');
		$this->db->where('id_event', $id);
		return $this->db->get();
	}

	public function tampil_subevent($id_subevent){
		$result = $this->db->where('id', $id_subevent)->limit(1)->get('subevent');
		if($result->num_rows() >= 0){
			return $result->row();
		} else {
			return false;
		} 
	}

	public function tampil_nama_usulan(){
		$user =  $this->session->userdata('nama');
		$result = $this->db->get_where('psrta', array('nama' => $user));
		if($result->num_rows() >= 0){
			return $result->result();
		} else {
			return false;
		}
	}
}