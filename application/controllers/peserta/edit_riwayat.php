<?php 

class Edit_riwayat extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Peserta'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
	}

	public function simpan_riwayat_3($id_usulan)
	{
		$proposal 	= $_FILES['proposal']['name'];
		$jurnal 	= $_FILES['jurnal']['name'];
		$gambar 	= $_FILES['gambar']['name'];
		$proposal2 	= $this->input->post('proposal2');
		$jurnal2 	= $this->input->post('jurnal2');
		$gambar2 	= $this->input->post('gambar2');
		$link_video	= $this->input->post('link_video');
		$judul 		= $this->input->post('judul');

		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$config['encrypt_name'] 	= TRUE;
		$this->load->library('upload', $config);

		$usulan = $this->db->get_where('usulan', ['id' => $id_usulan])->row();
		if($proposal2 == ""){
			if($this->upload->do_upload('proposal')){
				$proposal = $this->upload->data('file_name');
			}
			unlink('./uploads/'.$usulan->proposal);
		}else{
			$proposal = $proposal2; 
		}
		if($jurnal2 == ""){
			if($this->upload->do_upload('jurnal')){
				$jurnal = $this->upload->data('file_name');
			}
			unlink('./uploads/'.$usulan->jurnal);
		}else{
			$jurnal = $jurnal2; 
		}
		if($gambar2 == ""){
			if($this->upload->do_upload('gambar')){
				$gambar = $this->upload->data('file_name');
			}
			unlink('./uploads/'.$usulan->gambar);
		}else{
			$gambar = $gambar2; 
		}

		$data = array( 
			'judul'			=> $judul,
			'proposal'		=> $proposal,
			'jurnal'		=> $jurnal,
			'gambar' 		=> $gambar,
			'link_video' 	=> $link_video, 
		);
		$this->db->update('usulan', $data, ['id' => $id_usulan]);
	}

	public function simpan_riwayat_2($id_usulan)
	{
		$latar_belakang 	= $this->input->post('latar_belakang');
		$kondisi_sebelumnya = $this->input->post('kondisi_sebelumnya');
		$sasaran_n_tujuan 	= $this->input->post('sasaran_n_tujuan');
		$deskripsi 			= $this->input->post('deskripsi');
		$bahan_baku 		= $this->input->post('bahan_baku');
		$cara_kerja 		= $this->input->post('cara_kerja');
		$keunggulan 		= $this->input->post('keunggulan');
		$hasil_diharapkan	= $this->input->post('hasil_yg_diharapkan');
		$manfaat 			= $this->input->post('manfaat');
		$rencana 			= $this->input->post('rencana');

		$data = array( 
			'latar_belakang' 		=> $latar_belakang, 
			'kondisi_sebelumnya' 	=> $kondisi_sebelumnya,
			'sasaran_n_tujuan' 		=> $sasaran_n_tujuan, 
			'deskripsi' 			=> $deskripsi,
			'bahan_baku' 			=> $bahan_baku,
			'cara_kerja' 			=> $cara_kerja,
			'keunggulan' 			=> $keunggulan, 
			'hasil_yg_diharapkan' 	=> $hasil_diharapkan,
			'manfaat' 				=> $manfaat,
			'rencana' 				=> $rencana,
		);

		$where = array('id' => $id_usulan);
		$this->db->update('usulan', $data, $where);
	}

	public function simpan_riwayat_1($id_peserta)
	{
		$id_bidang		= $this->input->post('id_bidang');
		$kategori		= $this->input->post('kategori_peserta');
		$interaksi		= $this->input->post('interaksi');
		$nama_ketua		= $this->input->post('nama_ketua');
		$no_hp          = $this->input->post('no_hp');
		$email_ketua	= $this->input->post('email_ketua');
		$alamat_ketua	= $this->input->post('alamat_ketua');
		$asal_sekolah	= $this->input->post('asal_sekolah');
		$nama_tim		= $this->input->post('nama_tim');
		$ktp			= $_FILES['ktp']['name'];
		$ktp2			= $this->input->post('ktp2');

		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$config['encrypt_name'] 	= TRUE;
		$this->load->library('upload', $config);

		$profil = $this->db->get_where('peserta', ['id_peserta' => $id_peserta])->row();
		if($ktp2 == ""){
			if($this->upload->do_upload('ktp')){
				$ktp = $this->upload->data('file_name');
			}
			unlink('./uploads/'.$profil->ktp);
		}else{
			$ktp = $ktp2;
		}

		if($interaksi == "Kelompok"){$nama_tim2 = $nama_tim;}
		elseif($interaksi == "Individu"){$nama_tim2 = "";}

		$data = array(
			'id_bidang' 			=> $id_bidang, 
			'kategori_peserta' 		=> $kategori,
			'interaksi' 			=> $interaksi,
			'nama_tim'				=> $nama_tim2,
			'email_ketua'	 		=> $email_ketua,
			'no_hp' 				=> $no_hp,
			'nama_ketua' 			=> $nama_ketua,
			'alamat_ketua' 			=> $alamat_ketua,
			'asal_sekolah' 			=> $asal_sekolah, 
			'ktp' 					=> $ktp,
			'created_date'			=> date('Y-m-d H:i:s'),
		);

		$this->db->update('peserta', $data, ['id_peserta' => $id_peserta]);

		$ttl_anggota = count($this->db->get_where('anggota_tim', ['id_peserta' => $id_peserta])->result());
		if($ttl_anggota != null){
			$this->db->delete('anggota_tim', ['id_peserta' => $id_peserta]);
		}

		if($interaksi == "Kelompok"){
			foreach($_POST['nama_anggota'] as $key => $val):
				$data_2[] = [				
					'nama_anggota'	=> $_POST['nama_anggota'][$key],
					'id_peserta'    => $id_peserta,
					'created_date'	=> date('Y-m-d H:i:s')
				];
			endforeach;
			$this->db->insert_batch('anggota_tim',$data_2);
		}

		echo 180701; // sukses
	}

}	