<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
<div class="d-md-flex justify-content-between">
    <a id="semua_usulan" class="btn btn-sm btn-primary btn-icon-split mb-3">
        <span class="text">Jumlah Semua Usulan Terkini</span>
        <div class="bg-white text-secondary d-flex justify-content-center align-items-center" style="width: 25px; height: auto; border-radius: 10%;">
            <strong><?= $semua_usulan?></strong>
        </div>
    </a>
    <div class="d-md-flex justify-content-between"> 
        <a id="usulan_verif" class="btn btn-sm btn-info btn-icon-split mr-md-2 mb-3">
            <span class="text">Usulan Sudah Diverifikasi</span>
            <div class="bg-white text-secondary d-flex justify-content-center align-items-center" style="width: 25px; height: auto; border-radius: 10%;">
                <strong><?= $stts_verif?></strong>
            </div>
        </a>
        <a id="usulan_blm" class="btn btn-sm btn-danger btn-icon-split ml-md-2 mb-3">
            <span class="text">Usulan Belum Diverifikasi</span>
            <div class="bg-white text-secondary d-flex justify-content-center align-items-center" style="width: 25px; height: auto; border-radius: 10%;">
                <strong><?= $stts_blm?></strong>
            </div>
        </a>
    </div>
</div>
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center table-secondary">No</th>
                <th class="table-secondary">Tahun</th>
                <th class="table-secondary">Sub Event</th>
                <th class="table-secondary">Inovator</th>
                <th class="table-secondary">Nama Inovasi</th>
                <th class="table-secondary">Status</th>    
                <th class="text-center table-secondary">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($usulan as $usl) : ?>
            <tr>
                <td class="text-center align-middle"><?php echo $no++ ?></td>
                <td class="text-center align-middle"><?php echo $usl->tahun ?></td>
                <td class="text-center align-middle"><?php echo $usl->subevent ?></td>
                <td class="text-center align-middle"><?php echo $usl->user ?></td>
                <td style="text-align: justify; text-justify: inter-word;" class="align-middle">
                    <?php echo $usl->judul ?>
                </td>
                <td class="text-center align-middle">
                <?php 
                    if ($usl->status == '1')
                    {echo'Melengkapi Data';}
                    elseif ($usl->status == '5')
                    {echo'Belum Diverifikasi';}
                    elseif ($usl->status == '2'){
                        foreach($pen_pp as $pp){$cek_data_usulan[] = $pp['id_usulan'];}
                        if (in_array($usl->id,$cek_data_usulan)){
                            echo 'Sedang Dinilai';
                        }else{
                            echo'Terverifikasi';
                        }
                    }
                    elseif ($usl->status == '3')
                    {echo'Sedang Dinilai';}
                    elseif ($usl->status == '4')
                    {echo'Selesai';}
                ?>
                </td>
                <td class="align-middle" width="140">
                    <div class="d-flex justify-content-center align-items-center ">
                        <div class="btn btn-sm btn-success btn mr-1 detail-usulan" data-id="<?= $usl->id?>"><i class="fa fa-search"></i> View</div>
                        <?php foreach($pen_pp as $pp){$cek_data_usulan[] = $pp['id_usulan'];}
                        if (in_array($usl->id,$cek_data_usulan)):?>
                            <div class="btn btn-sm btn-secondary disabled btn ml-1"><i class="fa fa-edit"></i> Edit</div>
                        <?php else: 
                            if ($usl->status == '3' || $usl->status == '4'):?>
                                <div class="btn btn-sm btn-secondary disabled btn ml-1"><i class="fa fa-edit"></i> Edit</div>
                            <?php elseif($usl->status == '2' || $usl->status == '5'):?>
                                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle btn btn-sm btn-warning" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-edit mr-1" aria-hidden="true"></i>
                                            <span>Edit</span>
                                        </a>
                                        <style>
                                            .hover-warning:hover{color: orange;}
                                            .hover-danger:hover{color: red;}
                                            .hover-success:hover{color: green;}
                                            .cursor-pointer{cursor: pointer;}
                                        </style>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <h6 class="text-primary d-flex justify-content-center"><b>Edit Status:</b></h6>
                                            <div class="dropdown-divider"></div>
                                            <div class="form-check form-check-inline ml-3">
                                                <input <?= $usl->status == 2 ? "disabled checked" : ""?> class="form-check-input cursor-pointer status-usulan" name="status" id="radio1<?=$usl->id?>" type="radio" data-idusulan="<?= $usl->id?>" value="2">
                                                <label for="radio1<?=$usl->id?>" class="form-check-label cursor-pointer hover-success <?= $usl->status == 2 ? "text-success" : ""?>">Verifikasi</label>
                                            </div>
                                            <div class="form-check form-check-inline ml-3">
                                                <input <?= $usl->status == 5 ? "disabled checked" : ""?> class="form-check-input cursor-pointer status-usulan" name="status" id="radio2<?=$usl->id?>" type="radio" data-idusulan="<?= $usl->id?>" value="5">
                                                <label for="radio2<?=$usl->id?>" class="form-check-label cursor-pointer hover-warning <?= $usl->status == 5 ? "text-warning" : ""?>">Un-verifikasi</label>
                                            </div>
                                            <div class="form-check form-check-inline ml-3">
                                                <input class="form-check-input cursor-pointer status-usulan" name="status" id="radio3<?=$usl->id?>" type="radio" data-idusulan="<?= $usl->id?>" value="1">
                                                <label for="radio3<?=$usl->id?>" class="form-check-label cursor-pointer hover-danger">Melengkapi Data</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endif;?>        
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#semua_usulan').on('click', function(){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/semua_usulan/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        });

        $('#usulan_verif').on('click', function(){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/usulan_verif/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        });

        $('#usulan_blm').on('click', function(){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/usulan_blm/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        });

        $('.status-usulan').on('click', function(){
            var value= $(this).val();
            var id = $(this).data('idusulan');

            $.ajax({
            type: "GET",
            url: "<?= base_url('admin/usulan_terkini/edit_status_usulan/')?>"+value+"/"+id,
            success: function (response) {
                return sukses_edit(<?=$filter?>);
            }
            });
        });

        $('.detail-usulan').on('click', function(){
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/detail_usulan/')?>"+id,
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        });
    });

    function sukses_edit(filter)
    {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            background: '#F0F8FF',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: 'success',
            title: 'Sukses status berhasil diubah',
        });

        if(filter == 1){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/semua_usulan/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        }else if(filter == 2){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/usulan_verif/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        }else if(filter == 3){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/usulan_terkini/usulan_blm/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        }
    }
</script>