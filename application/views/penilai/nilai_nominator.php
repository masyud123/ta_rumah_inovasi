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
    <div class="container mt-3">
      <div class="ml-2">
        <a href="<?php echo base_url('penilai/data_nominator/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
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
                <form method="post" action="<?php echo base_url().'penilai/data_nominator/simpan' ?>">
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
                                    <input type="number" id="nilai_nom" onkeyup="b()" name="nilai[]" style="width: 100px;" class="form-control col text-center nilai" 
                                        min="<?php echo $komp->nilai_komponen_min ?>" max="<?php echo $komp->nilai_komponen_max ?>" 
                                        required oninvalid="this.setCustomValidity('Masukkan nilai sesuai aturan!')" oninput="setCustomValidity('')"
                                    >
                                    <input type="text" name="indikator[]"  value="<?php echo $komp->id ?>" hidden>
                                    <input type="hidden" class="nil_max" value="<?= $komp->nilai_komponen_max ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="align-middle">Note : <?php echo $komp->note ?></td>
                            </tr>
                        <?php endforeach; ?>
                            <input type="text" name="id_usulan" value="<?php echo $usulan->id ?>" hidden>
                            <tr>
                              <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                              <td><input type="text" name="nilai_nominator" id="tot_nil_nom" class="form-control col text-center" style="width: 100px;" readonly="true"></td>
                            </tr>
                    </table>
                  </div>
                  <div class="d-flex justify-content-end">
                      <a href="<?= base_url('penilai/data_nominator/') ?>" class="btn btn-sm btn-warning mr-3"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
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

<script type="text/javascript">
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
