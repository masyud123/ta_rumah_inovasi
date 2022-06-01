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

		$this->db->delete('usulan', $where1);
		$this->db->delete('anggota_tim', $where2);
		$this->db->delete('peserta', $where2);

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

	public function edit_riwayat1($id_peserta)
	{
		$data['pilih_bidang'] = $this->model_riwayat->pilih_bidang()->result_array();
		$data['detail_riwayat'] = $this->model_riwayat->tampil_detail_riwayat($id_peserta)->result_array();
		$data['tampil_bidang'] = $this->model_riwayat->tampil_bidang($id_peserta)->result_array();
		$data['nama_anggota'] = $this->model_riwayat->tampil_anggota($id_peserta)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat1', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function edit_riwayat2($id)
	{
		$data['detail_riwayat2'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat2', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function edit_riwayat3($id)
	{
		$data['detail_riwayat3'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat3', $data);
		$this->load->view('templates_peserta/footer');
	}
}	