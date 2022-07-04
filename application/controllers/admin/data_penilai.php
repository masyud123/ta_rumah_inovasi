<?php 
ob_start();
class Data_penilai extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show"  role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
		date_default_timezone_set('Asia/Jakarta');
		error_reporting(0);
	}

	public function index()
	{
		$data['subevent'] = $this->Model_subevent->tampil_subevent()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penilai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_penilai($id_subevent)
	{
		$data['list_penilai'] 		= $this->Model_penilai->list_nama_penilai();
		$data['subevent'] 			= $this->Model_penilai->ambil_id_subevent($id_subevent);
		$data['nama_penilai']		= $this->Model_penilai->nama_penilai($id_subevent);
		$data['jumlah_penilai']     = $this->Model_penilai->jumlah_penilai($id_subevent);

		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_penilai', $data);
		$this->load->view('temp_data_table/footer');
	}

	public function tambah_penilai()
	{
		$id_subevent		= $this->input->post('id_subevent');
		$id_usr				= $this->input->post('id_usr');
		$created_by			= $this->session->userdata('id_usr');

		$sql = $this->db->query("SELECT id_usr FROM setting_penilai where id_usr='$id_usr' AND id_subevent='$id_subevent'");
			// 	
		$cek_user = $sql->num_rows();
		if ( $cek_user > 0 ) {
			$this->session->set_flashdata('message1','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
					Data penilai sudah ada!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		$data = array(
			'id_subevent' 	=> $id_subevent, 
			'id_usr' 		=> $id_usr,
			'created_date'	=> date('Y-m-d H:i:s'),
			'created_by'	=> $created_by,
		);

		$this->Model_penilai->tambah_penilai($data, 'setting_penilai');
		$this->session->set_flashdata('message1','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		header('Location: ' . $_SERVER['HTTP_REFERER']); }
	}

	public function hapus ()
	{
		$id_penilai = $this->input->post('id_penilai');
		$id_user 	= $this->input->post('id_user');

		$sql = $this->db->query("SELECT id_penilai FROM penilaian_proposal where id_penilai='$id_user'");
        $cek_data = $sql->num_rows();
        if ($cek_data > 0) {
	        $this->session->set_flashdata('hapus_penilai', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-info-circle"></i>
	                      Penilai tidak bisa dihapus karena sudah melakukan penilaian !
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>');
	        header('Location: ' . $_SERVER['HTTP_REFERER']);
	    }else{
	        $where = array('id' => $id_penilai);
	        $this->db->delete('setting_penilai', $where);
					$this->session->set_flashdata('hapus_penilai','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-trash-alt"></i>
								Data berhasil dihapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
	    }
    }
}
?>