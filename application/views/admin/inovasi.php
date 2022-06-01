<style>
	/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

	/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<div class="container">
	<div class="card shadow mb-4 col-lg-10">
      	<!-- Card Header - Dropdown -->
		<div
			class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">DATA INDIKATOR INOVASI & FORMULASI NILAI</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th class="text-center table-secondary" width="50">No</th>
						<th class="text-center table-secondary">Sub Event</th>
						<th class="text-center table-secondary" width="185">Detail Indikator</th>
						<th class="text-center table-secondary" width="185">Detail Formulasi</th>
					</tr>

					<?php echo $this->session->flashdata('formulasi_nilai');
					$no=1; foreach($subevent as $sbevt) : ?>
					<tr>
						<td class="text-center align-middle"><?php echo $no++ ?></td>
						<td class="text-center align-middle"><?php echo $sbevt->subevent ?></td>
						<?php if($formulasi_nilai != 'kosong'):
							foreach($formulasi_nilai as $f_nilai){
								$data[] = $f_nilai['id_subevent'];
							}
							if(in_array($sbevt->id, $data)):?>
								<td class="text-center align-middle"><?php echo anchor('admin/data_inovasi/detail_inovasi/'.$sbevt->id,'<div class="btn btn-warning btn-sm"><i class="fa fa-search-plus"></i> Detail</div>') ?></td>
								<td class="text-center align-middle"><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit_formulasi<?= $sbevt->id?>"><i class="fas fa-search-plus mr-1"></i>Detail</button></td>
							<?php else: ?>
								<td class="text-center align-middle"><button disabled class="btn btn-sm btn-secondary"><i class="fas fa-search-plus mr-1"></i>Detail</button></td>
								<td class="text-center align-middle"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#tambah_formulasi<?= $sbevt->id?>">Tambah Formulasi</button></td>
							<?php endif; ?>
						<?php else:?>
							<td class="text-center align-middle">
								<button class="btn btn-sm btn-secondary"><i class="fas fa-search-plus mr-1"></i>Detail</button>
							</td>
							<td class="text-center align-middle">
								<button class="btn btn-sm btn-info"data-toggle="modal" data-target="#tambah_formulasi<?= $sbevt->id?>"><i class="fas fa-plus mr-1"></i>Tambah Formulasi</button>
							</td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
  	</div>
</div>
	
<?php foreach($subevent as $sbevt) : ?>
	<!-- Modal tambah Formulasi nilai-->
<div class="modal fade" id="tambah_formulasi<?= $sbevt->id?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Tambah Formulasi Nilai</h5>
			</div>
			<div class="modal-body">
				<form id="formFormulasiNilai<?= $sbevt->id?>" action="<?php echo base_url('admin/data_inovasi/tambah_formulasi_nilai/'); ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group d-flex align-items-center row mb-3">
						<h6 class="col-lg-4 mr-lg-2"><strong>Sub Event</strong></h6>
						<input type="text" disabled class="form-control bg-light border-1" value="<?= $sbevt->subevent?>">
						<input type="text" hidden name="id_subevent" class="form-control border-1" value="<?= $sbevt->id?>">
						<div class="input-group-append">
							<button class="btn bg-primary disabled" type="button">
								<i class="fas fa-info ml-1 mr-1" style="color: white;"></i>
							</button>
						</div>
					</div>
					<div class="input-group d-flex align-items-center row mb-3">
						<h6 class="col-lg-4 mr-lg-2"><strong>Nilai Makalah</strong></h6>
						<input id="makalah<?= $sbevt->id?>" type="number" name="nilai_makalah" class="form-control border-1">
						<div class="input-group-append">
							<button class="btn bg-primary disabled" type="button">
								<i class="fas fa-percent" style="color: white;"></i>
							</button>
						</div>
					</div>
					<div class="input-group d-flex align-items-center row mb-3">
						<h6 class="col-lg-4 mr-lg-2"><strong>Nilai Substansi Inovasi</strong></h6>
						<input id="substansi<?= $sbevt->id?>" type="number" name="nilai_substansi" class="form-control border-1">
						<div class="input-group-append">
							<button class="btn bg-primary disabled" type="button">
								<i class="fas fa-percent" style="color: white;"></i>
							</button>
						</div>
					</div>
					<small class="text-danger">Catatan: Nilai makalah dan nilai substansi jika ditotal harus menjadi 100%.</small>
					<div class="row justify-content-end mt-4">
						<button type="button" onclick="simpan_formulasi(<?= $sbevt->id?>)" class="btn btn-primary mr-2">Simpan</button>
						<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- modal edit formulasi nilai -->
