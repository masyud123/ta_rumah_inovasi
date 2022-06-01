<?php 

class Model_riwayat extends CI_Model{

	public function tampil_riwayat(){
	
		$user =  $this->session->userdata('id_usr');
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->join('subevent','subevent.subevent = usulan.subevent');
		$this->db->join('event','event.id = subevent.id_event');
		$this->db->where('usulan.id_usr', $user);
		$query = $this->db->get();
		return $query->result();
		
	}

	public function tampil_detail_riwayat($id_peserta) 
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('peserta.id_peserta',$id_peserta);
		return $this->db->get();
	}

	public function pilih_bidang()
	{ 
		return $this->db->get('bidang');
	}

	public function tampil_bidang($id_peserta) 
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->join('bidang','bidang.id = peserta.id_bidang');
		$this->db->where('peserta.id_peserta',$id_peserta);
		return $this->db->get();
	}

	public function tampil_anggota($id_peserta)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->join('anggota_tim','anggota_tim.id_peserta = peserta.id_peserta');
		$this->db->where('peserta.id_peserta',$id_peserta);
		return $this->db->get();
	}	

	public function tampil_detail_riwayat2($id) 
	{
		$this->db->select('usulan.*, peserta.*');
		$this->db->from('usulan');
		$this->db->join('peserta','peserta.id_usulan = usulan.id');
		$this->db->where('usulan.id',$id);
		return $this->db->get();
	}

	public function update_status_riwayat($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function update_riwayat($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_anggota_tim($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}