<?php 

class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Penilai'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Anda belum login, Silahkan login
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar');
		$this->load->view('penilai/dashboard');
		$this->load->view('templates_penilai/footer');
	}
	
}

 ?>