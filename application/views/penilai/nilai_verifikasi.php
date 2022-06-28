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
        <a href="<?php echo base_url('penilai/Data_verifikasi/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
      </div>
      <div class="card">
        <h5 class="card-header"><b>Nama Inovasi     : <?php echo $usulan->judul ?><br>Inovator : <?php echo $usulan->nama_ketua ?></b></h5><br>
        <h5 class="card-header"><b>Nilai Verifikasi </b></h5>
        <h5 class="card-header"><b>1. Penilaian Makalah</b></h5>
        <form method="post" action="<?php echo base_url().'penilai/Data_verifikasi/simpan' ?>" enctype="multipart/form-data">
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