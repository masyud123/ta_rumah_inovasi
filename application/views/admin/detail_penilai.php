<div class="container-fluid">
	<div class="mb-3">
		<?php foreach($jumlah_penilai as $nm) : ?>
			<?php if ($nm->id <= 6) { ?>
				<button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#tambah_penilai">
					<span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span>
					<span class="text">Tambah Penilai</span>
				</button>
			<?php }else{ ?>
				<button type="button" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#tambah_gagal">
					<span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span>
					<span class="text">Tambah Penilai</span>
				</button>
		  <?php } ?>
  		<?php endforeach; ?>
		<a href="<?php echo base_url('admin/Data_penilai/') ?>"><div class="btn btn-sm btn-warning ml-sm-2">Kembali</div></a>
	</div>
	<div class="card shadow">
		<div
			class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Sub Event : <?php echo $subevent->subevent ?></h6>
		</div>
      	<div class="card-body">
			<?= $this->session->flashdata('message1');  ?>
			<?= $this->session->flashdata('hapus_penilai');  ?>
			<div class="table-responsive">
				<table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center table-secondary"	>No</th>
							<th class="text-center table-secondary">Nama Penilai</th>
							<th class="text-center table-secondary">Email</th>
							<th class="text-center table-secondary">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1;foreach($nama_penilai as $setpnl) : ?>
				      	<tr>
				        	<td align="center"><?php echo $no++ ?></td>
							<td align="center"><?php echo $setpnl->nama ?></td>
							<td align="center"><?php echo $setpnl->email ?></td>
							<td align="center">
								<div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_penilai<?php echo $setpnl->id ?>"><i class="fa fa-trash"></i> <a>Hapus</a></div>
							</td>
						 </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
      	</div>
  	</div>
</div>


<!-- Modal tambah penilai -->
<div class="modal fade" id="tambah_penilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Tambah Penilai</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(). 'admin/Data_penilai/tambah_penilai/'; ?>" method="post" enctype="multipart/form-data" >
					<div class="d-md-flex justify-content-between">
						<dt class="col-md-4">Sub Event</dt>
						<input type="text" name="subevent" class="form-control col-md-8" value="<?= $subevent->subevent ?>" readonly>
						<input type="hidden" name="id_subevent" class="form-control" value="<?= $subevent->id ?>" >
					</div><br>
					<div class="d-flex justify-content-between">
						<dt class="col-md-4">Penilai</dt>
						<select class="form-control col-md-8" name="id_usr">
							<?php foreach($list_penilai as $nilai) : ?>
								<option value="<?= $nilai->id_usr ?>">
									<?= $nilai->nama ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div><br>
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-secondary ml-3" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal hapus penilai -->
<?php foreach($nama_penilai as $setpnl) : ?>
	<div class="modal fade" id="hapus_penilai<?php echo $setpnl->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
				</div>
				<div class="modal-body">
					<p>Apakah Anda yakin akan menghapus data ini?</p>
					<form enctype="multipart/form-data" method="post" action="<?= base_url('admin/Data_penilai/hapus/') ?>">
						<div hidden="">
							id_user<input value="<?php echo $setpnl->id_usr?>" type="text" name="id_user"><br>
							id_penilai<input value="<?php echo $setpnl->id?>" type="text" name="id_penilai">
						</div>
						<div align="right">
							<button type="submit" class="mr-2 btn btn-primary" style="width:20%;">Iya</button>
							<button type="button" class="ml-2 btn btn-secondary" style="width:20%;" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- modal gagal tambah penilai-->
<div class="modal fade" id="tambah_gagal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary"  id="exampleModalLabel"><i class="fas fa-info-circle "></i> Informasi</h5>
      </div>
      <div class="modal-body">
        <p>Data penilai sudah mencapai batas maksimal !</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>


