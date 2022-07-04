<?php
ob_start();
class Pengumuman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 'Admin_Bappeda') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
		error_reporting(0);
	}

	public function index()
	{
		$data['pengumuman'] = $this->Model_pengumuman->tampil_data_admin()->result();
		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pengumuman', $data);
		$this->load->view('temp_data_table/footer');
	}

	public function tambah_pengumuman()
	{
		$judul 			= $this->input->post('judul');
		$deskripsi 	 	= $this->input->post('deskripsi');
		$status 	 	= $this->input->post('status');
		$created_by		= $this->session->userdata('email');
		$file		 = $_FILES['file']['name'];
		if ($file ='') {
			
		}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'pdf|jpg|jpeg|png';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('file')){
				echo "Gambar gagal diupload";
			}else{
				$file = $this->upload->data('file_name');
			}
		}
		$data = array(
			'judul_pengumuman' 			=> $judul,
			'deskripsi_pengumuman'      => $deskripsi,
			'status'					=> $status,
			'created_by'    			=> $created_by,
			'created_date'       		=> date('Y-m-d H:i:s'),
			'file_pengumuman'      		=> $file
		);

		$this->Model_pengumuman->tambah_data($data, 'pengumuman');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Pengumuman'); 
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$where = array('id_pengumuman' => $id);
			$this->db->delete('pengumuman', $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-trash-alt"></i>
									Data berhasil dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function edit($id_pengumuman)
	{
		$where = array('id_pengumuman' =>$id_pengumuman);
		$data['pengumuman'] = $this->Model_pengumuman->edit_data($where, 'pengumuman')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_pengumuman', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id_pengumuman 	 		= $this->input->post('id_pengumuman');
		$judul_pengumuman 		= $this->input->post('judul_pengumuman');
		$deskripsi_pengumuman 	= $this->input->post('deskripsi_pengumuman');
		$status 				= $this->input->post('status');
		$file		 = $_FILES['file']['name'];
		if ($file ='') {
			
		}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'pdf|jpg|jpeg|png';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('file')){
				echo "Gambar gagal diupload";
			}else{
				$file = $this->upload->data('file_name');
			}
		}

		if ($file != null) {
			$data = array(
				'judul_pengumuman' 		=> $judul_pengumuman,
				'deskripsi_pengumuman'  => $deskripsi_pengumuman,
				'status'				=> $status,
				'file_pengumuman'      	=> $file
			);
		}else{
			$data = array(
				'judul_pengumuman' 		=> $judul_pengumuman,
				'deskripsi_pengumuman'  => $deskripsi_pengumuman,
				'status'				=> $status
			);
		}

		$where = array(
			'id_pengumuman' => $id_pengumuman 
		);

		$this->Model_pengumuman->update_data($where,$data, 'pengumuman');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/Pengumuman'); 
	}

}