<?php 

class Data_riwayat extends CI_Controller{

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
		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/riwayat');
		$this->load->view('temp_data_table/footer');
	}	

	public function view($id) // view detail usulan di admin
	{
		$where = array('id' =>$id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/view_riwayat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function edit($id) // view edit usulan di admin
	{
		$where = array('id' =>$id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_riwayat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update() // update status usulan oleh admin
	{ 
		$id 	= $this->input->post('id');
		$status	= $this->input->post('status');

		$data	= ['status' => $status];
		$where	= ['id' => $id];

		$this->model_usulan->update_riwayat($where,$data, 'usulan');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_riwayat'); 
	}

	public function filter_tahun($param)
	{ 
		$data['usulan'] = $this->model_usulan->get_data_tahun($param)->result();
		$data['pen_pp'] = $this->model_usulan->penilaian_proposal()->result_array();

		$this->load->view('admin/riwayat_filter', $data);
	}
}
?>