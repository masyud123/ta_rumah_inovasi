<?php 

class Pengumuman extends CI_Controller {

    public function index()
    {
        $data['pengumuman'] = $this->model_pengumuman->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function lihat($id_pengumuman)
    {
        $where = array('id_pengumuman' =>$id_pengumuman);
        $data['pengumuman'] = $this->model_pengumuman->lihat($where, 'pengumuman')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lihat_pengumuman', $data);
        $this->load->view('templates/footer');

    }
}

?>