<div class="modal fade" id="edit_formulasi<?= $sbevt->id?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Formulasi Nilai</h5>
			</div>
			<?php foreach($formulasi_nilai as $f_nilai) : 
			if($f_nilai['id_subevent'] == $sbevt->id): ?>
				<div class="modal-body">
					<form id="formEditFormulasiNilai<?= $sbevt->id?>" action="<?php echo base_url('admin/data_inovasi/edit_formulasi_nilai/'. $f_nilai['id_formulasi_nilai']); ?>" method="post" enctype="multipart/form-data" >
						<div class="input-group d-flex align-items-center row mb-3">
							<h6 class="col-lg-4 mr-lg-2"><strong>Sub Event</strong></h6>
							<input type="text" disabled class="form-control bg-light border-1" value="<?= $sbevt->subevent?>">
							<input type="text" hidden name="id_subevent" class="form-control border-1" value="<?= $sbevt->id?>">
							<div class="input-group-append">
								<button class="btn bg-primary disabled" type="button">
									<i class="fas fa-info ml-1 mr-1" style="color: white;"></i>
								</button>
							</div>
						</div>
						<div class="input-group d-flex align-items-center row mb-3">
							<h6 class="col-lg-4 mr-lg-2"><strong>Nilai Makalah</strong></h6>
							<input id="edit_makalah<?= $sbevt->id?>" type="number" name="nilai_makalah" class="form-control border-1" value="<?= $f_nilai['nilai_makalah']?>">
							<div class="input-group-append">
								<button class="btn bg-primary disabled" type="button">
									<i class="fas fa-percent" style="color: white;"></i>
								</button>
							</div>
						</div>
						<div class="input-group d-flex align-items-center row mb-3">
							<h6 class="col-lg-4 mr-lg-2"><strong>Nilai Substansi Inovasi</strong></h6>
							<input id="edit_substansi<?= $sbevt->id?>" type="number" name="nilai_substansi" class="form-control border-1" value="<?= $f_nilai['nilai_substansi_inovasi']?>">
							<div class="input-group-append">
								<button class="btn bg-primary disabled" type="button">
									<i class="fas fa-percent" style="color: white;"></i>
								</button>
							</div>
						</div>
						<small class="text-danger">Catatan: Nilai makalah dan nilai substansi jika ditotal harus menjadi 100%.</small>
						<div class="row justify-content-end mt-4">
							<button type="button" onclick="edit_formulasi(<?= $sbevt->id?>)" class="btn btn-primary mr-2">Simpan</button>
							<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			<?php endif; endforeach;?>
		</div>
	</div>
</div>
<?php endforeach; ?>

<script>
	function simpan_formulasi(id_subevent)
	{
		var makalah = $('#makalah'+id_subevent).val();
		var substansi = $('#substansi'+id_subevent).val();
		var hitung = parseInt(makalah) + parseInt(substansi);

		// fungsi sweetalert2
		const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});

		// cek kondisi
		if(makalah == '' || substansi == ''){
			Toast.fire({
				icon: 'warning',
				title: 'Tidak Bisa Menyimpan',
				text: 'Semua form input wajib diisi!'
			});
		}else{
			if(hitung < 100 ){
				Toast.fire({
					icon: 'error',
					title: 'Gagal Menyimpan',
					text: 'Total nilai tidak mencapai 100%'
				});
			}else if(hitung > 100 ){
				Toast.fire({
					icon: 'error',
					title: 'Gagal Menyimpan',
					text: 'Total nilai maksimal 100%'
				});
			}else if(hitung == 100){
				$('#formFormulasiNilai'+id_subevent).submit();
			}
		}
	}

	function edit_formulasi(id_subevent)
	{
		var makalah = $('#edit_makalah'+id_subevent).val();
		var substansi = $('#edit_substansi'+id_subevent).val();
		var hitung = parseInt(makalah) + parseInt(substansi);
		
		// fungsi sweetalert2
		const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});

		// cek kondisi
		if(makalah == '' || substansi == ''){
			Toast.fire({
				icon: 'warning',
				title: 'Tidak Bisa Menyimpan',
				text: 'Semua form input wajib diisi!'
			});
		}else{
			if(hitung < 100 ){
				Toast.fire({
					icon: 'error',
					title: 'Gagal Menyimpan',
					text: 'Total nilai tidak mencapai 100%'
				});
			}else if(hitung > 100 ){
				Toast.fire({
					icon: 'error',
					title: 'Gagal Menyimpan',
					text: 'Total nilai maksimal 100%'
				});
			}else if(hitung == 100){
				$('#formEditFormulasiNilai'+id_subevent).submit();
			}
		}
	}
</script>