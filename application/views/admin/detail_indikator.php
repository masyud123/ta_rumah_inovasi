<div class="container-fluid">
	<div>
		<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4 ml-3" data-toggle="modal" data-target="#tambah_nominator">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Tambah Keterangan</span>
		</a> 
		<button type="button" class="btn btn-sm btn-warning btn-icon-split mb-4 ml-2" onclick="window.location.href='<?= base_url('admin/data_inovasi/detail_inovasi/'.$id_subevent)?>'">
			<span class="icon text-white-50">
				<i class="fas fa-arrow-left"></i>
			</span>
			<span class="text">Kembali</span>
		</button>
	</div>

  <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Indikator : <?php echo $indikator_penilaian->indikator ?></h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <?php echo $this->session->flashdata('ket_nilai_indikator');  ?>
        <div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th class="text-center table-secondary">No</th>
						<th class="text-center table-secondary">Keterangan</th>
						<th class="text-center table-secondary">Nilai Minimal</th>
						<th class="text-center table-secondary">Nilai Maksimal</th>
						<th class="text-center table-secondary" colspan="2">Aksi</th>
					</tr>

					<?php $no=1;
				    foreach($keterangan_indikator as $ketind) : ?>
				    	<tr>
				        	<td align="center"><?php echo $no++ ?></td>
							<td><?php echo $ketind->keterangan ?></td>
							<td align="center"><?php echo $ketind->nilai_minimal_keterangan ?></td>
							<td align="center"><?php echo $ketind->nilai_maksimal_keterangan ?></td>
							<?php if ($hasil_cek == "ada") :?>
								<td align="center" style="width: 50">
									<div class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-edit"></i> <a>Edit</a></div></td>
								<td align="center" style="width: 50">
									<div class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-trash"></i> <a>Hapus</a></div></td>
							<?php elseif($hasil_cek == "kosong"): ?>
								<!-- <td align="center" style="width: 50">
									<?php echo anchor('admin/data_inovasi/edit/' .$ketind->id_keterangan_indikator, '<div class="btn btn-sm btn-primary btn"><i class=" mr-2 fa fa-edit"></i>Edit</div>') ?>
								</td>  -->
								<td align="center">
									<div class="btn btn-sm btn-primary btn" data-toggle="modal" data-target="#edit_keterangan_nilai<?php echo $ketind->id_keterangan_indikator ?>"><i class=" mr-2 fa fa-edit"></i><a>Edit</a></div>
								</td>
								<td align="center" style="width: 50">
									<div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_keterangan_nilai<?php echo $ketind->id_keterangan_indikator ?>"><i class=" mr-2 fa fa-trash"></i><a>Hapus</a></div>
								</td>
							<?php endif;?>
						</tr>
					<?php endforeach; ?>
			 
				</table>
			</div>
      </div>
  </div>
</div>

<!-- Modal tambah detail keterangan indikator penilian-->
<div class="modal fade" id="tambah_nominator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title"  id="exampleModalLabel">Tambah Keterangan</h5>
		</div>
        <form action="<?php echo base_url(). 'admin/data_inovasi/tambah_keterangan/'; ?>" method="post" enctype="multipart/form-data" >
		<div class="modal-body">
			<?php foreach ($keterangan_indikator as $ketind) ;?>
			<div class="form-group row ml-2">
				<dt class="mr-4 text-size 25">Indikator</dt>
				<input type="text" name="indikator" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" value="<?php echo $indikator_penilaian->indikator ?>" readonly>
				<input type="text" name="id_indikator_penilaian" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" value="<?php echo $indikator_penilaian->id_indikator_penilaian ?>" hidden>
			</div><br>
			<div class="form-group row ml-2">
				<dt class="mr-4 text-size 25">Keterangan</dt>
				<input type="text" name="keterangan" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
			</div><br>
			<div class="form-group row ml-2">
				<dt class="mr-4 text-size 25">Nilai Minimal</dt>
				<input type="number" id="nilai_min" onchange="set_nilai_min()" name="nilai_minimal_keterangan" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" max="100" required oninvalid="this.setCustomValidity('Nilai minimal harus lebih kecil dari nilai maksimal!')" oninput="setCustomValidity('')">
			</div><br>
			<div class="form-group row ml-2">
				<dt class="mr-4 text-size 25">Nilai Maksimal</dt>
				<input type="number" id="nilai_max" onchange="set_nilai_max()" name="nilai_maksimal_keterangan" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" max="100" required oninvalid="this.setCustomValidity('Nilai maksimal harus lebih besar dari nilai minimal!')" oninput="setCustomValidity('')" >
			</div><br>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		</div>
      	</form>
    </div>
  </div>
</div>

<?php foreach($keterangan_indikator as $ketind) : ?>
<!-- hapus keterangan indikator penilian -->
<div class="modal fade" id="hapus_keterangan_nilai<?php echo $ketind->id_keterangan_indikator ?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data ini?</p>
				<div class="modal-footer">
					<?php echo anchor('admin/data_inovasi/hapus_keterangan/' .$ketind->id_keterangan_indikator,   '<div class="btn btn-danger btn">Hapus</div>') ?>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- edit keterangan indikator penilian -->
<div class="modal fade" id="edit_keterangan_nilai<?php echo $ketind->id_keterangan_indikator ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Edit Data</h5>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('admin/data_inovasi/update/'.$ketind->id_keterangan_indikator) ?>">
					<div class="row d-flex align-items-center mb-3">
						<h6 class="col-md-4"><strong>Indikator</strong></h6>	
						<input type="text" class="form-control col-md-7" value="<?php echo $indikator_penilaian->indikator ?>" disabled>
					</div>
					<div class="row d-flex align-items-center mb-3">
						<h6 class="col-md-4"><strong>Keterangan</strong></h6>	
						<input type="text" name="keterangan" class="form-control col-md-7" value="<?php echo $ketind->keterangan ?>" required>
					</div>
					<div class= "row d-flex align-items-center mb-3">
						<h6 class="col-md-4"><strong>Nilai Minimal</strong></h6>
						<input type="number" name="nilai_minimal" class="form-control col-3" value="<?php echo $ketind->nilai_minimal_keterangan ?>" min=0 required>
					</div>
					<div class="row d-flex align-items-center mb-3">
						<h6 class="col-md-4"><strong>Nilai Maksimal</strong></h6>
						<input type="number" name="nilai_maksimal" class="form-control col-3" value="<?php echo $ketind->nilai_maksimal_keterangan ?>" min=0 required>
					</div>
					<div class="row justify-content-end mt-4">
						<button type="submit" class="btn btn-primary mr-2"> Simpan</button>
						<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>

<script type="text/javascript">
	function set_nilai_min(){
		var nilai_min = $('#nilai_min').val();
		document.getElementById('nilai_max').setAttribute('min', nilai_min);
	}

	function set_nilai_max(){
		var nilai_max = $('#nilai_max').val();
		document.getElementById('nilai_min').setAttribute('max', nilai_max);
	}
</script>