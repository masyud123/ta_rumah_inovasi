<div class="container-fluid">
<h1 class="h3 mb-3 text-gray-800">Silahkan Pilih Daftar Sub Event</h1>
   <div class="row">
      <?php foreach($subevent as $sub) : 
         if (strtotime($sub->mulai) <= time() AND strtotime($sub->akhir) >= time()) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <?php if($sub->status_pendaftaran == 0): ?>
                              <a id="pendaftaran-blm" style="cursor: pointer;">
                                 <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $sub->subevent ?>
                                 </div>
                              </a>
                           <?php elseif($sub->status_pendaftaran == 1): ?>
                              <a href="<?php echo base_url('peserta/Daftar/daftar/'.$sub->id)?>">
                                 <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $sub->subevent ?>
                                 </div>
                              </a>
                           <?php elseif($sub->status_pendaftaran == 2): ?>
                              <a id="pendaftaran-tutup" style="cursor: pointer;">
                                 <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $sub->subevent ?>
                                 </div>
                              </a>
                           <?php endif; ?>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <?php  endif; ?>
      <?php endforeach;?>    
   </div>  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {  
      $('#pendaftaran-blm').on('click', function(){
         Swal.fire(
            'Informasi',
            'Saat ini pendaftaran belum dibuka. Silahkan lihat pengumuman untuk mengetahui informasi seputar perlombaan.',
            'info'
         )
      });
      $('#pendaftaran-tutup').on('click', function(){
         Swal.fire(
            'Informasi',
            'Saat ini pendaftaran sudah ditutup. Silahkan lihat pengumuman untuk mengetahui informasi seputar perlombaan.',
            'info'
         )
      });
   }); 
</script>