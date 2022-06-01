<?php 

class Model_subevent extends CI_Model{

	public function view_subevent(){

		$this->db->select('subevent.*,event.id as event_id, event.event');
		$this->db->from('subevent');
		$this->db->join('event','event.id = subevent.id_event');
		//$this->db->where('id_subevent', $id_subevent);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function list_nama_event() {
     $this->db->select('*');
     $this->db->from('event');
     //$this->db->where('hak_akses','Penilai');
     $query = $this->db->get();
     return $query->result();
    }

	public function tampil_subevent(){
		return $this->db->get('subevent');
	} 

	public function tambah_subevent($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_subevent($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_subevent($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_subevent($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
}