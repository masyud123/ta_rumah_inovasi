<div id="layoutSidenav_content">
  <main>
    <div class="container mt-3">
      <div>
        <a href="<?php echo base_url('penilai/data_nominator/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
        <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-2" data-toggle="modal" data-target="#lihat_usulan">
          <span class="icon text-white-50">
            <i class="fas fa-search-plus"></i>
          </span>
          <span class="text">Lihat Usulan</span>
        </a>

      </div>
      
      <div class="card">
       
        <h5 class="card-header"><b>Nilai Nominator [ Inovator : <?php echo $usulan->user ?> ] [ Nama Inovasi : <?php echo $usulan->judul ?> ] </b></h5>
      
        <div class="card-body">

          
          <div class="row">
            <!-- <i>GAMBAR</i> -->
            <div class="col-md-9">
              
              <?php echo $this->session->flashdata('message');  ?>
              <form method="post" action="<?php echo base_url().'penilai/data_nominator/update_nilai_nominator' ?>">
                <table class="table table-bordered">
                     <tr>
                         <th class="text-center">No</th>
                         <th class="text-center">Uraian Komponen Penilaian</th>
                         <th class="text-center">Nilai Komponen</th>
                         <th class="text-center">Nilai</th>
                       </tr>

                    <?php  
                    $no=1;
                    foreach($komponen as $komp) : ?>
                       	<tr>
                          <td class="text-center" rowspan="2"><dt><?php echo $no++ ?></dt></td>
                          <td><dt><?php echo $komp->komponen ?></dt></td>
                          <td class="text-center">(<?php echo $komp->nilai_komponen_min ?> - <?php echo $komp->nilai_komponen_max ?>)</td>
                          <td class="d-flex justify-content-center">
                          	<?php foreach ($penilaian_nominator as $nilai_nominator): 
                          		if($nilai_nominator['id_indikator'] == $komp->id): ?>
                          			<input type="number" id="nilai_nom" onkeyup="b()" name="nilai[]" class="form-control tes" min="<?php echo $komp->nilai_komponen_min ?>" max="<?php echo $komp->nilai_komponen_max ?>" style="width: 50%;" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')" value="<?php echo $nilai_nominator['nilai'] ?>">
                          			<input type="text" name="id_penilaian_nominator[]" value="<?php echo $nilai_nominator['id'] ?>" hidden>
                          		<?php endif;
                          	endforeach; ?>
                          </td>
                           <input type="text" name="indikator[]"  value="<?php echo $komp->id ?>" hidden>

                       	</tr>

                       	<tr>
                         <td colspan="3">Note : <?php echo $komp->note ?></td>
                       	</tr>
                    <?php endforeach; ?>
                       <input type="text" name="id_usulan" value="<?php echo $usulan->id ?>" hidden>
                      <tr>
                        <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                        <td>
                        	<?php foreach($total_nilai_nominator as $nilai_total_nominator): ?>
	                        	<input type="text" name="nilai_nominator" id="tot_nil_nom" class="form-control" style="width: 50%;" readonly="true" >
	                        	<input type="text" name="id_total_nilai_nominator" value="<?php echo $nilai_total_nominator['id_total_nilai_pemenang'] ?>" hidden>
	                        <?php endforeach; ?>
                        </td>
                      </tr>
                </table>
                <button style="margin-left:700px" type="submit" class="btn btn-success mb-2" > Simpan</button>
              </form>
            </div>

          </div>

     
        </div>
      </div>
    </div>
  </main>
