<?php 

class Data_inovasi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show"  role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['subevent'] 			= $this->model_subevent->tampil_subevent()->result();
		$get_formulasi 	= $this->db->get('formulasi_nilai')->result_array();
		if($get_formulasi == null){
			$data['formulasi_nilai'] = 'kosong';
		}else{
			$data['formulasi_nilai'] = $get_formulasi;
		}
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/inovasi', $data);
		$this->load->view('templates_admin/footer');
	}

	// formulasi nilai * prosentase nilai *
	public function tambah_formulasi_nilai()
	{
		$id_subevent = $this->input->post('id_subevent');
		$nilai_makalah = $this->input->post('nilai_makalah');
		$nilai_substansi = $this->input->post('nilai_substansi');	

		$data = array(
			'id_subevent' => $id_subevent,
			'nilai_makalah' 	=> $nilai_makalah,
			'nilai_substansi_inovasi' => $nilai_substansi,
		);

		$this->db->insert('formulasi_nilai', $data);
		$this->session->set_flashdata('formulasi_nilai',
			'<script>
				Swal.fire("Sukses", "Data berhasil ditambahkan", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	public function edit_formulasi_nilai($id_formulasi)
	{
		$id_subevent = $this->input->post('id_subevent');
		$nilai_makalah = $this->input->post('nilai_makalah');
		$nilai_substansi = $this->input->post('nilai_substansi');	

		$data = array(
			'id_subevent' => $id_subevent,
			'nilai_makalah' 	=> $nilai_makalah,
			'nilai_substansi_inovasi' => $nilai_substansi,
		);

		$where = array('id_formulasi_nilai' => $id_formulasi);

		$this->db->update('formulasi_nilai', $data, $where);
		$this->session->set_flashdata('formulasi_nilai',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//indikator penilaian
	public function detail_inovasi($id_subevent) 
	{
		$data['id_subevent'] = $id_subevent;
		$data['subevent'] = $this->model_inovasi->ambil_id_subevent($id_subevent);
		$data['indikator_penilaian'] = $this->model_inovasi->ambil_id_inovasi($id_subevent);

		//cek usulan dinilai atau belum
		$getUsulan = $this->model_inovasi->getUsulan($id_subevent)->result_array();
		if($getUsulan != null){
			foreach($getUsulan as $subevent){
				$get_total_nilai = $this->model_inovasi->getTotalNilai()->result_array();
				foreach($get_total_nilai as $getTotalNilai){
					$TotalNilai[] = $getTotalNilai['id_usulan'];
				}
				$cek[] = in_array($subevent['id'], $TotalNilai);
				if($cek[0]){
					$data['hasil_cek'] = "ada";
				}else{
					$data['hasil_cek'] = "kosong";
				}
			}
		}else{
			$data['hasil_cek'] = "kosong";
		}
			
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_inovasi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_inovasi()
	{
		$id_subevent			= $this->input->post('id_subevent');
		$indikator				= $this->input->post('indikator');
		

		$data = array(
			'id_subevent' 	=> $id_subevent, 
			'indikator' 	=> $indikator,
		);

		$this->db->insert('indikator_penilaian', $data);

		$this->session->set_flashdata('indikator_penilaian',
			'<script>
				Swal.fire("Sukses", "Data berhasil ditambahkan", "success");
			</script>'
		);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus($id_indikator_penilaian)
	{
		$where = array('id_indikator_penilaian' => $id_indikator_penilaian);

		$this->db->delete('indikator_penilaian', $where);

		$this->session->set_flashdata('indikator_penilaian',
			'<script>
				Swal.fire("Sukses", "Data berhasil dihapus", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function update_indikator($id_indikator_penilaian)
	{ 
		$data = array(
			'indikator'	=> $this->input->post('indikator')
		);

		$where = array(
			'id_indikator_penilaian' => $id_indikator_penilaian
		);

		$this->db->update('indikator_penilaian', $data, $where);

		$this->session->set_flashdata('indikator_penilaian',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']); 
	}

	// keterangan indikator penilaian
	public function detail_indikator($id_subevent, $id_indikator_penilaian)
	{
		$data['indikator_penilaian'] = $this->model_inovasi->ambil_id_indikator($id_indikator_penilaian);
		$data['keterangan_indikator'] = $this->model_inovasi->ambil_id_keterangan($id_indikator_penilaian);

		//cek usulan dinilai atau belum
		$getUsulan = $this->model_inovasi->getUsulan($id_subevent)->result_array();
		if($getUsulan != null){
			foreach($getUsulan as $subevent){
				$get_total_nilai = $this->model_inovasi->getTotalNilai()->result_array();
				foreach($get_total_nilai as $getTotalNilai){
					$TotalNilai[] = $getTotalNilai['id_usulan'];
				}
				$cek[] = in_array($subevent['id'], $TotalNilai);
				if($cek[0]){
					$data['hasil_cek'] = "ada";
				}else{
					$data['hasil_cek'] = "kosong";
				}
			}
		}else{
			$data['hasil_cek'] = "kosong";
		}
		$data['id_subevent'] = $id_subevent;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_indikator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_keterangan()
	{
		$id_indikator_penilaian			= $this->input->post('id_indikator_penilaian');
		$keterangan						= $this->input->post('keterangan');
		$nilai_minimal_keterangan		= $this->input->post('nilai_minimal_keterangan');
		$nilai_maksimal_keterangan		= $this->input->post('nilai_maksimal_keterangan');

		$data = array(
			'id_indikator_penilaian' 		=> $id_indikator_penilaian, 
			'keterangan' 					=> $keterangan,
			'nilai_minimal_keterangan' 		=> $nilai_minimal_keterangan,
			'nilai_maksimal_keterangan' 	=> $nilai_maksimal_keterangan,
		);

		$this->db->insert('keterangan_indikator', $data);
		$this->session->set_flashdata('ket_nilai_indikator',
			'<script>
				Swal.fire("Sukses", "Data berhasil ditambahkan", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_keterangan($id_keterangan_indikator)
	{
		$where = array('id_keterangan_indikator' => $id_keterangan_indikator);
		$this->db->delete('keterangan_indikator' ,$where);
		$this->session->set_flashdata('ket_nilai_indikator',
			'<script>
				Swal.fire("Sukses", "Data berhasil dihapus", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function update($id_keterangan_indikator){ 
		$keterangan 						= $this->input->post('keterangan');
		$nilai_minimal	 					= $this->input->post('nilai_minimal');
		$nilai_maksimal 					= $this->input->post('nilai_maksimal');

		$data = array(
			'keterangan'					=> $keterangan,
			'nilai_minimal_keterangan' 		=> $nilai_minimal, 
			'nilai_maksimal_keterangan' 		=> $nilai_maksimal
			
		);

		$where = array(
			'id_keterangan_indikator' => $id_keterangan_indikator 
		);
		//echo "<pre>"; print_r($data); exit;
		$this->db->update('keterangan_indikator', $data, $where);
		$this->session->set_flashdata('ket_nilai_indikator',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>