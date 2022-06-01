<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <script type="text/javascript">
            var x = window.innerWidth;
            if(x <= 450){
                $('#accordionSidebar').attr('class', 'navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled');
            }
        </script>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon ">
                    <i class="far fa-lightbulb fa-2x"></i>
                </div>
                <div class="sidebar-brand-text mx-2">RUMAH INOVASI <sup></sup></div>
            </a>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                MENU UTAMA
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoLomba"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-gears mr-1"></i>
                    <span><strong>Atur Lomba</strong></span>
                </a>
                <div id="collapseTwoLomba" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_event') ?>">Event</a>
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_subevent') ?>">Sub Event</a>
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_bidang') ?>">Bidang</a>
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_penilai') ?>">User Penilai</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoIndikator"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span><strong>Indikator Penilaian</strong></span>
                </a>
                <div id="collapseTwoIndikator" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_inovasi') ?>">Verifikasi</a>
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_nominator') ?>">Nominasi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoNilai"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <span><strong>Hasil Penilaian</strong></span>
                </a>
                <div id="collapseTwoNilai" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/data_verifikasi') ?>">Nilai Verifikasi</a>
                        <a class="collapse-item text-secondary" href="<?= base_url('admin/nominator') ?>"> Nilai Nominasi</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                DAFTAR USULAN
            </div>
            
            <li <?=$this->uri->segment(2) == 'usulan_terkini' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/usulan_terkini') ?>">
                    <i class="fas fa-clock"></i>
                    <span><strong>Usulan Terkini</strong></span></a>
            </li>

            <li <?=$this->uri->segment(2) == 'data_riwayat' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_riwayat') ?>">
                    <i class="fas fa-fw fa-history"></i>
                    <span><strong>Riwayat Usulan</strong></span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                LAINNYA
            </div>

            <li <?=$this->uri->segment(2) == 'data_user' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/data_user') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span><strong>Daftar User</strong></span></a>
            </li>

            <li <?=$this->uri->segment(2) == 'pengumuman' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/pengumuman') ?>">
                    <i class="fas fa-bullhorn"></i>
                    <span><strong>Pengumuman</strong></span></a>
            </li>

            <li <?=$this->uri->segment(2) == 'pesan_masal' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/pesan_masal') ?>">
                    <i class="fas fa-comment mr-1"></i>
                    <span><strong>Pesan Masal</strong></span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Messages -->
                        <li id="notif_wa"></li>
                        
                        <!-- Topbar Navbar -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <ul class="na navbar-nav navbar-right">
                            <?php if ($this->session->userdata('nama')): ?>
                                <li class="d-flex align-items-center">
                                    <div class="mr-3">Selamat Datang 
                                        <b><?php echo $this->session->userdata('nama') ?></b>
                                    </div>
                                    <div title="Logout" class="btn btn-sm btn-circle btn-outline-primary " data-toggle="modal" data-target="#logout"><i class="fas fa-power-off"></i></div>
                                </li>
                            <?php endif;?>
                        </ul>
                        <!-- modal logout -->
                        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">LOGOUT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin akan keluar ?</p>

                                        <div class="modal-footer">
                                            <?php echo anchor('login/logout', '<div class="btn btn-primary btn">Keluar</div>') ?>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script type="text/javascript">
                            $.ajax({
                                url: "<?= base_url("admin/pesan_masal/get_session/")?>",
                                success: function (response) {
                                    if(response == 0){
                                        $('#notif_wa').append(""+
                                            '<li class="nav-item dropdown no-arrow mx-1">'+
                                                '<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                                '<i class="fa-brands fa-whatsapp-square fa-2x" style="color: green;"></i>'+
                                                    '<span class="badge badge-danger badge-counter">'+
                                                        '<i class="fa-solid fa-xmark"></i>'+
                                                    '</span>'+
                                                '</a>'+
                                                '<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">'+
                                                    '<h6 class="dropdown-header">Informasi Whatsapp</h6>'+
                                                    '<a class="dropdown-item d-flex align-items-center" target="_blank" href="https://node-whatsapp-api.herokuapp.com">'+
                                                        '<div class="dropdown-list-image mr-3">'+
                                                            '<i class="fa-brands fa-whatsapp-square fa-3x" style="color: green;"></i>'+
                                                        '</div>'+
                                                        '<div class="font-weight-bold">'+
                                                            '<b class="text-danger">Whatsapp Terputus</b>'+
                                                        '</div>'+
                                                    '</a>'+
                                                '</div>'+
                                            '</li>'+
                                        "");
                                    }else if(response == 1){
                                        $('#notif_wa').append(""+
                                            '<li class="nav-item dropdown no-arrow mx-1">'+
                                                '<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                                '<i class="fa-brands fa-whatsapp-square fa-2x" style="color: green;"></i>'+
                                                    '<span class="badge badge-success badge-counter">'+
                                                        '<i class="fa-solid fa-circle-check"></i>'+
                                                    '</span>'+
                                                '</a>'+
                                                '<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">'+
                                                    '<h6 class="dropdown-header">Informasi Whatsapp</h6>'+
                                                    '<a class="dropdown-item d-flex align-items-center" target="_blank" href="https://node-whatsapp-api.herokuapp.com">'+
                                                        '<div class="dropdown-list-image mr-3">'+
                                                            '<i class="fa-brands fa-whatsapp-square fa-3x" style="color: green;"></i>'+
                                                        '</div>'+
                                                        '<div class="font-weight-bold">'+
                                                            '<b class="text-success">Whatsapp Terhubung</b>'+
                                                        '</div>'+
                                                    '</a>'+
                                                '</div>'+
                                            '</li>'+
                                        "");
                                    }
                                }
                            });
                        </script>
                    </ul>
                </nav>
                <!-- End of Topbar -->