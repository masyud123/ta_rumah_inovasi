<script src="<?php echo base_url()?>assets/js/table2excel.js"></script>
<div class="container">
	<div class="ml-1 row d-flex align-items-start mb-3">
        <h4><strong>Sub Event :</strong></h4>
        <h4 class="text-info ml-2"><strong><?= $nama_subevent[0]['subevent']?></strong></h4>
        <a href="<?= base_url('admin/nominator/')?>" class="btn btn-warning btn-icon-split btn-sm ml-3">
            <span class="icon text-light">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>

	<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true">Umum</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pelajar-tab" data-toggle="tab" href="#pelajar" role="tab" aria-controls="pelajar" aria-selected="false">Pelajar</a>
		</li>
	</ul>
	<?php echo $this->session->flashdata('rangking_nominator')?>
	<div class="tab-content">
		<!-- kategori umum -->
		<div id="umum" class="tab-pane fade show active" role="tabpanel" aria-labelledby="umum-tab">
			<div class="card shadow mb-4">
				<form id="form_umum" method="post" action="<?php echo base_url('admin/nominator/simpan_rangking'); ?>" enctype="multipart/form-data">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary mb-2">Nominator Umum</h6>
						<div>
							<?php $rank=1;
								$keys = array_column($total_nilai, 'total');
								array_multisort($keys, SORT_DESC, $total_nilai);
								foreach($total_nilai as $key => $value) : 
								if ($value['kategori_peserta'] == 'umum'):  ?>

									<input name="status" value="2" id="status" hidden>
									<input name="id_usulan[]" value="<?= $value['id_usulan']?>" id="id_usulan" hidden>
									<input name="id_subevent[]" value="<?= $value['id_subevent']?>" id="id_subevent" hidden>
									<input name="pemenang[]" value="<?php echo $rank++ ?>" id="pemenang" hidden>
									
							<?php endif; endforeach; ?>	
						</div>
						<?php if($cek_umum != null):?>
							<button disabled data-toggle="modal" data-target="#modal_umum" type="button" class="btn btn-sm btn-primary btn-icon-split ">
								<span class="icon text-white-50">
									<i class="fas fa-arrow-up"></i>
								</span>
								<span class="text">Rangking</span>
							</button>
							<button type="button" class="btn btn-sm btn-secondary" onclick="download_excel_umum()"><i class="far fa-file-excel"></i> Excel</button>
						<?php else:?>
							<?php if($cek_jumlah_umum != null):?>
								<button data-toggle="modal" data-target="#modal_umum" type="button" class="btn btn-sm btn-primary btn-icon-split ">
									<span class="icon text-white-50">
										<i class="fas fa-arrow-up"></i>
									</span>
									<span class="text">Rangking</span>
								</button>
								<button disabled type="button" class="btn btn-sm btn-secondary" onclick="download_excel_umum()"><i class="far fa-file-excel"></i> Excel</button>
							<?php else:?>
								<button disabled data-toggle="modal" data-target="#modal_umum" type="button" class="btn btn-sm btn-primary btn-icon-split ">
									<span class="icon text-white-50">
										<i class="fas fa-arrow-up"></i>
									</span>
									<span class="text">Rangking</span>
								</button>
								<button disabled type="button" class="btn btn-sm btn-secondary" onclick="download_excel_umum()"><i class="far fa-file-excel"></i> Excel</button>
							<?php endif;?>
						<?php endif;?>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="tabel_umum" class="table table-bordered table-hover table-responsive">  
								<tr>
									<th rowspan="2" class="text-center align-middle table-secondary">No</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Inovator</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Nama Inovasi</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Rangking</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Total Nilai</th>
									<th class="text-center table-secondary" colspan="<?= count($nama_penilai)?>">Nama Penilai</th>
								</tr>
								<tr>
									<?php foreach ($nama_penilai as $penilai): 
										$nama  = strstr($penilai["nama"], ' ', true);?>
										<th class="text-center table-secondary align-middle" rowspan="1">
											<?php if($nama == null){ 
												echo $penilai["nama"];
											}else{ 
												echo $nama;
											}?>
										</th> 
									<?php endforeach; ?> 
								</tr>

								<!-- sebelum rangking -->
								<?php $no=1;
									foreach($total_nilai as $key => $value) : 
									if ($value['kategori_peserta'] == 'umum'):  ?>
								<tr>
									<td align="center"><?php echo $no++ ?></td>
									<td><?= $value['user']?></td>
									<td><?= $value['judul']?></td>
									<td align="center"><?= "-"?></td>
									<td align="center"><?= $value['total']?></td>
									<?php foreach ($nama_penilai as $penilai): ?>
									<td align="center">
										<?php foreach ($value['nilai_nominator'] as $key2 => $val): 
											if($val->id_penilai == $penilai['id_usr']):?>
												<?= $val->nilai_nominator ?>
										<?php endif;  endforeach; ?>
									</td>
									<?php endforeach; ?>
								</tr>
								<?php endif; endforeach; ?>

								<!-- setelah rangking -->
								<?php $no=1;
									$keys = array_column($total_nilai2, 'pemenang');
									array_multisort($keys, SORT_ASC, $total_nilai2);
									foreach($total_nilai2 as $key2 => $value2):
									if ($value2['kategori_peserta'] == 'umum'): ?>
								<tr>
									<td align="center"><?php echo $no++ ?></td>
									<td><?= $value2['user']?></td>
									<td><?= $value2['judul']?></td>
									<td align="center"><?= $value2['pemenang']?></td>
									<td align="center"><?= $value2['total']?></td>
									<?php foreach ($nama_penilai as $penilai): ?>
									<td align="center">
										<?php foreach ($value2['nilai_nominator'] as $key2 => $val): 
											if($val->id_penilai == $penilai['id_usr']):?>
												<?= $val->nilai_nominator ?>
										<?php endif;  endforeach; ?>
									</td>
									<?php endforeach; ?>
								</tr>
								<?php endif; endforeach; ?>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- kategori pelajar -->
		<div id="pelajar" class="tab-pane fade" role="tabpanel" aria-labelledby="pelajar-tab">
			<div class="card shadow mb-4">
				<form id="form_pelajar" method="post" action="<?php echo base_url('admin/nominator/simpan_rangking'); ?>" enctype="multipart/form-data">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary mb-2">Nominator Pelajar</h6>
						<div>
							<?php $rank=1;
								$keys = array_column($total_nilai, 'total');
								array_multisort($keys, SORT_DESC, $total_nilai);
								foreach($total_nilai as $key => $value) : 
								if ($value['kategori_peserta'] == 'pelajar'): ?>

								<input name="status" value="2" id="status" hidden>
								<input name="id_usulan[]" value="<?= $value['id_usulan']?>" id="id_usulan" hidden>
								<input name="id_subevent[]" value="<?= $value['id_subevent']?>" id="id_subevent" hidden>
								<input name="pemenang[]" value="<?php echo $rank++ ?>" id="pemenang" hidden>
							
							<?php endif; endforeach; ?>
						</div>
						<?php if($cek_pelajar != null):?>
							<button disabled data-toggle="modal" data-target="#modal_pljr" type="button" class="btn btn-sm btn-primary btn-icon-split ">
								<span class="icon text-white-50">
									<i class="fas fa-arrow-up"></i>
								</span>
								<span class="text">Rangking</span>
							</button> 	
							<button type="button" class="btn btn-sm btn-secondary" onclick="download_excel_pelajar()"><i class="far fa-file-excel"></i> Excel</button>
						<?php else:?>
							<?php if($cek_jumlah_pelajar != null):?>
								<button data-toggle="modal" data-target="#modal_pljr" type="button" class="btn btn-sm btn-primary btn-icon-split ">
									<span class="icon text-white-50">
										<i class="fas fa-arrow-up"></i>
									</span>
									<span class="text">Rangking</span>
								</button> 	
								<button disabled type="button" class="btn btn-sm btn-secondary" onclick="download_excel_pelajar()"><i class="far fa-file-excel"></i> Excel</button>
							<?php else:?>
								<button disabled data-toggle="modal" data-target="#modal_pljr" type="button" class="btn btn-sm btn-primary btn-icon-split ">
									<span class="icon text-white-50">
										<i class="fas fa-arrow-up"></i>
									</span>
									<span class="text">Rangking</span>
								</button> 	
								<button disabled type="button" class="btn btn-sm btn-secondary" onclick="download_excel_pelajar()"><i class="far fa-file-excel"></i> Excel</button>
							<?php endif;?>
						<?php endif;?>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="tabel_pelajar" class="table table-hover table-responsive">  
								<tr>
									<th rowspan="2" class="text-center align-middle table-secondary">No</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Inovator</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Nama Inovasi</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Rangking</th>
									<th rowspan="2" class="text-center align-middle table-secondary">Total Nilai</th>
									<th class="text-center table-secondary" colspan="<?= count($nama_penilai)?>">Nama Penilai</th>
								</tr>
								<tr>
									<?php foreach ($nama_penilai as $penilai): 
										$nama  = strstr($penilai["nama"], ' ', true); ?>
										<th class="text-center table-secondary align-middle" rowspan="1">
											<?php if($nama == null){ 
												echo $penilai["nama"];
											}else{ 
												echo $nama;
											}?>
										</th> 
									<?php endforeach; ?> 
								</tr>

								<!-- sebelum rangking -->
								<?php $no=1;
									foreach($total_nilai as $key => $value) : 
									if ($value['kategori_peserta'] == 'pelajar'): ?>
								<tr>
									<td align="center"><?php echo $no++ ?></td>
									<td><?= $value['user']?></td>
									<td><?= $value['judul']?></td>
									<td align="center"><?php echo "-" ?></td>
									<td align="center"><?= $value['total']?></td>
									<?php foreach ($nama_penilai as $penilai): ?>
									<td align="center">
										<?php foreach ($value['nilai_nominator'] as $key2 => $val): 
											if($val->id_penilai == $penilai['id_usr']):?>
												<?= $val->nilai_nominator ?>
										<?php endif;  endforeach; ?>
									</td>
									<?php endforeach; ?>
								</tr>
								<?php endif; endforeach; ?>

								<!-- setelah rangking -->
								<?php $no=1;
									$keys = array_column($total_nilai2, 'pemenang');
									array_multisort($keys, SORT_ASC, $total_nilai2);
									foreach($total_nilai2 as $key2=> $value2):
									if ($value2['kategori_peserta'] == 'pelajar'): ?>
								<tr>
									<td align="center"><?php echo $no++ ?></td>
									<td><?= $value2['user']?></td>
									<td><?= $value2['judul']?></td>
									<td align="center"><?= $value2['pemenang']?></td>
									<td align="center"><?= $value2['total']?></td>
									<?php foreach ($nama_penilai as $penilai): ?>
									<td align="center">
										<?php foreach ($value2['nilai_nominator'] as $key2 => $val): 
											if($val->id_penilai == $penilai['id_usr']):?>
												<?= $val->nilai_nominator ?>
										<?php endif;  endforeach; ?>
									</td>
									<?php endforeach; ?>
								</tr>
								<?php endif; endforeach; ?>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function download_excel_umum(){
		var table2excel = new Table2Excel();
		table2excel.export(document.querySelectorAll("#tabel_umum"));
	}

	function download_excel_pelajar(){
		var table2excel = new Table2Excel();
		table2excel.export(document.querySelectorAll("#tabel_pelajar"));
	}

	function kirim_form_umum(){
		document.getElementById('form_umum').submit();
	}

	function kirim_form_pljr(){
		document.getElementById('form_pelajar').submit();
	}

</script>

<div class="modal fade" id="modal_umum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body ml-2">
        <h5 class="text-center">
            Apakah Anda yakin melakukan perangkingan ?
        </h5><br>
        <div class="d-flex row justify-content-around">
            <button type="button" onclick="kirim_form_umum()" class="btn btn-primary col-3">Iya</button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary col-3">Tidak</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_pljr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body ml-2">
        <h5 class="text-center">
            Apakah Anda yakin melakukan perangkingan ?
        </h5><br>
        <div class="d-flex row justify-content-around">
            <button type="button" onclick="kirim_form_pljr()" class="btn btn-primary col-3">Iya</button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary col-3">Tidak</button>
        </div>
      </div>
    </div>
  </div>
</div>