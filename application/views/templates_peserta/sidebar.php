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
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  >
                <div class="sidebar-brand-icon">
                     <i class="far fa-lightbulb"></i>
                </div>
                <div class="sidebar-brand-text mx-2" >RUMAH INOVASI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                INOVASI
            </div>
            
            <li <?= $this->uri->segment(2) == 'riwayat' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('peserta/riwayat') ?>">
                    <i class="fas fa-search"></i>
                    <span>Riwayat Inovasi</span>
                </a>
            </li>

            <li <?= $this->uri->segment(3) == 'profil' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('peserta/dashboard/profil') ?>">
                <i class="fas fa-user-alt"></i>
                    <span>Profil User</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <div class="topbar-divider d-none d-sm-block"></div>  
                        <ul class="na navbar-nav navbar-right d-flex align-items-center">
                            <li class="mr-2">
                                Selamat datang <b style="text-decoration: underline;"><?= $this->session->userdata('nama') ?></b>
                            </li>
                            <li class="ml-2">
                                <div title="Logout" class="btn btn-sm btn-circle btn-outline-primary " data-toggle="modal" data-target="#logoutt"><i class="fas fa-power-off"></i></div>
                            </li>
                        </ul>
                        <div class="modal fade" id="logoutt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </nav>
                <!-- End of Topbar -->
               