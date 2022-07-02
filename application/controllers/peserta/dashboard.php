<?php 
ob_start();
class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Peserta'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
	}

	public function index()
	{
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/dashboard');
		$this->load->view('templates_peserta/footer');
	}

	public function profil()
	{
		$id_user = array('id_usr' => $this->session->userdata('id_usr'));
		$data['profil_user'] = $this->db->get_where('user', $id_user)->row();
		
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/profil_user', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function edit_profil()
	{
		$nama 	= $this->input->post('nama');
		$email 	= $this->input->post('email');
		$no_wa 	= $this->input->post('no_wa');
		$id_user= $this->session->userdata('id_usr');

		if($nama != '' && $email != '' && $no_wa != ''){
			$data 	= array('nama' => $nama, 'email' => $email, 'no_wa' => $no_wa);
			$where 	= array('id_usr' => $id_user);

			$email2	= $this->db->get_where('user', $where)->row();
			$kondisi= $email == $email2->email;
			
			if($kondisi){
				$this->db->update('user', $data, $where);
				$this->session->set_flashdata('pesan_profil',
					'<script>  
						Swal.fire("Sukses","Data profil berhasil diupdate.","success")  
					</script>'  
				);
				redirect('peserta/Dashboard/profil');
			}else{ 
				$this->db->update('user', $data, $where);
				$this->session->set_flashdata('pesan',
					'<script>  
						Swal.fire("Sukses","Data profil berhasil diupdate. Silakan login kembali untuk masuk.","success")  
					</script>'  
				);
				redirect('Login');
			}
		}else{
			if($nama == ''){$inputan = "Nama ";}
			elseif($email == ''){$inputan = "Email ";}
			elseif($no_wa == ''){$inputan = "No. Whatsapp ";}

			$this->session->set_flashdata('pesan_profil',
				'<script>  
					Swal.fire("Peringatan","'.$inputan.'tidak boleh kosong!","warning")  
				</script>'  
			);
			redirect('peserta/Dashboard/profil');
		}
	}
	
	public function reset_password()
	{
		$password 	= md5($this->input->post('password_baru'));
		$id_user	= $this->session->userdata('id_usr');
		
		if($password != ''){
			$data 	= array('password' => $password);
			$where 	= array('id_usr' => $id_user);

			$password2	= $this->db->get_where('user', $where)->row();
			$kondisi	= $password != $password2->password;

			if($kondisi){
				$this->db->update('user', $data, $where);
				$this->session->set_flashdata('pesan',
					'<script>  
						Swal.fire("Sukses","Password berhasil diubah. Silakan login kembali untuk masuk.","success")  
					</script>'  
				);
				redirect('Login');
			}else{
				$this->session->set_flashdata('pesan_profil',
					'<script>  
						Swal.fire("Gagal","Password yang anda masukkan harus berbeda dengan sebelumnya.","error")  
					</script>'  
				);
				redirect('peserta/Dashboard/profil');
			}
		}else{
			$this->session->set_flashdata('pesan_profil',
				'<script>  
					Swal.fire("Gagal","Password tidak boleh kosong","error")  
				</script>'  
			);
			redirect('peserta/Dashboard/profil');
		}
	}
}
