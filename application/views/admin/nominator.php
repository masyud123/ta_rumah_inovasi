<div class="container-fluid">

	<div class="card shadow mb-4 col-lg-9">
      <!-- Card Header - Dropdown -->
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">DATA INDIKATOR NOMINATOR</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
      	<div class="table-responsive">
         <table class="table table-bordered table-hover">
				<tr>
					<th class="text-center table-secondary" style="width: 10%;">No</th>
					<th class="text-center table-secondary">Sub Event</th>
					<th class="text-center table-secondary" style="width: 20%;">Detail Indikator</th>
				</tr>

				<?php 
			      $no=1;
			      foreach($subevent as $sbevt) : ?>

			      <tr>
			        <td align="center"><?php echo $no++ ?></td>
			     	<td align="center"><?php echo $sbevt->subevent ?></td>
			        <td align="center"><?php echo anchor('admin/Data_nominator/detail_nominator/'.$sbevt->id,'<div class="btn btn-warning btn-sm"><i class="fa fa-search-plus"></i> Detail</div>') ?></td>

			        
			      </tr>
			  	<?php endforeach; ?>
			</table>
		</div>
      </div>
  </div>
		
</div>