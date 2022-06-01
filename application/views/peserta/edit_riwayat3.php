<div class="container-fluid">
    <div align="center">
        <div class="card" style="width: 100%;">
            <div class="card-header bg-warning"><h3 class="text-white text-center"><strong>Edit Data Dokumen</strong></h3></div>
            <div class="group" style="display: ;">
            <div class="card-header" style="height: 10rem; background: lavender;">
                <div class="group" id="target3">
                    <table class="table table-borderless" style="margin-top:; display: ;">
                        <td width="15%"></td>
                        <td>
                            <div class="form-group" align="right" style="position:static; margin-top:30px; ">
                                <div style="width:99%; height: 8px; background: #f6c23e;"></div>
                                <div style="width:66%; height: 8px; background: #f6c23e; margin-top: -8px;" ></div>
                                <div style="width:33%; height: 8px; background: #f6c23e; margin-top: -8px;" ></div>
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
                                <strong><h1 class="fas fa-file-alt" style="margin-top: 11px; color: white;"></h1></strong>
                            </div><br>
                            <h5 style="color: #f6c23e;"><strong>INOVASI</strong></h5>
                        </td>
                        <td align="center" width="33%">
                            <div style="width:65px; height: 65px; background: #f6c23e; border-radius: 100%;" >
                                <strong><h1 class="fas fa-file-upload" style="margin-top: 11px; color: white;"></h1></strong>
                            </div><br>
                            <h5 style="color: #f6c23e;"><strong>BERKAS</strong></h5>
                        </td>          
                    </table>
                </div>
            </div>
            </div>
            <?php echo $this->session->flashdata('berubah2') ?>
            <?php foreach ($detail_riwayat3 as $riwayat3): ?>  
                <?php if ($riwayat3['status'] == '1') { ?>
                    <form id="form3" method="post" action="<?php echo base_url().'peserta/edit_riwayat/update_riwayat3' ?>" enctype="multipart/form-data">
                        <div class="card-body ">
                            <div  align="center" style="justify-content:;">
                                <table align="center" class="table table-borderless table-responsive-xl" style="justify-content: center; width:92%;">
                                        <tr >
                                            <td hidden="hidden"><input type="text" name="id" value="<?php echo $riwayat3['id_usulan']?>"></td>
                                            <td><h5 style="margin-top:6px;"><strong>Dokumen / Proposal</strong></h5></td>
                                            <td width="50%"><input type="file" name="proposal" id="surat" style="width: 100%; height:45px; margin-top: 3px;" class="form-control" ></td>
                                            <td align="center">
                                                <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proposal_edit"><i class="fas fa-search"></i> <strong>Tampil Dokumen / Proposal</strong></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5 style="margin-top:6px;"><strong>Surat Pernyataan</strong></h5></td>
                                            <td width="50%"><input type="file" name="jurnal" id="jurnal" style="width: 100%; height:45px;" class="form-control"  ></td>
                                            <td align="center" class="align-items">
                                                <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dokumen_edit"><i class="fas fa-search"></i><strong> Tampil Surat Pernyataan</strong></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5 style="margin-top:6px;"><strong>Gambar</strong></h5></td>
                                            <td width="50%"><input type="file" name="gambar" id="gambar" style="width: 100%; height:45px;" class="form-control"  ></td>
                                            <td align="center">
                                                <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gambar_edit"><i class="fas fa-search"></i> <strong> Tampil Gambar</strong></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5 style="margin-top:6px;"><strong>Link Video/ Youtube</strong></h5></td>
                                            <td width="50%"><input type="text" name="link_video" id="link" value="<?php echo $riwayat3['link_video']?>" style="width: 100%; height:45px;" class="form-control"></td>
                                            <td align="center">
                                                <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#video_edit"><i class="fas fa-search"></i><strong> Lihat Video</strong></a>
                                            </td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                            <table class="table table-borderless" style="margin-top: -7px;">
                                <td align="center" width="20%"></td>
                                <td align="center" width="20%">
                                    <button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat2/'.$riwayat3['id_usulan']) ?>'" type="button"><strong>Sebelumnya</strong></button>
                                </td> 
                                <td align="center" width="20%"></td>
                                <td align="center" width="20%">
                                    <button class="btn btn-success" type="button" onclick="cek_data_form3()"><strong>Selesai</strong></button>
                                </td>
                                <td align="center" width="20%"></td>
                            </table>
                        </div>
                    </form>
                <?php }elseif ($riwayat3['status'] == '2' or '3') { ?>
                    <form >
                        <div class="card-body ">
                            <div  align="center" style="justify-content:;">
                            <table align="center" class="table table-borderless table-responsive-xl" style="justify-content: center; width:92%;">
                                    <tr>
                                        <td hidden="hidden"><input type="text" name="id" value="<?php echo $riwayat3['id_usulan']?>"></td>
                                        <td><h5 style="margin-top:6px;"><strong>Surat Pernyataan</strong></h5></td>
                                        <td width="50%"><input disabled type="file" name="jurnal" id="surat" style="width: 100%; height:45px; margin-top: 3px;" class="form-control" accept="application/pdf,"></td>
                                        <td align="center">
                                            <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proposal_edit"><i class="fas fa-search"></i> <strong>Tampil Surat Pernyataan</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="margin-top:6px;"><strong>Dokumen / Proposal</strong></h5></td>
                                        <td width="50%"><input disabled type="file" name="proposal" id="jurnal" style="width: 100%; height:45px;" class="form-control" accept="application/pdf," ></td>
                                        <td align="center" class="align-items">
                                            <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dokumen_edit"><i class="fas fa-search"></i><strong> Tampil Dokumen</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="margin-top:6px;"><strong>Gambar</strong></h5></td>
                                        <td width="50%"><input disabled type="file" name="gambar" id="gambar" style="width: 100%; height:45px;" class="form-control" accept="image/png,image/jpeg,image/jpg,application/pdf," ></td>
                                        <td align="center">
                                            <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gambar_edit"><i class="fas fa-search"></i> <strong> Tampil Gambar</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="margin-top:6px;"><strong>Link Video/ Youtube</strong></h5></td>
                                        <td width="50%"><input disabled type="text" name="link_video" id="link" value="<?php echo $riwayat3['link_video']?>" style="width: 100%; height:45px;" class="form-control"></td>
                                        <td align="center">
                                            <a style="width:100%;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#video_edit"><i class="fas fa-search"></i><strong> Lihat Video</strong></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                            <table class="table table-borderless" style="margin-top: -7px;">
                                <td align="center" width="50%">
                                    <button class="btn btn-danger" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat2/'.$riwayat3['id_usulan']) ?>'" ><strong>Sebelumnya</strong>
                                    </button>
                                </td> 
                                <td align="center" width="50%">
                                    <button class="btn btn-success" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/index/') ?>'" ><strong>Selesai</strong></button>
                                </td>
                            </table>
                        </div>

                    </form>
                <?php } ?>
            <?php endforeach; ?>
    </div>
