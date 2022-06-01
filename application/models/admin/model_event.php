<?php 

class Model_event extends CI_Model{
	public function tampil_data(){
		return $this->db->get('event');
	} 
	public function tambah_event($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_event($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_event($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_event($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//get subevent
	public function get_subevent(){
		$this->db->select('*');
		$this->db->from('subevent');
		$this->db->where('mulai<=', date('Y-m-d'));
		$this->db->where('akhir>=', date('Y-m-d'));
		return $this->db->get();
	}
	
	// prosentase sudah dinilai pada verifikasi
	public function get_usulan_join_nilai_proposal($id_subevent){
		$this->db->select('penilaian_proposal.*');
		$this->db->from('penilaian_proposal');
		$this->db->join('usulan', 'usulan.id = penilaian_proposal.id_usulan');
		$this->db->where('usulan.id_subevent', $id_subevent);
		return $this->db->get();
	}

	public function get_usulan($id_subevent){
		return $this->db->get_where('usulan', array('id_subevent' => $id_subevent));
	}

	// prosentase sudah dinilai pada nominasi
	public function get_usulan_join_penilaian_pemenang($id_subevent){
		$this->db->select('penilaian_pemenang.*');
		$this->db->from('penilaian_pemenang');
		$this->db->join('usulan', 'usulan.id = penilaian_pemenang.id_usulan');
		$this->db->where('usulan.id_subevent', $id_subevent);
		$this->db->group_by('penilaian_pemenang.id_usulan, penilaian_pemenang.id_penilai');
		return $this->db->get();
	}

	public function get_nominator($id_subevent){
		return $this->db->get_where('nominator', array('id_subevent' => $id_subevent));
	}

	// jumlah penilai
	public function get_penilai($id_subevent){
		return $this->db->get_where('setting_penilai', array('id_subevent' => $id_subevent));
	}
}
?>