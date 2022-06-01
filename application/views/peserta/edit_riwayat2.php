<div class="container-fluid">
    <div align="center">
        <div class="card" style="width: 95%;">
        <h3 class="card-header bg-warning text-white text-center"><strong>Edit Data Usulan</strong></h3>
        <div class="group" style="display: ;" id="target2">
        <div class="card-header" style="height: 10rem; background: lavender;">
            <div class="group" style="display: ;" id="target1">        
                <table class="table table-borderless" style="margin-top:; display: ;">
                    <td width="15%"></td>
                    <td>
                        <div class="form-group" align="right" style="position:static; margin-top:30px; ">
                            <div style="width:99%; height: 8px; background: #f6c23e;"></div>
                            <div style="width:66%; height: 8px; background: #f6c23e; margin-top: -8px;" ></div>
                            <div style="width:33%; height: 8px; background: #A9A9A9; margin-top: -8px;" ></div>
                        </div>
                    </td>
                    <td width="15%"></td>
                </table>
                <table class="container-fluid table-borderless" style="position:static; width: 68%; margin-top: -83px;">
                    <td align="center" width="33%">
                        <div class="justify-content">
                            <div style="width:65px; height: 65px; background: #f6c23e; border-radius: 100%;" >
                                <strong><h1 class="fas fa-user" style="margin-top: 9px; color: white;"></h1></strong>
                            </div><br>
                            <h5 style="color: #f6c23e;"><strong>PROFIL</strong></h5>
                        </div>
                    </td>
                    <td align="center" width="33%">
                        <div style="width:65px; height: 65px; background: #f6c23e; border-radius: 100%;" >
                            <strong><h1 class="fas fa-file-alt" style="margin-top: 11px; color: white;" ></h1></strong>
                        </div><br>
                        <h5 style="color: #f6c23e;"><strong>INOVASI</strong></h5>
                    </td>
                    <td align="center" width="33%">
                        <div style="width:65px; height: 65px; background: #A9A9A9; border-radius: 100%;" >
                            <strong><h1 class="fas fa-file-upload" style="margin-top: 11px; color: white;"></h1></strong>
                        </div><br>
                        <h5><strong>BERKAS</strong></h5>
                    </td>          
                </table>
            </div>
        </div>
    </div>
    <?php echo $this->session->flashdata('berubah1') ?>    
    <?php foreach ($detail_riwayat2 as $riwayat2): ?>   
        <?php if ($riwayat2['status'] == '1') { ?>
            <form id="form2" method="post" action="<?php echo base_url().'peserta/edit_riwayat/update_riwayat2' ?>" enctype="multipart/form-data">
            <div class="card-body ">
                <table class="table table-borderless" style="display: ;" id="target2_2">
                        <tr>
                            <td hidden=""><input type="text" name="id" value="<?php echo $riwayat2['id_usulan'] ?>"></td>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Latar Belakang (Permasalahan)</strong></h5></td>
                            <td>
                                <textarea type="text" name="latar_belakang" id="latar" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['latar_belakang'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Kondisi Sebelum Inovasi</strong></h5></td>
                            <td>
                                <textarea type="text" name="kondisi_sebelumnya" id="kondisi" style=" height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['kondisi_sebelumnya'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Sasaran dan Tujuan Inovasi</strong></h5></td>
                            <td>
                                 <textarea type="text" name="sasaran_n_tujuan" id="sasaran" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['sasaran_n_tujuan'] ?></textarea> 
                            </td>
                        </tr>
                       
                        <tr>
                            <td width="23%"><h4 style="margin-top:6px;"><strong>Materi Inovasi</strong></h4></td>
                        </tr>
                        
                        <tr class="mt-5">
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Deskripsi</strong></h5></td>
                            <td>
                                <textarea type="text" name="deskripsi" id="deskripsi" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['deskripsi'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Bahan Baku</strong></h5></td>
                            <td>
                                <textarea type="text" name="bahan_baku" id="bahan" style="height: 90px; width: 100%" class="form-control " ><?php echo $riwayat2['bahan_baku'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Cara Kerja</strong></h5></td>
                            <td>
                                <textarea type="text" name="cara_kerja" id="cara" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['cara_kerja'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Keunggulan</strong></h5></td>
                            <td>
                                <textarea type="text" name="keunggulan" id="keunggulan" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['keunggulan'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Hasil yang Diharapkan</strong></h5></td>
                            <td>
                                <textarea type="text" name="hasil_yg_diharapkan" id="hasil" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['hasil_yg_diharapkan'] ?></textarea> 
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Manfaat Bagi Masyarakat/ Lingkungan</strong></h5></td>
                            <td>
                                <textarea type="text" name="manfaat" id="manfaat" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['manfaat'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td width="23%"><h5 style="margin-top:6px;"><strong>Rencana Keberlanjutan</strong></h5></td>
                            <td>
                                <textarea type="text" name="rencana" id="rencana" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['rencana'] ?></textarea> 
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                <table class="table table-borderless" style="margin-top: -7px;">
                    <td align="center" width="20%"></td>
                    <td align="center" width="20%">
                        <button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat1/'.$riwayat2['id_peserta']) ?>'" type="button"><strong>Sebelumnya</strong></button>
                    </td> 
                    <td align="center" width="20%"></td>
                    <td align="center" width="20%">
                        <button class="btn btn-success" type="button" onclick="cek_data_form2()"><strong>Selanjutnya</strong></button>
                    </td>
                    <td align="center" width="20%"></td>
                </table>
            </div>
            </form>
        <?php }elseif ($riwayat2['status'] == '2' or '3') { ?>
            <form >
                    <div class="card-body ">
                        <table class="table table-borderless" style="display: ;" id="target2_2">
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Latar Belakang (Permasalahan)</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="latar_belakang" id="latar" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['latar_belakang'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Kondisi Sebelum Inovasi</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="kondisi_sebelumnya" id="kondisi" style=" height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['kondisi_sebelumnya'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Sasaran dan Tujuan Inovasi</strong></h5></td>
                                    <td>
                                         <textarea disabled type="text" name="sasaran_n_tujuan" id="sasaran" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['sasaran_n_tujuan'] ?></textarea> 
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td width="23%"><h4 style="margin-top:6px;"><strong>Materi Inovasi</strong></h4></td>
                                </tr>
                                
                                <tr class="mt-5">
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Deskripsi</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="deskripsi" id="deskripsi" style="height: 90px; width: 100%" class="form-control" value="<?php ?>" ><?php echo $riwayat2['deskripsi'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Bahan Baku</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="bahan_baku" id="bahan" style="height: 90px; width: 100%" class="form-control " ><?php echo $riwayat2['bahan_baku'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Cara Kerja</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="cara_kerja" id="cara" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['cara_kerja'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Keunggulan</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="keunggulan" id="keunggulan" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['keunggulan'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Hasil yang Diharapkan</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="hasil_yg_diharapkan" id="hasil" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['hasil_yg_diharapkan'] ?></textarea> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Manfaat Bagi Masyarakat/ Lingkungan</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="manfaat" id="manfaat" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['manfaat'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="23%"><h5 style="margin-top:6px;"><strong>Rencana Keberlanjutan</strong></h5></td>
                                    <td>
                                        <textarea disabled type="text" name="rencana" id="rencana" style="height: 90px; width: 100%" class="form-control"><?php echo $riwayat2['rencana'] ?></textarea> 
                                    </td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                        <table class="table table-borderless" style="margin-top: -7px;">
                            <td align="center" width="50%">
                                <button class="btn btn-danger" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat1/'.$riwayat2['id_peserta']) ?>'" ><strong>Sebelumnya</strong>
                                </button>
                            </td> 
                            <td align="center" width="50%">
                                <button class="btn btn-success" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat3/'.$riwayat2['id_usulan']) ?>'" ><strong>Selanjutnya</strong></button>
                            </td>
                        </table>
                    </div>
                </form>
            <?php } ?>
    <?php endforeach; ?>
    </div>
</div><br><br>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<script type="text/javascript">
    function cek_data_form2(){
        var latar       = document.getElementById("latar").value;
        var kondisi     = document.getElementById("kondisi").value; 
        var sasaran     = document.getElementById("sasaran").value; 
        var deskripsi   = document.getElementById("deskripsi").value;
        var bahan       = document.getElementById("bahan").value;
        var cara        = document.getElementById("cara").value;
        var keunggulan  = document.getElementById("keunggulan").value;
        var hasil       = document.getElementById("hasil").value;
        var manfaat     = document.getElementById("manfaat").value;
        var rencana     = document.getElementById("rencana").value;
        if (latar != "" && kondisi !="" && sasaran !="" && deskripsi != "" && bahan != "" && cara != "" && keunggulan != "" && hasil != "" && manfaat != "" && rencana !="") 
            {
                document.getElementById("form2").submit();
            }
        else
            {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
            }
    }
</script>