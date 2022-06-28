<div class="container-fluid">
    <!-- <form action="<?php echo base_url(). 'penilai/data_verifikasi/cari_verifikasi'; ?>" method="post" >
        <td><div class="form-row align-items-center">
            <div class="col-auto my-1">
              <select class="custom-select mr-sm-2" name="cari_verifikasi" id="myInput" onchange="filter_tahun()">
                <option disabled selected>Filter Tahun</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
            <div class="col-auto my-1">
              <button type="submit" onclick="filter_tahun()" class="btn btn-sm btn-primary btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-search"></i>
                  </span>
                  <span class="text">Filter</span>
              </button>
            </div>
          </div>
        </td>
      </form>  -->

     <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">DATA NOMINATOR</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <?php echo $this->session->flashdata('message_nominator');  ?>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped" style="width: 100%">
          <tr>
            <th class="text-center table-secondary">No</th>
            <th class="table-secondary">Tahun</th>
            <th class="table-secondary">Sub Event</th>
            <th class="table-secondary">Nama Inovasi</th>
            <th class="table-secondary">Inovator</th>
            <th class="text-center table-secondary" colspan="2">Aksi</th>
          </tr>

          <?php 
          $no=1;
          foreach($usulan as $usl) : ?>

          <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td><?php echo $usl->tahun ?></td>
            <td><?php echo $usl->subevent ?></td>
            <td><?php echo $usl->judul ?></td>
            <td><?php echo $usl->nama_ketua ?></td>
            <td align="center" style="width: 50"><?php echo anchor('penilai/Data_nominator/view/' .$usl->id, '<div class="btn btn-sm btn-warning btn"><i class="fa fa-search-plus"></i> Lihat</div>') ?>
            </td>
            <td align="center" style="width: 50">
              <?php if ($ganti_warna2 != null): ?>
                  <?php foreach ($ganti_warna2 as $wrn):
                      $gatel[] = $wrn->id_usulan;
                   endforeach; ?>
                    <?php if (in_array($usl->id, $gatel)) :?>
                       <button onclick="window.location.href='<?php echo base_url('penilai/Data_nominator/edit_nilai_nominator/' .$usl->id) ?>'" class="btn btn-sm btn-success"><i class="far fa-edit"></i> Edit Nilai</button>
                    <?php else :?>
                        <button onclick="window.location.href='<?php echo base_url('penilai/Data_nominator/nilai_nominator/' .$usl->id) ?>'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Nilai</button>
                  <?php endif;?> 
              <?php else: ?>
                  <button onclick="window.location.href='<?php echo base_url('penilai/Data_nominator/nilai_nominator/' .$usl->id) ?>'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Nilai</button>
              <?php endif;?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
      </div>
  </div>

  </div>

<script>
function filter_tahun() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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

    




