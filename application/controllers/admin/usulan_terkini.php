<?php
class Usulan_terkini extends CI_Controller
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
        $this->load->view('temp_data_table/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/usulan_terkini/tampilan_utama');
		$this->load->view('temp_data_table/footer');
		
	}

    public function semua_usulan()
    {
        $data['semua_usulan']   = count($this->Model_usulan->usulan_terkini(date('Y'))->result());
        $data['stts_blm']       = count($this->Model_usulan->stts_blm(date('Y'))->result());
        $data['stts_verif']     = count($this->Model_usulan->stts_verif(date('Y'))->result());

        $data['pen_pp'] = $this->Model_usulan->penilaian_proposal()->result_array();
        $data['usulan'] = $this->Model_usulan->usulan_terkini(date('Y'))->result();
        $data['filter'] = 1;
        $this->load->view('admin/usulan_terkini/filter_usulan', $data);
    }

    public function usulan_verif()
    {
        $data['semua_usulan']   = count($this->Model_usulan->usulan_terkini(date('Y'))->result());
        $data['stts_blm']       = count($this->Model_usulan->stts_blm(date('Y'))->result());
        $data['stts_verif']     = count($this->Model_usulan->stts_verif(date('Y'))->result());
        
        $data['pen_pp'] = $this->Model_usulan->penilaian_proposal()->result_array();
        $data['usulan'] = $this->Model_usulan->stts_verif(date('Y'))->result();
        $data['filter'] = 2;
        $this->load->view('admin/usulan_terkini/filter_usulan', $data);
    }

    public function usulan_blm()
    {
        $data['semua_usulan']   = count($this->Model_usulan->usulan_terkini(date('Y'))->result());
        $data['stts_blm']       = count($this->Model_usulan->stts_blm(date('Y'))->result());
        $data['stts_verif']     = count($this->Model_usulan->stts_verif(date('Y'))->result());
        
        $data['pen_pp'] = $this->Model_usulan->penilaian_proposal()->result_array();
        $data['usulan'] = $this->Model_usulan->stts_blm(date('Y'))->result();
        $data['filter'] = 3;
        $this->load->view('admin/usulan_terkini/filter_usulan', $data);
    }

    public function detail_usulan($id_usulan)
    {
        $peserta = $this->db->get_where('peserta', ['id_usulan' => $id_usulan])->row();
        $data['anggota']    = $this->db->get_where('anggota_tim', ['id_peserta' => $peserta->id_peserta])->result_array();
        $data['bidang']     = $this->db->get_where('bidang', ['id' => $peserta->id_bidang])->row();
        $data['usulan']     = $this->Model_usulan->get_detail_usulan($id_usulan)->result_array();

        $this->load->view('admin/usulan_terkini/detail_usulan',$data);
    }

    public function edit_status_usulan($status, $id)
    {
        $data   = ['status' => $status];
        $where  = ['id' => $id];
        $this->db->update('usulan', $data, $where);
    }
}