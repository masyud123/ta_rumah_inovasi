<?php 

class Model_usulan extends CI_Model{
	public function tampil_data(){
		$this->db->select('usulan.id, usulan.tahun, usulan.user, usulan.judul, usulan.status, subevent.subevent');
		$this->db->from('usulan');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->where('usulan.tahun', date('Y'));
		$this->db->where('usulan.status!=', '1');
		return $this->db->get();
	} 

	public function penilaian_proposal(){
		$this->db->select('id_usulan');
		$this->db->from('penilaian_proposal');
		$result = $this->db->get();
		if($result->num_rows() >= 0){
			return $result;
		} else {
			return false;
		}
	}

	public function nilai_proposal(){
		$this->db->select('*');
			$this->db->from('penilaian_proposal');
			$query = $this->db->get();
			return $query->result();
	} 

	public function tampil_data2(){
		$user =  $this->session->userdata('email');
		$result = $this->db->get_where('usulan', array('penilai' => $user));
		if($result->num_rows() >= 0){
			return $result->result();
		} else {
			return false;
		}
	} 

	public function tambah_riwayat($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_riwayat($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_riwayat($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_riwayat($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function get_ulasan($id_usulan)
	{
		$this->db->select('*');
		$this->db->from('ulasan_usulan');
		$this->db->where('id_usulan', $id_usulan);
		$this->db->where('id_penilai', $this->session->userdata('id_usr'));
		return $this->db->get();
	}

	public function get_data_tahun($param){
		$this->db->select('usulan.id, usulan.tahun, usulan.judul, usulan.status, subevent.subevent, peserta.nama_ketua');
		$this->db->from('usulan');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->join('peserta', 'peserta.id_usulan = usulan.id');
		$this->db->where('usulan.tahun', $param);
		$this->db->where('usulan.status', '4');
		return $this->db->get();
	} 

	public function usulan_terkini($tahun){ 
		$this->db->select('usulan.id, usulan.tahun, usulan.judul, usulan.status, subevent.subevent, peserta.nama_ketua');
		$this->db->from('usulan');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->join('peserta', 'peserta.id_usulan = usulan.id');
		$this->db->where('usulan.status!=', '1');
		$this->db->where('usulan.status!=', '4');
		$this->db->where('usulan.tahun', $tahun);
		return $this->db->get();
	} 

	public function stts_verif($tahun)
	{
		$this->db->select('usulan.id, usulan.tahun, usulan.judul, usulan.status, subevent.subevent, peserta.nama_ketua');
		$this->db->from('usulan');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->join('peserta', 'peserta.id_usulan = usulan.id');
		$this->db->where('usulan.status!=', '1');
		$this->db->where('usulan.status!=', '5');
		$this->db->where('usulan.status!=', '4');
		$this->db->where('usulan.tahun', $tahun);
		return $this->db->get();
	}

	public function stts_blm($tahun)
	{
		$this->db->select('usulan.id, usulan.tahun, usulan.judul, usulan.status, subevent.subevent, peserta.nama_ketua');
		$this->db->from('usulan');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->join('peserta', 'peserta.id_usulan = usulan.id');
		$this->db->where('usulan.status', '5');
		$this->db->where('usulan.status!=', '4');
		$this->db->where('usulan.tahun', $tahun);
		return $this->db->get();
	}

	public function get_detail_usulan($id_usulan)
	{
		$this->db->select('*');
		$this->db->from('usulan');
		$this->db->join('peserta', 'peserta.id_usulan = usulan.id');
		$this->db->join('subevent', 'subevent.id = usulan.id_subevent');
		$this->db->where('usulan.id', $id_usulan);
		return $this->db->get();
	}
}
