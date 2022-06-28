<div class="container-fluid">
	
	<form action="<?php echo base_url('admin/Data_nominator/nominator')?>" method="post">
  		<?php foreach ($indikator_penilaian_pemenang as $indpnl) : ?>
		<input type="text" hidden name="back" value="<?php echo $indpnl->id_subevent ?>">
		<button class="btn btn-sm btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</button>
		<?php endforeach; ?>
	</form>
	
	<div class="card shadow mb-4">
      <h5 class="card-header"><b><i class="fas fa-edit"></i> Edit Data Indikator Pemenang</b> </h5>	
      <div class="card-body">
			<div class="row">
            <div class="col-md-12">
					<table class="table">
						<?php foreach ($indikator_penilaian_pemenang as $indpnl) : ?>
							<form method="post" action="<?php echo base_url().'admin/Data_nominator/update' ?>">
								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Indikator</dt>
										<div class="col-sm-5 mb-3">
											<input type="hidden" name="id" class="form-control" value="<?php echo $indpnl->id ?>">
											<input type="hidden" name="id_subevent" class="form-control" value="<?php echo $indpnl->id_subevent ?>">	
											<input type="text" name="komponen" class="form-control" value="<?php echo $indpnl->komponen ?>" required>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Indikator</dt>
										<div class="col-sm-5 mb-3">
											<input type="text" name="note" class="form-control" value="<?php echo $indpnl->note ?>" required>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Nilai Minimal</dt>
										<div class="col-sm-5 mb-3">
											<input type="number" name="nilai_komponen_min" class="form-control" value="<?php echo $indpnl->nilai_komponen_min ?>" min=0 required>
										</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Nilai Maksimal</dt>
										<div class="col-sm-5 mb-3">
											<input type="number" name="nilai_komponen_max" class="form-control" value="<?php echo $indpnl->nilai_komponen_max ?>" min=0 required>
										</div>
								</div>


								<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan</button>
								
							</form>
						<?php endforeach; ?>
					</table>
            </div>
         </div>
     </div>
   </div>
</div>