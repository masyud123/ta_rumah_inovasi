<?php 

class Model_login extends CI_Model{

	public function cek_login(){
		$email = set_value('email');
		$password = set_value('password');

		$this->input->post('email',$email);
		$this->input->post('password',$password);
		$where = array(
			'email' => $email,
			'password' => md5($password)
		);
		
		$result = $this->db->get_where('user',$where);
		if($result->num_rows() > 0)
		{
			$hasil = $result->row();
			if($hasil->email === $email){
				$cek = $this->db->get_where('user',$where)->result_array();
				foreach($cek as $cek2);
				if ($cek2['status'] == 1) {
					return $hasil;
				}else{
					$this->session->set_flashdata('pesan',
							'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
								swal("Gagal Login","Akun anda saat ini dinonaktifkan, jika terjadi kesalahan silakan hubungi Admin Bappeda","error")  
							</script>'  
					);
					redirect('Login');
				}
			}else{
				return array(); //case email sensitif
			}
		}else {
			return array(); //email/pwd tidak ditemukan
		}
	}
}