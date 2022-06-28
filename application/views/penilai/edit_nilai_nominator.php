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

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-3">
      <div class="ml-2">
        <a href="<?php echo base_url('penilai/Data_nominator/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
      </div>
      
      <div class="col-lg-9">
        <div class="card shadow-lg">
          <h5 class="card-header"><b>Nilai Nominator [ Inovator : <?php echo $usulan->nama_ketua ?> ] [ Nama Inovasi : <?php echo $usulan->judul ?> ] </b></h5>
          <div class="card-body">
              <div class="col">
                <?php echo $this->session->flashdata('message');  ?>
                <form method="post" action="<?php echo base_url().'penilai/Data_nominator/update_nilai_nominator' ?>">
                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Uraian Komponen Penilaian</th>
                            <th class="text-center align-middle">Nilai Komponen</th>
                            <th class="text-center align-middle">Nilai</th>
                        </tr>

                        <?php $no=1;
                        foreach($komponen as $komp) : ?>
                            <tr>
                                <td class="text-center align-middle" rowspan="2"><dt><?php echo $no++ ?></dt></td>
                                <td class="align-middle"><dt><?php echo $komp->komponen ?></dt></td>
                                <td class="text-center align-middle">(<?php echo $komp->nilai_komponen_min ?> - <?php echo $komp->nilai_komponen_max ?>)</td>
                                <td align="center">
                                  <?php foreach ($penilaian_nominator as $nilai_nominator): 
                                    if($nilai_nominator['id_indikator'] == $komp->id): ?>
                                      <input type="number" id="nilai_nom" onkeyup="b()" name="nilai[]" style="width: 100px;" class="form-control text-center col nilai" 
                                          min="<?php echo $komp->nilai_komponen_min ?>" max="<?php echo $komp->nilai_komponen_max ?>" 
                                          required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')" 
                                          value="<?php echo $nilai_nominator['nilai'] ?>"
                                      >
                                      <input type="text" name="id_penilaian_nominator[]" value="<?php echo $nilai_nominator['id'] ?>" hidden>
                                      <input type="hidden" class="nil_max" value="<?= $komp->nilai_komponen_max ?>">
                                    <?php endif;
                                  endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Note : <?php echo $komp->note ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                          <td align="center">
                            <?php foreach($total_nilai_nominator as $nilai_total_nominator): ?>
                              <input type="text" name="nilai_nominator" id="tot_nil_nom" class="form-control text-center" style="width: 100px;" readonly="true" >
                              <input type="text" name="id_total_nilai_nominator" value="<?php echo $nilai_total_nominator['id_total_nilai_pemenang'] ?>" hidden>
                            <?php endforeach; ?>
                          </td>
                        </tr>
                    </table>
                  </div>
                  <div class="d-flex justify-content-end">
                      <a href="<?= base_url('penilai/Data_nominator/') ?>" class="btn btn-sm btn-warning mr-3"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
                      <button type="submit" class="btn btn-sm btn-success mr-3"><i class="fa fa-save mr-1"></i> Simpan</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div><br><br>
    </div>
  </main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	var arr = document.getElementsByClassName("nilai");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }

    var arr2 = document.getElementsByClassName("nil_max");
    var tt_max=0;
    for(var i=0;i<arr2.length;i++){
        if(parseInt(arr2[i].value))
            tt_max += parseInt(arr2[i].value);
    }

    var hasil = (tot/tt_max)*100
    document.getElementById('tot_nil_nom').value = hasil.toFixed(2);
  });

  function b(){
    var arr = document.getElementsByClassName("nilai");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    
    var arr2 = document.getElementsByClassName("nil_max");
    var tt_max=0;
    for(var i=0;i<arr2.length;i++){
        if(parseInt(arr2[i].value))
            tt_max += parseInt(arr2[i].value);
    }

    var hasil = (tot/tt_max)*100
    document.getElementById('tot_nil_nom').value = hasil.toFixed(2);
} 
  
</script>

