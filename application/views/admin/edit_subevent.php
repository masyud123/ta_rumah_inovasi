<div class="container-fluid">
	<div class="card shadow">
      <h5 class="card-header"><b><i class="fas fa-edit"></i> Edit Data Subevent</b></h5>
      <div class="card-body">
			<div class="row">
            <div class="col-md-12">
					<table class="table">
						<?php foreach ($subevent as $sbevt) : ?>
							<form method="post" action="<?php echo base_url().'admin/Data_subevent/update' ?>">
								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Tahun</dt>
									<div class="col-sm-5 mb-3">
										<input typed="text" name="tahun" class="form-control" value="<?php echo $sbevt->tahun ?>" readonly>
									</div>
								</div>

								<div class= "row" hidden="">
									<dt for="inputNama" class="col-sm-2 col-form-label">Event</dt>
									<div class="col-sm-5 mb-3">
										<input type="text" name="event" class="form-control" value="<?php echo $sbevt->id_event ?>" readonly>
									</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Sub Event</dt>
									<div class="col-sm-5 mb-3">
										<input type="hidden" name="id" class="form-control" value="<?php echo $sbevt->id ?>">
										<input type="text" name="subevent" class="form-control" value="<?php echo $sbevt->subevent ?>">
									</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Tanggal Mulai</dt>
									<div class="col-sm-5 mb-3">
										<input type="date" name="mulai" class="form-control" id="tgl_mulai" value="<?php echo $sbevt->mulai ?>" onclick="tanggal()"> 
									</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Tanggal Berakhir</dt>
									<div class="col-sm-5 mb-3">
										<input type="date" name="akhir" class="form-control" id="tgl_akhir" value="<?php echo $sbevt->akhir ?>" onclick="tanggal()">
									</div>
								</div>

								<div class= "row">
									<dt for="inputNama" class="col-sm-2 col-form-label">Status Pendaftaran</dt>
									<div class="col-sm-5 mb-3">
									<?php $status = $sbevt->status_pendaftaran; ?>
										<select name="status_pendaftaran" class="form-control">
											<option <?php if($status == 0){echo "selected";}?> value="0">Belum Dibuka</option>
											<option <?php if($status == 1){echo "selected";}?> value="1">Dibuka</option>
											<option <?php if($status == 2){echo "selected";}?> value="2">Ditutup</option>
										</select>
									</div>
								</div>

								<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan</button>
								<a href="<?php echo base_url('admin/Data_subevent') ?>"><div class="btn btn-sm btn-secondary mt-3">Kembali</div></a>
							</form>
						<?php endforeach; ?>	
					</table>
            </div>
         </div>
     </div>
   </div>
</div>

<script type="text/javascript">

 function tanggal(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("tgl_mulai").value;
   
    var ambiltgl = document.getElementById('tgl_mulai').value;  
    var tod = new Date(ambiltgl);
    var d = tod.getDate()+1;
    var m = tod.getMonth()+1; //January is 0!
    var y = tod.getFullYear();
     if(d<10){
            d='0'+d
        } 
        if(m<10){
            m='0'+m
        } 

    tod = y+'-'+m+'-'+d;
    document.getElementById("tgl_akhir").setAttribute("min", tod);
 }

  </script>