<div id="layoutSidenav_content">
  <main>
    <div class="container mt-3">
    <?= $this->session->flashdata('ulasan')?>
      <div>
        <a href="<?php echo base_url('penilai/data_verifikasi/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
        <?php if ($ulasan != null): ?>
            <?php foreach($ulasan as $ulas):?>
              <a href="#" class="btn btn-sm btn-success btn-icon-split mb-2 ml-2" data-toggle="modal" data-target="#edit_ulasan<?= $ulas->id_usulan?>">
                <span class="icon text-white-50">
                  <i class="fas fa-star"></i>
                </span>
                <span class="text">Lihat Ulasan</span>
              </a>
            <?php endforeach; ?>
        <?php else: ?>
              <a href="#" class="btn btn-sm btn-success btn-icon-split mb-2 ml-2" data-toggle="modal" data-target="#beri_ulasan">
                <span class="icon text-white-50">
                  <i class="fas fa-star"></i>
                </span>
                <span class="text">Beri Ulasan</span>
              </a>
        <?php endif;?>
      </div>
      <div class="card">
        <?php foreach($usulan as $usl) : ?>
        <h5 class="card-header"><b>Data Usulan [Inovator : <?php echo $usl->user ?> ] [Nama Inovasi : <?php echo $usl->judul ?> ]</b></h5>
        <div class="card-body">

          
          <div class="row">
            <!-- <i>GAMBAR</i> -->
            <div class="col-md-12">

              <table class="table">
                <tr>
                  <td><dt>Inovator</dt></td>
                  <td><?php echo $usl->user ?></td>
                </tr>

                <tr>
                  <td><dt>Tahun</dt></td>
                  <td><?php echo $usl->tahun ?></td>
                </tr>

                <tr>
                  <td><dt>Sub Event</dt></td>
                  <td><?php echo $usl->subevent ?></td>
                </tr>

                <tr>
                  <td><dt>Judul</dt></td>
                  <td><?php echo $usl->judul ?></td>
                </tr>

                <tr>
                  <td><dt>Latar Belakang</dt></td>
                  <td><?php echo $usl->latar_belakang ?></td>
                </tr>

                <tr>
                  <td><dt>Kondisi Sebelumnya</dt></td>
                  <td><?php echo $usl->kondisi_sebelumnya ?></td>
                </tr>

                <tr>
                  <td><dt>Sasaran & Tujuan</dt></td>
                  <td><?php echo $usl->sasaran_n_tujuan ?></td>
                </tr>

                <tr>
                  <td><dt>Deskripsi</dt></td>
                  <td><?php echo $usl->deskripsi ?></td>
                </tr>

                <tr>
                  <td><dt>Bahan Baku</dt></td>
                  <td><?php echo $usl->bahan_baku ?></td>
                </tr>

                <tr>
                  <td><dt>Cara Kerja</dt></td>
                  <td><?php echo $usl->cara_kerja ?></td>
                </tr>

                <tr>
                  <td><dt>Keunggulan</dt></td>
                  <td><?php echo $usl->keunggulan ?></td>
                </tr>

                <tr>
                  <td><dt>Hasil yang Diharapkan</dt></td>
                  <td><?php echo $usl->hasil_yg_diharapkan ?></td>
                </tr>

                <tr>
                  <td><dt>Manfaat</dt></td>
                  <td><?php echo $usl->manfaat ?></td>
                </tr>

                <tr>
                  <td><dt>Rencana</dt></td>
                  <td><?php echo $usl->rencana ?></td>
                </tr>

                <tr>
                  <td><dt>Dokumen / Proposal</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_file">
                      <span class="icon text-white-50">
                        <i class="far fa-file-alt"></i>
                      </span>
                      <span class="text">Lihat File</span>
                    </a></td>
                 <!--  <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihat_file"></i>Lihat File</button></td> -->
                </tr>

                <tr>
                  <td><dt>Link Video</dt></td>
                  <td><a href="#lihat_video" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal">
                      <span class="icon text-white-50">
                        <i class="fab fa-youtube"></i>
                      </span>
                      <span class="text">Lihat Video</span>
                    </a></td>
                 <!--  <td><a href="#lihat_video" class="btn btn-sm btn-success" data-toggle="modal">Lihat Video</a></td> -->
                </tr>

                <tr>
                  <td><dt>Gambar</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_gambar">
                      <span class="icon text-white-50">
                        <i class="far fa-image"></i>
                      </span>
                      <span class="text">Lihat Gambar </span>
                    </a></td>
                  <!-- <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihat_gambar"></i>Lihat Gambar</button></td> -->
                </tr>

                <tr>
                  <td><dt>Surat Pernyataan</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_jurnal">
                      <span class="icon text-white-50">
                        <i class="far fa-file"></i>
                      </span>
                      <span class="text">Lihat Surat Pernyataan </span>
                    </a></td>
                  <!-- <td><?php echo $usl->jurnal ?></td> -->
                </tr>

                <tr>                
                  <td>
                    <a href="<?php echo base_url('penilai/data_verifikasi/') ?>" class="btn btn-sm btn-warning btn-icon-split mt-1">
                      <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                      </span>
                      <span class="text">Kembali</span>
                    </a>
                  </td>
                   <td></td>
                  <td></td>
                </tr>

              </table>
              
            </div>

          </div>

        <?php endforeach; ?>
        </div>
      </div>

    </div>
  </main>
