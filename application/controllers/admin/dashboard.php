<?php 
ob_start();
class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Anda belum login, Silahkan login
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
			redirect('Login');
		}
	}

	public function index()
	{
		$data['event'] 		= count($this->db->get('event')->result());
		$data['subevent']	= count($this->db->get('subevent')->result());
		$data['pengumuman']	= count($this->db->get('pengumuman')->result());
		$data['peserta'] 	= count($this->db->get_where('user', ['hak_akses' => 'Peserta'])->result());
		$data['penilai'] 	= count($this->db->get_where('user', ['hak_akses' => 'Penilai'])->result());
		$data['usulan'] 	= count($this->db->get_where('usulan', ['status!=' => 1])->result());

		// data grafik usulan
		$data['gr_usulan'] = $this->Model_user->get_usulan();
		// data grafik peserta
		$data['gr_peserta'] = $this->Model_user->get_peserta();
		// data grafik penilai
		$data['gr_penilai'] = $this->Model_user->get_penilai();

		$kondisi = $this->Model_user->get_kode_qr();
		if($kondisi->message == 'AUTHENTICATED'){
			$this->session->set_userdata('whatsapp', 'Terhubung');
		}else{
			$this->session->set_userdata('whatsapp', 'Terputus');
		}
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}	
}
