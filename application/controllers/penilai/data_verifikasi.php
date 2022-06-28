<?php

class Data_verifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 'Penilai') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
        $id_user    = $this->session->userdata('id_usr'); 
        $sql = $this->db->query("SELECT * FROM setting_penilai where id_usr ='$id_user'")->result(); 
        if (!$sql) {
          	redirect('penilai/Data_verifikasi/kosong');
        }else {
			$data['idSubevent'] 	= $this->Model_verifikasi->ambil_id_subevent_penilai()->result();
			$data['usulan'] 		= $this->Model_verifikasi->ambil_usulan()->result();
			$data['jumlah_usulan2'] = $this->Model_verifikasi->jumlah_usulan2();
			$data['ganti_warna']	= $this->Model_verifikasi->ganti_warna()->result_array();
			
			$this->load->view('templates_penilai/header');
			$this->load->view('templates_penilai/sidebar', $data);
			$this->load->view('penilai/verifikasi', $data);
			$this->load->view('templates_penilai/footer');
		}
	}
 
	public function kosong()
	{		
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar3');
		$this->load->view('penilai/kosong');
		$this->load->view('templates_penilai/footer');
	}

	public function view($id_usulan)
	{
		$peserta = $this->db->get_where('peserta', ['id_usulan' => $id_usulan])->row();
        $data['anggota']    = $this->db->get_where('anggota_tim', ['id_peserta' => $peserta->id_peserta])->result_array();
        $data['bidang']     = $this->db->get_where('bidang', ['id' => $peserta->id_bidang])->row();
        $data['usulan']     = $this->Model_usulan->get_detail_usulan($id_usulan)->result_array();
		$data['ulasan'] 	= $this->Model_usulan->get_ulasan($id_usulan)->result();
		$data['id_usulan']	= $id_usulan;
		
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/view_usulan_verifikasi', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function beri_ulasan($id_usulan)
	{
		$id_ulasan  = $this->input->post('id_ulasan');
		$ulasan 	= $this->input->post('ulasan');
		$id_penilai = $this->session->userdata('id_usr');

		if($id_ulasan == null){
			// Tambah Ulasan
			$data = array(
				'id_usulan'  => $id_usulan,
				'id_penilai' => $id_penilai,
				'ulasan' 	 => $ulasan,
			);
			
			$this->db->insert('ulasan_usulan', $data);
			$this->session->set_flashdata('ulasan', 
				'<script type ="text/JavaScript">  
					Swal.fire("Sukses","Ulasan berhasil ditambahkan","success")  
				</script>'  
			);
			redirect('penilai/Data_verifikasi/view/'.$id_usulan);
		}else{
			// Edit Ulasan
			$data = array(
				'ulasan' 	 => $ulasan,
				'id_penilai' => $id_penilai,
			);
			$where = array('id_ulasan' => $id_ulasan);
			
			$this->db->update('ulasan_usulan', $data, $where);
			$this->session->set_flashdata('ulasan', 
				'<script type ="text/JavaScript">  
					Swal.fire("Sukses","Ulasan berhasil diupdate","success")  
				</script>'  
			);
			redirect('penilai/Data_verifikasi/view/'.$id_usulan);
		}
		
	}

	public function nilai_verifikasi($id)
	{
	
		$data['usulan']    = $this->Model_penilaian->ambil_id_usulan($id);
		$subevent 	       = $this->Model_penilaian->ambil_id_subevent2($id);
		$indikator         = $this->Model_penilaian->ambil_id_indikator($subevent->id_subevent); //error
		
		//NILAI MAKSIMAL
		$indikatorPenilaian = $this->Model_penilaian->get_IndikatorPenilaian($subevent->id_subevent)->result_array();
		
		foreach($indikatorPenilaian as $indPenilaian){
			$max_nilai = $this->Model_penilaian->get_KeteranganIndikator($indPenilaian['id_indikator_penilaian'])->result_array();
				foreach($max_nilai as $nilai_max){
					$nilai[] = [
						'nilai_max' 	=> $nilai_max['nilai_max_ind'],
						'id_indikator' 	=> $nilai_max['id_indikator_penilaian'],
					];
				}
		}
		$data['nilai_maksimal'] = $nilai;

		//FORMULASI NIALI
		$data['formulasi'] = $this->db->get_where('formulasi_nilai', array('id_subevent' => $subevent->id_subevent))->result_array();
		
		//INDIKATOR & KETERANGAN
		$var = [];
		foreach ($indikator as $idk){ 
			$var[] = [
				'id' => $idk->id_indikator_penilaian,
				'label_indikator' => $idk->indikator,
				'ket' => $this->Model_penilaian->ambil_keterangan($idk->id_indikator_penilaian),
			];
		}
		$data['indikator_keterangan'] = $var;
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/nilai_verifikasi', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function simpan()
	{
		//NILAI PROPOSAL
		$nilai_proposal 	= $this->input->post('nilai_proposal');
		$id_usulan		    = $this->input->post('id_usulan');
		$id_penilai		    = $this->session->userdata('id_usr');
		$data1 = array(
			'nilai_proposal'	=> $nilai_proposal,
			'id_usulan'  		=> $id_usulan, 
			'id_penilai' 		=> $id_penilai,
		);
		$this->Model_penilaian->simpan_nilai_proposal($data1, 'penilaian_proposal');

		//TOTAL NILAI
		$nilai_verifikasi = $this->input->post('nilai_verifikasi');
		$data2 = array(
			'nilai_verifikasi'  => $nilai_verifikasi,
			'id_usulan'         => $id_usulan, 
			'created_date'      => date('Y-m-d H:i:s'),
			'id_penilai'        => $id_penilai,
		);
		$this->Model_penilaian->simpan_total_nilai($data2, 'total_nilai');

		//PENILAIAN USULAN
		$data = array();
		foreach ($_POST['nilai'] as $key => $val) {
			$data[] = array( 				
				'nilai' 		=> $_POST['nilai'][$key],
				'id_indikator' 	=> $_POST['indikator'][$key],
				'id_penilai' 	=> $id_penilai,
				'usulan_id' 	=> $id_usulan,
			);		
		}		
		$this->db->insert_batch('penilaian_usulan',$data);
		// exit;
		$this->session->set_flashdata('message', 
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type ="text/JavaScript">  
            	Swal.fire("Sukses","Nilai berhasil disimpan","success")  
            </script>'  
        );
		redirect('penilai/Data_verifikasi');
	}

	public function edit_nilai_verifikasi($id)
	{
		$data['usulan']    = $this->Model_penilaian->ambil_id_usulan($id);
		$subevent 	       = $this->Model_penilaian->ambil_id_subevent2($id);
		$indikator         = $this->Model_penilaian->ambil_id_indikator($subevent->id_subevent); //error

		//NILAI MAKSIMAL
		$indikatorPenilaian = $this->Model_penilaian->get_IndikatorPenilaian($subevent->id_subevent)->result_array();
		
		foreach($indikatorPenilaian as $indPenilaian){
			$max_nilai = $this->Model_penilaian->get_KeteranganIndikator($indPenilaian['id_indikator_penilaian'])->result_array();
				foreach($max_nilai as $nilai_max){
					$nilai[] = [
						'nilai_max' 	=> $nilai_max['nilai_max_ind'],
						'id_indikator' 	=> $nilai_max['id_indikator_penilaian'],
					];
				}
		}
		$data['nilai_maksimal'] = $nilai;

		//FORMULASI NIALI
		$data['formulasi'] = $this->db->get_where('formulasi_nilai', array('id_subevent' => $subevent->id_subevent))->result_array();

		//INDIKATOR & KETERANGAN
		$var = [];
		foreach ($indikator as $idk){
			$var[] = [
				'id' => $idk->id_indikator_penilaian,
				'label_indikator' => $idk->indikator,
				'ket' => $this->Model_penilaian->ambil_keterangan($idk->id_indikator_penilaian),
			];
		}
		$data['indikator_keterangan'] = $var;

		$data['penilaian_proposal'] = $this->Model_verifikasi->ambil_nilai_proposal($id)->result_array();
		$data['penilaian_usulan']	= $this->Model_verifikasi->ambil_nilai_usulan($id)->result_array();
		$data['total_nilai']		= $this->Model_verifikasi->ambil_total_nilai($id)->result_array();
		
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/edit_nilai_verifikasi', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function update_nilai_verifikasi()
	{
		// Nilai proposal
		$id_penilaian_proposal 	= $this->input->post('id_penilaian_proposal');
		$nilai_proposal 		= $this->input->post('nilai_proposal');

		$data2 		= array('nilai_proposal' 	=> $nilai_proposal);
		$where2 	= array('id' 				=> $id_penilaian_proposal);
		$this->db->update('penilaian_proposal', $data2, $where2);


		// Nilai Total usulan dan proposal
		$nilai_verifikasi 		= $this->input->post('nilai_verifikasi');
		$id_total_nilai 		= $this->input->post('id_total_nilai');

		$data3 		= array(
			'nilai_verifikasi' 	=> $nilai_verifikasi,
			'updated_date' 		=> date('Y-m-d H:i:s'),
		);
		$where3 	= array('id' => $id_total_nilai);
		$this->db->update('total_nilai', $data3, $where3);


		// Penilaian usulan 
		$nilai 					= $this->input->post('nilai');
		$id_penilaian_usulan 	= $this->input->post('id_penilaian_usulan');

		$data = array();
		for($i=0; $i<count($nilai); $i++){
			$data[] 	= array(
				'nilai' 		=> $nilai[$i],
				'id'			=> $id_penilaian_usulan[$i],
			);
		}
		for($i=0; $i<count($data); $i++){
			$this->db->update_batch('penilaian_usulan', $data, 'id');
		}

		$this->session->set_flashdata('message', 
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type ="text/JavaScript">  
            swal("Sukses","Nilai berhasil diupdate","success")  
            </script>'  
        );
		redirect('penilai/Data_verifikasi');
	}
}
