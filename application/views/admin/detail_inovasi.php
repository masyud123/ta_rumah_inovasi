<div class="container-fluid">
	<div>
		<?php if ($hasil_cek == "ada") :?>
		<a href="#" class="btn btn-secondary disabled btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_inovasi">
			<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
			</span>
			<span class="text">Tambah Indikator</span>
		</a>
		<?php elseif($hasil_cek == "kosong"): ?>
				<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_inovasi">
			<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
			</span>
			<span class="text">Tambah Indikator</span>
		</a>
		<?php endif;?>
		
		<button type="button" class="btn btn-sm btn-warning btn-icon-split mb-4 ml-2" onclick="window.location.href='<?= base_url('admin/Data_inovasi/')?>'">
			<span class="icon text-white-50">
			<i class="fas fa-arrow-left"></i>
			</span>
			<span class="text">Kembali</span>
		</button>
		
	</div>
	<h5>DATA DETAIL INOVASI</h5>
	<div class="card shadow mb-4">
      	<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Sub Event : <?php echo $subevent->subevent ?></h6>
		</div>
      	<!-- Card Body -->
      	<div class="card-body">
       	<?php echo $this->session->flashdata('indikator_penilaian');  ?>
         	<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th class="text-center table-secondary">No</th>
						<th class="text-center table-secondary" style="width: 60%;">Indikator</th>
						<!-- <th class="text-center table-secondary">Detail Nilai</th> -->
						<th colspan="3" class="text-center table-secondary">Aksi</th>
					</tr>

					<?php $no=1;
						foreach($indikator_penilaian as $id_pen) : ?>
						<tr>
							<td align="center"><?php echo $no++ ?></td>
							<td><?php echo $id_pen->indikator ?></td>
							<td align="center"><?php echo anchor('admin/Data_inovasi/detail_indikator/'.$id_subevent.'/'.$id_pen->id_indikator_penilaian,'<div class="btn btn-warning btn-sm"><i class="fa fa-search-plus mr-2"></i> Detail Nilai</div>') ?></td>
							<?php if ($hasil_cek == "ada") :?>
								<td align="center" style="width: 50"> <div class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-edit"></i> <a>Edit</a></div></td>
								<td align="center" style="width: 50"> <div class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-trash"></i> <a>Hapus</a></div></td>
							<?php elseif($hasil_cek == "kosong"): ?>
								<td align="center" style="width: 50">
									<button type="button" class="btn btn-sm btn-primary btn" data-toggle="modal" data-target="#edit_indikator<?= $id_pen->id_indikator_penilaian?>"><i class="fa fa-edit mr-2"></i>Edit</button>
								</td> 
								<td align="center" style="width: 50">
									<div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_indikator_inovasi<?php echo $id_pen->id_indikator_penilaian ?>"><i class="fa fa-trash mr-2"></i><a>Hapus</a></div>
								</td>
							<?php endif;?>
						</tr>
					<?php endforeach; ?>
				</table>	
       		</div>
    	</div>
  	</div>
</div>

	<!-- Modal tambah indikator-->
<div class="modal fade" id="tambah_inovasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title"  id="exampleModalLabel">Tambah Indikator Inovasi</h5>
		</div>
      	<div class="modal-body">
        	<form action="<?php echo base_url(). 'admin/Data_inovasi/tambah_inovasi/'; ?>" method="post" enctype="multipart/form-data" >
				<div class="form-group row ml-2">
					<dt class="mr-4 text-size 25">Sub Event</dt>
					<input type="text" name="subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->subevent ?>" readonly>
					<input type="text" name="id_subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->id ?>" hidden>
				</div><br>

				<div class="form-group row ml-2">
					<dt class="mr-4 text-size 25">Indikator</dt>
					<input type="text" name="indikator" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
				</div><br>
				
				<div class="row justify-content-end">
					<button type="submit" class="btn btn-primary mr-2">Simpan</button>
					<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
				</div>
      		</form>
		</div>
    </div>
  </div>
</div>


<?php foreach($indikator_penilaian as $id_pen) : ?>
	<!-- modal hapus indikator penilaian-->	
<div class="modal fade" id="hapus_indikator_inovasi<?php echo $id_pen->id_indikator_penilaian ?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<?php echo anchor('admin/Data_inovasi/hapus/' .$id_pen->id_indikator_penilaian, '<div class="btn btn-danger btn">Hapus</div>') ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

	<!-- modal edit indikator penilaian-->
<div class="modal fade" id="edit_indikator<?php echo $id_pen->id_indikator_penilaian ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Edit Indikator Penilaian</h5>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url('admin/Data_inovasi/update_indikator/'.$id_pen->id_indikator_penilaian) ?>">
					<div class="form-group d-flex align-items-center row">
						<h6 class="col-lg-4"><strong>Sub Event</strong></h6>
						<input type="text" class="form-control col-lg-7" value="<?php echo $subevent->subevent ?>" disabled required>
					</div>
					<div class="form-group d-flex align-items-center row">
						<h6 class="col-lg-4"><strong>Keterangan</strong></h6>
						<input type="text" name="indikator" class="form-control col-lg-7" value="<?php echo $id_pen->indikator ?>" required>
					</div>
					<div class="row justify-content-end mt-4">
						<button type="submit" class="btn btn-primary mr-2">Simpan</button>
						<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php endforeach; ?>
