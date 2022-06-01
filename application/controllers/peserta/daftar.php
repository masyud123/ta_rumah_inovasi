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
		$this->load->view('peserta/form_wizard', $data);
		// $this->load->view('peserta/form_pendaftaran', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function cek_form_1($id_subevent)
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

		// $data = [
		// 	'kategori_peserta'	=>	$kategori_peserta,
		// 	'interaksi'			=>	$interaksi,
		// 	'id_subevent'		=>	$id_subevent,
		// 	'judul'				=>	$judul,
		// 	'id_bidang'			=>	$id_bidang,
		// 	'nama_ketua'		=>	$nama_ketua,
		// 	'email_ketua'		=>	$email_ketua,
		// 	'no_hp'				=>	$no_hp,
		// 	'alamat_ketua'		=>	$alamat_ketua,
		// ];
		// echo json_encode($data);

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

}
