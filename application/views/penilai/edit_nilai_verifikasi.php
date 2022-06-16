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
      </div>
      <div class="card">
      <!-- penilaian proposal -->
        <h5 class="card-header"><b>Nama Inovasi     : <?php echo $usulan->judul ?><br>Inovator : <?php echo $usulan->nama_ketua ?></b></h5><br>
        <h5 class="card-header"><b>Nilai Verifikasi </b></h5>
        <h5 class="card-header"><b>1. Penilaian Makalah</b></h5>
        <form method="post" action="<?php echo base_url('penilai/data_verifikasi/update_nilai_verifikasi')?>">
        <div class="card-body">
          <div class="row">
            <div class="col-md-11">
              
              <table class="table-metadata table-responsive"> 
                <tr>
                  <td style="width: 530px;">
                    <strong  class="ml-3">Nilai Makalah</strong>
                  </td>
                  <td style="width: 240px;" align="center">
                      <?php foreach ($penilaian_proposal as $nilai_proposal): ?>
                          <input type="number" name="nilai_proposal" id="nil_makalah" onkeyup="b()" class="form-control" style="width: 38%;" min="0" max="100" required oninvalid="this.setCustomValidity('Masukkan nilai sesuai aturan!')" oninput="setCustomValidity('')" value="<?php echo $nilai_proposal['nilai_proposal'] ?>">
                          <input hidden type="text" name="id_penilaian_proposal" value="<?php echo $nilai_proposal['id'] ?>" >
                      <?php endforeach; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- penilaian usulan -->
        <h5 class="card-header"><b>2. Penilaian Video dan Substansi Inovasi</b></h5>
        <div class="card-body">
          <div class="row">
              <div class="col-md-11">
              <table class="table table-hover table-responsive ">
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
                          <?php foreach($penilaian_usulan as $nilai_usulan): ?>
                            <?php if($value['id']==$nilai_usulan['id_indikator']): ?>
                              <input type="number" name="nilai[]" onkeyup="a()" class="form-control tot_nilai" id="nilai_verifikasi" 
                                  value="<?php echo $nilai_usulan['nilai']?>"
                                  max="<?php echo $nilai_max['nilai_max'] ?>" min="0" style="width: 40%" required 
                                  oninvalid="this.setCustomValidity('Masukkan nilai sesuai aturan!')" oninput="setCustomValidity('')" >
                                <input type="number" class="total_nilai_indikator" value="<?= $nilai_max['nilai_max'] ?>" hidden>  
                              <input hidden type="text" name="id_penilaian_usulan[]" value="<?php echo $nilai_usulan['id']?>">  
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php endif; endforeach; ?> 
                      </td>  
                    </tr>
                    
                  <?php foreach ($value['ket'] as $key2 => $val): ?>
                    <tr>
                      <td>- <?= $val->keterangan?></td>
                      <td class="text-center">(<?= $val->nilai_minimal_keterangan.'-'.$val->nilai_maksimal_keterangan?>)</td>
                      <td></td>
                    </tr> 
                  <?php endforeach ?>
                  
                  <?php endforeach;?>
                    <tr>
                      <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                      <td align="center"><input disabled type="text" name="total_nilai_komponen" id="tot_nilai_komponen" onblur="b()" class="form-control" style="width: 40%"></td>
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
                    <input readonly type="text" name="nilai_verifikasi" class="form-control" id="tot_verif"  style="width: 38%;" >
                    <?php foreach($total_nilai as $nilai_total): ?>
                      <input hidden type="text" name="id_total_nilai" value="<?php echo $nilai_total['id'] ?>">
                    <?php endforeach; ?>
                  </td>
                  <td style="width: 175px;" align="center"> 
                    <button type="submit" class="btn btn-success" > Simpan</button></td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  <?php foreach($formulasi as $frm):?>;
    var makalah = <?= $frm['nilai_makalah']?>;
    var substansi = <?= $frm['nilai_substansi_inovasi']?>;
  <?php endforeach;?>;

  $(document).ready(function(){
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

      var arr1 = document.getElementById('nil_makalah').value;
      var arr2 = document.getElementById('tot_nilai_komponen').value;

      var jumlah = ((makalah / 100) * arr1) + ((substansi / 100) * arr2);
      document.getElementById('tot_verif').value = jumlah.toFixed(2);
  });

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

    var jumlah = ((makalah / 100) * arr1) + ((substansi / 100) * arr2);
    document.getElementById('tot_verif').value = jumlah.toFixed(2);
  } 
  
</script>