</div><br>

<!-- surat pernyatan -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="proposal_edit" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Surat Pernyataan</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:95%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
        <div class="modal-body">
            <div class="embed-responsive embed-responsive-21by9">
                    <?php foreach ($detail_riwayat3 as $riwayat3): ?>
                    <embed src="<?php echo base_url().'/uploads/'.$riwayat3['proposal'] ?>"
                    frameborder="0" >
                    <?php endforeach; ?>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- Dokumen -->
<div class="modal fade bd-example-modal-xl" style="" tabindex="-1" id="dokumen_edit" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Dokumen</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:95%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
       <div class="modal-body" >
        <div class="embed-responsive embed-responsive-21by9">
                <?php foreach ($detail_riwayat3 as $riwayat3): ?>
                <embed src="<?php echo base_url().'/uploads/'.$riwayat3['jurnal'] ?>"
                frameborder="0">
                <?php endforeach; ?>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- Gambar -->
<div class="modal fade" id="gambar_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Gambar Usulan</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:93%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body">
        <?php foreach ($detail_riwayat3 as $riwayat3): ?>
        <img src="<?php echo base_url().'/uploads/'.$riwayat3['gambar'] ?>" style="width: 800px; height:auto;">
         <?php endforeach; ?>
        
    </div>
  </div>
