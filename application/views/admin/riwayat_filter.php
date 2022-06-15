<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">

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
                <td class="text-center align-middle"><?php echo $usl->nama_ketua ?></td>
                <td style="text-align: justify; text-justify: inter-word;" class="align-middle">
                    <?php echo $usl->judul ?>
                </td>
                <td class="text-center align-middle">
                <?php 
                    if ($usl->status == '1')
                    {echo'Melengkapi Data';}
                    elseif ($usl->status == '2' || $usl->status == '3')
                    {echo'Sedang Dinilai';}
                    elseif ($usl->status == '4')
                    {echo'Selesai';}
                ?>
                </td>
                <td class="align-middle" width="140">
                    <div class="d-flex justify-content-center align-items-center ">
                        <div class="btn btn-sm btn-info btn mr-1" onclick="window.location.href='<?= base_url('admin/data_riwayat/view/'.$usl->id)?>'"><i class="fa fa-search mr-1"></i> Lihat detail</div>
                        <!-- <?php foreach($pen_pp as $pp){$data[] = $pp['id_usulan'];}
                        if (in_array($usl->id,$data)):?>
                            <div class="btn btn-sm btn-secondary disabled btn ml-1"><i class="fa fa-edit"></i> Edit</div>
                        <?php else: 
                            if ($usl->status == '3' || $usl->status == '4'):?>
                                <div class="btn btn-sm btn-secondary disabled btn ml-1"><i class="fa fa-edit"></i> Edit</div>
                            <?php else:?>
                                <?php echo anchor('admin/data_riwayat/edit/' .$usl->id, '<div class="btn btn-sm btn-warning btn ml-1"><i class="fa fa-edit"></i> Edit</div>') ?>
                            <?php endif;
                        endif;?> -->
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