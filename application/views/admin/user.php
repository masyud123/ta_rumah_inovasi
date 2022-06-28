<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DATA USER</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="d-md-flex justify-content-between">
                <div class="d-md-flex justify-content-between"> 
                    <a href="#" class="btn btn-sm btn-success btn-icon-split mr-md-2 mb-3">
                      <span class="text">Jumlah User Aktif</span>
                      <div class="bg-white text-secondary d-flex justify-content-center align-items-center" style="width: 25px; height: auto; border-radius: 10%;">
                          <strong><?= count($user_akf)?></strong>
                      </div>
                    </a>
                    <a href="#" class="btn btn-sm btn-warning btn-icon-split ml-md-2 mb-3">
                      <span class="text">Jumlah User Non-aktif</span>
                      <div class="bg-white text-secondary d-flex justify-content-center align-items-center" style="width: 25px; height: auto; border-radius: 10%;">
                          <strong><?= count($user_non)?></strong>
                      </div>
                    </a>
                </div>
                <a href="#" id="tambah_usr" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_user">
                    <span class="icon text-white">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah User</span>
                </a>
            </div>
            <?php echo $this->session->flashdata('message');  ?>
            <?php echo $this->session->flashdata('email');  ?>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th class="text-center table-secondary">No</th>
                          <th class="text-center table-secondary">Nama</th>
                          <th class="text-center table-secondary">Email</th>
                          <th class="text-center table-secondary">Hak Akses</th>
                          <th class="text-center table-secondary">Status</th>
                          <th class="text-center table-secondary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($user as $usr) : ?>
                          <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td><?php echo $usr->nama ?></td>
                            <td><?php echo $usr->email ?></td>
                            <td><?php echo $usr->hak_akses ?></td>
                            <td><?php echo $usr->status == 1 ? "Aktif":"Nonaktif" ?></td>
                            <td class="d-flex justify-content-center">
                                <div class="d-flex justify-content-around" style="width: 10rem;">
                                    <?php echo anchor('admin/Data_user/edit/' . $usr->id_usr, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i> Edit</div>') ?>
                                    <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_user<?php echo $usr->id_usr ?>"><i class="fa fa-trash"></i><a> Hapus</a></div>
                                </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal hapus user-->
<?php foreach ($user as $usr) : ?>
  <div class="modal fade" id="hapus_user<?php echo $usr->id_usr ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        </div>
        <form action="<?php echo base_url('admin/Data_user/hapus/') ?>" enctype="multipart/form-data" method="post">
          <input hidden value="<?php echo $usr->id_usr ?>" type="text" name="id_usr">
          <div class="modal-body">
            <p>Apakah Anda yakin akan menghapus data ini?</p>
          </div>
          <div class="modal-footer">
            <!-- <?php echo anchor('admin/Data_user/hapus/' . $usr->id_usr, '<div class="btn btn-danger btn">Hapus</div>') ?> -->
            <button type="submit" class="btn btn-danger">Iya</button>
            <button type="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

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

<!-- Modal tambah user-->
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
      </div>
      <form action="<?= base_url('admin/Data_user/tambah_user')?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="ml-3 mr-3">
                  <div class="form-group">
                    <dt>Nama</dt>
                    <input id="nama" type="text" name="nama" class="form-control" required onkeypress="return event.charCode < 48 || event.charCode >57">
                  </div>
                  <div class="form-group">
                    <dt>Email</dt>
                    <input id="email" type="email" name="email" class="form-control" required  oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <dt>No. Whatsapp</dt>
                    <input id="no_wa" type="number" name="no_wa" class="form-control" required  oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <dt>Password</dt>
                    <div class="d-flex align-items-center">
                        <input id="password" type="password" name="password" class="form-control" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka" required>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer; margin-left: -30px;"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <dt>Hak Akses</dt>
                    <select id="hak_akses" class="form-control" required name="hak_akses">
                      <option value="Admin_Bappeda">Admin Bappeda</option>
                      <option value="Penilai">Penilai</option>
                      <option value="Peserta">Peserta</option>
                    </select>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="simpan_user" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tambah_usr').on('click', function(){
      $('#nama').val('');
      $('#email').val('');
      $('#password').val('');
      $('#hak_akses').val('');
    })

    $('#simpan_user').on('click', function(){
      var nama = $('#nama').val();
      var email = $('#email').val();
      var no_wa = $('#no_wa').val();
      var password = $('#password').val();
      var hak = $('#hak_akses').val();

      if(nama != '' && email != '' && no_wa != '' && password != '' && hak != ''){
        // lanjut submit
      }else{
        Swal.fire({
          title: "Gagal Menyimpan",
          text: "Semua form input wajib diisi!",
          icon: "error",
          buttons: {
              cancel: false,
              confirm: true
          }
        });
        return false;
      }
    }) 
  });
    
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
  });

  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    
    // Validate numbers
    var numbers = /[0-9]/g;
    

    // Validate length
    if (myInput.value.length >= 8) {
      // length.classList.remove("invalid");
      // length.classList.add("valid");
    } else {
      // length.classList.remove("valid");
      // length.classList.add("invalid");
    }
  }
</script>