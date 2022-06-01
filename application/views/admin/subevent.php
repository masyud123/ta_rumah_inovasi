<div class="container-fluid">
    <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_subevent">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Sub Event</span>
    </a>
    <?php echo $this->session->flashdata('message');  ?>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DATA SUB EVENT</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th class="table-secondary align-middle text-center">No</th>
                        <th class="table-secondary align-middle text-center">Tahun</th>
                        <th class="table-secondary align-middle text-center">Event</th>
                        <th class="table-secondary align-middle text-center">Sub Event</th>
                        <th class="table-secondary align-middle text-center">Tanggal Mulai</th>
                        <th class="table-secondary align-middle text-center">Tanggal Berakhir</th>
                        <th class="table-secondary align-middle text-center">Status Pendaftaran</th>
                        <th class="text-center table-secondary align-middle text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach($subevent as $sbevt) : ?>
                      <tr>
                          <td class="text-center"><?php echo $no++ ?></td>
                          <td class="text-center"><?php echo $sbevt->tahun ?></td>
                          <td class="text-center"><?php echo $sbevt->event ?></td>
                          <td class="text-center"><?php echo $sbevt->subevent ?></td>
                          <td class="text-center"><?php echo $sbevt->mulai ?></td>
                          <td class="text-center"><?php echo $sbevt->akhir ?></td>
                          <td class="text-center">
                            <?php $status = $sbevt->status_pendaftaran;
                              if($status == 1){
                                echo "Dibuka";
                              }elseif($status == 0){
                                echo "Ditutup";
                              }
                            ?>
                          </td>
                          <td class="d-flex justify-content-between" width="150">
                              <?php echo anchor('admin/data_subevent/edit/' .$sbevt->id, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i> Edit</div>') ?>
                              <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_subevent<?php echo $sbevt->id ?>"><i class="fa fa-trash"></i><a> Hapus</a></div>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah subevent-->
<div class="modal fade" id="tambah_subevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title">Tambah Sub Event</h5>
            </div>
            <form action="<?= base_url('admin/data_subevent/tambah_subevent')?>" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="ml-2 mr-2">
                        <div class="form-group">
                          <dt>Tahun</dt>
                          <input type="text" name="tahun" class="form-control" value="<?php echo date("Y") ?>" readonly>
                        </div>

                        <div class="form-group">
                          <dt>Event</dt>
                          <select class="form-control" name="id_event">
                            <?php foreach($list_event as $evt) : ?>
                              <option value="<?php echo $evt->id ?>">
                                <?php echo $evt->event ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <dt>Sub Event</dt>
                          <input type="text" name="subevent" id="subevent" class="form-control">
                        </div>

                        <div class="form-group">
                          <dt>Tanggal Mulai</dt>
                          <input type="date" name="mulai" id="mulai" class="form-control">
                        </div>

                        <div class="form-group">
                          <dt >Tanggal Berakhir</dt>
                          <input type="date" name="akhir" id="akhir" class="form-control">
                        </div>

                        <div class="form-group">
                          <dt>Status Pendaftaran</dt>
                          <select name="status_pendaftaran" class="form-control">
                            <option value="1">Dibuka</option>
                            <option value="0">Ditutup</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="simpan_subevent" type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<?php foreach($subevent as $sbevt) : ?>
    <div class="modal fade" id="hapus_subevent<?php echo $sbevt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                </div>
                <form action="<?php echo base_url('admin/data_subevent/hapus/') ?>" enctype="multipart/form-data" method="post">
                    <input hidden value="<?php echo $sbevt->id ?>" type="text" name="id">
                    <div class="modal-body">
                      <p>Apakah Anda yakin akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Iya</button>
                      <button type="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach;?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">;
    $(document).ready(function(){
        $('#mulai').on('change', function(){
            const date = new Date($(this).val());
            date.setDate(date.getDate() + 1);
            $('#akhir').attr('min', ''+date.toInputFormat()+'');
        });
      
        $('#akhir').on('change', function(){
            const date = new Date($(this).val());
            date.setDate(date.getDate() - 1);
            $('#mulai').attr('max', ''+date.toInputFormat()+'');
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
            var dd  = this.getDate().toString();
            return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
        };

        $('#simpan_subevent').on('click', function(){
            var sub = $('#subevent').val();
            var mulai = $('#mulai').val();
            var akhir = $('#akhir').val();

            if(sub != '' && mulai != '' && akhir != ''){
                if(Date.parse(mulai)>=Date.parse(akhir)){
                    Swal.fire({
                      title: "Gagal Menyimpan",
                      text: "Tanggal berakhir harus lebih besar dari tanggal mulai!",
                      icon: "error",
                      buttons: {
                          cancel: false,
                          confirm: true
                      }
                    });
                    return false;
                }else{
                  // eksekusi submit
                }
            }else{
              Swal.fire({
                  title: "Gagal Menyimpan",
                  text: "Semua form input wajib diisi!",
                  icon: "error",
                  buttons: {
                      cancel: false,
                      confirm: true
                  }
              });
              return false;
            }
        });
    });
</script>