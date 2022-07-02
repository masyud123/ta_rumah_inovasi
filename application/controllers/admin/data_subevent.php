<?php 
ob_start();
class Data_subevent extends CI_Controller{

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
		$data['subevent']      = $this->Model_subevent->view_subevent();
		$data['list_event']    = $this->Model_subevent->list_nama_event();
		$this->load->view('temp_data_table/header'); 
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/subevent',$data);
		$this->load->view('temp_data_table/footer');
	}	
 		

	public function edit($id)
	{ 
		$where = array('id' =>$id);
		$data['subevent'] = $this->Model_subevent->edit_subevent($where, 'subevent')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_subevent', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 				= $this->input->post('id');
		$tahun 	 				= $this->input->post('tahun');
		$subevent 				= $this->input->post('subevent');
		$mulai					= $this->input->post('mulai');
		$akhir 					= $this->input->post('akhir');
		$status_pendaftaran 	= $this->input->post('status_pendaftaran');
		
		$data = array(
			'tahun' 				=> $tahun,
			'subevent' 				=> $subevent,
			'mulai' 				=> $mulai, 
			'akhir' 				=> $akhir,
			'status_pendaftaran'	=> $status_pendaftaran,
		);

		$where = array(
			'id' => $id 
		);

		$this->Model_subevent->update_subevent($where,$data, 'subevent');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Data_subevent'); 
	}

	public function hapus()
	{
		$id = $this->input->post('id');

		$sql1 = $this->db->query("SELECT id_subevent FROM setting_penilai where id_subevent='$id'");
		$sql2 = $this->db->query("SELECT id_subevent FROM indikator_penilaian where id_subevent='$id'");
		$sql3 = $this->db->query("SELECT id_subevent FROM indikator_penilaian_pemenang where id_subevent='$id'");
		$sql4 = $this->db->query("SELECT id_subevent FROM usulan where id_subevent='$id'");


		$cek_data1 = $sql1->num_rows();
		$cek_data2 = $sql2->num_rows();
		$cek_data3 = $sql3->num_rows();
		$cek_data4 = $sql4->num_rows();
		if ($cek_data1 > 0 || $cek_data2 > 0 || $cek_data3 > 0 || $cek_data4 > 0) {
			$this->session->set_flashdata(
				'message',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Peringatan!","Sub Event tidak bisa dihapus karena usulan sudah ada !","error")  
                            </script>'
			);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			$where = array('id' => $id);
			$this->db->delete('subevent', $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-trash-alt"></i>
									Data berhasil dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function tambah_subevent()
	{
		$tahun 				= $this->input->post('tahun');
		$id_event			= $this->input->post('id_event');
		$subevent			= $this->input->post('subevent');
		$mulai				= $this->input->post('mulai');
		$akhir				= $this->input->post('akhir');
		$status_pendaftaran = $this->input->post('status_pendaftaran');
		
		$data = array(
			'tahun'     		=> $tahun,
			'id_event' 			=> $id_event, 
			'subevent' 			=> $subevent,
			'mulai' 			=> $mulai, 
			'akhir' 			=> $akhir,
			'status_pendaftaran'=> $status_pendaftaran,
		);

		$this->Model_subevent->tambah_subevent($data, 'subevent');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Data_subevent');
	}
	
} 