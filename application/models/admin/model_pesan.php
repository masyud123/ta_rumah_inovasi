<?php 

class Model_pesan extends CI_Model{
	public function semua_nomor(){
		$this->db->select('nama, email, no_wa');
		$this->db->from('user');
		return $this->db->get();
	}

	public function nomor_penilai(){
		$this->db->select('nama, email, no_wa');
		$this->db->from('user');
		$this->db->where('hak_akses', 'Penilai');
		return $this->db->get();
	}

	public function nomor_peserta(){
		$this->db->select('nama_ketua, email_ketua, no_hp');
		$this->db->from('Peserta');
		return $this->db->get();
	}
}