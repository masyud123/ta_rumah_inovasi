<?php 

class Model_penilai extends CI_Model{

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

	public function ambil_id_penilai($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('setting_penilai');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}
	public function jumlah_penilai($id_subevent){

		$this->db->select('count(id) as id');
		$this->db->from('setting_penilai');
		
		$this->db->where('id_subevent', $id_subevent);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	// public function ambil_nama($id_usr)
	// {
	// 	$this->db->select('nama');
	//     $this->db->from('user');
	//     $this->db->where('id_usr', $id_usr);
	//     $query = $this->db->get();
	//     return $query->result();

	// }

	public function nama_penilai($id_subevent){

		$this->db->select('setting_penilai.*,user.*');
		$this->db->from('setting_penilai');
		$this->db->join('user','user.id_usr = setting_penilai.id_usr');
		$this->db->where('id_subevent', $id_subevent);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function list_nama_penilai() {
     $this->db->select('*');
     $this->db->from('user');
     $this->db->where('hak_akses','Penilai');
     $query = $this->db->get();
     return $query->result();
    }

    public function tambah_penilai($data,$table){
		$this->db->insert($table,$data);
	}

	public function hapus_penilai($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}

 ?>