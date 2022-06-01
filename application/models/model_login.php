<?php 

class Model_login extends CI_Model{

	public function cek_login(){
		$email = set_value('email');
		$password = set_value('password');

		$this->input->post('email',$email);
		$this->input->post('password',$password);
		$where = array(
			'email' => $email,
			'password' => md5($password));
		
		$result = $this->db->get_where('user',$where);
		if($result->num_rows() > 0)
		{
			$cek = $this->db->get_where('user',$where)->result_array();
			foreach($cek as $cek2);
			if ($cek2['status'] == 'Aktif') {
				return $result->row();
				//echo("benar");exit;
			}else{
				$this->session->set_flashdata('pesan',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                        	swal("Peringatan","Akun anda saat ini dinonaktifkan, jika terjadi kesalahan silakan hubungi Admin Bappeda","warning")  
                        </script>'  
                );
                redirect('login/index');
			}
		}else {
			return array();
		}
	}
}