<?php
class Whatsapp extends CI_Controller
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
		error_reporting(0);
	}

    public function index()
    {
        $data['status'] = $this->Model_user->get_info_wa();
        $data['username_token'] = $this->db->get('whatsapp')->row_array();

        $kode = $this->Model_user->get_kode_qr();
        if($kode->message == 'AUTHENTICATED'){
			$this->session->set_userdata('whatsapp', 'Terhubung');
		}else{
			$this->session->set_userdata('whatsapp', 'Terputus');
		}

        $this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/whatsapp', $data);
		$this->load->view('temp_data_table/footer');
    }

    public function pindai_kode()
    {
        $kode = $this->Model_user->get_kode_qr();
		if($kode->message == 'AUTHENTICATED'){
            echo 1; // Terhubung
		}else{
            echo '
                <div class="modal fade" role="dialog" id="modal-qrcode" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel"><b>Kode QR</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-9 col">
                                        <img src="'.$kode->qrcode.'" width="100%">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span>Silakan pindai kode QR yang sudah ada. Jika sudah terhubung ke whatsapp, silahkan tutup dan refresh halaman.</span>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-sm btn-info mr-2" type="button" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    public function update_username_token($id)
    {
        $username   = $this->input->post('username');
        $token      = $this->input->post('token');

        $where = ['id' => $id];
        $data = [
            'username'  => $username,
            'token'     => $token,
        ];
        $hasil = $this->db->update('whatsapp', $data, $where);

        if($hasil){
            $this->session->set_flashdata('update_token',
                '<script type="text/javascript">
                    Swal.fire("Sukses","Data berhasil diupdate","success");
                </script>'
            );
            redirect('admin/Whatsapp');
        }
    }
}