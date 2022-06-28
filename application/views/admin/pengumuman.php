<div class="container-fluid">
    <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_pengumuman">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Pengumuman</span>
    </a>
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DATA PENGUMUMAN</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message');  ?>
            <div style="overflow-y: auto;">
                <table id="dataTable" class="table table-bordered table-hover" width="1030" cellspacing="0">
                    <thead>
                        <tr>
                          <th class="text-center align-middle table-secondary">No</th>
                          <th class="text-center align-middle table-secondary">Judul Pengumuman</th>
                          <th class="text-center align-middle table-secondary">Deskripsi</th>
                          <th class="text-center align-middle table-secondary">Status</th>
                          <th class="text-center align-middle table-secondary" >Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($pengumuman as $png) : ?>
                        <tr>
                            <td width="50" align="center"><?php echo $no++ ?></td>
                            <td width="150"><?php echo $png->judul_pengumuman ?></td>
                            <td width="450" style="text-align: justify; text-justify: inter-word;">
                                <?php echo $png->deskripsi_pengumuman ?>
                            </td>
                            <td width="100" class="text-center">
                                <?php if ( $png->status == 1) {
                                  echo "Published";
                                } else {
                                  echo "Draft";
                                }?>
                            </td>
                            <td class="text-center">
                                <div class="form-group">
                                    <div class="btn btn-sm btn-info btn col-10 mb-2" data-toggle="modal" data-target="#lihat_pengumuman<?php echo $png->id_pengumuman ?>"><i class="fa fa-search-plus mr-1"></i> Lihat File
                                    </div><br>
                                    <?php echo anchor('admin/Pengumuman/edit/' . $png->id_pengumuman, '<div class="btn btn-sm btn-warning btn col-10 mb-2"><i class="fa fa-edit mr-1"></i> Edit</div>') ?><br>
                                    <div class="btn btn-sm btn-danger btn col-10 " data-toggle="modal" data-target="#hapus_pengumuman<?php echo $png->id_pengumuman ?>"><i class="fa fa-trash mr-1"></i> Hapus</div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- tambah pengumuman -->
<div class="modal fade" id="tambah_pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Pengumuman</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/Pengumuman/tambah_pengumuman'; ?>" method="post" enctype="multipart/form-data" >
            <div class="form-group">
              <dt class="">Judul</dt>
              <input type="text" name="judul" class="form-control" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
              <dt class="">Deskripsi</dt>
              <textarea type="text" name="deskripsi" class="form-control" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')"></textarea>
            </div>

            <div class="form-group">
              <dt class="">Status</dt>
              <select class="form-control" name="status" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
                <option value="1">Tampilkan</option>
                <option value="2">Sembunyikan</option>
              </select>
            </div>

            <div class="form-group">
              <dt class="">File</dt>
              <input type="file" name="file"  class="form-control-file" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach ($pengumuman as $png) : ?>
    <!-- lihat pengumuman -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_pengumuman<?= $png->id_pengumuman?>" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"  id="exampleModalLabel">Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="<?php echo base_url().'/uploads/'.$png->file_pengumuman ?>" frameborder="0" width="100%" height="600px" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

    <!-- hapus pengumuman -->
    <div class="modal fade" id="hapus_pengumuman<?php echo $png->id_pengumuman ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                </div>
                <form action="<?php echo base_url('admin/Pengumuman/hapus/') ?>" enctype="multipart/form-data" method="post">
                    <input hidden value="<?php echo $png->id_pengumuman ?>" type="text" name="id">
                    <div class="modal-body">
                        <p>Apakah Anda yakin akan menghapus data ini?</p>
                        <div class="d-flex justify-content-end">
                          <button type="submit" class="btn btn-danger mr-2">Iya</button>
                          <button type="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>