<div class="container-fluid">
	<div class="card shadow">
      <h5 class="card-header"><b><i class="fas fa-edit"></i> Edit Data Pengumuman</b></h5>
      <div class="card-body">
			<div class="row">
            <div class="col-md-12">
					<table class="table">
						<?php foreach ($pengumuman as $png) : ?>
							<form method="post" action="<?php echo base_url().'admin/pengumuman/update' ?>" enctype="multipart/form-data">
								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Judul</dt>
										<div class="col-sm-5 mb-3">
											<input type="hidden" name="id_pengumuman" class="form-control" value="<?php echo $png->id_pengumuman ?>">
											<input type="text" name="judul_pengumuman" class="form-control" value="<?php echo $png->judul_pengumuman ?>" required>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Deskripsi</dt>
										<div class="col-sm-5 mb-3">
											<textarea type="text" name="deskripsi_pengumuman" class="form-control" required><?php echo $png->deskripsi_pengumuman ?></textarea>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Status</dt>
										<div class="col-sm-5 mb-3">
											<!-- <input type="text" name="status" class="form-control" value="<?php if ($png->status == 1 ){echo "Tampilkan";}else{echo "Sembunyikan";}?>" required> -->

											<select class="form-control" id="status" name="status" >
												<option value="<?php if ($png->status == 1 ){echo "1";}else{echo "2";}?>"><?php if ($png->status == 1 ){echo "Tampilkan";}else{echo "Sembunyikan";}?></option>
												<?php if ($png->status == 1 ) : ?>
												<option value="2">Sembunyikan</option>
											<?php else :?>
												<option value="1">Tampilkan</option>
											<?php endif;?>
											</select>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">File</dt>
										<div class="col-sm-5 mb-3">
											<input type="file" name="file" class="form-control-file" value="<?php echo $png->file_pengumuman ?>">
										</div>
								</div>
								<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan</button>
								<a href="<?php echo base_url('admin/pengumuman') ?>"><div class="btn btn-sm btn-secondary mt-3">Kembali</div></a>
							</form>
						<?php endforeach; ?>
					</table>
            </div>
         </div>
     </div>
   </div>
</div>