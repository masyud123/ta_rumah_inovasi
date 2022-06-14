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
	<div class="d-flex mb-3">
		<?php if ($sudah_dinilai == 'ada'): ?>
			<button type="button" class="btn btn-secondary btn-sm btn-icon-split " disabled> 
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Indikator</span>
			</button>
	  	<?php elseif($sudah_dinilai == 'kosong'): ?>
			<button id="tambah_data_indikator_nilai" type="button" class="btn btn-primary btn-sm btn-icon-split "  data-toggle="modal" data-target="#tambah_nominator"> 
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Indikator</span>
			</button>
		<?php endif; ?>
		<button class="btn btn-warning btn-sm btn-icon-split ml-2" type="button" onclick="window.location.href='<?= base_url('admin/data_nominator/') ?>'"> 
			<span class="icon text-white-50">
				<i class="fas fa-arrow-left"></i>
			</span>
			<span class="text">Kembali</span>
		</button>
	</div>

	<div class="card shadow mb-4">
		<!-- Card Header -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Sub Event : <?php echo $subevent->subevent ?></h6>
		</div>
		<!-- Card Body -->
		<div class="card-body d-flex">
			<div>
				<?php echo $this->session->flashdata('message3');  ?>
				<?php echo $this->session->flashdata('message');  ?> 
			</div>
			<div style="overflow-y: auto;">
			<!-- class="table-responsive" -->
				<table class="table table-bordered table-hover" style="width: 1030px;">
					<tr>
						<th class="text-center table-secondary align-middle">No</th>
						<th class="text-center table-secondary align-middle">Indikator</th>
						<th class="text-center table-secondary align-middle">Keterangan</th>
						<th class="text-center table-secondary align-middle">Nilai Minimal</th>
						<th class="text-center table-secondary align-middle">Nilai Maksimal</th>
						<th colspan="2" class="text-center table-secondary align-middle">Aksi</th>
					</tr>

					<?php $no=1;
					foreach($indikator_penilaian_pemenang as $indpnl) : ?>
						<tr>
							<td class="text-center align-middle"><?php echo $no++ ?></td>
							<td class="align-middle"><?php echo $indpnl->komponen ?></td>
							<td class="align-middle"><?php echo $indpnl->note ?></td>
							<td class="text-center align-middle"><?php echo $indpnl->nilai_komponen_min ?></td>
							<td class="text-center align-middle"><?php echo $indpnl->nilai_komponen_max ?></td>
							<?php if ($sudah_dinilai == 'ada'): ?>
								<td class="text-center align-middle" width="101">
									<button disabled class="btn btn-sm btn-secondary btn"><i class="mr-1 fa fa-edit"></i>Edit</button>
								</td> 
								<td class="text-center align-middle" width="101">
									<button disabled class="btn btn-sm btn-secondary"><i class="mr-1 fa fa-trash"></i>Hapus</button>
								</td>
							<?php elseif($sudah_dinilai == 'kosong'): ?>
								<td class="text-center align-middle" width="101">
									<!-- <?php echo anchor('admin/data_nominator/edit_indikator/' .$indpnl->id, '<div class="btn btn-sm btn-warning btn"><i class="mr-1 fa fa-edit"></i>Edit</div>') ?> -->
									<button class="btn btn-sm btn-warning modal_edit" data-id="<?= $indpnl->id ?>" type="button" data-toggle="modal" data-target="#edit_nominator<?php echo $indpnl->id ?>">
										<i class="mr-1 fa fa-edit"></i>Edit
									</button>
								</td> 
								<td class="text-center align-middle" width="101">
									<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#hapus_nominator<?php echo $indpnl->id ?>">
										<i class="mr-1 fa fa-trash"></i>Hapus
									</button>
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
<div class="modal fade" id="tambah_nominator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Tambah Indikator Nominator</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(). 'admin/data_nominator/tambah_nominator/'; ?>" method="post" enctype="multipart/form-data" >
					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Sub Event</dt>
						<input type="text" name="subevent" class="form-control" value="<?php echo $subevent->subevent ?>" disabled>
						<input hidden type="text" name="id_subevent" value="<?php echo $subevent->id ?>">
					</div>

					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Indikator</dt>
						<input id="komponen" type="text" name="komponen" class="form-control">
					</div>

					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Keterangan</dt>
						<input id="note" type="text" name="note" class="form-control">
					</div>

					<div class="form-group mb-4 align-items-center d-flex justify-content-start">
						<dt class="col-5 col-sm-4">Nilai Minimal</dt>
						<input id="minimal" type="number" name="nilai_komponen_min" class="form-control col-3">
					</div>

					<div class="form-group mb-4 align-items-center d-flex justify-content-start">
						<dt class="col-5 col-sm-4">Nilai Maksimal</dt>
						<input id="maksimal" type="number" name="nilai_komponen_max" class="form-control col-3">
					</div>
					
					<div class="d-flex justify-content-end">
						<button type="submit" id="simpan_indikator_nilai" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>		
		</div>
	</div>
</div>

