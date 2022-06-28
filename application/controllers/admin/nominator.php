<?php 

class Nominator extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
	}

	public function index()
	{
		$subevent = $this->Model_event->get_subevent()->result_array();
		if($subevent != null){
			foreach($subevent as $subev):
				$jml_pemenang 	= count($this->Model_event->get_usulan_join_penilaian_pemenang($subev['id'])->result_array());
				$pembagi 		= count($this->Model_event->get_nominator($subev['id'])->result_array()) * 
								count($this->Model_event->get_penilai($subev['id'])->result_array());

				if($jml_pemenang == 0){ $hasil = 0; }
				else{$hasil = $jml_pemenang/$pembagi*100;}

				$persen[] = array(
					'id' 			=> 	$subev['id'],
					'persen' 		=> 	$hasil,	
				);
			endforeach;
			$data['tampil_persen'] = $persen;
		}

		$data['tampil_subevent'] = $this->Model_event->get_subevent()->result_array();
		// echo "<pre>"; print_r($subevent);
		// exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');	
		$this->load->view('admin/penilaian_nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function daftar_nilai($id_subevent)
	{
		$usulan 				= $this->Model_verifikasi->usulan_nominator($id_subevent);
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id_usulan' => $usl->id_usulan,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->nama_ketua,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_nominator' => $this->Model_verifikasi->tot_nilai_nominator($usl->id_usulan),	
				'total' => $this->Model_verifikasi->total2($usl->id_usulan)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$usulan2 				= $this->Model_verifikasi->usulan_nominator3($id_subevent)->result();
		$var2 = [];
		foreach ($usulan2 as $usl2){
			$var2[] = [
				'id_usulan' => $usl2->id_usulan,
				'id_subevent' => $usl2->id_subevent,
				'user' => $usl2->nama_ketua,
				'judul' => $usl2->judul,
				'tahun' => $usl2->tahun,
				'kategori_peserta' => $usl2->kategori_peserta,
				'pemenang' => $usl2->pemenang,
				'nilai_nominator' => $this->Model_verifikasi->tot_nilai_nominator($usl2->id_usulan),	
				'total' => $this->Model_verifikasi->total2($usl2->id_usulan)->tot,
			];
		}
		$data['total_nilai2'] 	= $var2;

		$data['nama_subevent'] 	= $this->Model_verifikasi->nama_subevent($id_subevent)->result_array();
		$data['nama_penilai'] 	= $this->Model_verifikasi->get_nama_penilai($id_subevent)->result_array();
		$data['cek_umum'] 		= $this->Model_verifikasi->cek_umum($id_subevent)->result_array();
		$data['cek_pelajar'] 	= $this->Model_verifikasi->cek_pelajar($id_subevent)->result_array();
		$data['cek_jumlah_umum'] 	= $this->Model_verifikasi->cek_jumlah_umum($id_subevent)->result_array();
		$data['cek_jumlah_pelajar'] = $this->Model_verifikasi->cek_jumlah_pelajar($id_subevent)->result_array();
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penilaian_nominator2', $data);
		$this->load->view('templates_admin/footer');
	}

	public function simpan_rangking(){
		$created_by  = $this->session->userdata('id_usr');	
		foreach ($_POST['id_usulan'] as $key => $val) {
				$data[] = array( 				
					'id_usulan' 	=> $_POST['id_usulan'][$key],
					'id_subevent'	=> $_POST['id_subevent'][$key],
					'pemenang'	    => $_POST['pemenang'][$key],
					'created_date'  => date('Y-m-d H:i:s'),
					'created_by'    => $created_by
					);
			}
		$this->db->insert_batch('berita_acara_pemenang', $data);

		foreach($_POST['id_usulan'] as $key => $val) {
				$data2[] = array( 				
					'id_usulan'	=> $_POST['id_usulan'][$key],
					'status'	=> $_POST['status'],
					);
			}	
		$this->db->update_batch('nominator',$data2, 'id_usulan');

		foreach($_POST['id_usulan'] as $key => $val) {
			$data3[] = array( 				
				'id'	 => $_POST['id_usulan'][$key],
				'status' => 4,
				);
		}	
		$this->db->update_batch('usulan', $data3, 'id');

		$get_usulan	= $this->Model_nominator->get_usulan($_POST['id_subevent'][0])->result_array();
		$get_nominator 	= $this->Model_nominator->get_nominator($_POST['id_subevent'][0])->result_array();

		foreach($get_usulan as  $val1){ $data4[] = $val1['id']; }
		foreach($get_nominator as  $val2){ $data5[] = $val2['id_usulan']; }
		$data101 = array_diff($data4,$data5);

		if($data101 != null){
			foreach($data101 as $key => $val){
				$data6[] = array( 				
					'id'	 => $val,
					'status' => 4,
					);
			}
			$this->db->update_batch('usulan', $data6, 'id');
		}

		$this->session->set_flashdata('rangking_nominator',
			'<script type="text/JavaScript">  
				Swal.fire("Sukses","Perangkingan berhasil dilakukan","success")
			</script>'  
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
}

?>