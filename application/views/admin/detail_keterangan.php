<div class="container-fluid">
	
	<div class="row">
		
		<a href="" class="btn btn-secondary btn-sm btn-icon-split mb-4 ml-3" >
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Tambah Keterangan</span>
		</a> 
		<button type="button" class="btn btn-sm btn-warning btn-icon-split mb-4 ml-2" onclick="window.location.href='javascript:history.go(-1)'">
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
      <?php echo $this->session->flashdata('message');  ?>  
      
      	<?php echo $this->session->flashdata('message');  ?>
      	<div class="table-responsive">
				<table class="table table-bordered table-hover">
					
					<tr>
						<th class="text-center table-secondary">No</th>
						<th class="text-center table-secondary">Keterangan</th>
						<th class="text-center table-secondary">Nilai Minimal</th>
						<th class="text-center table-secondary">Nilai Maksimal</th>
						<th class="text-center table-secondary" colspan="2">Aksi</th>
					</tr>

					<?php  
					$no=1;
				      foreach($keterangan_indikator as $ketind) : ?>

				      <tr>
				        <td align="center"><?php echo $no++ ?></td>
					 			<td><?php echo $ketind->keterangan ?></td>
					 			<td align="center"><?php echo $ketind->nilai_minimal_keterangan ?></td>
					 			<td align="center"><?php echo $ketind->nilai_maksimal_keterangan ?></td>
					 			<td align="center" style="width: 50"><div class="btn btn-sm btn-secondary btn"><i class="fa fa-edit"></i>Edit</div></td>
					 			<td align="center" style="width: 50"> <div class="btn btn-sm btn-secondary btn"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>

					 			<div class="modal fade" id="hapus_nominator<?php echo $ketind->id_keterangan_indikator ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						 </tr>
					<?php endforeach; ?>
			 
				</table>
     </div>
    </div>
  </div>

	

	

	

</div>

<!-- Modal -->
