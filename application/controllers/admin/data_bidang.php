<?php 
ob_start();
class Data_bidang extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
		error_reporting(0);
	}

	public function index()
	{
		$subevent = $this->Model_bidang2->get_subevent()->result_array();
		foreach($subevent as $subev):
			$jumlah[] = array(
				'id_subevent' 	=> $subev['id'],
				'aktif' 		=> count($this->Model_bidang2->get_bidang_aktif($subev['id'])->result_array()),
				'tdk_aktif' 	=> count($this->Model_bidang2->get_bidang_tdk_aktif($subev['id'])->result_array()),
			);
		endforeach;
		if($subevent != null){
			$data['jumlah'] 	= $jumlah;
		}else{
			$data['jumlah'] 	= [];
		}
		$data['subevent'] 	= $subevent;
		$data['bidang'] 	= $this->Model_bidang2->get_bidang()->result_array();
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/bidang', $data);
		$this->load->view('templates_admin/footer');
	} 

	public function tambah_bidang($id_subevent)
	{
		$bidang		= $this->input->post('bidang');
		$status		= $this->input->post('status');
	
		$data = array(
			'id_subevent' 	=> $id_subevent, 
			'bidang' 		=> $bidang, 
			'status' 		=> $status, 
		);
		
		$this->db->insert('bidang', $data);
		$this->session->set_flashdata('bidang',
			'<script>
				Swal.fire("Sukses", "Data berhasil ditambahkan", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function edit_bidang($id_bidang){ 
		$bidang		= $this->input->post('bidang');
		$status		= $this->input->post('status');
	
		$data = array(
			'bidang' 		=> $bidang, 
			'status' 		=> $status, 
		);
		$where = array('id' 	=> $id_bidang);
		//echo "<pre>"; print_r($data); exit;
		$this->db->update('bidang', $data, $where);
		$this->session->set_flashdata('bidang',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_bidang($id_bidang)
	{
		$where = array('id' => $id_bidang);
		$this->db->delete('bidang', $where);
		$this->session->set_flashdata('bidang',
			'<script>
				Swal.fire("Sukses", "Data berhasil dihapus", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>