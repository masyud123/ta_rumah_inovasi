<?php 

class Tambah_Data extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Peserta'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function submit_3($id_subevent)
	{
		$proposal 	= $_FILES['proposal']['name'];
		$jurnal 	= $_FILES['jurnal']['name'];
		$gambar 	= $_FILES['gambar']['name'];
		$link_video	= $this->input->post('link_video');
		$judul 		= $this->input->post('judul');

		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$config['encrypt_name'] 	= TRUE;
		$this->load->library('upload', $config);

		if($this->upload->do_upload('proposal')){
			$proposal = $this->upload->data('file_name');
		}
		if($this->upload->do_upload('jurnal')){
			$jurnal = $this->upload->data('file_name');
		}
		if($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');
		}

		$data = array( 
			'tahun' 		=> date('Y'),
			'id_subevent'	=> $id_subevent,
			'judul'			=> $judul,
			'status'		=> 1,
			'proposal'		=> $proposal,
			'jurnal'		=> $jurnal,
			'gambar' 		=> $gambar,
			'link_video' 	=> $link_video, 
		);

		$this->db->insert('usulan', $data);
		$id_usulan = $this->db->insert_id();
		echo $id_usulan;
	}

	public function submit_2($id_usul)
	{
		$id_usulan 			= str_replace("%20","",$id_usul);
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
		echo$id_usulan;
	}

	public function submit_1($id_usul)
	{	
		$id_usulan 		= str_replace("%20","",$id_usul);
		$id_user		= $this->session->userdata('id_usr');
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

		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$config['encrypt_name'] 	= TRUE;
		$this->load->library('upload', $config);

		if($this->upload->do_upload('ktp')){
			$ktp = $this->upload->data('file_name');
		}

		$data = array(
			'id_usr' 				=> $id_user,
			'tahun' 				=> date('Y'),
			'id_usulan' 			=> $id_usulan,
			'id_bidang' 			=> $id_bidang, 
			'kategori_peserta' 		=> $kategori,
			'interaksi' 			=> $interaksi,
			'nama_tim'				=> $nama_tim,
			'email_ketua'	 		=> $email_ketua,
			'no_hp' 				=> $no_hp,
			'nama_ketua' 			=> $nama_ketua,
			'alamat_ketua' 			=> $alamat_ketua,
			'asal_sekolah' 			=> $asal_sekolah, 
			'ktp' 					=> $ktp,
			'created_date'			=> date('Y-m-d H:i:s'),
		);

		$this->db->insert('peserta', $data);
		$id_peserta = $this->db->insert_id();
		echo 180701;

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
	}






	public function tambah_data_semua()
	{
		
		// data user pengajuan usulan
		$id_usr				= $this->input->post('id_usr');
		$tahun				= $this->input->post('tahun');
		$user			    = $this->input->post('user');
		$subevent 			= $this->input->post('subevent');
		$id_subevent		= $this->input->post('id_subevent');
		$judul				= $this->input->post('judul');
		$id_bidang			= $this->input->post('id_bidang');
		$kategori_peserta	= $this->input->post('kategori_peserta');
		$interaksi			= $this->input->post('interaksi');
		$nama_tim			= $this->input->post('nama_tim');
		$email_ketua		= $this->input->post('email_ketua');
		$no_hp              = $this->input->post('no_hp');
		$nama_ketua			= $this->input->post('nama_ketua');
		$email_ketua		= $this->input->post('email_ketua');
		$alamat_ketua		= $this->input->post('alamat_ketua');
		$asal_sekolah		= $this->input->post('asal_sekolah');

		// data usulan user
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
		$link_video 			= $this->input->post('link_video');
		$ktp					= $_FILES['ktp']['name'];
		
		if(isset($_POST)) {

			$nmfile = md5(date('YmdHis').mt_rand(0000000, 9999999));
			$config['upload_path']		='./uploads/';
			$config['allowed_types']	= 'pdf|png|jpg|jpeg';
			$config['file_name'] = $nmfile; 
			$this->load->library('upload',$config);
			
			//File KTP
			if (empty($_FILES['ktp']['name'])) {}
			else{
				if (!$this->upload->do_upload('ktp')) {
					
				}else{
					$ktp = $this->upload->data();
					}
			}

			//File 1
			if (empty($_FILES['proposal']['name'])) {}
			else{
				if (!$this->upload->do_upload('proposal')) {
					
				}else{
					$proposal	= $this->upload->data();
					}
			}

			//File 2
			if (empty($_FILES['jurnal']['name'])) {}
			else{
				if (!$this->upload->do_upload('jurnal')) {
					
				}else{
					$jurnal 		= $this->upload->data();
					}
			}
		
			//File 3
			if (empty($_FILES['gambar']['name'])) {}
			else{
				if (!$this->upload->do_upload('gambar')) {
					
				}else{
					$gambar = $this->upload->data();
					}
			}
		}

		$data_3 = array( 
			//'id' 					=> $id,
			'tahun' 				=> $tahun,
			'id_usr' 				=> $id_usr,
			'user'					=> $user, 
			'subevent'				=> $subevent,
			'id_subevent'			=> $id_subevent,
			'judul' 				=> $judul,
			'status'				=> ('1'),
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
			'proposal'				=> $proposal['file_name'],
			'jurnal'				=> $jurnal['file_name'],
			'gambar' 				=> $gambar['file_name'],
			'link_video' 			=> $link_video, 
		);

		$simpan_usulan = $this->db->insert('usulan', $data_3);
		$id_usulan = $this->db->insert_id();
		if ($simpan_usulan) {
			$data_1 = array(
				'id_usr' 				=> $id_usr, 
				'tahun' 				=> $tahun, 
				'id_usulan' 			=> $id_usulan,
				'id_bidang' 			=> $id_bidang, 
				'kategori_peserta' 		=> $kategori_peserta,
				'interaksi' 			=> $interaksi,
				'nama_tim'				=> $nama_tim,
				'email_ketua'	 		=> $email_ketua,
				'no_hp' 				=> $no_hp,
				'nama_ketua' 			=> $nama_ketua,
				'alamat_ketua' 			=> $alamat_ketua,
				'asal_sekolah' 			=> $asal_sekolah, 
				'ktp' 					=> $ktp['file_name'],
				'created_date'			=> date('Y,m,d H:i:s'),
			);
		$simpan = $this->db->insert('peserta', $data_1);
		}

		$id_peserta = $this->db->insert_id();
		if ($simpan) {
			$data_2 = array();
			foreach ($_POST['nama_anggota'] as $key => $val) {
				$data_2[] = array( 				
					'nama_anggota'	=> $_POST['nama_anggota'][$key],
					'nama_ketua'	=> $nama_ketua,
					'id_peserta'    => $id_peserta,
					'created_date'	=> date('Y,m,d H:i:s')
				);
			}		
			$this->db->insert_batch('anggota_tim',$data_2);
		}
		$this->session->set_flashdata('pesan2','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
	                      Data berhasil ditambahkan
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>');
		redirect('peserta/riwayat/index');
	}

}