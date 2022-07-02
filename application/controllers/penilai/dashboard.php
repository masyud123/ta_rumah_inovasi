<?php 
ob_start();
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
			redirect('Login');
		}
	}

	public function index()
	{
		$id_user    = $this->session->userdata('id_usr'); 
        $sql = $this->db->query("SELECT * FROM setting_penilai where id_usr ='$id_user'")->result(); 
        if (!$sql) {
			$this->load->view('templates_penilai/header');
			$this->load->view('templates_penilai/sidebar3');
			$this->load->view('penilai/kosong');
			$this->load->view('templates_penilai/footer');
        }else {
			$data['profil_user'] = $this->db->get_where('user', ['id_usr' => $this->session->userdata('id_usr')])->row(); 
			$this->load->view('templates_penilai/header');
			$this->load->view('templates_penilai/sidebar');
			$this->load->view('penilai/dashboard', $data);
			$this->load->view('templates_penilai/footer');
		}
	}
	
}

 ?>