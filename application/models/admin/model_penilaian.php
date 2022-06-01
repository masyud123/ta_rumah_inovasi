<?php 

class Model_penilaian extends CI_Model{



	//data verifikasi
	public function ambil_id_subevent($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->limit(1)->get('usulan');
		if($result->num_rows() >= 0){
			return $result->row();
		}else{
			return false; 
		}
	}

	public function ambil_id_indikator($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('indikator_penilaian');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	public function ambil_keterangan($id_indikator)
	{

        $this->db->select('keterangan, nilai_minimal_keterangan, nilai_maksimal_keterangan');
		$this->db->from('keterangan_indikator');
		$this->db->join('indikator_penilaian', 'indikator_penilaian.id_indikator_penilaian = keterangan_indikator.id_indikator_penilaian');
		$this->db->where('keterangan_indikator.id_indikator_penilaian', $id_indikator);
		$query = $this->db->get();
        return $query->result();
    }

	public function id_ind($id_subevent)
	   {
			$this->db->select('id_indikator_penilaian');
			$this->db->from('indikator_penilaian');
			$this->db->where('id_subevent', $id_subevent);
			$query = $this->db->get();
			return $query->result();
	   }

	public function get_IndikatorPenilaian($id_subevent)
	{
		$this->db->select('*');
		$this->db->from('indikator_penilaian');
		$this->db->where('id_subevent', $id_subevent);
		return $this->db->get();
	}

	public function get_KeteranganIndikator($id_indikator_penilaian)
	{
		$this->db->select('MAX(nilai_maksimal_keterangan) as nilai_max_ind, id_indikator_penilaian');
		$this->db->from('keterangan_indikator');
		$this->db->where('id_indikator_penilaian', $id_indikator_penilaian);
		return $this->db->get();
	}

    //data nominator
	public function ambil_id_usulan($id)
	{
		$result = $this->db->where('id', $id)->limit(1)->get('usulan');
		if($result->num_rows() >= 0){
			return $result->row();
		}else{
			return false; 
		}
	}

	public function ambil_id_subevent2($id)
	{
		$this->db->select('id_subevent');
	    $this->db->from('usulan');
	    $this->db->where('id', $id);
	    $query = $this->db->get();
	    return $query->row();
	}

	public function ambil_komponen($id_subevent)
	{
		$this->db->select('id, id_subevent, nilai_komponen_min, nilai_komponen_max, komponen, note');
		$this->db->from('indikator_penilaian_pemenang');
		$this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function ambil_id_komponen($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('indikator_penilaian_pemenang');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	

	//simpan nominator
	public function simpan_nominator($data)
	{
    	$this->db->insert('penilaian_pemenang', $data);
	   
	}

	//simpan proposal
	 public function simpan_nilai_proposal($data1,$table){
		$this->db->insert($table,$data1);

	//simpan total nilai verifikasi
	}
	public function simpan_total_nilai($data2,$table){
		$this->db->insert($table,$data2);
	}

	public function simpan_total_nilai2($data,$table){
		$this->db->insert($table,$data);
	}
}

 ?>