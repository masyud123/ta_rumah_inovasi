<body class="bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center">
            <?= $this->session->flashdata('pesan_lupa_pwd')?>
            <div class="col-xl-5 col-lg-12 col-md-9"><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LUPA PASSWORD</h1>
                                    </div>
                                    <form action="<?= base_url('Login/password_baru') ?>" class="user" enctype="multipart/form-data" method="post">
                                        <h6 style="text-align: justify; margin-bottom: 20px;">
                                            Untuk melakukan reset password, silakan masukkan email yang anda gunakan untuk login pada form di bawah ini!
                                        </h6>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" placeholder="Email" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong!')" oninput="setCustomValidity('')">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-sign-in-alt"></i> Selanjutnya</button>
                                    </form><hr>
                                    <div class="text-center">
                                        <a href="<?= base_url('Pendaftaran') ?>" class="small" href="">Belum Punya Akun ? Silahkan Daftar</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('Login') ?>" class="small" href=""><i class="fas fa-arrow-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 