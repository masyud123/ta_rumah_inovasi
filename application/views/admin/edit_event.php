<div class="container-fluid">
	<div class="card shadow">
      <h5 class="card-header"><b><i class="fas fa-edit"></i> Edit Data Event</b></h5>
      <div class="card-body">
			<div class="row">
            <div class="col-md-12">
					<table class="table">
						<?php foreach ($event as $evt) : ?>
							<form method="post" action="<?php echo base_url().'admin/Data_event/update' ?>">
								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Event</dt>
										<div class="col-sm-5 mb-3">
											<input type="hidden" name="id" class="form-control" value="<?php echo $evt->id ?>">
											<input type="text" name="event" class="form-control" value="<?php echo $evt->event ?>" required>
										</div>
								</div>
								<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan</button>
								<a href="<?php echo base_url('admin/Data_event') ?>"><div class="btn btn-sm btn-secondary mt-3">Kembali</div></a>
							</form>
						<?php endforeach; ?>
					</table>
            </div>
         </div>
     </div>
   </div>
</div>