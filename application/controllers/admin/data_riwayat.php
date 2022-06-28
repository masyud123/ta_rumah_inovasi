<?php 

class Data_riwayat extends CI_Controller{

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
		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/riwayat');
		$this->load->view('temp_data_table/footer');
	}	

	public function view($id_usulan) // view detail usulan di admin
	{
		$peserta = $this->db->get_where('peserta', ['id_usulan' => $id_usulan])->row();
        $data['anggota']    = $this->db->get_where('anggota_tim', ['id_peserta' => $peserta->id_peserta])->result_array();
        $data['bidang']     = $this->db->get_where('bidang', ['id' => $peserta->id_bidang])->row();
        $data['usulan']     = $this->Model_usulan->get_detail_usulan($id_usulan)->result_array();


		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/view_riwayat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function filter_tahun($param)
	{ 
		$data['usulan'] = $this->Model_usulan->get_data_tahun($param)->result();
		$data['pen_pp'] = $this->Model_usulan->penilaian_proposal()->result_array();

		$this->load->view('admin/riwayat_filter', $data);
	}
}
?>