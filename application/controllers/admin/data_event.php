<?php 
ob_start();
class Data_event extends CI_Controller{
	
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
		$data['event'] = $this->Model_event->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/event', $data);
		$this->load->view('templates_admin/footer');
		
	}

	public function tambah_event()
	{
		$event		= $this->input->post('event');
	
		$data = array(
			'event' 		=> $event, 
		);

		$this->Model_event->tambah_event($data, 'event');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Data_event');
	}

	public function edit($id)
	{
		$where = array('id' =>$id);
		$data['event'] = $this->Model_event->edit_event($where, 'event')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_event', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 		= $this->input->post('id');
		$event 			= $this->input->post('event');

		$data = array(
			'event' 		=> $event 
		);

		$where = array(
			'id' => $id 
		);

		$this->Model_event->update_event($where,$data, 'event');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Data_event'); 
	}
	public function hapus($id)
	{
		$sql = $this->db->query("SELECT id_subevent FROM bidang where id_subevent='$id'");
		$cek_data = $sql->num_rows();
		if ($cek_data > 0 ) {
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" style="width: 100%;" role="alert"><i class="fas fa-trash-alt"></i>
					Data event tidak bisa dihapus karena terhubung dengan subevent!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/Data_event');
		}else{
			$where = array('id' => $id);
			$this->Model_event->hapus_event($where, 'event');
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 60%;" role="alert"><i class="fas fa-trash-alt"></i>
					Data berhasil dihapus!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/Data_event');
		}
	}
	
}

 ?>