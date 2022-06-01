<div class="container-fluid">
    <div class="row">
        <?php foreach($tampil_subevent as $tampil):?>
            <!-- Tasks Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-info shadow">
                    <div class="card-body">
                        <div class="row no-gutters d-flex align-items-center mb-3">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <h5><strong><?= $tampil['subevent']?></strong></h5>
                                </div>
                                <?php 
                                foreach($tampil_persen as $persen):
                                if($persen['id'] == $tampil['id']):?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= substr($persen['persen'], 0, 4)?>%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: <?= $persen['persen']?>%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; endforeach;?>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <div class="align-items-center" align="center">
                            <button type="button" onclick="window.location.href='<?= base_url('admin/nominator/daftar_nilai/'.$tampil['id'])?>'" class="btn btn-light btn-icon-split">
                                <span class="icon text-gray-600">
                                    <i class="fa fa-search-plus"></i>
                                </span>
                                <span class="text">Lihat Nilai Nominasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>