</div>  

<!-- Modal edit ulasan-->
<?php foreach($ulasan as $ulas): ?>
<div class="modal fade" id="edit_ulasan<?= $ulas->id_usulan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Ulasan untuk usulan ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penilai/data_verifikasi/beri_ulasan/'.$usl->id)?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-4">
            <label for="">Ulasan</label>
            <input type="text" name="id_ulasan" value="<?= $ulas->id_ulasan?>" hidden>
            <textarea name="ulasan" class="col-12 form-control" rows="5" required oninvalid="this.setCustomValidity('Form tidak boleh kosong!')" oninput="setCustomValidity('')"><?= $ulas->ulasan?></textarea>
          </div>
          <div class="row d-flex justify-content-around mb-2">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal beri ulasan-->
<div class="modal fade" id="beri_ulasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Ulasan untuk usulan ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penilai/data_verifikasi/beri_ulasan/'.$usl->id)?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-4">
            <label for="">Ulasan</label>
            <input type="text" name="id_ulasan" value="" hidden>
            <textarea name="ulasan" class="col-12 form-control" rows="5" required oninvalid="this.setCustomValidity('Form tidak boleh kosong!')" oninput="setCustomValidity('')"></textarea>
          </div>
          <div class="row d-flex justify-content-around mb-2">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal gambar usulan-->
<div class="modal fade" id="lihat_gambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Gambar</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php foreach($usulan as $usl) : ?>
        <embed src="<?php echo base_url().'/uploads/'.$usl->gambar ?>""
        frameborder="0" width="100%" height="570px">
         <?php endforeach; ?>
        
    </div>
  </div>
</div>
</div>

<!-- modal dokumen/proposal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_file" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Proposal</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
        <?php foreach($usulan as $usl) : ?>
        <embed src="<?php echo base_url().'/uploads/'.$usl->proposal ?>"
        frameborder="0" width="100%" height="600px">
         <?php endforeach; ?>
        
      </div>
    </div>
  </div>
</div>

<!-- modal video usulan -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_video" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Video</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
            <?php foreach($usulan as $usl) : 
                $kal = "echo $usl->link_video";
                $link = substr($kal,22);
              ?>
              <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/<?php echo $link ?>" allowfullscreen></iframe>
              <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- modal surat pernyataan -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_jurnal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Surat Pernyataan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
        <?php foreach($usulan as $usl) : ?>
        <embed src="<?php echo base_url().'/uploads/'.$usl->jurnal ?>"
        frameborder="0" width="100%" height="600px">
         <?php endforeach; ?>
        
      </div>
    </div>
  </div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});
</script>