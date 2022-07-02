<div class="container">
    <div class="ml-3 mb-3">
        <h3 class="text-secondary"><strong>Informasi Whatsapp</strong></h3>
    </div>
    <?=$this->session->flashdata('update_token');?>
    <div class="col-lg-8">
        <div class="card shadow-lg">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <dt>Status</dt>
                        <div class="d-md-flex justify-content-between align-items-center">
                            <input type="text" class="form-control col-md-6 col-lg-8" value="<?=$this->session->userdata('whatsapp')?>" disabled>
                            <div class="d-flex py-2 col-md-6 col-lg-4">
                            <button type="button" class="btn btn-secondary col-12" id="pindai_kode">
                                <i class="fa fa-qrcode mr-2" aria-hidden="true"></i>Pindai Kode QR
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <dt>Nama</dt>
                        <input type="text" class="form-control" value="<?=$status->nama?>" disabled>
                    </div>
                    <div class="form-group">
                        <dt>No. Whatsapp</dt>
                        <input type="text" class="form-control" value="<?=$status->token->sender?>" disabled>
                    </div>
                    <div class="form-group">
                        <dt>Masa Berlaku</dt>
                        <input type="text" class="form-control" value="<?=date('d-m-Y  H:i:s', strtotime($status->token->expired))?> WIB" disabled>
                    </div>
                    <div class="form-group">
                        <dt>Username Whatsapp Gateway</dt>
                        <input type="text" class="form-control" value="<?=$username_token['username']?>" disabled>
                    </div>
                    <div class="form-group">
                        <dt>Token Whatsapp Gateway</dt>
                        <input type="text" class="form-control" value="<?=$username_token['token']?>" disabled>
                    </div>
                    <div class="d-lg-flex justify-content-end align-items-center mt-2">
                        <div class="col-lg-4">
                            <a href="<?=base_url('admin/Whatsapp/')?>" class="btn btn-sm btn-info ">
                                <i class="fa fa-repeat mr-2"></i>Refresh Halaman
                            </a>
                        </div>
                        <div class="col-lg-8 d-flex justify-content-lg-end py-2">
                            <a href="" data-toggle="modal" data-target="#modal-edit-token">Ubah username dan token whatsapp gateway ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tempel modal qr code -->
<div id="tempel_data"></div>

<!-- Modal edit usename dan token whatsapp gateway-->
<div class="modal fade" id="modal-edit-token" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><b>Ubah Username dan Token</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-update-username-token" action="<?=base_url('admin/Whatsapp/update_username_token/'.$username_token['id'])?>" method="POST">
                    <div class="col">
                        <div class="form-group">
                            <dt>Username whatsapp gateway</dt>
                            <input class="form-control" type="text" name="username" required oninvalid="this.setCustomValidity('Form wajib diisi!')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <dt>Token whatsapp gateway</dt>
                            <input class="form-control" type="text" name="token" required oninvalid="this.setCustomValidity('Form wajib diisi!')" oninput="this.setCustomValidity('')">
                        </div>
                    </div><br>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">;
    $(document).ready(function(){
        $('#pindai_kode').on('click', function(){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/Whatsapp/pindai_kode/')?>",
                success: function (response) {
                    if(response != 1){
                        $('#tempel_data').html(response);
                        $('#modal-qrcode').modal();
                    }else{
                        Swal.fire('Informasi','Aplikasi ini sudah terhubung dengan whatsapp gateway','info')
                    }
                }
            });
        });

        $('#form-update-username-token').on('submit', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin mengubah username dan token whatsapp gateway ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.currentTarget.submit();
                }
            })
        })

    });
</script>