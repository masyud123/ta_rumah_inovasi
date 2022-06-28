<style>
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>

<div class="container-fluid">
	<?php echo $this->session->flashdata('email');  ?>
	<div class="card shadow">
		<h5 class="card-header"><b><i class="fas fa-edit"></i> Edit Data User</b></h5>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<?php foreach ($data_user as $user) : ?>
							<form id="update_user_profil" method="post" action="<?php echo base_url() . 'admin/Data_user/update' ?>">
								<div class="row ">
									<dt for="inputNama" class="col-sm-2 col-form-label">Nama</dt>
									<div class="col-sm-5 mb-3">
										<input type="text" name="nama" id="nama" class="form-control" value="<?=$user->nama ?>" onkeypress="return event.charCode < 48 || event.charCode  >57" required>
									</div>
								</div>

								<div class="row">
									<dt for="inputEmail" class="col-sm-2 col-form-label">Email</dt>
									<div class="col-sm-5 mb-3">
										<input type="email" name="email" id="email" class="form-control" value="<?=$user->email ?>" required>
									</div>
								</div>

								<div class="row">
									<dt for="inputEmail" class="col-sm-2 col-form-label">Email</dt>
									<div class="col-sm-5 mb-3">
										<input type="number" name="no_wa" id="no_wa" class="form-control" value="<?= $user->no_wa ?>" required>
									</div>
								</div>

								<div class="row">
									<dt for="inputPassword" class="col-sm-2 col-form-label">Password</dt>
									<div class="col-sm-5 mb-3">
										<input type="hidden" name="id_usr" class="form-control" value="<?php echo $user->id_usr ?>">
										<div style="display:none;" class="" id="new_pwd">
											<input type="password" id="password_baru" name="password_baru" placeholder="Password baru" class="form-control mb-2">
											<div class="row">
												<div class="col row ml-2 mt-1">
													<input type="checkbox" id="show-password">
													<h6 class="ml-2">Show password</h6>
												</div>
												<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
												<script>
													$(document).ready(function() {
														$('#show-password').click(function() {
															if ($(this).is(':checked')) {
																$('#password_baru').attr('type', 'text');
															} else {
																$('#password_baru').attr('type', 'password');
															}
														});
													});
												</script>
												<div class="col">
													<button class="btn btn-sm btn-danger" onclick="hide_new_pwd()" type="button">Batal</button>
												</div>
											</div>
										</div>
										<button id="btn_new_pwd" type="button" onclick="show_new_pwd()" class="btn btn-sm btn-success">Password Baru</button>
									</div>
								</div>
								<div class="row">
									<dt for="inputHakAkses" class="col-sm-2 col-form-label">Hak Akses</dt>
									<div class="col-sm-5 mb-3">
										<select class="form-control" id="hak" name="hak_akses">
											<option <?php if ($user->hak_akses == "Admin_Bappeda"){echo "selected";}?> value="Admin_Bappeda">Admin Bappeda</option>
											<option <?php if ($user->hak_akses == "Penilai"){echo "selected";}?> value="Penilai">Penilai</option>
											<option <?php if ($user->hak_akses == "Peserta"){echo "selected";}?> value="Peserta">Peserta</option>
										</select>
									</div>
								</div>

								<div class="row">
									<dt for="inputStatus" class="col-sm-2 col-form-label">Status</dt>
									<div class="col-sm-5 mb-3">
										<select class="form-control" id="status" name="status">
											<?php if($user->status == 1):?>
												<option selected value="1">Aktif</option>
												<option value="0">Nonaktif</option>
											<?php else: ?>
												<option selected value="0">Nonaktif</option>
												<option value="1">Aktif</option>
											<?php endif; ?>
										</select>
									</div>
								</div>

								<button onclick="cek_pwd()" type="button" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan</button>
								
									<a href="<?php echo base_url('admin/Data_user') ?>" class="btn btn-sm btn-secondary mt-3" >Kembali</div>
								</a>
							</form>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function cek_pwd()
   {
      var nama = document.getElementById("nama").value;
      var email = document.getElementById("email").value;
      if (nama == "" || email == "") {
      	$('#input_kosong').appendTo('body').modal('show');
      }else{
      	var data = document.getElementById("new_pwd");
	      if (data.style.display=="none"){
	         document.getElementById("update_user_profil").submit();
	      }else{
	         var myInput = document.getElementById("password_baru");
	         if (myInput.value == "") {
	            //document.getElementById("password_baru").focus();
	            $('#modal_kosong').appendTo('body').modal('show');
	            //$('#password_baru').focus();
	         }else{
	            var lowerCaseLetters = /[a-z]/g; // huruf kecil
	            var upperCaseLetters = /[A-Z]/g; // huruf besar
	            var numbers = /[0-9]/g; // angka

	            if( myInput.value.match(lowerCaseLetters) && 
	               myInput.value.match(upperCaseLetters) && 
	               myInput.value.match(numbers) &&
	               myInput.value.length >= 8){ 
	               document.getElementById("update_user_profil").submit();
	            } else {
	               document.getElementById("password_baru").focus();
	               //alert("Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka");
	               $('#modal_karakter').appendTo('body').modal('show');
	            }
	         }
	      }
	   }
   }

	function show_new_pwd() {
		$('#new_pwd').show();
		$('#btn_new_pwd').hide();
	}

	function hide_new_pwd() {
		$('#new_pwd').hide();
		$('#btn_new_pwd').show();
		$('input[name="password_baru"]').val('');
		$('#show-password').prop('checked', false);
		$('#password_baru').attr('type', 'password');
	}
