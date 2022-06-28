<div class="container-fluid">
	<h1 class="h3 mb-3 text-gray-800">Silahkan Pilih Daftar Inovasi</h1>
   <div class="row">
   <?php foreach($event as $evt) : ?>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <a href="<?php echo base_url('peserta/Daftar/subevent/'.$evt->id)?>">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1"><?php echo $evt->event ?></div>
                     </a>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-table fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
   </div>
   <?php endforeach;?>
   </div>
</div>