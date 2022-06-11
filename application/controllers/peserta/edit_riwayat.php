<?php 

class Edit_riwayat extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Peserta'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
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




	public function update_riwayat1()
	{
		// update nama/judul inovasi
		$id				= $this->input->post('id');
		$judul			= $this->input->post('judul');

		$data2 = array(
			'judul' 	=> $judul,
		);
		$where2 = array('id'	=>	$id);
		$cek_perubahan = $this->db->query("SELECT * FROM usulan WHERE id = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		if (	$cek_berubah['judul'] 	== $judul ){
			//echo ("tetap");
		}else{
			$this->model_riwayat->update_riwayat($where2,$data2, 'usulan');
			$this->session->set_flashdata('berubah1',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
		}
		

		// update data peserta
		date_default_timezone_set('Asia/Jakarta');
		$id_peserta 		= $this->input->post('id_peserta');
		$kategori_peserta 	= $this->input->post('kategori_peserta');
		$interaksi 	 		= $this->input->post('interaksi');
		$id_bidang			= $this->input->post('id_bidang');
		$nama_tim			= $this->input->post('nama_tim');
		$nama_ketua			= $this->input->post('nama_ketua');
		$email_ketua 	 	= $this->input->post('email_ketua');
		$no_hp 	 	        = $this->input->post('no_hp');
		$alamat_ketua 	 	= $this->input->post('alamat_ketua');
		$asal_sekolah 		= $this->input->post('asal_sekolah');

		$data = array(
			'kategori_peserta'	=> $kategori_peserta,
			'interaksi'			=> $interaksi,
			'id_bidang'			=> $id_bidang,
			'nama_tim'			=> $nama_tim,
			'nama_ketua'		=> $nama_ketua,
			'email_ketua'		=> $email_ketua,
			'no_hp'		        => $no_hp,
			'alamat_ketua'		=> $alamat_ketua,
			'updated_date'		=> date('Y,m,d H:i:s'),
		);

		$where = array('id_peserta'	=>	$id_peserta);
		$cek_perubahan = $this->db->query("SELECT * FROM peserta WHERE id_peserta = '$id_peserta'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		if (	$cek_berubah['kategori_peserta'] 	== $kategori_peserta && 
				$cek_berubah['interaksi'] 			== $interaksi && 
				$cek_berubah['id_bidang']			== $id_bidang && 
				$cek_berubah['nama_tim'] 			== $nama_tim && 
				$cek_berubah['nama_ketua'] 			== $nama_ketua && 
				$cek_berubah['email_ketua'] 		== $email_ketua &&
				$cek_berubah['no_hp'] 				== $no_hp && 
				$cek_berubah['alamat_ketua'] 		== $alamat_ketua &&
				$cek_berubah['asal_sekolah'] 		== $asal_sekolah
			){
			//echo("tetap");
		}else{ 
			$this->model_riwayat->update_riwayat($where,$data, 'peserta');
			$this->session->set_flashdata('berubah1',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
		}


		// update ktp
		$ktp			= $_FILES['ktp']['name'];
		if ($ktp	=''){}
		else{
			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'png|jpg|jpeg|pdf';
			$config['file_name'] = $nmfile; 

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('ktp')) {}
				else{
				$ktp = $this->upload->data();

				$data3 = array('ktp' 				=> $ktp['file_name']);
			
				$where = array('id_peserta'	=>	$id_peserta);
				$this->model_riwayat->update_riwayat($where,$data3, 'peserta');
				$this->session->set_flashdata('berubah1',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
			}
		}


		//update kategori
		if ($kategori_peserta == 'umum')
		{
			$data4= array('asal_sekolah' => (''));
			$where4 = array('id_peserta'	=>	$id_peserta);
			$this->model_riwayat->update_riwayat($where4,$data4, 'peserta');
		}
		elseif ($kategori_peserta == 'pelajar') 
		{
			$asal_sekolah = $this->input->post('asal_sekolah');
			$data5= array('asal_sekolah' => $asal_sekolah);
			$where5 = array('id_peserta'	=>	$id_peserta);
			$this->model_riwayat->update_riwayat($where5,$data5, 'peserta');
		}

		//update Interaksi
		if ($interaksi == 'Individu')
		{
			$where4 = array('nama_ketua'	=>	$nama_ketua);
			$this->model_riwayat->hapus_anggota_tim($where4, 'anggota_tim');
		}
		elseif($interaksi == 'Kelompok')
		{
			if (isset($_POST['nama_anggota']) == "") {
				// code...
			}else{
				$data_2 = array();
				foreach ($_POST['nama_anggota'] as $key => $val) {
					$data_2[] = array( 				
						'nama_anggota'	=> $_POST['nama_anggota'][$key],
						'nama_ketua'	=> $nama_ketua,
						'id_peserta'	=> $id_peserta,
						'created_date'	=> date('Y,m,d H:i:s')
					);
				}		
			$this->db->insert_batch('anggota_tim',$data_2);
			$this->session->set_flashdata('berubah1',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
			}
		}
		redirect(base_url()."peserta/riwayat/edit_riwayat2/".$id);
	}

	public function hapus_anggota()
	{
		$id_anggota = $this->input->post('id_anggota');

		$where = array('id'	=>	$id_anggota);
		$this->model_riwayat->hapus_anggota_tim($where, 'anggota_tim');
	}	

	public function update_anggota()
	{
		$id_anggota 		= $this->input->post('id_anggota');
		$nama_anggota 		= $this->input->post('nama_anggota');

		$data = array(
			'nama_anggota'	=> $nama_anggota,
			'updated_date'	=> date('Y,m,d H:i:s'),	);

		$where = array('id'	=>	$id_anggota);
		$this->model_riwayat->update_riwayat($where,$data, 'anggota_tim');
	}

	public function update_semua_form1()
	{
		// update nama/judul inovasi
		$id				= $this->input->post('id');
		$judul			= $this->input->post('judul');

		$data2 = array(
			'judul' 	=> $judul,
		);
		$where2 = array('id'	=>	$id);
		$this->model_riwayat->update_riwayat($where2,$data2, 'usulan');

		// update data peserta
		date_default_timezone_set('Asia/Jakarta');
		$id_peserta 		= $this->input->post('id_peserta');
		$kategori_peserta 	= $this->input->post('kategori_peserta');
		$interaksi 	 		= $this->input->post('interaksi');
		$id_bidang			= $this->input->post('id_bidang');
		$nama_tim			= $this->input->post('nama_tim');
		$nama_ketua			= $this->input->post('nama_ketua');
		$email_ketua 	 	= $this->input->post('email_ketua');
		$no_hp		 	 	= $this->input->post('no_hp');
		$alamat_ketua 	 	= $this->input->post('alamat_ketua');

		$data = array(
			'kategori_peserta'	=> $kategori_peserta,
			'interaksi'			=> $interaksi,
			'id_bidang'			=> $id_bidang,
			'nama_tim'			=> $nama_tim,
			'nama_ketua'		=> $nama_ketua,
			'email_ketua'		=> $email_ketua,
			'no_hp'				=> $no_hp,
			'alamat_ketua'		=> $alamat_ketua,
			'updated_date'		=> date('Y,m,d H:i:s'),
		);
		$where = array('id_peserta'	=>	$id_peserta);
		$this->model_riwayat->update_riwayat($where,$data, 'peserta');

		// update ktp
		$ktp			= $_FILES['ktp']['name'];
		if ($ktp	=''){}
		else{
			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'png|jpg|jpeg';
			$config['file_name'] = $nmfile; 

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('ktp')) {}
				else{
				$ktp = $this->upload->data();

				$data3 = array('ktp' => $ktp['file_name']);
			
				$where = array('id_peserta'	=>	$id_peserta);
				$this->model_riwayat->update_riwayat($where,$data3, 'peserta');
			}
		}

		//update kategori
		if ($kategori_peserta == 'umum')
		{
			$data4= array('asal_sekolah' => (''));
			$where4 = array('id_peserta'	=>	$id_peserta);
			$this->model_riwayat->update_riwayat($where4,$data4, 'peserta');
		}
		elseif ($kategori_peserta == 'pelajar') 
		{
			$asal_sekolah = $this->input->post('asal_sekolah');
			$data5= array('asal_sekolah' => $asal_sekolah);
			$where5 = array('id_peserta'	=>	$id_peserta);
			$this->model_riwayat->update_riwayat($where5,$data5, 'peserta');
		}

		//update Interaksi
		if ($interaksi == 'Individu')
		{
			$where4 = array('nama_ketua'	=>	$nama_ketua);
			$this->model_riwayat->hapus_anggota_tim($where4, 'anggota_tim');
		}
		elseif($interaksi == 'Kelompok')
		{
			if (isset($_POST['nama_anggota']) == "") {
				// code...
			}else{
			$data_2 = array();
			foreach ($_POST['nama_anggota'] as $key => $val) {
				$data_2[] = array( 				
					'nama_anggota'	=> $_POST['nama_anggota'][$key],
					'nama_ketua'	=> $nama_ketua,
					'id_peserta'	=> $id_peserta,
					'created_date'	=> date('Y,m,d H:i:s')
				);
			}		
			$this->db->insert_batch('anggota_tim',$data_2);}
		}
		$this->session->set_flashdata('berubah1',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data anggota berhasil diperbarui","success")  
                            </script>'  
                    );
	}

	public function update_riwayat2()
	{
		$id						= $this->input->post('id');
		$latar_belakang			= $this->input->post('latar_belakang');
		$kondisi_sebelumnya		= $this->input->post('kondisi_sebelumnya');
		$sasaran_n_tujuan		= $this->input->post('sasaran_n_tujuan');
		$deskripsi				= $this->input->post('deskripsi');
		$bahan_baku				= $this->input->post('bahan_baku');
		$cara_kerja				= $this->input->post('cara_kerja');
		$keunggulan				= $this->input->post('keunggulan');
		$hasil_yg_diharapkan 	= $this->input->post('hasil_yg_diharapkan');
		$manfaat				= $this->input->post('manfaat');
		$rencana				= $this->input->post('rencana');

		$data = array( 
			'latar_belakang' 		=> $latar_belakang, 
			'kondisi_sebelumnya' 	=> $kondisi_sebelumnya,
			'sasaran_n_tujuan' 		=> $sasaran_n_tujuan, 
			'deskripsi' 			=> $deskripsi,
			'bahan_baku' 			=> $bahan_baku,
			'cara_kerja' 			=> $cara_kerja,
			'keunggulan' 			=> $keunggulan, 
			'hasil_yg_diharapkan' 	=> $hasil_yg_diharapkan,
			'manfaat' 				=> $manfaat,
			'rencana' 				=> $rencana,  
		);

		$where = array('id'	=>	$id);

		$cek_perubahan = $this->db->query("SELECT * FROM usulan WHERE id = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		if (	$cek_berubah['latar_belakang'] 		== $latar_belakang && 
				$cek_berubah['kondisi_sebelumnya'] 	== $kondisi_sebelumnya && 
				$cek_berubah['sasaran_n_tujuan']	== $sasaran_n_tujuan && 
				$cek_berubah['deskripsi'] 			== $deskripsi && 
				$cek_berubah['bahan_baku'] 			== $bahan_baku && 
				$cek_berubah['cara_kerja'] 			== $cara_kerja &&
				$cek_berubah['keunggulan'] 			== $keunggulan && 
				$cek_berubah['hasil_yg_diharapkan'] == $hasil_yg_diharapkan &&
				$cek_berubah['manfaat'] 			== $manfaat && 
				$cek_berubah['rencana'] 			== $rencana
			){
			redirect(base_url()."peserta/riwayat/edit_riwayat3/".$id);
		}else{

			$this->model_riwayat->update_riwayat($where,$data, 'usulan');

			$this->session->set_flashdata('berubah2',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
			redirect(base_url()."peserta/riwayat/edit_riwayat3/".$id);	
		}
	}

	public function update_riwayat3()
	{
		// update link video
		$id		= $this->input->post('id');
		$link_video		= $this->input->post('link_video');

		$data = array(
			'link_video' 	=> $link_video,
		);
		$where = array('id'	=>	$id);

		$cek_perubahan = $this->db->query("SELECT * FROM usulan WHERE id = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		if ($cek_berubah['link_video'] == $link_video){}
		else{
			$this->model_riwayat->update_riwayat($where,$data, 'usulan');
			$this->session->set_flashdata('berubah3',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
		}

		// update gamabr usulan
		$gambar			= $_FILES['gambar']['name'];
		if ($gambar	=''){}
		else{
			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'png|jpg|jpeg|pdf';
			$config['file_name'] = $nmfile; 

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('gambar')) {}
				else{
				$gambar = $this->upload->data();

				$data4 = array('gambar' 				=> $gambar['file_name']);
			
				$where4 = array('id'	=>	$id);
				$this->model_riwayat->update_riwayat($where4,$data4, 'usulan');
				$this->session->set_flashdata('berubah3',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
			}
		}

		// update surat pernyatan
		$proposal			= $_FILES['proposal']['name'];
		if ($proposal	=''){}
		else{
			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'png|jpg|jpeg|pdf';
			$config['file_name'] = $nmfile; 

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('proposal')) {}
				else{
				$proposal = $this->upload->data();

				$data2 = array('proposal' 	=> $proposal['file_name']);
			
				$where2 = array('id'	=>	$id);
				$this->model_riwayat->update_riwayat($where2,$data2, 'usulan');
				$this->session->set_flashdata('berubah3',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );
			}
		}

		// update jurnal
		$jurnal			= $_FILES['jurnal']['name'];
		if ($jurnal	=''){}
		else{
			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'png|jpg|jpeg|pdf';
			$config['file_name'] = $nmfile; 

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('jurnal')) {}
				else{
				$jurnal = $this->upload->data();

				$data3 = array('jurnal' 	=> $jurnal['file_name']);
			
				$where3 = array('id'	=>	$id);
				$this->model_riwayat->update_riwayat($where3,$data3, 'usulan');
				$this->session->set_flashdata('berubah3',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil diperbarui","success")  
                            </script>'  
                    );

			}
		}
		redirect(base_url()."peserta/riwayat/");
	} 
}	