<?php 

class Data_event extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['event'] = $this->model_event->tampil_data()->result();
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

		$this->model_event->tambah_event($data, 'event');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_event');
	}

	public function edit($id)
	{
		$where = array('id' =>$id);
		$data['event'] = $this->model_event->edit_event($where, 'event')->result();
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

		$this->model_event->update_event($where,$data, 'event');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_event'); 
	}
	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_event->hapus_event($where, 'event');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 60%;" role="alert"><i class="fas fa-trash-alt"></i>
  				Data berhasil dihapus!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_event');
	}
	
}

 ?>