<?php 

class Model_pesan extends CI_Model{
	public function nomor_peserta(){
		return $this->db->get('peserta');
	}
}