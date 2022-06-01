<div class="container-fluid">
	<div class="d-flex justify-content-center">
		<div class="col-11 mt-3">
        <?= $this->session->flashdata('pesan_masal')?>
			<div class="card shadow">
				<div class="card-header">
					<div class="text-center">
						<h3><strong>Kirim Pesan WhatsApp</strong></h3>
					</div>
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/pesan_masal/kirim_pesan')?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label><strong>Nomor WA</strong></label>
							<textarea id="nomor" name="nomor" class="form-control" placeholder="Masukan nomor WA" oninput="this.value = this.value.replace(/[^0-9,]/g, '');"></textarea>
                            <small class="text-danger">
                                <?= "*Catatan: Jika ada banyak nomor pisahkan dengan koma (,)"?>
                            </small>
						</div>
						<div class="form-group">
							<label><strong>Pesan</strong></label>
							<textarea id="form-pesan" name="pesan" class="form-control" placeholder="Masukan pesan"></textarea>
						</div>
						<div align="right" >
							<button id="kirim" type="submit" class="btn btn-primary btn-sm">Kirim Pesan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <div class="col-11 mt-3">
			<div class="card shadow">
                <div class="card-header">
                    <h5><strong>Daftar Peserta</strong></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="table-secondary text-center align-items-center">No</th>
                                    <th class="table-secondary text-center align-items-center">Nama</th>
                                    <th class="table-secondary text-center align-items-center">Email</th>
                                    <th class="table-secondary text-center align-items-center">No. Whatsapp</th>
                                    <th class="table-secondary text-center align-items-center">
                                        <span>Pilih Semua</span>
                                        <input class="ml-2" type="checkbox" id="cek_semua" style="cursor: pointer;">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;
                                foreach($peserta as $peserta1): ?>
                                    <tr>
                                        <td class="text-center align-items-center"><?= $no++?></td>
                                        <td class="text-center align-items-center"><?= $peserta1['nama_ketua']?></td>
                                        <td class="text-center align-items-center"><?= $peserta1['email_ketua']?></td>
                                        <td class="text-center align-items-center"><?= $peserta1['no_hp']?></td>
                                        <td class="text-center align-items-center">
                                            <input value="<?= $peserta1['no_hp']?>" type="checkbox" class="cek_nomor" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"/>
<script src="https://cdn.rawgit.com/yuku-t/jquery-textcomplete/v1.3.4/dist/jquery.textcomplete.js"></script>
<script type="text/javascript">
	$('#form-pesan').emojioneArea({
        pickerPosition: "bottom",
        tonesStyle: "bullet",
        autocomplete: true,
        events: {
            ready: function() {
                this.editor.textcomplete([{
                    id: 'emojionearea',
                    match: /\B@([\-\d\w]*)$/,
                    search: function (term, callback) {
                        // this code must be replaced with your
                        // load mentions from ajax
                        var mentions = ['Peter', 'Tom', 'Anne'];
                        callback($.map(mentions, function (mention) {
                        return mention.indexOf(term) === 0 ? mention : null;
                    }));
                    },
                    template: function (value) {
                        return '<b>' + value + '</b>&nbsp;';
                    },
                    replace: function (value) {
                        return '<b>@' + value + '</b>&nbsp;';
                    },
                    cache: true,
                    index: 1
                }]);
            }
        }
    });

    $(document).ready(function() {
        $('#cek_semua').click(function() {
            if ($(this).is(':checked')) {
                $('.cek_nomor').each(function(){
                    $(this).prop('checked', true);
                    $(this).attr('disabled', 'true');
                    var isi = $('#nomor').val();
                    var data = isi.split(",");
                    var data2 = data.filter((e, i, a) => a.indexOf(e) === i);
                    if(isi == ""){
                        $('#nomor').val($(this).val())
                    }else{
                        $('#nomor').val(data2+","+$(this).val());
                    }
                });
            } else {
                $('.cek_nomor').each(function(){
                    $(this).prop('checked', false);
                    $(this).removeAttr('disabled');
                    $('#nomor').val('');
                });
            }
        });

        $('.cek_nomor').click(function(){
            if ($(this).is(':checked')) {
                $(this).prop('checked', true);
                var isi = $('#nomor').val();
                if(isi == ""){
                    $('#nomor').val($(this).val())
                }else{
                    $('#nomor').val(isi+","+$(this).val());
                }
            } else {
                $(this).prop('checked', false);
                var isi = $('#nomor').val();
                var data = isi.split(",");

                var myIndex = data.indexOf('' + $(this).val() + '');
                if (myIndex !== -1) {
                    data.splice(myIndex, 1);
                }
                $('#nomor').val(data);
            }
        });

        setInterval(function(){ 
            var num = $('#nomor').val();
            var msg = $('#form-pesan').val();

            if(num != '' && msg != ''){
                $('#kirim').removeAttr('disabled');
            }else{
                $('#kirim').attr('disabled',true);
            }
        },1);
    });
</script>
