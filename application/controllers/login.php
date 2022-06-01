<?php 
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->library('cart');
	}

    public function index()
    {
		$this->session->sess_destroy();

        $data = array(
			'captcha' => $this->recaptcha->getWidget(),
			'script_captcha'=> $this->recaptcha->getScriptTag()
    	);
		
        $this->load->view('templates_admin/header');
        $this->load->view('form_login', $data);
        $this->load->view('templates_admin/footer');
    }

    public function auth()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		$recaptcha	= $this->input->post('g-recaptcha-response');
		$response 	= $this->recaptcha->verifyResponse($recaptcha);

		
		if(!isset($response['success']) || $response['success'] <> FALSE)
		{
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('templates_admin/header');
				$this->load->view('form_login');
				$this->load->view('templates_admin/footer');
			}else{
				$auth = $this->model_login->cek_login(); 

				if($auth == FALSE)
				{
					$this->session->set_flashdata('pesan','<div id="alert" class="alert alert-danger alert-dismissible text-center fade show" role="alert">
	                      Email atau Password Salah!
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>');
					redirect('login');
				}else {
					$this->session->set_userdata('email',$auth->email);
					$this->session->set_userdata('hak_akses',$auth->hak_akses);
					$this->session->set_userdata('nama',$auth->nama);
					$this->session->set_userdata('id_usr',$auth->id_usr);

					switch($auth->hak_akses){
						case 'Admin_Bappeda' : redirect('admin/dashboard');
							break;
						case 'Peserta' : redirect('peserta/riwayat'); 
							break;
						case 'Penilai' : redirect('penilai/data_verifikasi');
							break;
						default: break;
					}
				}
			}
		}else {
			$this->session->set_flashdata('pesan',
				'<div id="alert" class="alert alert-danger alert-dismissible text-center fade show" role="alert">
	            	reCAPTCHA Wajib Diisi!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function lupa_password()
	{
		$this->load->view('templates_admin/header');
        $this->load->view('lupa_password');
        $this->load->view('templates_admin/footer');
	}

	public function password_baru()
	{
		$email = $this->input->post('email');
		if($email == ''){
			$this->session->set_flashdata('pesan_lupa_pwd',
				'<script type ="text/JavaScript">  
					Swal.fire("Gagal","Email tidak boleh kosong!","error")  
				</script>'
			);
			redirect('login/lupa_password');
		}else{
			$get_data = $this->db->get_where('user', array('email' => $email))->row();
			if($get_data == null){
				$this->session->set_flashdata('pesan_lupa_pwd',
					'<script type ="text/JavaScript">  
						Swal.fire("Gagal","Email tidak ditemukan!","error")  
					</script>'
				);
				redirect('login/lupa_password');
			}else{
				// insert data ke dalam penyimpanan sementara
				$token = md5(rand(111111, 999999));
                $data = array(
                    // data cart wajib ada
                    'id'    => 'sku_123ABC',
                    'qty'   => 1,
                    'price' => 39.95,
					'name'	=> 'password',
                    // kebutuhan inti
					'email' 	=> $email,
                    'token_ori' => $token,
                );
                $this->cart->insert($data);

				// get session whatsapp
                // $content = json_decode(file_get_contents("https://node-whatsapp-api.herokuapp.com/AmbilStatus"));
                // if($content == "kosong"){
                //     $this->session->set_flashdata('pesan',
                //         '<script type ="text/JavaScript">  
                //             Swal.fire("Gagal","Mohon maaf reset password gagal dilakukan dikarenakan sistem tidak bisa mengirim link ke nomor whatsapp Anda. Silakan coba beberapa saat lagi.","error")  
                //         </script>'  
                //     );
                //     redirect('login/lupa_password');
                // }else{
                    //Pengiriman kode kepada user via WA
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"https://node-whatsapp-api.herokuapp.com/whatsapp_/send-message");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 
                        http_build_query(
                            array(
                                'token' => '1RtUp4y54T4NgN1N4yh4c4yTn1s3v0lDuYs4mH4Y5D4Mh4', 
                                'number' => $get_data->no_wa, 
                                'message' => 'Hai, Anda menerima pesan ini karena ada permintaan untuk memperbaharui password. Silakan Anda buka link berikut ini:
								http://localhost/Rumah_Inovasi/login/view_reset_password/'.$token.''
                            )
                        )
                    );
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = json_decode(curl_exec($ch));
                    curl_close ($ch);
                    if($server_output->status != true){
                        $this->session->set_flashdata('pesan_lupa_pwd',
                            '<script type ="text/JavaScript">  
                                Swal.fire("Gagal","Sistem tidak bisa mengirim pesan ke nomor Anda. Pastikan nomor Anda sudah terdaftar pada aplikasi Whatsapp.","error")  
                            </script>'  
                        );
						redirect('login/lupa_password');
                    }else{
						$this->session->set_flashdata('pesan_lupa_pwd',
                            '<script type ="text/JavaScript">  
                                Swal.fire("Sukses","Pesan berhasil terkirim ke nomor whatsapp Anda. Silakan Anda buka pesan tersebut dan ikuti langkah selanjutnya.","success")  
                            </script>'  
                        );
						redirect('login/lupa_password');
						// echo "<pre>"; print_r($data);
                    }
                // }
			}
		}
	}

	public function view_reset_password($token)
	{
		foreach($this->cart->contents() as $items):
			$token_ori = $items['token_ori'];
        endforeach;
		$hasil = $token_ori == $token;
		if($hasil){
			$this->load->view('templates_admin/header');
			$this->load->view('reset_password');
			$this->load->view('templates_admin/footer');
		}else{
			$this->load->view('page_not_found');
		}
	}

	public function reset_password()
	{
		$pwd1 = $this->input->post('password1');
		$pwd2 = $this->input->post('password2');
		$eksekusi = $pwd1 == $pwd2;
		if($eksekusi){
			$uppercase = preg_match('@[A-Z]@', $pwd1);
			$lowercase = preg_match('@[a-z]@', $pwd1);
			$number    = preg_match('@[0-9]@', $pwd1);

			if(!$uppercase || !$lowercase || !$number || strlen($pwd1) < 8) {
				$this->session->set_flashdata('pesan_reset_pwd',
					'<script type ="text/JavaScript">  
						Swal.fire("Gagal","Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka.","error")  
					</script>'  
				);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				foreach($this->cart->contents() as $items):
					$email = $items['email'];
				endforeach;

				$where 	= array('email' => $email);
				$data	= array('password' => md5($pwd1));
				$this->db->update('user', $data, $where);
				$this->session->set_flashdata('pesan',
					'<script type ="text/JavaScript">
						Swal.fire("Sukses","Password berhasil diubah. Silakan login kembali untuk masuk.","success")  
					</script>'
				);
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('pesan_reset_pwd',
				'<script type ="text/JavaScript">  
					Swal.fire("Gagal","Password baru dan konfirmasi password harus sama","error")  
				</script>'  
			);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
}

?>

