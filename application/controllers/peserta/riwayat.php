<?php 

class Riwayat extends CI_Controller{
	
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
		$data2 = $this->model_riwayat->tampil_riwayat();
		foreach ($data2 as $data3):
			$var[] = array(
				'id_usulan' => $data3->id_usulan,
				'ulasan' 	=> $this->db->get_where('ulasan_usulan', array('id_usulan' => $data3->id_usulan))->result(),
				'nilai_verif' 	=> $this->db->get_where('total_nilai', array('id_usulan' => $data3->id_usulan))->result(),
				'nilai_nomin' 	=> $this->db->get_where('total_nilai_pemenang', array('id_usulan' => $data3->id_usulan))->result(),
			);
		endforeach;
		if($data2 != null){
			$data['nilai_ulasan'] = $var;
		}else{
			$data['nilai_ulasan'] = array(); 
		}
		$data['riwayat'] = $this->model_riwayat->tampil_riwayat();
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/tampil_riwayat', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function hapus_usulan()
	{
		$id 	= $this->input->post('id');
		$id_usulan 		= strstr($id, '_', true);
		$id_peserta 	= substr($id, strpos($id, "_") + 1);

		$where1 	= array('id'	=>	$id_usulan);
		$where2 	= array('id_peserta'	=>	$id_peserta);

		$peserta 	= $this->db->get_where('peserta', $where2)->row();
		unlink('./uploads/'.$peserta->ktp);

		$usulan 	= $this->db->get_where('usulan', $where1)->row();
		unlink('./uploads/'.$usulan->proposal);
		unlink('./uploads/'.$usulan->jurnal);
		unlink('./uploads/'.$usulan->gambar);
		
		$this->db->delete('anggota_tim', $where2);
		$this->db->delete('peserta', $where2);
		$this->db->delete('usulan', $where1);

		$this->session->set_flashdata('pesan1',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			<script type ="text/JavaScript">  
				swal("Sukses","Data usulan berhasil Dihapus","success")  
			</script>'  
		);
		redirect('peserta/riwayat/index'); 
	}

	public	function update_status_usulan()
	{
		$id 	 		= $this->input->post('id');
		$status 		= $this->input->post('status');

		$data = array('status'		=>	$status);

		$where = array('id'	=>	$id);

		$this->model_riwayat->update_status_riwayat($where,$data, 'usulan');
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
	                      Data berhasil dikirim
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>');
		redirect('peserta/riwayat/'); 
	}

	public function detail_riwayat($id_peserta)
	{
		$peserta = $this->model_riwayat->tampil_detail_riwayat($id_peserta)->result_array();
		foreach($peserta as $serta):
			$data['list_bidang'] 	= $this->model_bidang->tampil_bidang($serta['id_subevent'])->result_array();
			$data['list_anggota']	= $this->db->get_where('anggota_tim', ['id_peserta' => $serta['id_peserta']])->result_array();
			$data['id_peserta']		= $serta['id_peserta'];
			$data['id_usulan']		= $serta['id_usulan'];
		endforeach;
		$data['data_usulan'] = $peserta;
		// echo json_encode($data); exit; 
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_form_riwayat', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function cek_riwayat_1()
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
		$ktp2				= $this->input->post('ktp2');

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
							if($ktp2 != ""){
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
							}else{
								echo 4; // foto kosong
							}
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

	public function cek_riwayat_2()
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

	public function cek_riwayat_3()
	{
		$proposal 	= $_FILES['proposal']['name'];
		$jurnal 	= $_FILES['jurnal']['name'];
		$gambar 	= $_FILES['gambar']['name'];
		$link 		= $this->input->post('link_video');
		$proposal2 	= $this->input->post('proposal2');
		$jurnal2 	= $this->input->post('jurnal2');
		$gambar2 	= $this->input->post('gambar2');
		
		$config['upload_path'] 		= './uploads';
		$config['allowed_types']   	= 'pdf|jpg|jpeg|png';
		$config['max_size'] 	  	= 5120; // max 5mb
		$this->load->library('upload', $config);

		if($proposal2 == ""){
			if(substr($proposal, -4) == ".pdf"){
				if(!$this->upload->check_format('proposal')){
					echo 2; return false; // format proposal tidak sesuai
				}
			}else{
				echo 2; return false; // format proposal tidak sesuai
			}
		}

		if($jurnal2 == ""){
			if(substr($jurnal, -4) == ".pdf"){
				if(!$this->upload->check_format('jurnal')){
					echo 3;  return false; // format jurnal tidak sesuai
				}
			}else{
				echo 3;  return false; // format jurnal tidak sesuai
			}
		}

		if($gambar2 == ""){
			$format_gb = substr($gambar, -4);
			if($format_gb == "jpeg" || $format_gb == ".jpg" || $format_gb == ".png"){
				if(!$this->upload->check_format('gambar')){
					echo 4; return false;// format gambar tidak sesuai
				}
			}else{
				echo 4; return false;// format gambar tidak sesuai
			}
			echo $this->upload->data('file_name');
		}

		if (!filter_var($link, FILTER_VALIDATE_URL) === false) {
			echo 180701;
		} else {
			echo 5; // link video tidak valid
		}
	}





	// public function edit_riwayat1($id_peserta)
	// {
	// 	$data['pilih_bidang'] = $this->model_riwayat->pilih_bidang()->result_array();
	// 	$data['detail_riwayat'] = $this->model_riwayat->tampil_detail_riwayat($id_peserta)->result_array();
	// 	$data['tampil_bidang'] = $this->model_riwayat->tampil_bidang($id_peserta)->result_array();
	// 	$data['nama_anggota'] = $this->model_riwayat->tampil_anggota($id_peserta)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat1', $data);
	// 	$this->load->view('templates_peserta/footer');
	// }

	// public function edit_riwayat2($id)
	// {
	// 	$data['detail_riwayat2'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat2', $data);
	// 	$this->load->view('templates_peserta/footer');
	// }

	// public function edit_riwayat3($id)
	// {
	// 	$data['detail_riwayat3'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat3', $data);
	// 	$this->load->view('templates_peserta/footer');
	// }
}	