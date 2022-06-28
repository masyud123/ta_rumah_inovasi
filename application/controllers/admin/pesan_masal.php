<?php
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
		$data['peserta'] = $this->Model_pesan->nomor_peserta()->result_array();

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

			// $content = json_decode(file_get_contents("https://node-whatsapp-api.herokuapp.com/AmbilStatus"));
			// if($content == "kosong"){
			// 	$this->session->set_flashdata('pesan_masal',
			// 		'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			// 		<script type ="text/JavaScript">  
			// 			swal("Gagal","Tidak bisa mengirim pesan karena sistem tidak terhubung dengan Whatsapp. Silakan hubungkan terlebih dahulu.","error")  
			// 		</script>'  
			// 	);
			// 	header('Location: ' . $_SERVER['HTTP_REFERER']);
			// }else{
				$berhasil=0; $gagal=0;
				for($i=0; $i<count($nomor4); $i++){

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"https://node-whatsapp-api.herokuapp.com/whatsapp_/send-message");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, 
						http_build_query(
							array(
								'token' => '1RtUp4y54T4NgN1N4yh4c4yTn1s3v0lDuYs4mH4Y5D4Mh4', 
								'number' => $nomor4[$i], 
								'message' => $pesan
							)
						)
					);
					
					// Receive server response ...
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = json_decode(curl_exec($ch));
					curl_close ($ch);

					// Further processing ...
					if ($server_output->status == 1) {
						$berhasil++;
					} else {
						$gagal++;
					}
				}

				$this->session->set_flashdata('pesan_masal',
					'<script type="text/JavaScript">  
						Swal.fire("Informasi","Pesan berhasil terkirim '.$berhasil.'.<br>Pesan gagal terkirim '.$gagal.'","info")
					</script>'  
				);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			// }
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