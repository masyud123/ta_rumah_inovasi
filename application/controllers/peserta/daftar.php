<?php 

class Daftar extends CI_Controller{
	
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

	public function index()
	{
		$data['event']	= $this->model_bidang->tampil_event()->result();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/daftar', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function subevent($id) 
	{
	
		$data['subevent']	= $this->model_bidang->tampil_sub($id)->result();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/subevent', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function daftar($id_subevent)
	{
		$data['list_bidang'] = $this->model_bidang->tampil_bidang($id_subevent)->result();
		$data['subevent']	= $this->model_bidang->tampil_subevent($id_subevent);
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		// $this->load->view('peserta/form_wizard', $data);
		$this->load->view('peserta/form_pendaftaran', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function cek_form_1()
	{
		$judul				= $this->input->post('judul');
		$id_bidang			= $this->input->post('id_bidang');
		$kategori_peserta	= $this->input->post('kategori_peserta');
		$interaksi			= $this->input->post('interaksi');
		$nama_tim			= $this->input->post('nama_tim');
		$no_hp              = $this->input->post('no_hp');
		$nama_ketua			= $this->input->post('nama_ketua');
		$email_ketua		= $this->input->post('email_ketua');
		$alamat_ketua		= $this->input->post('alamat_ketua');
		$asal_sekolah		= $this->input->post('asal_sekolah');
		$ktp				= $_FILES['ktp']['name'];

		if($kategori_peserta != "" && $interaksi != "" && $judul != "" && $id_bidang != "" && $nama_ketua != "" && $email_ketua != "" && $no_hp != "" && $alamat_ketua != "" ){
			if(is_numeric($no_hp)){
				if (strlen(trim($no_hp)) < 10 || strlen(trim($no_hp)) > 13){
					echo 2; // jumlah angka lebih atau kurang
				}else{
					if(filter_var($email_ketua, FILTER_VALIDATE_EMAIL)) {
						if ($ktp != ""){
							$config['upload_path'] 		= './uploads';
							$config['allowed_types']   	= 'jpg|jpeg|png';
							$config['max_size'] 	  	= 5120; // max 5mb
							$config['file_name'] 		= md5($_FILES['ktp']['name']);

							$this->load->library('upload', $config);
							if($this->upload->check_format('ktp')){
								$nama_gambar = $this->upload->data()['file_name'];
								// echo $nama_gambar;
								if($kategori_peserta == 'umum'){
									if($interaksi == 'Individu'){
										echo 180701; // lanjut form 2
									}elseif($interaksi == 'Kelompok'){
										if($nama_tim != ""){
											foreach($_POST['nama_anggota'] as $key => $val){
												if(empty($_POST['nama_anggota'][$key])){
													echo 8; // nama anggota kosong
													return false;
												}else{
													$nama_anggota[]=['nama_anggota' => $_POST['nama_anggota'][$key]];
												}
											};
											echo 180701; // lanjut form 2
										}else{
											echo 7; // nama tim kosong
										}
									}
								}elseif($kategori_peserta == 'pelajar'){
									if($asal_sekolah != ""){
										if($interaksi == 'Individu'){
											echo 180701; //lanjut form 2
										}elseif($interaksi == 'Kelompok'){
											if($nama_tim != ""){
												foreach($_POST['nama_anggota'] as $key => $val){
													if(empty($_POST['nama_anggota'][$key])){
														echo 8; // nama anggota kosong
														return false;
													}else{
														$nama_anggota[]=['nama_anggota' => $_POST['nama_anggota'][$key]];
													}
												};
												echo 180701; // lanjut form 2
											}else{
												echo 7; // nama tim kosong
											}
										}
									}else{
										echo 6; // asal sekolah kosong
									}
								}
							} else {
								echo 5; // format foto tidak sesuai
							}
						}else{
							echo 4; // foto kosong
						}
					}else{
						echo 3; // format email tdk sesuai
					}
				}
			}else{
				echo 1; // ada string selain angka
			}
		}else{
			echo 0; //ada form kosong
		}
	}

	public function cek_form_2()
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

		if($latar_belakang != "" && $kondisi_sebelumnya != "" && $sasaran_n_tujuan != "" && $deskripsi != "" && $bahan_baku != "" && $cara_kerja != "" && $keunggulan != "" && $hasil_diharapkan != "" && $manfaat != "" && $rencana != ""){
			echo 180701; // lanjut form 3
		}else{
			echo 0; // ada form kosong
		}
	}

	public function cek_form_3()
	{
		$proposal = $_FILES['proposal']['name'];
		$jurnal = $_FILES['jurnal']['name'];
		$gambar = $_FILES['gambar']['name'];
		$link = $this->input->post('link_video');

		if($proposal == "" || $jurnal == "" || $gambar == "" || $link == ""){
			echo 1; return false; // ada form kosong
		}
		
		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$this->load->library('upload', $config);

		if(substr($proposal, -4) == ".pdf"){
			if(!$this->upload->check_format('proposal')){
				echo 2; return false; // format proposal tidak sesuai
			}
		}else{
			echo 2; return false; // format proposal tidak sesuai
		}

		if(substr($jurnal, -4) == ".pdf"){
			if(!$this->upload->check_format('jurnal')){
				echo 3;  return false; // format jurnal tidak sesuai
			}
		}else{
			echo 3;  return false; // format jurnal tidak sesuai
		}

		$format_gb = substr($jurnal, -4);
		if($format_gb == "jpeg" || ".jpg" || ".png"){
			if(!$this->upload->check_format('gambar')){
				echo 4; return false;// format gambar tidak sesuai
			}
		}else{
			echo 4; return false;// format gambar tidak sesuai
		}

		if (!filter_var($link, FILTER_VALIDATE_URL) === false) {
			echo 180701;
		} else {
			echo 5; // link video tidak valid
		}
	}
}