</script>

<!-- Modal input kosong-->
<div class="modal fade" id="input_kosong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
   	<div class="modal-content">
   		<div class="modal-body text-center ">
   			<i class="fas fa-info-circle fa-lg fa-6x mt-4 mb-5" style="color:skyblue;"></i>
   			<h3 class="mb-3"><strong>INFORMASI</strong></h3>
   			<h5 class="mb-3 ml-3 mr-3">Anda harus mengisi dengan lengkap pada halaman ini!</h5>
   			<button onblur="fokus()" class="btn btn-lg btn-primary col-2 mb-2" data-dismiss="modal" ><strong>OK</strong></button>
	   	</div>
		</div>
	</div>
</div>

<!-- Modal cek-->
<div class="modal fade" id="modal_cek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="fas fa-info-circle fa-lg fa-6x mt-4 mb-5" style="color:skyblue;"></i>
				<h3 class="mb-3"><strong>INFORMASI</strong></h3>
				<h5 class="mb-3">Data tidak boleh kosong!</h5>
				<button class="btn btn-lg btn-primary col-2 mb-2" data-dismiss="modal"><strong>OK</strong></button>
			</div>
		</div>
	</div>
</div>



<!-- Modal Kosong-->
<div class="modal fade" id="modal_kosong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="fas fa-info-circle fa-lg fa-6x mt-4 mb-5" style="color:skyblue;"></i>
				<h3 class="mb-3"><strong>INFORMASI</strong></h3>
				<h5 class="mb-3">Password tidak boleh kosong!</h5>
				<button class="btn btn-lg btn-primary col-2 mb-2" data-dismiss="modal"><strong>OK</strong></button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Huruf karakter jumlah-->
<div class="modal fade" id="modal_karakter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center ">
				<i class="fas fa-info-circle fa-lg fa-6x mt-4 mb-5" style="color:skyblue;"></i>
				<h3 class="mb-3"><strong>INFORMASI</strong></h3>
				<h5 class="mb-3 ml-3 mr-3">Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka</h5>
				<button class="btn btn-lg btn-primary col-2 mb-2" data-dismiss="modal"><strong>OK</strong></button>
			</div>
		</div>
	</div>
</div>