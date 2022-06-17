<div class="container">
    <div class="ml-1 row d-flex align-items-start mb-3">
        <h4><strong>Sub Event :</strong></h4>
        <h4 class="text-info ml-2"><strong><?= $nama_subevent[0]['subevent']?></strong></h4>
        <a href="<?= base_url('admin/data_verifikasi/')?>" class="btn btn-warning btn-icon-split btn-sm ml-3">
            <span class="icon text-light">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="false">Umum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pelajar-tab" data-toggle="tab" href="#pelajar" role="tab" aria-controls="pelajar" aria-selected="false">Pelajar</a>
        </li>
    </ul>

<?php echo $this->session->flashdata('nominator_kopong'); ?> 
    <div class="tab-content">
    <!-- kategori umum -->
        <div id="umum" class="tab-pane fade show active" role="tabpanel" aria-labelledby="umum-tab">
            <div class="card shadow mb-4">
                <form id="form_umum" method="post" action="<?php echo base_url('admin/data_verifikasi/list_verifikasi'); ?>" enctype="multipart/form-data">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary mb-2">Verifikasi Umum</h6>
                        <?php if($cek_status_umum != null):?>
                                <button onclick="yo_gk_umum()" type="button" class="btn btn-sm btn-primary btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                        <?php else:?>
                            <button disabled type="button" class="btn btn-sm btn-primary btn-icon-split ">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        <?php endif; ?>
                    </div>
                    
                    <!-- class="table-wrapper-scroll-y my-custom-scrollbar" -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tabel-umum" style="width: 1200px;">
                                <thead>
                                    <tr>
                                        <th class="text-center table-secondary align-middle" rowspan="2"
                                            <?php foreach($nilai_total as $key => $val): foreach($data_nominator as $dt_nomin):
                                                if ($val['kategori_peserta'] == 'umum'){
                                                    if ($val['id'] == $dt_nomin['id_usulan']){
                                                        echo 'style="display: none;" hidden';
                                                    }
                                                }
                                            endforeach; endforeach; ?>>
                                            Pilih
                                        </th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">No</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Inovator</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Nama Inovasi</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2"
                                            <?php 
                                                if($cek_status_umum != null):
                                                    echo 'style="display: none;" hidden';
                                                endif;
                                            ?>>
                                            Status
                                        </th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Total Nilai</th>
                                        <th class="text-center table-secondary align-middle" colspan="<?= count($nama_penilai)?>">Nama Penilai</th> 
                                    </tr>
                                    <tr>
                                        <?php foreach ($nama_penilai as $penilai): 
                                            $nama  = strstr($penilai["nama"], ' ', true);
                                        ?>
                                            <th class="text-center table-secondary align-middle" rowspan="1">
                                                <?php if($nama == null){ echo $penilai["nama"];}
                                                else{ echo $nama;}?>
                                            </th> 
                                        <?php endforeach; ?> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- sebelum diverifikasi -->
                                    <tr>                         
                                        <?php  
                                        $no=1;
                                            foreach($total_nilai as $key => $value) : ?>
                                            <?php if ($value['kategori_peserta'] == 'umum'):  ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="urutan_nilai[]" value="<?php echo $value["id"];echo ("_"); echo $value["id_subevent"]; ?>">
                                                        <input hidden name="semua_nilai[]" value="<?php echo $value["id"]?>">
                                                    </td>
                                                    <td align="center"><?php echo $no++ ?></td>
                                                        <td><?= $value['user']?></td>
                                                    <td><?= $value['judul']?></td>
                                                    <td align="center"><?= number_format( $value['total'],2)?></td>
                                                    <?php foreach ($nama_penilai as $penilai): ?>
                                                        <td align="center">
                                                            <?php foreach ($value['nilai_verifikasi'] as $key2 => $val): ?>
                                                                <?php if($val->id_penilai == $penilai['id_usr']):?>
                                                                    <?= $val->nilai_verifikasi ?>
                                                                <?php endif; ?>
                                                            <?php endforeach ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?> 
                                        <?php endforeach; ?>
                                    </tr> 
                                    <!-- sesudah diverifikasi -->
                                    <tr>                         
                                        <?php  
                                        $no=1;
                                            foreach($nilai_total as $key => $value) : ?>
                                            <?php if ($value['kategori_peserta'] == 'umum') {  ?>
                                            <tr>
                                                <td align="center"><?php echo $no++ ?></td>
                                                <td><?= $value['user']?></td>
                                                <td><?= $value['judul']?></td>
                                                <td>
                                                    <span 
                                                        <?php foreach($data_nominator as $dt_nomin):
                                                            $data123 = in_array($dt_nomin['id_usulan'], $value);
                                                            if ($data123) {echo 'style="display: none;" hidden';}
                                                        endforeach; ?>
                                                    >Gugur</span>
                                                    <?php foreach($data_nominator as $dt_nomin):
                                                        $data123 = in_array($dt_nomin['id_usulan'], $value);
                                                        if ($data123) {echo 'Lolos';}
                                                    endforeach; ?>
                                                </td>
                                                <td align="center"><?= number_format( $value['total'],2)?></td>
                                                <?php foreach ($nama_penilai as $penilai): ?>
                                                    <td align="center">
                                                        <?php foreach ($value['nilai_verifikasi'] as $key2 => $val): ?>
                                                            <?php if($val->id_penilai == $penilai['id_usr']):?>
                                                                <?= $val->nilai_verifikasi ?>
                                                            <?php endif; ?>
                                                        <?php endforeach ?>
                                                    </td>
                                                <?php endforeach; ?>
                                        </tr>
                                        <?php } ?> 
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <!-- kategori pelajar -->
        <div id="pelajar" class="tab-pane fade" role="tabpanel" aria-labelledby="pelajar-tab">
            <div class="card shadow mb-4">
                <form id="form_pljr" method="post" action="<?php echo base_url('admin/data_verifikasi/list_verifikasi'); ?>" enctype="multipart/form-data">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary mb-2">Verifikasi Pelajar</h6>
                        <?php if($cek_status_pelajar != null):?>
                                <button onclick="yo_gk_pljr()" type="button" class="btn btn-sm btn-primary btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button> 
                        <?php else: ?>
                                <button disabled type="button" class="btn btn-sm btn-primary btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                        <?php endif;
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tabel-data" width="100%" style="width: 1200px;">
                                <thead>
                                    <tr>
                                        <th class="text-center table-secondary align-middle" rowspan="2"
                                            <?php 
                                                foreach($nilai_total as $key => $gathel):
                                                    foreach($data_nominator as $dt_nomin):
                                                        if ($gathel['kategori_peserta'] == 'pelajar'){
                                                            if ($gathel['id'] == $dt_nomin['id_usulan']){
                                                                echo 'style="display: none;" hidden';
                                                            }
                                                        }
                                                    endforeach;
                                                endforeach;
                                            ?>
                                        >Pilih</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">No</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Inovator</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Nama Inovasi</th>
                                        <th class="text-center table-secondary align-middle" rowspan="2"
                                            <?php 
                                                if($cek_status_pelajar != null):
                                                    echo 'style="display: none;" hidden';
                                                endif;
                                            ?>>
                                            Status
                                        </th>
                                        <th class="text-center table-secondary align-middle" rowspan="2">Total Nilai</th>
                                        <th class="text-center table-secondary align-middle" colspan="7">Nama Penilai</th> 
                                    </tr>
                                    <tr>
                                        <?php foreach ($nama_penilai as $penilai): 
                                            $nama  = strstr($penilai["nama"], ' ', true);
                                        ?>
                                            <th class="text-center table-secondary align-middle" rowspan="1">
                                                <?php if($nama == null){ echo $penilai["nama"];}
                                                else{ echo $nama;}?>
                                            </th> 
                                        <?php endforeach; ?> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- sebelum diverifikasi -->
                                    <tr>                         
                                        <?php  
                                        $no=1;
                                            foreach($total_nilai as $key => $value) : ?>
                                            <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>
                                            <tr>
                                            <td>
                                                <input type="checkbox" name="urutan_nilai[]" value="<?php echo $value["id"];echo ("_"); echo $value["id_subevent"]; ?>">
                                                <input hidden name="semua_nilai[]" value="<?php echo $value["id"]?>">
                                            </td>
                                            <td align="center"><?php echo $no++ ?></td>
                                            <!--  <td><?php echo $value["id"]?></td> -->
                                            <td><?= $value['user']?></td>
                                            <td><?= $value['judul']?></td>
                                            <td align="center"><?= number_format( $value['total'],2)?></td>
                                                <?php foreach ($nama_penilai as $penilai): ?>
                                                    <td align="center">
                                                        <?php foreach ($value['nilai_verifikasi'] as $key2 => $val): ?>
                                                            <?php if($val->id_penilai == $penilai['id_usr']):?>
                                                                <?= $val->nilai_verifikasi ?>
                                                            <?php endif; ?>
                                                        <?php endforeach ?>
                                                    </td>
                                                <?php endforeach; ?>
                                        </tr>
                                        <?php } ?> 
                                        <?php endforeach; ?>
                                    </tr>
                                    <!-- sesudah diverifikasi -->
                                    <tr>                         
                                        <?php  
                                        $no=1;
                                            foreach($nilai_total as $key => $value) : ?>
                                            <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>
                                            <tr>
                                                <!-- <td>
                                                    <input type="checkbox" onclick="return false;"
                                                        <?php foreach($data_nominator as $dt_nomin):
                                                            if ($value['id'] == $dt_nomin['id_usulan']) 
                                                                {echo "checked";}
                                                        endforeach; ?>
                                                    >
                                                </td> -->
                                                <td align="center"><?php echo $no++ ?></td>
                                                <td><?= $value['user']?></td>
                                                <td><?= $value['judul']?></td>
                                                <td>
                                                    <span 
                                                        <?php foreach($data_nominator as $dt_nomin):
                                                            $data123 = in_array($dt_nomin['id_usulan'], $value);
                                                            if ($data123) {echo 'style="display: none;" hidden';}
                                                        endforeach; ?>
                                                    >Gugur</span>
                                                    <?php foreach($data_nominator as $dt_nomin):
                                                        $data123 = in_array($dt_nomin['id_usulan'], $value);
                                                        if ($data123) {echo 'Lolos';}
                                                    endforeach; ?>
                                                </td>
                                                <td align="center"><?= number_format( $value['total'],2)?></td>
                                            
                                                <?php foreach ($nama_penilai as $penilai): ?>
                                                    <td align="center">
                                                        <?php foreach ($value['nilai_verifikasi'] as $key2 => $val): ?>
                                                            <?php if($val->id_penilai == $penilai['id_usr']):?>
                                                                <?= $val->nilai_verifikasi ?>
                                                            <?php endif; ?>
                                                        <?php endforeach ?>
                                                    </td>
                                                <?php endforeach; ?> 
                                            </tr>
                                        <?php } ?> 
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function yo_gk_umum(){
        $('#modal_umum').modal('show').appendTo('body');
    }

    function yo_gk_pljr(){
        $('#modal_pljr').modal('show').appendTo('body');
    }

    function kirim_form_umum(){
        document.getElementById('form_umum').submit();
    }

    function kirim_form_pljr(){
        document.getElementById('form_pljr').submit();
    }

</script>

<!-- konfirmasi umum -->
<div class="modal fade" id="modal_umum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body ml-2">
        <h5 class="text-center">
            Apakah Anda yakin ingin menyimpan data ini ?
        </h5><br>
        <div class="d-flex row justify-content-around">
            <button type="button" onclick="kirim_form_umum()" class="btn btn-primary col-3">Iya</button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary col-3">Tidak</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- konfirmasi pelajar -->
<div class="modal fade" id="modal_pljr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body ml-2">
        <h5 class="text-center">
            Apakah Anda yakin ingin menyimpan data ini ?
        </h5><br>
        <div class="d-flex row justify-content-around">
            <button type="button" onclick="kirim_form_pljr()" class="btn btn-primary col-3">Iya</button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary col-3">Tidak</button>
        </div>
      </div>
    </div>
  </div>
</div>