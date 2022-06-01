<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('penilai') ?>">
                <div class="sidebar-brand-icon">
                     <i class="far fa-lightbulb"></i>
                </div>
                <div class="sidebar-brand-text mx-2">RUMAH INOVASI <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                PENILAIAN
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li <?=$this->uri->segment(2) == 'data_verifikasi' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('penilai/data_verifikasi') ?>">
                    <i class="fas fa-fw fa-check"></i>
                    <span><strong>Verifikasi </strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'data_nominator' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('penilai/data_nominator') ?>">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span><strong>Nominator</strong></span></a>
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
                        <!-- <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                    </form>

                    <!-- Topbar Navbar -->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <ul class="na navbar-nav navbar-right">
                        <?php if ($this->session->userdata('email')) { ?>
                            <li>
                                <div class="mt-1">Selamat Datang <b>[<?php echo $this->session->userdata('nama') ?>]</b></div>
                            </li>
                            <li class="ml-2">
                                <div title="Logout" class="btn btn-sm btn-circle btn-outline-primary" data-toggle="modal" data-target="#logout"><i class="fas fa-power-off" ></i></div>
                            </li>
                        <?php } else { ?>
                            <li><?php echo anchor('login/auth', 'Login'); ?></li>

                        <?php } ?>

                    </ul>

                    </ul>

                    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">LOG OUT</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin akan keluar ?</p>

                                    <div class="modal-footer">
                                        <?php echo anchor('login/logout', '<div class="btn btn-primary">Keluar</div>') ?>
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </nav>

                </nav>
                <!-- End of Topbar -->