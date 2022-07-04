<?php 
ob_start();
class Data_nominator extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show"  role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('Login');
		}
		error_reporting(0);
	}

	public function index()
	{
		$data['subevent'] = $this->Model_subevent->tampil_subevent()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_nominator($id_subevent)
	{
		$data['subevent'] = $this->Model_nominator->ambil_id_subevent($id_subevent);
		$data['indikator_penilaian_pemenang'] = $this->Model_nominator->ambil_id_nominator($id_subevent);
		$data['sudah_dinilai'] = $this->Model_nominator->cek_data_nilai_nominator($id_subevent);
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_nominator()
	{
		$id_subevent			= $this->input->post('id_subevent');
		$komponen				= $this->input->post('komponen');
		$note					= $this->input->post('note');
		$nilai_komponen_min		= $this->input->post('nilai_komponen_min');
		$nilai_komponen_max		= $this->input->post('nilai_komponen_max');


		$data = array(
			'id_subevent' 			=> $id_subevent, 
			'komponen' 				=> $komponen,
			'note' 					=> $note,
			'nilai_komponen_min' 	=> $nilai_komponen_min,
			'nilai_komponen_max' 	=> $nilai_komponen_max,
		);

		$this->Model_nominator->tambah_nominator($data, 'indikator_penilaian_pemenang');
		$this->session->set_flashdata('message3',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus ($id)
	{
		$where = array('id' => $id);
		$this->Model_nominator->hapus_nominator($where, 'indikator_penilaian_pemenang');
		$this->session->set_flashdata('message',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function nominator(){
		$back			= $this->input->post('back');
		redirect (base_url()."admin/Data_nominator/detail_nominator/".$back);
	}

	public function edit_indikator($id){
		$where = array('id' => $id);
		$data['indikator_penilaian_pemenang'] = $this->Model_nominator->edit_indikator($where, 'indikator_penilaian_pemenang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_penilaian_pemenang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update(){ 
		$id	 						= $this->input->post('id');
		$komponen 					= $this->input->post('komponen');
		$note	 					= $this->input->post('note');
		$nilai_komponen_min			= $this->input->post('nilai_komponen_min');
		$nilai_komponen_max			= $this->input->post('nilai_komponen_max');
		$id_subevent				= $this->input->post('id_subevent');

		$data = array(
			'komponen'					=> $komponen,
			'note' 						=> $note, 
			'nilai_komponen_min' 		=> $nilai_komponen_min,
			'nilai_komponen_max' 		=> $nilai_komponen_max
		);

		$where = array(
			'id' => $id
		);

		$this->Model_nominator->update_indikator($where,$data, 'indikator_penilaian_pemenang');
		$this->session->set_flashdata('message',
			'<script>
				Swal.fire("Sukses", "Data berhasil diperbarui", "success");
			</script>'
		);
		redirect('admin/Data_nominator/detail_nominator/'.$id_subevent); 
	}
	
}

?>