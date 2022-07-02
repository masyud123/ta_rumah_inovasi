<?php 

class Model_user extends CI_Model{

	public function tampil_user(){
		return $this->db->get('user');
	} 

	public function tambah_user($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_user($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_user($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_user($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// get jumlah total usulan per tahun 
	public function get_usulan()
    {
        $tahun = array('2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030');
            
        for($i=0; $i<count($tahun); $i++){ 
            $this->db->select('*');
            $this->db->from('usulan');
            $this->db->where('tahun', $tahun[$i]);
            $data[$i] = count($this->db->get()->result());
        }
        return $data;
    }

	// get jumlah user peserta per tahun
	public function get_peserta()
    {
        $tahun = array('2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030');
            
        for($i=0; $i<count($tahun); $i++){ 
            $this->db->select('*');
            $this->db->from('user');
            $this->db->like('created_at', $tahun[$i]);
			$this->db->where('hak_akses', 'Peserta');
            $data[$i] = count($this->db->get()->result());
        }
        return $data;
    }

	// get jumlah user penilai per tahun
	public function get_penilai()
    {
        $tahun = array('2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030');
            
        for($i=0; $i<count($tahun); $i++){ 
            $this->db->select('*');
            $this->db->from('user');
            $this->db->like('created_at', $tahun[$i]);
			$this->db->where('hak_akses', 'Penilai');
            $data[$i] = count($this->db->get()->result());
        }
        return $data;
    }

    public function get_info_wa()
    {
        $dt_wa = $this->db->get('whatsapp')->row_array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://nusagateway.com/api/info.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => $dt_wa['token'],'username' => $dt_wa['username']),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

    public function get_kode_qr()
    {
        $dt_wa = $this->db->get('whatsapp')->row_array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://nusagateway.com/api/qrcode.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => $dt_wa['token']),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function cek_nomor_wa($no_wa)
    {
        $dt_wa = $this->db->get('whatsapp')->row_array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://nusagateway.com/api/check-number.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => $dt_wa['token'],'phone' => $no_wa),
        ));
          
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

    public function kirim_pesan($no_wa, $pesan)
    {
        $dt_wa = $this->db->get('whatsapp')->row_array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://nusagateway.com/api/send-message.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => $dt_wa['token'], 'phone' => $no_wa, 'message' => $pesan),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}
?>