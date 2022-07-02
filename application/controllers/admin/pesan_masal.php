<?php
ob_start();
class Pesan_masal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 'Admin_Bappeda') {
			$this->session->set_flashdata('pesan', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum Login, silahkan login!
                </div>'
            );
			redirect('Login');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['semua_nomor'] 	= $this->Model_pesan->semua_nomor()->result_array();
		$data['penilai'] 		= $this->Model_pesan->nomor_penilai()->result_array();	
		$data['peserta'] 		= $this->Model_pesan->nomor_peserta()->result_array();
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pesan_masal', $data);
		$this->load->view('temp_data_table/footer');
		
	}

    public function kirim_pesan()
	{
		$nomor = $this->input->post('nomor');
		$pesan = $this->input->post('pesan');

		if($nomor != '' && $pesan != ''){
			//replace spasi
			$nomor2 = str_replace(" ", "", $nomor);
			// create data array no wa
			$nomor3 = explode(",",$nomor2);
			// remove data kosong
			$nomor4 = array_diff($nomor3, [""]); 

			$kondisi = $this->Model_user->get_kode_qr(); // kondisi sistem terhubung wa/tdk
			if($kondisi->message != 'AUTHENTICATED'){
				$this->session->set_flashdata('pesan_masal',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
						swal("Gagal","Tidak bisa mengirim pesan karena sistem tidak terhubung dengan Whatsapp. Silakan hubungkan terlebih dahulu.","error")  
					</script>'  
				);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				for($i=0; $i<count($nomor4); $i++){
					$this->Model_user->kirim_pesan($nomor4[$i], $pesan);
				}

				$this->session->set_flashdata('pesan_masal',
					'<script type="text/JavaScript">  
						Swal.fire("Sukses","Pesan berhasil terkirim","success")
					</script>'  
				);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}else{
			// nomor atau  pesan kosong redirect
			if($nomor == '' && $pesan == ''){
				$this->session->set_flashdata('pesan_masal',
					'<script type="text/JavaScript">  
						Swal.fire("Gagal","Form nomor & pesan tidak boleh kosong","error")
					</script>'  
				);
			}elseif($nomor == ''){
				$this->session->set_flashdata('pesan_masal',
					'<script type="text/JavaScript">  
						Swal.fire("Gagal","Form nomor tidak boleh kosong","error")
					</script>'  
				);
			}elseif($pesan == ''){
				$this->session->set_flashdata('pesan_masal',
					'<script type="text/JavaScript">  
						Swal.fire("Gagal","Form pesan tidak boleh kosong","error")
					</script>'  
				);
			}
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function get_session()
	{
		// $content = json_decode(file_get_contents("https://node-whatsapp-api.herokuapp.com/AmbilStatus"));
		// if($content == "kosong"){
		// 	echo 0;
		// }else{
			echo 1;
		// }
	}
}