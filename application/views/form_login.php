 <body class="bg-gradient-info">
    <div class="container">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9"><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan') ?>
                                    <?= $this->session->flashdata('berhasil_daftar') ?>
                                    <form action="<?php echo base_url('Login/auth') ?>" class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" name="email"  oninvalid="this.setCustomValidity('Kolom email wajib diisi!')" oninput="setCustomValidity('')" >
                                            <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password"  oninvalid="this.setCustomValidity('Kolom password wajib diisi!')" oninput="setCustomValidity('')" >
                                            <i class="fa fa-eye toggle-password" style="cursor: pointer; margin-left: -35px;"></i>
                                        </div>
                                        <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?><br>
                                        <div class="d-flex justify-content-center">
                                                <?= $captcha ?>
                                        </div><br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                                    </form><hr>
                                    <div class="text-center">
                                        <a href="<?= base_url('Login/lupa_password') ?>" class="small" href="">Lupa Password ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('Pendaftaran') ?>" class="small" href="">Belum Punya Akun ? Silahkan Daftar</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('Dashboard') ?>" class="small" href=""><i class="fas fa-arrow-left"></i> Kembali</a>
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
    $("body").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        const type = $('#password').attr('type') === 'password' ? 'text' : 'password';
        $('#password').attr('type', type);
    });

    setTimeout(function(){
        $('#alert').remove();
    }, 5000);
</script>