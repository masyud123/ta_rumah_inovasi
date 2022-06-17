<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Penilai</h1>
    </div>
    <div class="d-md-flex">
        <div class="col-md-6 align-self-center">
            <div class="col py-4">
                <!-- Verifikasi -->
                <div class="col mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-warning text-uppercase mb-1">
                                        Total Penilaian Verifikasi</div>
                                    <div class="h5 mb-0 font-weight-bold text-warning">50</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star-half-alt fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Nominator -->
                <div class="col mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-info text-uppercase mb-1">
                                        Total Penilaian Nominator</div>
                                    <div class="h5 mb-0 font-weight-bold text-info">50</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star-half-alt fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total jadi Juri -->
                <div class="col">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-danger text-uppercase mb-1">
                                        Total Menjadi Juri Lomba</div>
                                    <div class="h5 mb-0 font-weight-bold text-danger">3 Kali</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user-circle fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="card shadow" style="border-radius: 2%;">
                <div class="card-body bg-gradient-light" style="border-radius: 2%;">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-user-circle fa-3x mb-3 mr-3"></i>
                            <h4><b>Profil Penilai</b></h4>
                        </div>
                    </div>
                    <div class="bg-secondary mb-1" style="height: 1.5px;"></div>
                    <div class="col">
                        <form id="form_edit_profil" action="<?= base_url()?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <span>Nama</span>
                                <input type="text" name="nama" class="form-control form-control-sm" value="<?= $profil_user->nama; ?>">
                            </div>
                            <div class="form-group">
                                <span>Email</span>
                                <input type="text" name="email" class="form-control form-control-sm" value="<?= $profil_user->email; ?>">
                            </div>
                            <div class="form-group">
                                <span>No. Whatsapp</span>
                                <input type="text" name="no_wa" class="form-control form-control-sm" value="<?= $profil_user->no_wa; ?>">
                            </div>
                            <div class="form-group">
                                <span>Hak Akses</span>
                                <input type="text" class="form-control form-control-sm" value="<?= $profil_user->hak_akses; ?>" readonly>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <!-- <a href="" data-toggle="modal" data-target="#reset_pwd">Reset password ?</a>
                                <button id="edit_profil" class="btn btn-sm btn-warning" type="button">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit Profil
                                </button> -->
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>    
    <a class="scroll-to-top rounded" href="#wrapper">
        <i class="fas fa-angle-up"></i>
    </a>
</div>
    