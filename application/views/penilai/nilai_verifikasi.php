<div id="layoutSidenav_content">
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

  <main>
    <div class="container mt-3">
      <div>
        <a href="<?php echo base_url('penilai/data_verifikasi/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
        <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-2 ml-2" data-toggle="modal" data-target="#lihat_usulannn">
          <span class="icon text-white-50">
            <i class="fas fa-search-plus"></i>
          </span>
          <span class="text">Lihat Usulan</span>
        </a>
      </div>
      <div class="card">
        <h5 class="card-header"><b>Nama Inovasi     : <?php echo $usulan->judul ?><br>Inovator : <?php echo $usulan->user ?></b></h5><br>
        <h5 class="card-header"><b>Nilai Verifikasi </b></h5>
        <h5 class="card-header"><b>1. Penilaian Makalah</b></h5>
        <form method="post" action="<?php echo base_url().'penilai/data_verifikasi/simpan' ?>" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-md-11">
              <table class="table-metadata table-responsive"> 
                <tr>
                  <td style="width: 530px;">
                    <strong class="ml-3">Nilai Makalah</strong>
                  </td>
                  <td style="width: 240px;" align="center">
                    <input type="number" name="nilai_proposal" id="nil_makalah"  onkeyup="b()" class="form-control text-center" style="width: 38%;" min="0" max="100" required oninvalid="this.setCustomValidity('Masukkan nilai sesuai aturan!')" oninput="setCustomValidity('')">
                  </td>
                  <input type="text" name="id_usulan" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $usulan->id ?>" hidden>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <h5 class="card-header"><b>2. Penilaian Video dan Substansi Inovasi</b></h5>
        <div class="card-body">
          <div class="row">
              <div class="col-md-11">
              <table class="table table-hover table-responsive">
                  <tr>
                    <th rowspan="2" class="text-center table-secondary">No</th>
                    <th colspan="3" class="text-center table-secondary">KRITERIA PENILAIAN PROPOSAL DAN VIDEO INOVASI</th>
                    
                  </tr>
                  <tr>
                    <th class="table-secondary">Uraian Komponen Inovasi Teknologi</th>
                    <th class="table-secondary">Nilai Komponen</th>
                    <th class="table-secondary text-center">Nilai</th>
                  </tr>
                  <?php $i=1;
                  foreach ($indikator_keterangan as $key => $value):?>
                    <tr>
                      <td rowspan="<?=count($value['ket'])+1?>"><?php echo $i++?></td>
                      <td><dt><?= $value['label_indikator']?></dt></td>
                      <td></td>
                      <td align="center">
                          <?php foreach($nilai_maksimal as $nilai_max): 
                            if($nilai_max['id_indikator'] == $value['id']): ?>
                              <input type="number" name="nilai[]" onkeyup="a()" class="form-control text-center tot_nilai" id="nilai_verifikasi" max="<?php echo $nilai_max['nilai_max'] ?>" min="0" style="width: 40%" required oninvalid="this.setCustomValidity('Masukkan nilai sesuai aturan!')" oninput="setCustomValidity('')"> 
                              <input type="number" class="total_nilai_indikator" value="<?= $nilai_max['nilai_max'] ?>" hidden>  
                          <?php endif; endforeach; ?> 
                      </td>  
                      <input type="text" name="indikator[]"  value="<?php echo $value['id'] ?>" hidden>
                      <input type="text" name="usulan_id"  value="<?php echo $usulan->id ?>" hidden>
                    </tr>
                  <?php foreach ($value['ket'] as $key2 => $val): ?>
                    <tr>
                      <td>- <?= $val->keterangan?></td>
                      <td class="text-center">(<?= $val->nilai_minimal_keterangan.' - '.$val->nilai_maksimal_keterangan?>)</td>
                      <td></td>
                    </tr> 
                  <?php endforeach ?>
                  
                  <?php endforeach;?>
                    <tr>
                      <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                      <td align="center"><input type="text" name="total_nilai_komponen" id="tot_nilai_komponen" onblur="b()" class="form-control" style="width: 40%" readonly=""></td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
        <h5 class="card-header"><b>3. Penilaian Verifikasi</b></h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-11">
              <table class="table-metadata table-responsive"> 
                <tr>
                  <td style="width: 530px;">
                    <?php foreach($formulasi as $frm);?>
                    <strong class="ml-1">Penilaian Makalah <?= $frm['nilai_makalah']?>% + Penilaian Video dan Substansi Inovasi <?= $frm['nilai_substansi_inovasi']?>%</strong>
                  </td>
                  <td style="width: 240px;" align="center">
                    <input type="text" name="nilai_verifikasi" class="form-control"  id="tot_verif" style="width: 38%;"  readonly="true">
                    <input type="text" id="tt_verif" hidden>
                  </td>
                  <td style="width: 175px;" align="center">
                    <button id="simpan" type="submit" class="btn btn-success"> Simpan</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </main>
</div>
<br>
<!-- modal lihat usulan -->
<div class="modal fade bd-example-modal-xl" id="lihat_usulannn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <span class="text">Lihat Surat Pernyataan </span>
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

<!-- modal gambar usulan -->
<div class="modal fade" id="lihat_gambar2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Gambar</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <embed src="<?php echo base_url().'/uploads/'.$usulan->gambar ?>""
        frameborder="0" width="100%" height="570px">
      </div>
  </div>
</div>
</div>

<!-- modal dokumen/proposal -->
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

<!-- modal video usulan -->
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

<!-- modal surat pernyataan -->
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
  function a(){
    var nilai = document.getElementsByClassName('total_nilai_indikator');
    var total=0;
    for(var i=0;i<nilai.length;i++){
        if(parseInt(nilai[i].value))
            total += parseInt(nilai[i].value);
    }

    var arr = document.getElementsByClassName('tot_nilai');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    var hitung = (tot / total) * 100
    document.getElementById('tot_nilai_komponen').value = hitung.toFixed(2);
    return b();
  } 

  function b(){
    var arr1 = document.getElementById('nil_makalah').value;
    var arr2 = document.getElementById('tot_nilai_komponen').value;

    <?php foreach($formulasi as $frm):?>;
    var makalah = <?= $frm['nilai_makalah']?>;
    var substansi = <?= $frm['nilai_substansi_inovasi']?>;
    <?php endforeach;?>;

    var jumlah = ((makalah / 100) * arr1) + ((substansi / 100) * arr2);
    document.getElementById('tot_verif').value = jumlah.toFixed(2);
  } 
  
</script>