<body class="bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center">
            <?= $this->session->flashdata('pesan_reset_pwd')?>
            <div class="col-xl-5 col-lg-12 col-md-9"><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LUPA PASSWORD</h1>
                                    </div>
                                    <form action="<?= base_url('login/reset_password') ?>" class="user" enctype="multipart/form-data" method="post">
                                        <h6 style="text-align: justify; margin-bottom: 20px;">
                                            Masukkan Pasword baru pada form di bawah ini
                                        </h6>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user password_baru" placeholder="Password Baru" name="password1" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user password_baru" placeholder="Konfirmasi Password" name="password2" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                                    </form><hr>
                                    <div class="text-center">
                                        <a href="<?= base_url('pendaftaran') ?>" class="small" href="">Belum Punya Akun ? Silahkan Daftar</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('login') ?>" class="small" href=""><i class="fas fa-arrow-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".password_baru").keyup(function(){
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
});
</script>