<div class="container-fluid">
    <?php echo $this->session->flashdata('bidang');
     foreach($subevent as $subev):?>
    <div class="col-lg-9 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample<?= $subev['id']?>" class="d-block card-header py-3" data-toggle="collapse"
                role="button" >
                <div class="row align-items-center ml-1">
                    <div class="row col-6">
                        <h6 class="m-0 font-weight-bold text-secondary mr-2">Sub Event: </h6>
                        <h6 class="m-0 font-weight-bold text-primary"><?= $subev['subevent']?></h6>
                    </div>
                </div>
            </a>
            
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample<?= $subev['id']?>">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-2 d-block d-sm-flex justify-content-between ">
                            <div class="d-block d-md-flex">
                                <?php foreach($jumlah as $jmlh):
                                if($jmlh['id_subevent'] == $subev['id']): ?>
                                    <button href="#" disabled class="btn btn-success btn-icon-split btn-sm mr-3 mb-2">
                                        <span class="text">Bidang Aktif</span>
                                        <span class="icon text-white">
                                            <?= $jmlh['aktif']?>
                                        </span>
                                    </button>
                                    <button href="#" disabled class="btn btn-secondary btn-icon-split btn-sm mb-2">
                                        <span class="text">Bidang Tidak Aktif</span>
                                        <span class="icon text-white">
                                        <?= $jmlh['tdk_aktif']?>
                                        </span>
                                    </button>
                                <?php endif; endforeach; ?>
                            </div>
                            <button data-toggle="modal" data-target="#tambah_bidang<?= $subev['id']?>" 
                            type="button" class="btn btn-info btn-icon-split btn-sm mb-2 tambah_bidang">
                                <span class="icon text-white">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                                <span class="text">Tambah Bidang</span>
                            </button>
                        </div>
                        <table class="table table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center table-secondary">No</th>
                                    <th class="table-secondary">Bidang</th>
                                    <th class="text-center table-secondary">Status</th>
                                    <th class="text-center table-secondary" colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; 
                                  foreach($bidang as $dt_bidang):
                                  if($dt_bidang['id_subevent'] == $subev['id']): ?>
                                  <tr>
                                      <td width="50" class="text-center"><?php echo $no++; ?></td>
                                      <td><?= $dt_bidang['bidang']?></td>
                                      <td width="150" class="text-center">
                                        <?php if($dt_bidang['status'] == 1){
                                            echo "Aktif";
                                          }else{
                                            echo "Tidak Aktif";
                                          }?>
                                      </td>
                                      <td class="text-center" width="110">
                                          <button data-toggle="modal" data-target="#edit_bidang<?= $dt_bidang['id']?>" type="button" class="btn btn-warning btn-sm edit_bidang" data-id="<?= $dt_bidang['id']?>"><i class="fa fa-edit mr-1" aria-hidden="true"></i>Edit</button>
                                      </td>
                                      <td class="text-center" width="110">
                                          <button id="hapus_bidang" data-id="<?= $dt_bidang['id']?>" type="button" class="btn btn-danger btn-sm hapus_bidang"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Hapus</button>
                                      </td>
                                  </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>


<?php foreach($subevent as $subev):?>
    <!-- Modal tambah bidang -->
    <div class="modal fade" id="tambah_bidang<?= $subev['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/Data_bidang/tambah_bidang/'.$subev['id'])?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row align-items-center">
                            <span class="col-lg-4">Nama Sub Event</span>
                            <input disabled type="text" class="form-control col-lg-7" value="<?= $subev['subevent']?>">
                        </div>
                        <div class="form-group row align-items-center">
                            <span class="col-lg-4">Nama Bidang</span>
                            <input id="bidang" name="bidang" type="text" class="form-control col-lg-7" required>
                        </div>
                        <div class="form-group row align-items-center">
                            <span class="col-lg-4">Status</span>
                            <select name="status" class="form-control col-lg-7" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="row justify-content-end mr-2 ml-2 mt-4">
                            <button type="button" class="btn btn-secondary btn-sm mr-1" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm ml-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit bidang -->
    <?php foreach($bidang as $dt_bidang):
    if($dt_bidang['id_subevent'] == $subev['id']): ?>
        <div class="modal fade" id="edit_bidang<?= $dt_bidang['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/Data_bidang/edit_bidang/'.$dt_bidang['id'])?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row align-items-center">
                                <span class="col-lg-4">Nama Sub Event</span>
                                <input disabled type="text" class="form-control col-lg-7" value="<?= $subev['subevent']?>">
                            </div>
                            <div class="form-group row align-items-center">
                                <span class="col-lg-4">Nama Bidang</span>
                                <input id="bidang<?= $dt_bidang['id']?>" name="bidang" type="text" class="form-control col-lg-7" value="<?= $dt_bidang['bidang']?>" required>
                            </div>
                            <div class="form-group row align-items-center">
                                <span class="col-lg-4">Status</span>
                                <select name="status" class="form-control col-lg-7" required>
                                    <option <?php if($dt_bidang['status'] == 1){echo "selected";}?> value="1">Aktif</option>
                                    <option <?php if($dt_bidang['status'] == 0){echo "selected";}?> value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="row justify-content-end mr-2 ml-2 mt-4">
                                <button type="button" class="btn btn-secondary btn-sm mr-1" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary btn-sm ml-1">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; endforeach; ?>
<?php endforeach; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('.tambah_bidang').click(function() {
            $('#bidang').val('');
        });

        $('.hapus_bidang').click(function() {
            var id_bidang = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                window.location = "<?php echo base_url('admin/Data_bidang/hapus_bidang/') ?>" + id_bidang;
                }
            });
        });

        $('.edit_bidang').click(function() {
            var id_bidang = $(this).data('id');
            var bidang = $('#bidang'+id_bidang).val();
            return value_tetap(id_bidang, bidang);
        });

        function value_tetap(id_bidang, bidang) { 
			var myTimer = setInterval(function() {
				if($('#edit_bidang'+id_bidang).hasClass('in') != true) {
					clearInterval(myTimer);
					$('#bidang'+id_bidang).val(bidang);
				}
			}, 500);
		}
    });
</script>