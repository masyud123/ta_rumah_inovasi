<div class="container-fluid">
    <?php echo $this->session->flashdata('message');  ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">USULAN TERKINI</h5>
            </div>
        </div>
        <div class="card-body">
            <div id="tempel_data"></div>
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
        $.ajax({
          type: "GET",
          url: "<?= base_url('admin/Usulan_terkini/semua_usulan/')?>",
          success: function (response) {
              $('#tempel_data').html(response);
          }
        });
    });
</script>