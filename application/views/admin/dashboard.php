<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-secondary"><strong>Dashboard Admin</strong></h3>
    </div>

    <div class="row">
        <!-- Event -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Event</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$event?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subevent -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Sub Event</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$subevent?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengumuman -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                JUMLAH PENGUMUMAN</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$pengumuman?></div> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- usulan -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH USULAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$usulan?></div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-lightbulb fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peserta -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-danger text-uppercase mb-1">
                                USER PESERTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$peserta?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Penilai -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                USER PENILAI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$penilai?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- grafik -->
    <div class="d-none d-md-block">
        <div class="card shadow">
            <div class="card-header bg-light">
                <h5 class="text-secondary"><strong>Grafik Jumlah Usulan, Peserta & Penilai</strong></h5>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <canvas id="linechart" width="100" height="40" class="mb-4"></canvas>
                    <div class="row mb-0">
                        <div class="col-4">
                            <div class="list-inline text-center">
                                <div class="list-inline-item p-r-30">
                                    <i class="far fa-lightbulb fa-2x text-primary"></i>
                                    <h6 class="mb-0 m-b-0 text-primary"><strong><?=$usulan?></strong></h6>
                                    <h6 class="text-primary"><strong>Total Usulan</strong></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="list-inline text-center">
                                <div class="list-inline-item p-r-30">
                                    <i class="fa fa-user fa-2x text-danger"></i>
                                    <h6 class="mb-0 m-b-0 text-danger"><strong><?=$peserta?></strong></h6>
                                    <h6 class="text-danger"><strong>Total Peserta</strong></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="list-inline text-center">
                                <div class="list-inline-item p-r-30">
                                    <i class="fas fa-user-cog fa-2x text-warning"></i>
                                    <h6 class="mb-0 m-b-0 text-warning"><strong><?=$penilai?></strong></h6>
                                    <h6 class="text-warning"><strong>Total Penilai</strong></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/js/grafik.js')?>"></script>
<script  type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");
    var data = {
        labels: ["2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030"],
        datasets: [
            {
                label: "Jumlah Usulan",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#4e73df",
                borderColor: "#4e73df",
                pointHoverBackgroundColor: "#4e73df",
                pointHoverBorderColor: "#4e73df",
                data: [<?= 
                    '"' . $gr_usulan[0] . '","' . $gr_usulan[1] . '","' . $gr_usulan[2] . '",
                    "' . $gr_usulan[3] . '","' . $gr_usulan[4] . '","' . $gr_usulan[5] . '",
                    "' . $gr_usulan[6] . '","' . $gr_usulan[7] . '","' . $gr_usulan[8] . '",
                    "' . $gr_usulan[9] . '","' . $gr_usulan[10] . '",';
                ?>]
            },
            {
                label: "Jumlah Peserta",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#e74a3b",
                borderColor: "#e74a3b",
                pointHoverBackgroundColor: "#e74a3b",
                pointHoverBorderColor: "#e74a3b",
                data: [<?= 
                    '"' . $gr_peserta[0] . '","' . $gr_peserta[1] . '","' . $gr_peserta[2] . '",
                    "' . $gr_peserta[3] . '","' . $gr_peserta[4] . '","' . $gr_peserta[5] . '",
                    "' . $gr_peserta[6] . '","' . $gr_peserta[7] . '","' . $gr_peserta[8] . '",
                    "' . $gr_peserta[9] . '","' . $gr_peserta[10] . '",';
                ?>]
            },
            {
                label: "Jumlah Penilai",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#f6c23e",
                borderColor: "#f6c23e",
                pointHoverBackgroundColor: "#f6c23e",
                pointHoverBorderColor: "#f6c23e",
                data: [<?= 
                    '"' . $gr_penilai[0] . '","' . $gr_penilai[1] . '","' . $gr_penilai[2] . '",
                    "' . $gr_penilai[3] . '","' . $gr_penilai[4] . '","' . $gr_penilai[5] . '",
                    "' . $gr_penilai[6] . '","' . $gr_penilai[7] . '","' . $gr_penilai[8] . '",
                    "' . $gr_penilai[9] . '","' . $gr_penilai[10] . '",';
                ?>]
            },
        ],
    };

    var myBarChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            legend: {
            display: true
            },
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            }
        }
    });
</script>