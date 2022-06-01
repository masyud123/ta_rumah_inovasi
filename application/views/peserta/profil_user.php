<div class="container-fluid">
    <?= $this->session->flashdata('pesan_profil')?>
    <div class="col-lg-8 mb-3">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex text-primary">
                    <h4><b>Profil user</b></h4>
                    <i class="fa fa-user-circle fa-2x ml-2"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="d-md-flex">
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <i class="fa fa-user-circle fa-10x mb-3"></i>
                            <h4><b><?= $profil_user->nama; ?></b></h4>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form id="form_edit_profil" action="<?= base_url('peserta/dashboard/edit_profil/')?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <span>Nama</span>
                                <input type="text" name="nama" class="form-control" value="<?= $profil_user->nama; ?>">
                            </div>
                            <div class="form-group">
                                <span>Email</span>
                                <input type="text" name="email" class="form-control" value="<?= $profil_user->email; ?>">
                            </div>
                            <div class="form-group">
                                <span>No. Whatsapp</span>
                                <input type="text" name="no_wa" class="form-control" value="<?= $profil_user->no_wa; ?>">
                            </div>
                            <div class="form-group">
                                <span>Hak Akses</span>
                                <input type="text" class="form-control" value="<?= $profil_user->hak_akses; ?>" readonly>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="" data-toggle="modal" data-target="#reset_pwd">Reset password ?</a>
                                <button id="edit_profil" class="btn btn-sm btn-warning" type="button">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit Profil
                                </button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="reset_pwd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Reset Password</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('peserta/dashboard/reset_password/')?>" enctype="multipart/form-data" method="POST">
                    <div class="text-center" align="center">
                        <p>Silakan masukkan password baru pada form input dibawah ini.</p>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="password_baru" class="form-control col-lg-8" id="password_baru" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-primary btn-sm mr-2" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                        <button class="btn btn-danger btn-sm ml-2" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $("#edit_profil").on('click', function() {
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin melakukan perubahan pada data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form_edit_profil').submit();
            }
        });
    });

    $("#password_baru").keyup(function(){
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        $(this).val().match(lowerCaseLetters);
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        $(this).val().match(upperCaseLetters);

        // Validate numbers
        var numbers = /[0-9]/g;
        $(this).val().match(numbers);
        
        // Validate length
        $(this).val().length >= 8;
    });
</script>