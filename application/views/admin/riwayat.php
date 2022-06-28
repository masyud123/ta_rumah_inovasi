<div class="container-fluid">
    <?php echo $this->session->flashdata('message');  ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">DATA RIWAYAT</h5>
                <div class="col-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <span>Filter tahun:</span> 
                        <select class="custom-select form-control-sm col-7 ml-2" id="filter-th">
                            <option disabled selected hidden>Pilih Tahun</option>
                            <?php // for($i=date('Y')-2; $i<=date('Y')+2; $i++):
                                for($i=2020; $i<=2030; $i++):?>
                                <option <?= $i == date('Y') ? "selected" : "" ?>><?= $i?></option>
                            <?php endfor;?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="list-data"></div>
        </div>
    </div>
</div>
<br><br>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">;
    $(document).ready(function(){
        var data = $('#filter-th').val();
        $.ajax({
          type: "GET",
          url: "<?= base_url('admin/Data_riwayat/filter_tahun/')?>"+data,
          success: function (response) {
              $('#list-data').html(response);
          }
        });

        $('#filter-th').on('change', function(){
            var data = $(this).val();
            $.ajax({
              type: "GET",
              url: "<?= base_url('admin/Data_riwayat/filter_tahun/')?>"+data,
              success: function (response) {
                  $('#list-data').html(response);
              }
            });
        });
    });
</script>