</div>
<div class="modal fade bd-example-modal-xl" id="lihat_usulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Lihat Usulan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="card">
       
        <div class="card-body">

          
          <div class="row">
            <!-- <i>GAMBAR</i> -->
            <div class="col-md-12">

              <table class="table">
                <tr>
                  <td><dt>Inovator</dt></td>
                  <td><?php echo $usulan->user ?></td>
                </tr>

                <tr>
                  <td><dt>Tahun</dt></td>
                  <td><?php echo $usulan->tahun ?></td>
                </tr>

                <tr>
                  <td><dt>Sub Event</dt></td>
                  <td><?php echo $usulan->subevent ?></td>
                </tr>

                <tr>
                  <td><dt>Judul</dt></td>
                  <td><?php echo $usulan->judul ?></td>
                </tr>

                <!-- <tr>
                  <td><dt>Status</dt></td>
                  <td><?php echo $usulan->status ?></td>
                </tr> -->

                <tr>
                  <td><dt>Latar Belakang</dt></td>
                  <td><?php echo $usulan->latar_belakang ?></td>
                </tr>

                <tr>
                  <td><dt>Kondisi Sebelumnya</dt></td>
                  <td><?php echo $usulan->kondisi_sebelumnya ?></td>
                </tr>

                <tr>
                  <td><dt>Sasaran & Tujuan</dt></td>
                  <td><?php echo $usulan->sasaran_n_tujuan ?></td>
                </tr>

                <tr>
                  <td><dt>Deskripsi</dt></td>
                  <td><?php echo $usulan->deskripsi ?></td>
                </tr>

                <tr>
                  <td><dt>Bahan Baku</dt></td>
                  <td><?php echo $usulan->bahan_baku ?></td>
                </tr>

                <tr>
                  <td><dt>Cara Kerja</dt></td>
                  <td><?php echo $usulan->cara_kerja ?></td>
                </tr>

                <tr>
                  <td><dt>Keunggulan</dt></td>
                  <td><?php echo $usulan->keunggulan ?></td>
                </tr>

                <tr>
                  <td><dt>Hasil yang Diharapkan</dt></td>
                  <td><?php echo $usulan->hasil_yg_diharapkan ?></td>
                </tr>

                <tr>
                  <td><dt>Manfaat</dt></td>
                  <td><?php echo $usulan->manfaat ?></td>
                </tr>

                <tr>
                  <td><dt>Rencana</dt></td>
                  <td><?php echo $usulan->rencana ?></td>
                </tr>

                <tr>
                  <td><dt>Dokumen / Proposal</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_file2">
                      <span class="icon text-white-50">
                        <i class="far fa-file-alt"></i>
                      </span>
                      <span class="text">Lihat File</span>
                    </a></td>
                </tr>

                <tr>
                  <td><dt>Link Video</dt></td>
                  <td><a href="#lihat_video2" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal">
                      <span class="icon text-white-50">
                        <i class="fab fa-youtube"></i>
                      </span>
                      <span class="text">Lihat Video</span>
                    </a></td>
                </tr>

                <tr>
                  <td><dt>Gambar</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_gambar2">
                      <span class="icon text-white-50">
                        <i class="far fa-image"></i>
                      </span>
                      <span class="text">Lihat Gambar </span>
                    </a></td>
                </tr>

                <tr>
                  <td><dt>Surat Pernyataan</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_jurnal2">
                      <span class="icon text-white-50">
                        <i class="far fa-file"></i>
                      </span>
                      <span class="text">Lihat Surat Pernyataan</span>
                    </a></td>
                </tr>

              </table>
              
            </div>

          </div>

        
        </div>
      </div>
        
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="lihat_gambar2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Gambar</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <embed src="<?php echo base_url().'/uploads/'.$usulan->gambar ?>"
        frameborder="0" width="100%" height="570px">
        
    </div>
  </div>
</div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_file2" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Dokumen / Proposal</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
        
        <embed src="<?php echo base_url().'/uploads/'.$usulan->proposal ?>"
        frameborder="0" width="100%" height="600px">
        
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_video2" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Video</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
            <?php  
                $kal = "echo $usulan->link_video";
                $link = substr($kal,22);
              ?>
              <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/<?php echo $link ?>" allowfullscreen></iframe>
              
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" id="lihat_jurnal2" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Surat Pernyataan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
       
        <embed src="<?php echo base_url().'/uploads/'.$usulan->jurnal ?>"
        frameborder="0" width="100%" height="600px">
         
        
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	var arr = document.getElementsByClassName("tes");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('tot_nil_nom').value = tot;
  });
  function b(){
    var arr = document.getElementsByClassName("tes");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('tot_nil_nom').value = tot;
} 
  
</script>

