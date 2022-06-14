<?php

class Data_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 'Admin_Bappeda') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data['user'] = $this->model_user->tampil_user()->result();
		$data['user_non'] = $this->db->get_where('user', array('status' => 'Nonaktif'))->result();
		$data['user_akf'] = $this->db->get_where('user', array('status' => 'Aktif'))->result();
		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user', $data);
		$this->load->view('temp_data_table/footer');
	}

	public function edit($id)
	{
		$where = array('id_usr' => $id);
		$data['data_user'] = $this->model_user->edit_user($where, 'user')->result();
		// echo json_encode($data); exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_user', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id 	 		= $this->input->post('id_usr');
		$nama 			= $this->input->post('nama');
		$email 			= $this->input->post('email');
		$no_wa			= $this->input->post('no_wa');
		$password		= $this->input->post('password_baru');
		$hak_akses		= $this->input->post('hak_akses');
		$status			= $this->input->post('status');
		$pwd_baru 		= md5($password);

		if ($password == null) {
			$data = array(
				'nama' 			=> $nama,
				'email' 		=> $email,
				'no_wa' 		=> $no_wa,
				'hak_akses' 	=> $hak_akses,
				'status' 		=> $status,
			);
		} else {
			$pasword_lama = $this->db->query("SELECT password FROM user where id_usr='$id'")->result_array();
			foreach ($pasword_lama as $pwd_lama);
			if ($pwd_baru == $pwd_lama['password']) {
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		            <script type ="text/JavaScript">  
		            swal("Peringatan","Coba gunakan password lain","warning")  
		            </script>'
				);
				redirect(base_url('admin/data_user/edit/' . $id));
			} else {
				$data = array(
					'nama' 			=> $nama,
					'email' 		=> $email,
					'no_wa' 		=> $no_wa,
					'password'		=> $pwd_baru,
					'hak_akses' 	=> $hak_akses,
					'status' 		=> $status,
				);
			}
		}

		$where = array('id_usr' => $id);

		$this->db->update('user', $data, $where);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_user/index');
	}

	public function tambah_user()
	{
		$nama		= $this->input->post('nama');
		$email		= $this->input->post('email');
		$no_wa		= $this->input->post('no_wa');
		$password	= md5($this->input->post('password'));
		$hak_akses	= $this->input->post('hak_akses');

		$sql = $this->db->query("SELECT email FROM user where email='$email' ");
		$cek_email = $sql->num_rows();
		if ($cek_email > 0) {
			$this->session->set_flashdata('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-circle"></i>
                  Email sudah terdaftar! Mohon ganti email Anda!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
			redirect(site_url('admin/data_user'));
		} else {
			$data = array(
				'nama' 			=> $nama,
				'email' 		=> $email,
				'no_wa' 		=> $no_wa,
				'password' 		=> $password,
				'hak_akses' 	=> $hak_akses,
				'status'		=> 1,
				'created_at'	=> date('Y-m-d')
			);

			$this->model_user->tambah_user($data, 'user');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
			redirect('admin/data_user/');
		}
	}

	public function hapus()
	{
		$id_usr = $this->input->post('id_usr');

		$sql1 = $this->db->query("SELECT id_penilai FROM penilaian_proposal where id_penilai='$id_usr'");
		$sql2 = $this->db->query("SELECT id_usr FROM peserta where id_usr='$id_usr'");

		$cek_data1 = $sql1->num_rows();
		$cek_data2 = $sql2->num_rows();
		if ($cek_data1 > 0 || $cek_data2 > 0) {
			$this->session->set_flashdata(
				'message',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Peringatan!","User tidak bisa dihapus karena sudah melakukan penilaian atau sudah mengajukan usulan!","error")  
                            </script>'
			);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			$where = array('id_usr' => $id_usr);
			$this->db->delete('user', $where);
			$this->db->delete('setting_penilai', $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"  role="alert"><i class="fas fa-trash-alt"></i>
									User berhasil dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
}
