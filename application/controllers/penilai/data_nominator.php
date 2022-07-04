<?php
ob_start();
class Data_nominator extends CI_Controller
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
		error_reporting(0);
	}

	public function index()
	{
		$sbevent 	= $this->Model_verifikasi->ambil_id_subevent_penilai()->result();
		foreach($sbevent as $s_event):
			$data['usulan'] = $this->Model_verifikasi->ambil_usulan_nominator($s_event->id_subevent);
			$data['jumlah_usulan'] = $this->Model_verifikasi->jumlah_usulan($s_event->id_subevent);
		endforeach;
		$data['jumlah_usulan2'] = $this->Model_verifikasi->jumlah_usulan2();
		$data['ganti_warna2'] 	= $this->Model_verifikasi->ganti_warna2();
		
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar', $data);
		$this->load->view('penilai/nominator', $data);
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
		$this->load->view('penilai/view_usulan_nominator', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function nilai_nominator($id)
	{
		$data['usulan']    = $this->Model_penilaian->ambil_id_usulan($id);
		$subevent 	       = $this->Model_penilaian->ambil_id_subevent2($id);
		$data['komponen']  = $this->Model_penilaian->ambil_komponen($subevent->id_subevent);
		$data['lihat']     = $this->Model_verifikasi->ambil_usulan_nominator($subevent->id_subevent);
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/nilai_nominator', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
		// Tb Total Nilai Nominator
		$nilai_nominator 	= $this->input->post('nilai_nominator');
		$id_usulan        	= $this->input->post('id_usulan');
		$penilai		= $this->session->userdata('id_usr');
		$data = array(
			'nilai_nominator'   => $nilai_nominator,
			'id_usulan'         => $id_usulan,
			'id_penilai' 		=> $penilai,
			'created_date'      => date('Y-m-d H:i:s'),
		);
		$this->Model_penilaian->simpan_total_nilai2($data, 'total_nilai_pemenang');

		// Tb Penilaian Pemenang
		$data = array();
		foreach ($_POST['nilai'] as $key => $val) {
			$data[] = array( 				
				'nilai' 		=> $_POST['nilai'][$key],
				'id_indikator' 	=> $_POST['indikator'][$key],
				'id_usulan'		=> $id_usulan,
				'id_penilai' 	=> $penilai,
			);		
		}		
		$this->db->insert_batch('penilaian_pemenang',$data);

		$this->session->set_flashdata('message_nominator','<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type ="text/JavaScript">  
            swal("Sukses","Nilai berhasil disimpan","success")  
            </script>' );
		redirect('penilai/Data_nominator');
	}

	public function edit_nilai_nominator($id)
	{
		$data['usulan']    				= $this->Model_penilaian->ambil_id_usulan($id);
		$subevent 	       				= $this->Model_penilaian->ambil_id_subevent2($id);
		$data['komponen']         		= $this->Model_penilaian->ambil_komponen($subevent->id_subevent);
		$data['lihat']     				= $this->Model_verifikasi->ambil_usulan_nominator($subevent->id_subevent);
		$data['penilaian_nominator'] 	= $this->Model_verifikasi->ambil_penilaian_nominator($id)->result_array();
		$data['total_nilai_nominator'] 	= $this->Model_verifikasi->ambil_total_nilai_nominator($id)->result_array();
		
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/edit_nilai_nominator', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function update_nilai_nominator()
	{
		date_default_timezone_set('Asia/Jakarta');
		// tb Penilaian pemenang
		foreach ($_POST['nilai'] as $i => $jml) {
			$data[] = array( 				
				'nilai'	=> $_POST['nilai'][$i],
				'id' 	=> $_POST['id_penilaian_nominator'][$i],
			);		
		} 
		$this->db->update_batch('penilaian_pemenang', $data, 'id');

		// tb Total nilai pemenang
		$nilai_nominator 			= $this->input->post('nilai_nominator');
		$id_total_nilai_nominator 	= $this->input->post('id_total_nilai_nominator');

		$data2 = array(
			'nilai_nominator' 	=> $nilai_nominator,
			'updated_date' 		=> date('Y-m-d H:i:s'),
		);
		$where2 = array('id_total_nilai_pemenang' => $id_total_nilai_nominator);

		$this->db->update('total_nilai_pemenang', $data2, $where2);

		$this->session->set_flashdata('message_nominator', 
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type ="text/JavaScript">  
            swal("Sukses","Nilai berhasil diupdate","success")  
            </script>'  
        );
		redirect('penilai/Data_nominator');
	}
}