<?php foreach($indikator_penilaian_pemenang as $indpnl) : ?>
<!-- modal hapus indikator -->
<div class="modal fade" id="hapus_nominator<?php echo $indpnl->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<?php echo anchor('admin/data_nominator/hapus/' .$indpnl->id,   '<div class="btn btn-danger btn">Hapus</div>') ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

<!-- edit indikator -->
<div class="modal fade" id="edit_nominator<?= $indpnl->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="exampleModalLabel">Edit Indikator Nominator</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(). 'admin/data_nominator/update/'; ?>" method="post" enctype="multipart/form-data" >
					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Sub Event</dt>
						<input type="text" name="subevent" class="form-control" value="<?= $subevent->subevent ?>" disabled>
						<input hidden type="text" name="id_subevent" value="<?= $subevent->id ?>">
						<input hidden type="text" name="id" value="<?= $indpnl->id ?>">
					</div>

					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Indikator</dt>
						<input id="komponen<?= $indpnl->id ?>" type="text" name="komponen" class="form-control" value="<?= $indpnl->komponen ?>">
					</div>

					<div class="form-group mb-4 align-items-center d-md-flex">
						<dt class="col-md-4">Keterangan</dt>
						<input id="note<?= $indpnl->id ?>" type="text" name="note" class="form-control" value="<?= $indpnl->note ?>">
					</div>

					<div class="form-group mb-4 align-items-center d-flex justify-content-start">
						<dt class="col-5 col-sm-4">Nilai Minimal</dt>
						<input id="minimal<?= $indpnl->id ?>" type="number" name="nilai_komponen_min" class="form-control col-3" value="<?= $indpnl->nilai_komponen_min ?>">
					</div>

					<div class="form-group mb-4 align-items-center d-flex justify-content-start">
						<dt class="col-5 col-sm-4">Nilai Maksimal</dt>
						<input id="maksimal<?= $indpnl->id ?>" type="number" name="nilai_komponen_max" class="form-control col-3" value="<?php echo $indpnl->nilai_komponen_max ?>">
					</div>
					
					<div class="d-flex justify-content-end">
						<button type="submit" data-id="<?= $indpnl->id ?>" class="btn btn-primary update_indikator_nilai">Simpan</button>
						<button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>		
		</div>
	</div>
</div>
<?php endforeach;?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
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

		$('#tambah_data_indikator_nilai').click(function() {
			$('#komponen').val('');
			$('#note').val('');
			$('#minimal').val('');
			$('#maksimal').val('');
		});
		
		$('#simpan_indikator_nilai').click(function() {
			var kom 	= $('#komponen').val();
			var note 	= $('#note').val();
			var min 	= $('#minimal').val();
			var max 	= $('#maksimal').val();
			if(kom != '' && note != '' && min != '' && max != ''){}
			else{
				Toast.fire({
					icon: 'warning',
					title: 'Tidak Bisa Menyimpan',
					text: 'Semua form input wajib diisi!'
				});
				if(kom  == ''){$('#komponen').focus();}
				else if(note == ''){$('#note').focus();}
				else if(min == ''){$('#minimal').focus();}
				else if(max == ''){$('#maksimal').focus();}
				return false;
			}
			if(parseInt(min) >= parseInt(max)){
				Toast.fire({
					icon: 'warning',
					title: 'Tidak Bisa Menyimpan',
					text: 'Nilai minimal harus lebih besar dari nilai maksimal'
				});
				return false;
			}
		});

		$('.update_indikator_nilai').click(function() {
			var id = $(this).data('id');
			var kom = $('#komponen'+id).val();
			var note = $('#note'+id).val();
			var min = $('#minimal'+id).val();
			var max = $('#maksimal'+id).val();
			if(kom != '' && note != '' && min != '' && max != ''){}
			else{
				Toast.fire({
					icon: 'warning',
					title: 'Tidak Bisa Menyimpan',
					text: 'Semua form input wajib diisi!'
				});
				if(kom  == ''){$('#komponen'+id).focus();}
				else if(note == ''){$('#note'+id).focus();}
				else if(min == ''){$('#minimal'+id).focus();}
				else if(max == ''){$('#maksimal'+id).focus();}
				return false;
			}
			if(parseInt(min) >= parseInt(max)){
				Toast.fire({
					icon: 'warning',
					title: 'Tidak Bisa Menyimpan',
					text: 'Nilai minimal harus lebih besar dari nilai maksimal'
				});
				return false;
			}
		});

		$('.modal_edit').click(function() {
			var id = $(this).data('id');
			var kom = $('#komponen'+id).val();
			var note = $('#note'+id).val();
			var min = $('#minimal'+id).val();
			var max = $('#maksimal'+id).val();
			return value_tetap(id, kom, note, min, max);
		});

		function value_tetap(id, kom, note, min, max) { 
			var myTimer = setInterval(function() {
				if($('#edit_nominator'+id).hasClass('in') != true) {
					clearInterval(myTimer);
					$('#komponen'+id).val(kom);
					$('#note'+id).val(note);
					$('#minimal'+id).val(min);
					$('#maksimal'+id).val(max);
				}
			}, 500);
		}
	});
</script>