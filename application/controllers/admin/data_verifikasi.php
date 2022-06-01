<?php 

class Data_verifikasi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$subevent = $this->model_event->get_subevent()->result_array();
		if($subevent != null){
			foreach($subevent as $subev):
				$jml_usulan = count($this->model_event->get_usulan_join_nilai_proposal($subev['id'])->result_array());
				$pembagi 	= count($this->model_event->get_usulan($subev['id'])->result_array()) * 
							count($this->model_event->get_penilai($subev['id'])->result_array());

				if($jml_usulan == 0){ $hasil = 0; }
				else{$hasil = $jml_usulan/$pembagi*100;}
					
				$persen[] = array(
					'id' 			=> 	$subev['id'],
					'persen' 		=> 	$hasil,	
				);
			endforeach;
			$data['tampil_persen'] = $persen;
		}

		$data['tampil_subevent'] = $this->model_event->get_subevent()->result_array();
		
		$this->load->view('templates_rangking/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi1', $data);
		$this->load->view('templates_rangking/footer');
	}

	public function daftar_nilai($id_subevent)
	{
		// get niali sebelum nominasi
		$usulan 				= $this->model_verifikasi->usulan_verifikasi($id_subevent);
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'subevent' => $usl->subevent,
				'alamat_ketua' => $usl->alamat_ketua,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
				'total' => $this->model_verifikasi->total($usl->id)->tot,
			];
		}
		$data['total_nilai'] = $var;

		// get nilai setelah nominasi dipilih 
		$usulan2				= $this->model_verifikasi->usulan_setelah_verifikasi($id_subevent)->result();
		$var2 = [];
		foreach ($usulan2 as $usl2){
			$var2[] = [
				'id' => $usl2->id,
				'id_subevent' => $usl2->id_subevent,
				'user' => $usl2->user,
				'judul' => $usl2->judul,
				'tahun' => $usl2->tahun,
				'subevent' => $usl2->subevent,
				'alamat_ketua' => $usl2->alamat_ketua,
				'kategori_peserta' => $usl2->kategori_peserta,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl2->id),
				'total' => $this->model_verifikasi->total($usl2->id)->tot,
			];
		}
		$data['nilai_total'] = $var2;

		$data['nama_subevent'] 		= $this->model_verifikasi->nama_subevent($id_subevent)->result_array();
		$data['data_nominator'] 	= $this->model_verifikasi->ambil_data_nominator()->result_array();
		$data['nama_penilai']		= $this->model_verifikasi->get_nama_penilai($id_subevent)->result_array();
		$data['cek_status_pelajar'] = $this->model_verifikasi->get_usulan_pelajar_status_2($id_subevent)->result_array();
		$data['cek_status_umum'] 	= $this->model_verifikasi->get_usulan_umum_status_2($id_subevent)->result_array();
		//echo "<pre>"; print_r($data);exit;
		$this->load->view('templates_rangking/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi2', $data);
		$this->load->view('templates_rangking/footer');
	}

	public function list_verifikasi(){ 
		if ($_POST['urutan_nilai'] == null) {
			$this->session->set_flashdata('nominator_kopong',
                            '<script type ="text/JavaScript">  
                            swal("Informasi","Data yang akan disimpan belum terpilih","info")  
                            </script>'  
                    );
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			//checkbox
			foreach ($_POST['urutan_nilai'] as $list => $val):
				$usl_idsub 			= $_POST['urutan_nilai'][$list];
				$id_usulan 		= strstr($usl_idsub, '_', true);
				$id_subevent 	= substr($usl_idsub, strpos($usl_idsub, "_") + 1);

				$data[] = array( 				
						'id_usulan'	    => $id_usulan,
						'id_subevent'	=> $id_subevent,
						'status'		=> 1,
						'created_date'	=> date('Y-m-d H:i:s'),
						'created_by'	=> $this->session->userdata('id_usr'),
				);
				
			endforeach;
			
			$this->db->insert_batch('nominator', $data);

			//update status usulan
			foreach ($_POST['semua_nilai'] as $key => $val):
				$data2[] = array( 				
						'id'	    => $_POST['semua_nilai'][$key],
						'status'	=> ('3'),
						);
			endforeach;
			
			$this->db->update_batch('usulan', $data2, 'id');
			$this->session->set_flashdata('nominator_kopong',
                            '<script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil disimpan","success")  
                            </script>'  
                    );
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	// public function slolo()
	// {
	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/verifikasi');
	// 	$this->load->view('templates_admin/footer');
	// }

	// public function umum()
	// {

	// 	$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan = $this->model_verifikasi->usulan_umum();

	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id' => $usl->id,
	// 			'user' => $usl->user,

	// 			'judul' => $usl->judul,
	// 			'tahun' => $usl->tahun,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
	// 			'total' => $this->model_verifikasi->total($usl->id),
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;

	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/verifikasi_umum', $data);
	// 	$this->load->view('templates_admin/footer');
	// 		// echo "<pre>";
	// 		// echo print_r($data);exit;
	// }

	// public function pelajar()
	// {
		
	// 	$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan = $this->model_verifikasi->usulan_pelajar();
		
	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id' => $usl->id,
	// 			'user' => $usl->user,
	// 			'judul' => $usl->judul,
	// 			//'tot' => $usl->tot,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
	// 			'total' => $this->model_verifikasi->total($usl->id),
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;

	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/verifikasi_pelajar', $data);
	// 	$this->load->view('templates_admin/footer');
	// 	// echo "<pre>";
	// 	// echo print_r($data);exit;
	// }

	// public function cari_umum(){

	// 	$cari = $this->input->post('cari_umum');
	// 	$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan = $this->model_verifikasi->cari_umum($cari);

	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id' => $usl->id,
	// 			'user' => $usl->user,
	// 			'judul' => $usl->judul,
	// 			'tahun' => $usl->tahun,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
	// 			'total' => $this->model_verifikasi->total($usl->id),
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;

	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/verifikasi_umum', $data);
	// 	$this->load->view('templates_admin/footer');
	// }
      
	// public function cari_pelajar(){

	// 	$cari2 = $this->input->post('cari_pelajar');
	// 	$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan = $this->model_verifikasi->cari_pelajar($cari2);

	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id' => $usl->id,
	// 			'user' => $usl->user,
	// 			'judul' => $usl->judul,
	// 			'tahun' => $usl->tahun,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
	// 			'total' => $this->model_verifikasi->total($usl->id),
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;
	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/verifikasi_pelajar', $data);
	// 	$this->load->view('templates_admin/footer');
	// }

//TAB VIEW

	// public function cetak_umum(){
	// 	$this->load->library('dompdf_gen');

	// 	$ket_nilai 				= $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan 				= $this->model_verifikasi->usulan_verifikasi2();
	// 	$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id' => $usl->id,
	// 			'user' => $usl->user,
	// 			'judul' => $usl->judul,
	// 			'tahun' => $usl->tahun,
	// 			'subevent' => $usl->subevent,
	// 			'alamat_ketua' => $usl->alamat_ketua,
	// 			'kategori_peserta' => $usl->kategori_peserta,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),	
	// 			'total' => $this->model_verifikasi->total($usl->id)->tot,
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;

	// 	$this->load->view('laporan/laporan_verifikasi_umum', $data);

	// 	$paper_size 	= 'F4';
	// 	$orientation 	= 'portrait';
	// 	$html 			= $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("cetak_verifikasi_umum.pdf", array('Attachment' =>0)); 

	// }

	// public function cetak_pelajar(){
	// 	$this->load->library('dompdf_gen');

	// 	$ket_nilai 				= $this->model_verifikasi->tot_nilai_verifikasi(2);
	// 	$usulan 				= $this->model_verifikasi->usulan_verifikasi2();
	// 	$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
	// 	$data['tim_penilai']	= $this->model_verifikasi->tim_penilai();
	// 	$var = [];
	// 	foreach ($usulan as $usl){
	// 		$var[] = [
	// 			'id'               => $usl->id,
	// 			'user'             => $usl->user, 
	// 			'judul'            => $usl->judul,
	// 			'tahun'            => $usl->tahun,
	// 			'subevent'         => $usl->subevent,
	// 			'alamat_ketua'     => $usl->alamat_ketua,
	// 			'asal_sekolah'     => $usl->asal_sekolah,
	// 			'kategori_peserta' => $usl->kategori_peserta,
	// 			'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),	
	// 			'total'            => $this->model_verifikasi->total($usl->id)->tot,
	// 		];
	// 	}
	// 	$data['total_nilai'] = $var;

	// 	$this->load->view('laporan/laporan_verifikasi_pelajar', $data);

	// 	$paper_size 	= 'F4';
	// 	$orientation 	= 'portrait';
	// 	$html 			= $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("cetak_verifikasi_pelajar.pdf", array('Attachment' =>0)); 

	// }	

	// public function simpan_umum(){

	// 	$created_by  = $this->session->userdata('nama');
	// 	$rank = 1;
	// 	$data = array();
	// 	foreach ($_POST['id_usulan'] as $key => $val) {
	// 			$data[] = array( 				
	// 				'id_usulan'	    => $_POST['id_usulan'][$key],
	// 				'id_subevent'	=> $_POST['id_subevent'][$key],
	// 				'status'	    => $_POST['sts1'],
	// 				'urutan'		=> $rank++,
	// 				'tahun'	        => date('Y'),
	// 				'created_date'  => date('Y-m-d H:i:s'),
	// 				'created_by'    => $created_by
	// 				);
	// 		}
	// 	$this->db->insert_batch('nominator', $data);

	
	// 	$data2 = array();
	// 	foreach ($_POST['id_usulan'] as $key => $val) {
	// 			$data2[] = array( 				
	// 				'id'	=> $_POST['id_usulan'][$key],
	// 				'status'	=> $_POST['status1'],
	// 				);
	// 		}	
	// 	$this->db->update_batch('usulan',$data2, 'id');

	// }

	// public function simpan_pelajar(){

	// 	$created_by  = $this->session->userdata('nama');
	// 	$rank2 = 1;
	// 	$data = array();
	// 	foreach ($_POST['id_usulan2'] as $key => $val) {
	// 			$data[] = array( 				
	// 				'id_usulan'		=> $_POST['id_usulan2'][$key],
	// 				'id_subevent'	=> $_POST['id_subevent2'][$key],
	// 				'status'		=> $_POST['sts2'],
	// 				'urutan'		=> $rank2++,
	// 				'tahun'			=> date('Y'),
	// 				'created_date'  => date('Y-m-d H:i:s'),
	// 				'created_by'    => $created_by
	// 				);
	// 		}
	// 	$this->db->insert_batch('nominator', $data);


	// 	$data2 = array();
	// 	foreach ($_POST['id_usulan2'] as $key => $val) {
	// 			$data2[] = array( 				
	// 				'id'	=> $_POST['id_usulan2'][$key],
	// 				'status'	=> $_POST['status2'],
	// 				);
	// 		}	

	// 	$this->db->update_batch('usulan',$data2, 'id');
	// }
}

?>