</div>
</div>


<!-- video -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="video_edit" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Video Usulan</strong></h4>
        <button  type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:95%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
       <div class="modal-body" >
          <div class="embed-responsive embed-responsive-21by9">
            <?php foreach ($detail_riwayat3 as $riwayat3):
                    $huruf = $riwayat3['link_video']; ?>

                    <?php if (substr($huruf,32)): ?>
                            <?php $link1 = substr($huruf,32) ?>
                            <iframe id="yutub" src="//www.youtube.com/embed/<?php echo $link1 ?>"></iframe>
       
                    <?php else: ?>
                            <?php $link2 = substr($huruf,17) ?>
                            <iframe id="yutub" src="//www.youtube.com/embed/<?php echo $link2 ?>"></iframe>

                    <?php endif; ?>
                        <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<script type="text/javascript">
    function cek_data_form3() {
        // Surat Pernyataan
        if(document.getElementById("surat").files.length == 0){
            return cek_dokumen();
        }else{
            if(document.getElementById("surat").files[0].type.indexOf("application/pdf")==-1){
                document.getElementById("surat").focus();
                swal("Informasi","Format file surat pernyataan yang anda upload tidak sesuai. Silahkan upload ulang dengan format yang sudah ditentukan","info");
            }else{
                if(document.getElementById("surat").files[0].size>5242880){
                    document.getElementById("surat").focus();
                    swal("Informasi","Ukuran file yang anda upload terlalu besar","info");
                }else{ 
                    return cek_dokumen();
                }
            }
        }
    }

    function cek_dokumen() {
        // Dokumen/Jurnal
        if(document.getElementById("jurnal").files.length == 0){
            return cek_gambar();
        }else{
            if(document.getElementById("jurnal").files[0].type.indexOf("application/pdf")==-1){
                document.getElementById("jurnal").focus();
                swal("Informasi","Format file dokumen yang anda upload tidak sesuai. Silahkan upload ulang dengan format yang sudah ditentukan","info");
            }else{
                if(document.getElementById("jurnal").files[0].size>5242880){
                    document.getElementById("jurnal").focus();
                    swal("Informasi","Ukuran file yang anda upload terlalu besar","info");
                }else{ 
                    return cek_gambar();
                }
            }
        }
    }

    function cek_gambar(){
        // Gambar Usulan
        if(document.getElementById("gambar").files.length == 0){
            return cek_link_video();
        }else{
            if(document.getElementById("gambar").files[0].type.indexOf("image") && document.getElementById("gambar").files[0].type.indexOf("application/pdf")==-1){
                document.getElementById("gambar").focus();
                swal("Informasi","Format file gambar yang anda upload tidak sesuai. Silahkan upload ulang dengan format yang sudah ditentukan","info");
            }else{
                if(document.getElementById("gambar").files[0].size>5242880){
                    document.getElementById("gambar").focus();
                    swal("Informasi","Ukuran file yang anda upload terlalu besar","info");
                }else{
                    return cek_link_video();
                }
            }
        }
    }

    function cek_link_video(){
        //link video
        var link = document.getElementById("link").value;
        if (link !="") {
            var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                '(\\#[-a-z\\d_]*)?$','i');
            if(!pattern.test(link)) {
                document.getElementById("link").focus();
                swal("Peringatan","Url yang anda masukkan tidak valid","warning")
            }else{
                document.getElementById("form3").submit();
            }
        }else{
            document.getElementById("link").focus();
            swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
        }
    }
</script>
