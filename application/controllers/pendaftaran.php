<?php 
ob_start();
class Pendaftaran extends CI_Controller {

    public function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('cart');
        error_reporting(0);
	}

    public function index()
    {   $this->cart->destroy();
        $this->form_validation->set_rules('nama','nama','required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('no_wa','no_wa','required', ['required' => 'No WA wajib diisi!']);
        $this->form_validation->set_rules('email','email','required', ['required' => 'Email wajib diisi!']);
        $this->form_validation->set_rules('password_1','Password', 'required|matches[password_2]',
            ['required' => 'Password wajib diisi!', 'matches' => 'Password tidak cocok!']);
        $this->form_validation->set_rules('password_2','Password','required|matches[password_1]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('pendaftaran');
            $this->load->view('templates_admin/footer');
        } else {    
            $email = $this->input->post('email'); 
            $password = $this->input->post('password_1');
            $sql = $this->db->query("SELECT email FROM user where email='$email'");
            $cek_email = $sql->num_rows();

            if ($cek_email > 0) {
                $this->session->set_flashdata('pesan',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                    <script type ="text/JavaScript">  
                    swal("Gagal","Email sudah digunakan!","error")  
                    </script>'  
                );
                redirect('Pendaftaran');
            }else{
                $kode  = rand(111111, 999999);
                $waktu = date('H:i:s');
                
                // insert data ke dalam penyimpanan sementara
                $data = array(
                    // data cart wajib ada
                    'id'      => 'sku_123ABC',
                    'qty'     => 1,
                    'price'   => 39.95,
                    // kebutuhan inti
                    'name'          => $this->input->post('nama'),
                    'email'         => $this->input->post('email'),
                    'password'      => md5($this->input->post('password_1')),
                    'no_wa'         => $this->input->post('no_wa'),
                    'kode_ori'      => $kode,
                    'waktu_create'  => $waktu
                );
                $this->cart->insert($data);
                
                $kondisi = $this->Model_user->get_kode_qr(); // kondisi sistem terhubung wa/tdk
				if($kondisi->message == 'AUTHENTICATED'){
                    // cek nomor terdaftar/tidak
                    $cek_nomor = $this->Model_user->cek_nomor_wa($this->input->post('no_wa'));
					if($cek_nomor->status == 'valid'){
                        //Pengiriman kode kepada user via WA
                        $no_wa 	= 	$this->input->post('no_wa');
						$pesan 	= 	'Kode OTP Anda adalah '.$kode.'. Jika Anda merasa tidak mendaftar apapun, silakan abaikan.';

						$response = $this->Model_user->kirim_pesan($no_wa, $pesan);
                        if($response->message == "Sukses! Pesan telah terkirim"){
                            redirect('Pendaftaran/halaman_otp/');
						}else{
                            $this->session->set_flashdata('pesan',
                                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                                <script type ="text/JavaScript">  
                                    swal("Gagal","Sistem tidak bisa mengirim pesan OTP ke nomor Anda. Cobalah beberapa saat lagi","error")  
                                </script>'  
                            );
                            redirect('Pendaftaran');
                        }
                    }else{
                        $this->session->set_flashdata('pesan',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                                swal("Gagal","Sistem tidak bisa mengirim pesan OTP ke nomor Anda. Pastikan nomor Anda sudah terdaftar pada aplikasi Whatsapp.","error")  
                            </script>'  
                        );
                        redirect('Pendaftaran');
                    }
                }else{
                    $this->session->set_flashdata('pesan',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                            swal("Gagal","Mohon maaf saat ini sistem tidak terhubung dengan whatsapp. Cobalah beberapa saat lagi.","error")  
                        </script>'  
                    );
                    redirect('Pendaftaran');
                }
            }
        }
    } 

    public function halaman_otp()
	{   
        foreach($this->cart->contents() as $items):
            $nama           = $items['name'];
            $email          = $items['email'];
            $password       = $items['password'];
            $no_wa          = $items['no_wa'];
        endforeach;

        if($nama != '' && $email != '' && $password != '' && $no_wa != ''){
            $this->load->view('templates_admin/header');
            $this->load->view('kode_otp');
            $this->load->view('templates_admin/footer');
        }else{
            redirect('Pendaftaran');
        }
	}

    public function create_kode()
    {
        foreach($this->cart->contents() as $items):
            $nama           = $items['name'];
            $email          = $items['email'];
            $password       = $items['password'];
            $no_wa          = $items['no_wa'];
        endforeach;

        if($nama != '' && $email != '' && $password != '' && $no_wa != ''){
            foreach($this->cart->contents() as $items):
                $waktu_create = $items['waktu_create'];
            endforeach;

            $time         = [$waktu_create, '00:02:00'];
            $sum          = strtotime('00:00:00');
            $totaltime    = 0;
            
            foreach( $time as $element ) {
                $timeinsec = strtotime($element) - $sum;
                $totaltime = $totaltime + $timeinsec;
            }

            $h = intval($totaltime / 3600);
            $totaltime = $totaltime - ($h * 3600);
            $m = intval($totaltime / 60);
            $s = $totaltime - ($m * 60);
            $waktu_get   = date('H:i:s');

            if(strtotime("$h:$m:$s") < strtotime($waktu_get)){
                //generate kode
                $kode  = rand(111111, 999999);
                $waktu = date('H:i:s');

                //update data kode dan waktu
                $data = array(
                        'rowid'         => '1164a59fe023937d41e11ddf6871b50c',
                        'kode_ori'      => $kode,
                        'waktu_create'  => $waktu
                );
                $this->cart->update($data);
                
                foreach($this->cart->contents() as $items):
                    $no_wa = $items['no_wa'];
                endforeach;

                //Pengiriman kode kepada user via WA
				$pesan 	= 	'Kode OTP Anda adalah '.$kode.'. Jika Anda merasa tidak mendaftar apapun, silakan abaikan.';
				$this->Model_user->kirim_pesan($no_wa, $pesan);
                
                // batasan waktu create + 2 menit
                $time         = [date('H:i:s'), '00:02:00'];
                $sum          = strtotime('00:00:00');
                $totaltime    = 0;
                
                foreach( $time as $element ) {
                    $timeinsec = strtotime($element) - $sum;
                    $totaltime = $totaltime + $timeinsec;
                }

                $h = intval($totaltime / 3600);
                $totaltime = $totaltime - ($h * 3600);
                $m = intval($totaltime / 60);
                $s = $totaltime - ($m * 60);

                echo "$h:$m:$s";
            }else{
                echo "ggl";
            }
        }
    }

    public function verifikasi_kode()
	{
        $kode         = $this->input->post('kode_otp');
        if($kode != ''){
            $waktu_post   = date('H:i:s');

            foreach($this->cart->contents() as $items):
                $kode_ori     = $items['kode_ori'];
                $waktu_create = $items['waktu_create'];
            endforeach;

            $time         = [$waktu_create, '00:02:00'];
            $sum          = strtotime('00:00:00');
            $totaltime    = 0;
            
            foreach( $time as $element ) {
                $timeinsec = strtotime($element) - $sum;
                $totaltime = $totaltime + $timeinsec;
            }

            $h = intval($totaltime / 3600);
            $totaltime = $totaltime - ($h * 3600);
            $m = intval($totaltime / 60);
            $s = $totaltime - ($m * 60);

            //eksekusi waktu
            if(strtotime("$h:$m:$s") < strtotime($waktu_post)){
                //update data kode dan waktu
                $data = array(
                    'rowid'         => '1164a59fe023937d41e11ddf6871b50c',
                    'kode_ori'      => '',
                    'waktu_create'  => ''
                );
                $this->cart->update($data);

                // waktu pengiriman melebihi batas
                $this->session->set_flashdata('pesan_otp',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                    <script type ="text/JavaScript">  
                    swal("Gagal","Kode yang anda masukkan sudah kadaluarsa. Silakan request kembali","error")  
                    </script>'  
                );
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else{
                // eksekusi kode
                if($kode != $kode_ori){
                    // kode tidak sesuai
                    $this->session->set_flashdata('pesan_otp',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                        swal("Gagal","Kode yang anda masukkan salah","error")  
                        </script>'  
                    );
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }else{
                    foreach($this->cart->contents() as $items):
                        $nama = $items['name'];
                        $email = $items['email'];
                        $password = $items['password'];
                        $no_wa = $items['no_wa'];
                    endforeach;
            
                    $data = array (
                        'nama'      => $nama,
                        'email'     => $email,
                        'password'  => $password,
                        'no_wa'     => $no_wa,
                        'hak_akses' => "Peserta",
                        'status'    => "1",
                        'created_at'=> date('Y-m-d'),
                    );
                    
                    $this->db->insert('user', $data);
                    $this->cart->destroy();
                    $this->session->set_flashdata('pesan',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                            swal("Sukses","Akun berhasil dibuat. Silakan login untuk masuk","success")  
                        </script>'
                    );
					redirect('Login');
                }
            }
        }else{
            $this->session->set_flashdata('pesan_otp',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                <script type ="text/JavaScript">  
                    swal("Peringatan","Form input kode wajib diisi!","warning")  
                </script>'  
            );
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
        }
	}
}