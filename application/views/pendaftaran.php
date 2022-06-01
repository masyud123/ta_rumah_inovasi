<div class="container-fluid bg-info" style="height: 100vh;">
    <div class="d-flex justify-content-center h-100 align-items-center">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">PENDAFTARAN</h1>
                                </div>
                                <?php echo $this->session->flashdata('pesan')?>
                                <form method="post" action="<?php echo base_url('pendaftaran/index') ?>" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Nama..." name="nama" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                        <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="No WA..." name="no_wa" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <?php echo form_error('no_wa', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" placeholder="Email..." name="email">
                                        <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                                id="password_1" placeholder="Password" name="password_1" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka" required>
                                          <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password_2" placeholder="Ulangi Password" name="password_2">
                                    </div>

                                    <div class="form-group ml-3">
                                        <input type="checkbox" id="cek-box" style="cursor: pointer;" class="show-password">
                                        <label style="cursor: pointer;" class="show-password" onclick="return true">Tampilkan Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-user-plus"></i> Daftar</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('login') ?>">Sudah Punya Akun ? Silahkan Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('.show-password').on('click', function(){
            if($('#cek-box').is(':checked')){
                $('#cek-box').prop('checked',true);
                $('#password_1, #password_2').attr('type','text');
            }else{
                $('#cek-box').prop('checked',false);
                $('#password_1, #password_2').attr('type','password');
            }
        });
    });

    var myInput = document.getElementById("password_1");
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        myInput.value.match(lowerCaseLetters);
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        myInput.value.match(upperCaseLetters);

        // Validate numbers
        var numbers = /[0-9]/g;
        myInput.value.match(numbers);
        
        // Validate length
        myInput.value.length >= 8;
    }
</script>