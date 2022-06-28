<div class="container-fluid">
    <!-- <td>
      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <select class="custom-select mr-sm-2" name="cari_verifikasi" id="myInput2" onchange="filter_tahun2()">
            <option disabled selected>Filter Tahun</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
          </select>
        </div>
         <div class="col-auto my-1">
          <button type="submit" onclick="filter_tahun2()" class="btn btn-sm btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-search"></i>
              </span>
              <span class="text">Filter</span>
          </button>
        </div>
      </div>
    </td> -->

    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DATA VERIFIKASI</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message');  ?>
            <div class="table-responsive">
              <table id="myTable2" class="table table-striped table-hover table-bordered" style="width: 100%">
                  <tr>
                      <th class="text-center table-secondary">No</th>
                      <th class="table-secondary">Tahun</th>
                      <th class="table-secondary">Sub Event</th>
                      <th class="table-secondary">Nama Inovasi</th>
                      <th class="table-secondary">Inovator</th>
                      <th class="text-center table-secondary" colspan="2">Aksi</th>
                  </tr>

                  <?php $no=1;
                  foreach($idSubevent as $id_subevent) :
                  foreach($usulan as $usl) : 
                  if($usl->id_subevent == $id_subevent->id_subevent): ?>
                      <tr>
                          <td class="text-center"><?php echo $no++ ?></td>
                          <td><?php echo $usl->tahun ?></td>
                          <td><?php echo $usl->subevent ?></td>
                          <td><?php echo $usl->judul ?></td>
                          <td><?php echo $usl->nama_ketua ?></td>
                          <td align="center" style="width: 50"><?php echo anchor('penilai/Data_verifikasi/view/' .$usl->id, '<div class="btn btn-sm btn-success btn"><i class="fa fa-search-plus"></i> Detail Inovasi</div>') ?>
                          </td>
                          <td align="center" style="width: 50">
                            <?php if ($ganti_warna != null): ?>
                              <?php foreach ($ganti_warna as $g_warna):
                                  $cekData[] = $g_warna['id_usulan'];
                                endforeach; ?>
                                <?php if (in_array($usl->id, $cekData)) :?>
                                    <button onclick="window.location.href='<?php echo base_url('penilai/Data_verifikasi/edit_nilai_verifikasi/' .$usl->id) ?>'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> Edit Nilai</button>
                                <?php else :?>
                                    <button onclick="window.location.href='<?php echo base_url('penilai/Data_verifikasi/nilai_verifikasi/' .$usl->id) ?>'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Beri Nilai</button>
                              <?php endif;?> 
                          <?php else: ?>
                              <button onclick="window.location.href='<?php echo base_url('penilai/Data_verifikasi/nilai_verifikasi/' .$usl->id) ?>'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Beri Nilai</button>
                          <?php endif;?>
                          </td>
                      </tr>
                  <?php endif; endforeach; endforeach; ?> 
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function filter_tahun2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>