<div class="container-fluid">
	<div class="d-flex justify-content-end mb-3">
		<a href="<?= base_url('peserta/daftar') ?>" class="btn btn-sm btn-info btn-icon-split ml-5">
			<span class="icon text-white-50">
			<i class="fas fa-plus mt-1"></i>
			</span>
			<span class="text mt-1"><strong>Tambah Inovasi</strong></span>
		</a>
	</div>

  	<?= $this->session->flashdata('pesan1') ?>
  	<?= $this->session->flashdata('pesan2') ?>
  	<?= $this->session->flashdata('berubah3') ?>

  	<div class="card shadow mb-4">
  		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        	<h6 class="m-0 font-weight-bold text-primary">RIWAYAT INOVASI</h6>
      	</div>
        <div class="card-body">
			<div style="overflow-y: auto;">
				<table class="table table-hover table-bordered" style="width: 1050px;">
					<tr>
						<th class="text-center table-secondary">NO</th>
						<th width="13%" class="text-center table-secondary">Event</th>
						<th width="13%"class="text-center table-secondary">Sub Event</th>
						<th width="13%"class="text-center table-secondary">Kategori</th>
						<th width="13%"class="text-center table-secondary">Nama Tim</th>
						<th width="13%"class="text-center table-secondary">Nama Inovasi</th>
						<th width="13%"class="text-center table-secondary">Status</th>
						<th class="text-center table-secondary">Aksi</th>
						
					</tr>

					<?php $no=1; foreach($riwayat as $riw) : ?>
						<tr>
							<td class="text-center align-middle"><?= $no++ ?></td>
							<td class="text-center align-middle"><?= $riw->event ?></td>
							<td class="text-center align-middle"><?= $riw->subevent ?></td>
							<td class="text-center align-middle"><?= $riw->kategori_peserta ?></td>
							<td class="text-center align-middle"><?= $riw->nama_tim ?></td>
							<td class="text-center align-middle"><?= $riw->judul ?></td>
							<td class="text-center align-middle">
								<?php 
									if ($riw->status == '1'):
										echo'Melengkapi Data';
									elseif ($riw->status == '2' || $riw->status == '3'):
										echo'Sedang Dinilai';
									elseif ($riw->status == '4'):
										echo'Selesai';
									elseif ($riw->status == '5'):
										echo'Proses Verifikasi';
									endif; 
								?>
							</td> 
							<?php if ($riw->status == '1'): ?>
								<td align="center">
									<button class="col-10 btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#KirimKonfirmasi<?= $riw->id_usulan?>">
										<i class="fa fa-save mr-1"></i> Kirim Usulan
									</button>
									<button onclick="window.location.href='<?= base_url('peserta/riwayat/edit_riwayat1/'.$riw->id_peserta) ?>'" class="col-10 btn btn-sm btn-warning mb-2">
										<i class="fa fa-edit mr-1"></i> Detail & Edit
									</button>
									<button class="col-10 btn btn-sm btn-danger" data-toggle="modal" data-target="#KirimKonfirmasiHapus<?= $riw->id_usulan?>">
										<i class="fa fa-trash mr-1"></i> Hapus Usulan
									</button>
								</td>
							<?php elseif ($riw->status == '2' || $riw->status == '3' || $riw->status == '5'): ?>
								<td align="center">
									<button onclick="window.location.href='<?= base_url('peserta/riwayat/edit_riwayat1/'.$riw->id_peserta) ?>'" class="btn btn-sm btn-warning col-10 mb-2">
										<i class="fa fa-search mr-1"></i> View & Detail
									</button>
									<button disabled class="btn btn-sm btn-primary col-10 mb-2">
										<i class="fa fa-save"></i> Kirim Data
									</button>
									<button disabled class="col-10 btn btn-sm btn-danger">
										<i class="fa fa-trash mr-1"></i> Hapus Usulan
									</button>
								</td>
							<?php elseif ($riw->status == '4'): ?>
								<td align="center">
									<button onclick="window.location.href='<?= base_url('peserta/riwayat/edit_riwayat1/'.$riw->id_peserta) ?>'" class="btn btn-sm btn-warning col-10 mb-2">
										<i class="fa fa-search mr-1"></i> View & Detail
									</button>
									<button class="btn btn-success btn-sm col-10" data-toggle="modal" data-target="#nilai<?= $riw->id_usulan?>">
										<i class="fa fa-star mr-1"></i> Lihat Nilai
									</button>
								</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php foreach($riwayat as $riw) : ?>

	<!-- MODAL KONFIRMASI KIRIM USULAN -->
	<div class="modal fade" id="KirimKonfirmasi<?= $riw->id_usulan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
					<h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
					<button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('peserta/riwayat/update_status_usulan') ; ?>" method="post" enctype="multipart/form-data" >
						<div class="container">
							<div class="form-group" align="center">
								<div class="form-group" hidden >
									<input type="text" name="id" value="<?= $riw->id_usulan ?>">
									<input type="text" name="status" value="2">
								</div>
								<h5>Apakah Anda yakin ingin mengirim data ini ?</h5>
							</div><br>
						</div>
						<div align="center">
							<button type="submit" class="btn btn-sm btn-primary mr-2" style="width:20%;margin-bottom:20px;" >Iya</button>
							<button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary ml-2" style="width:20%;margin-bottom:20px;" >Tidak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL HAPUS USULAN -->
	<div class="modal fade" id="KirimKonfirmasiHapus<?= $riw->id_usulan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
			<div class="modal-content">
				<div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
					<h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
					<button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('peserta/riwayat/hapus_usulan') ; ?>" method="post" enctype="multipart/form-data" >
						<div class="container">
							<div class="form-group" align="center">
								<div class="form-group" hidden >
									<input type="text" name="id" value="<?= $riw->id_usulan; echo '_'; echo $riw->id_peserta;?>">
								</div>
								<h5>Apakah Anda yakin ingin menghapus data ini ?</h5>
							</div><br>
						</div>
						<div align="center" class="d-flex justify-content-around">
							<button type="submit" class=" col-3 btn btn-sm btn-danger" >Iya</button>
							<button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary col-3" >Tidak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL TAMPIL NILAI DAN ULASAN -->
	<div class="modal fade" id="nilai<?= $riw->id_usulan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content"> 
				<div class="modal-header d-flex align-items-center bg-info" style="height: 60px;">
					<div class="col-12 text-center">
						<h4 class="modal-title text-white"><strong>Nilai & Ulasan</strong></h4>
					</div>
					<button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="background: transparent;border:none; color:white; margin-left: -30px;"></button>
				</div>
				<div class="modal-body">
					<?php foreach($nilai_ulasan as $key => $val): 
						if($riw->id_usulan == $nilai_ulasan[$key]['id_usulan']): ?>
							<h5 class="text-primary"><b>Hasil Nilai Verifikasi</b></h5>
							<div class="row">
								<?php if($val['nilai_verif'] != null): 
									$a=1; foreach($val['nilai_verif'] as $nilai): 
									$tt_nilai[] = $nilai->nilai_verifikasi; ?>
									<div class="form-group col-6 col-lg-4">
										<span>Penilai <?= $a++?></span>
										<input type="text" class="form-control" value="<?= $nilai->nilai_verifikasi	?>" readonly>
									</div>
									<?php endforeach;?>
									<div class="form-group col-sm-6 col-md-4 col-lg-4">
										<span>Total Nilai Verifikasi</span>
										<input type="text" class="form-control" value="<?= array_sum($tt_nilai)?>" readonly>
									</div>
								<?php endif;?>
							</div><br>
							<h5 class="text-primary"><b>Hasil Nilai Nominasi</b></h5>
							<div class="row">
								<?php if($val['nilai_nomin'] != null): 
									$a=1; foreach($val['nilai_nomin'] as $nilai2): 
									$tt_nilai2[] = $nilai2->nilai_nominator; ?>
									<div class="form-group col-6 col-lg-4">
										<span>Penilai <?= $a++?></span>
										<input type="text" class="form-control" value="<?= $nilai2->nilai_nominator	?>" readonly>
									</div>
									<?php endforeach;?>
									<div class="form-group col-sm-6 col-md-4 col-lg-4">
										<span>Total Nilai Nominasi</span>
										<input type="text" class="form-control" value="<?= array_sum($tt_nilai2)?>" readonly>
									</div>
								<?php else: ?>
									<span class="col-12">Anda gugur dalam proses penilaian verifikasi.</span>
								<?php endif;?>
							</div><br>
							<h5 class="text-primary"><b>Hasil Ulasan</b></h5>
							<div class="row">
								<?php if($val['ulasan'] != null):
									$b=1; foreach($val['ulasan'] as $ulasan): ?>
										<div class="form-group col-lg-6">
											<span>Ulasan <?= $b++?></span>
											<textarea type="text" class="form-control" readonly><?= $ulasan->ulasan?></textarea>
										</div>
									<?php endforeach; 
									else: ?>
										<span class="col-12">Tidak ada ulasan dari Penilai.</span>
								<?php endif; ?>
							</div>	
					<?php endif; endforeach;?>
					<div class="d-flex justify-content-end">
						<button type="button" data-dismiss="modal" class="btn btn-sm btn-info">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>