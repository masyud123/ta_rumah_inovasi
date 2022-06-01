<div class="container-fluid">
    <div align="center">
        <div class="card" style="width: 95%;">
        <h3 class="card-header bg-warning text-white text-center"><strong>Edit Data Profil</strong></h3>
        
            <?php foreach ($detail_riwayat as $riwayat1): ?> 
            <div class="card-header" style="height: 10rem; background: lavender;">
            <div class="group" style="display: ;" id="target1">
                <table class="table table-borderless" style="margin-top:; display: ;">
                    <td width="15%"></td>
                    <td>
                        <div class="form-group" align="right" style="position:static; margin-top:30px; ">
                            <div style="width:99%; height: 8px; background: #f6c23e;"></div>
                            <div style="width:66%; height: 8px; background: #A9A9A9; margin-top: -8px;" ></div>
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
                        <div style="width:65px; height: 65px; background: #A9A9A9; border-radius: 100%;" >
                           <strong><h1 class="fas fa-file-alt" style="margin-top: 11px; color: white;"></h1></strong>
                        </div><br>
                        <h5><strong>INOVASI</strong></h5>
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
        <?php echo $this->session->flashdata('berubah1') ?>
        <?php if ($riwayat1['status'] == '1') { ?>
            <form id="FormDataSemua" method="post" action="<?php echo base_url().'peserta/edit_riwayat/update_riwayat1' ?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="ml-3 mr-3" >
                            <div class="form-group " style="position: static;">
                                    
                                <table class="table table-borderless table-responsive" style="justify-content: center; width: 70%; " id="target1_1">
                                    <tr hidden="hidden">
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>id peserta</strong></h5></td>
                                        <td><input type="text" name="id_peserta" id="inovasi" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['id_peserta'] ?>"></td>
                                    </tr>
                                    <tr hidden="hidden">
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>id usulan</strong></h5></td>
                                        <td><input type="text" name="id" id="id" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['id'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Inovasi</strong></h5></td>
                                        <td><input type="text" name="judul" id="judul" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['judul'] ?>"></td>
                                    </tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Kategori</strong></h5></td>
                                        <td><div class="form-group row">
                                                <?php $kategori = $riwayat1['kategori_peserta']; ?>
                                                <?php if ($kategori == 'pelajar'): ?>
                                                    <h5 class="col-3" ><input type='radio' name='kategori_peserta' id="kategori" value='umum' class="kat" />  Umum</h5>
                                                    <h5 class="ml-5"><input checked="" type='radio' name='kategori_peserta' id="kategori" value='pelajar' class="kat" />  Pelajar</h5>
                                                <?php else : ?>
                                                    <h5 class="col-3" ><input checked="" type='radio' name='kategori_peserta' id="kategori" value='umum' class="kat" />  Umum</h5>
                                                    <h5 class="ml-5"><input type='radio' name='kategori_peserta' id="kategori" value='pelajar' class="kat" />  Pelajar</h5>
                                                <?php endif; ?>
                                                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
                                                        <script type="text/javascript">
                                                            $(function(){
                                                                $(":radio.kat").click(function(){
                                                                    $("#target10").hide()
                                                                    if($(this).val() == "pelajar"){
                                                                        $("#target10").show();
                                                                        return true;
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                        </div></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Interaksi</strong></h5></td>
                                        <td><div class="form-group row">
                                            <?php $inter = $riwayat1['interaksi'] ?>
                                            <?php if($inter == 'Individu'): ?>
                                                <h5 class="col-3"><input checked="" type='radio' name="interaksi" id="interaksi" value='Individu' class="int"/>  Individu</h5>
                                                <h5 class="ml-5"><input type='radio' name="interaksi" id="interaksi" value='Kelompok' class="int"/>  Kelompok</h5>
                                            <?php else: ?>
                                                <h5 class="col-3"><input type='radio' name="interaksi" id="interaksi" value='Individu' class="int"/>  Individu</h5>
                                                <h5 class="ml-5"><input checked="" type='radio' name="interaksi" id="interaksi" value='Kelompok' class="int"/>  Kelompok</h5>
                                            <?php endif; ?>
                                                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
                                                    <script type="text/javascript">
                                                        $(function(){
                                                            $(":radio.int").click(function(){
                                                                $("#target8").hide()
                                                                if($(this).val() == "Kelompok"){
                                                                    $("#target8").show();
                                                                    return true;
                                                                }else{
                                                                    $("#target8").hide()
                                                                }
                                                            });
                                                        });
                                                    </script>
                                       </div></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Bidang Inovasi</strong></h5></td>
                                       <td><select class="form-control" id="id_bidang"  name="id_bidang" style="width: 100%; background:whitesmoke;" >
                                            <?php foreach ($tampil_bidang as $bidang1) ?>
                                                <option selected="" value="<?php echo $bidang1['id'] ?>">
                                                    <?php echo $bidang1['bidang'] ?>
                                                </option>
                                            <?php 
                                                $pil_bdg = $bidang1['bidang'];
                                                $sql = $this->db->query("SELECT * FROM bidang where bidang !='$pil_bdg'")->result();
                                            foreach($sql as $bid): ?>
                                                <option value="<?php echo $bid->id ?>">
                                                    <?php echo $bid->bidang; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Tim</strong></h5></td>
                                       <td><input id="nama_tim" type="text" name="nama_tim" style="width: 100%; background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['nama_tim'] ?>"></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Ketua</strong></h5></td>
                                       <td><input id="nama_ketua" type="text" name="nama_ketua" style=" width: 100%; background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['nama_ketua'] ?>"></input></td>
                                    </tr>
                                    <?php if($inter == 'Individu'): ?>
                                        <tr id="target8" style="display: none;position: static;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Anggota</strong></h5></td>
                                           <td align="center">
                                            
                                                <table class="table">
                                                    
                                                       <div  id="itemlist" style=""><input type="text" name="nama_anggota[0]" id="nama_anggota[0]" style="width: 100%; margin-bottom: 12px; background:whitesmoke;" class="form-control" value=""></input></div>
                                                       
                                                </table>
                                                <button type="button" class="btn btn-success" style="position: static; margin-top: -10px;" onclick="additem()"><i class="fas fa-plus"></i> Tambah Anggota</button>              

                                            <script>
                                                    var Limit = 4;
                                                    var i = 1;
                                                    function additem() {
                                                    var itemlist = document.getElementById('itemlist');
                                                    if (itemlist.children.length <= Limit) {
                                                    
                                    
                                                        var row = document.createElement('div');    
                                                        var anggota = document.createElement('td');
                                                        var aksi = document.createElement('td');

                                        
                                                        itemlist.appendChild(row);
                                                        row.appendChild(anggota);
                                                        row.appendChild(aksi);

                                        
                                                        var nama_anggota = document.createElement('input');
                                                        nama_anggota.style.marginLeft="-13px";
                                                        nama_anggota.style.position="";
                                                        nama_anggota.style.width="400px";
                                                        nama_anggota.style.backgroundColor="whitesmoke";
                                                        nama_anggota.setAttribute('name', 'nama_anggota[' + i + ']');
                                                        nama_anggota.setAttribute('id', 'nama_anggota[' + i + ']');
                                                        nama_anggota.setAttribute('class', 'form-control');

                                                        var hapus = document.createElement('span');
                                                        anggota.appendChild(nama_anggota);
                                                        aksi.appendChild(hapus);

                                                        hapus.innerHTML = '<div style=";"><button class="btn btn-sm btn-danger" style="height:38px; width:38px;"><i class="fas fa-trash"></i></button></div>';
                                        
                                                        hapus.onclick = function () {
                                                            row.parentNode.removeChild(row);
                                                        };

                                                        i++;
                                                    }else{
                                                        swal("Informasi","Jumlah anggota tim maksimal 5 orang!","info");
                                                    }
                                                }
                                            </script>
                                           </td>
                                        </tr>
                                    <?php elseif($inter == 'Kelompok') :?>
                                    <tr id="target8" style="display: ;position: static;">
                                       <td width="25%"><h5 style="margin-top:12px;"><strong>Nama Anggota</strong></h5></td>
                                       <td align="center">
                                                    <div class="row" align="right" style="justify-content: left;width: 100%; margin-left:px;">
                                                        <?php foreach ($nama_anggota as $anggota): ?>

                                                        <input disabled="" type="text" name="nama_anggota" id="nama_anggota" style="width: 69%; margin-bottom: ; background:whitesmoke;margin-bottom:50px;" class="form-control mb-2" value="<?php echo $anggota['nama_anggota'] ?>">
                                                        <input hidden  type="text" id="id_anggota" name="id_anggota" value="<?php echo $anggota['id'] ?>">
                                                        <a data-toggle="modal" data-target="#konfirmasi<?php echo $anggota['id'] ?>" class="btn btn-danger" style="height: 38px; margin-left: 32px;"><i class="fas fa-trash"></i></a>
                                                        <a data-toggle="modal" data-target="#update<?php echo $anggota['id'] ?>" class="btn btn-warning" type="submit" style="height: 38px; margin-left: 32px;"><i class="fas fa-pen"></i></a>
                                                        <?php endforeach;  ?>
                                                    </div>
                                            <div id="itemlist" ></div>
                                            <?php if (count($nama_anggota) <= 4): ?>
                                                <button type="button" class="btn btn-success mt-2" style="position: static; margin-top: -10px;" onclick="additem()" data='<?php echo count($nama_anggota) ?>'><i class="fas fa-plus"></i> Tambah Anggota</button> 
                                            <?php else: ?>
                                                <button disabled type="button" class="btn btn-success mt-2" style="position: static; margin-top: -10px;" onclick="additem()" data='<?php echo count($nama_anggota) ?>'><i class="fas fa-plus"></i> Tambah Anggota</button> 
                                            <?php endif; ?>
                                            

                                        <script>
                                            var i = 1;
                                            function additem() {
                                                var data = event.target.getAttribute("data");
                                                var Limit = 4 - data;
                                                // alert(Limit)
                                                var itemlist = document.getElementById('itemlist');
                                                if (itemlist.children.length <= Limit) {
                                                
                                                    var row = document.createElement('tr');    
                                                    var anggota = document.createElement('td');
                                                    var aksi = document.createElement('td');

                                    
                                                    itemlist.appendChild(row);

                                                    row.appendChild(anggota);
                                                    row.appendChild(aksi);

                                    
                                                    var nama_anggota = document.createElement('input');
                                                    nama_anggota.style.marginLeft="-12px";
                                                    nama_anggota.style.position="";
                                                    nama_anggota.style.width="400px";
                                                    nama_anggota.style.backgroundColor="whitesmoke";
                                                    nama_anggota.setAttribute('name', 'nama_anggota[' + i + ']');
                                                    nama_anggota.setAttribute('id', 'nama_anggota[' + i + ']');
                                                    nama_anggota.setAttribute('class', 'form-control');

                                                    var hapus = document.createElement('span');
                                                    anggota.appendChild(nama_anggota);
                                                    aksi.appendChild(hapus);

                                                    hapus.innerHTML = '<div style=";"><button type="button" class="btn btn-sm btn-danger" style="height:38px; width:38px;"><i class="fas fa-trash"></i></button></div>';
                                    
                                                    hapus.onclick = function () {
                                                        row.parentNode.removeChild(row);
                                                    };

                                                    i++;
                                                }else{
                                                    swal("Informasi","Jumlah anggota tim maksimal 5 orang!","info");
                                                }
                                            }
                                        </script>
                                       </td>
                                    </tr>
                                    <?php endif; ?>   
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Email Ketua</strong></h5></td>
                                       <td><input id="email_ketua"  type="text" name="email_ketua" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['email_ketua'] ?>"></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>No. HP/WA</strong></h5></td>
                                       <td><input id="no_hp" type="text" name="no_hp" style="width: 100%;background:whitesmoke;" class="form-control " value="<?php echo $riwayat1['no_hp'] ?>"   ></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Alamat Ketua</strong></h5></td>
                                       <td><textarea id="alamat_ketua" type="text" name="alamat_ketua" style="width: 100%;background:whitesmoke; height:10 0px;" class="form-control" value="" ><?php echo $riwayat1['alamat_ketua'] ?></textarea></td>
                                    </tr>
                                    <?php if($kategori == 'umum'): ?>
                                        <tr id="target10" style="display:none;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Asal sekolah</strong></h5></td>
                                           <td><input id="asal_sekolah" type="text" name="asal_sekolah" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['asal_sekolah'] ?>"></td>
                                        </tr>
                                    <?php elseif($kategori == 'pelajar'): ?>
                                        <tr id="target10" style="display:;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Asal sekolah</strong></h5></td>
                                           <td><input id="asal_sekolah" type="text" name="asal_sekolah" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['asal_sekolah'] ?>"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>KTP/ Kartu Pelajar</strong></h5></td>
                                       <td><input id="ktp" type="file" name="ktp" style="height: 44px; width: 100%;background:whitesmoke;" class="form-control" >
                                        <small class="text-danger">Format *jpg/jpeg/png/pdf</small>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group row ml-1" align="left" style="margin-top: -10px; position: static;">
                                                <a onclick="ktp()">
                                                    <?php 
                                                        $kalimat = base_url().'/uploads/'.$riwayat1['ktp'];
                                                        $sub_kalimat = substr($kalimat,-3);
                                                        if($sub_kalimat != 'pdf'):?>
                                                            <img src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>" style="width: 100px; height:auto; cursor: pointer;" class="product-image" alt="Product Image">';
                                                    <?php else: ?>
                                                            <embed src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>" frameborder="0" style="width: 100px; height:50px; cursor: pointer;">
                                                    <?php endif; ?>
                                                </a>
                                                <h5 onclick="ktp()" class="ml-3" style="margin-top: 20px; cursor: pointer"><strong>Foto KTP/ Kartu Pelajar Anda</strong></h5>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                        <table class="table table-borderless" style="margin-top: -7px;">
                            <td align="center" width="20%"></td>
                            <td align="center" width="20%">
                                <button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('peserta/riwayat/') ?>'" type="button"><strong>Batal</strong></button>
                            </td> 
                            <td align="center" width="20%"></td>
                            <td align="center" width="20%">
                                <button class="btn btn-success" type="button" onclick="cek_email()"><strong>Selanjutnya</strong></button>
                            </td>
                            <td align="center" width="20%"></td>
                        </table>
                    </div>
                </form>
        <?php } elseif ($riwayat1['status'] == '2' or '3') { ?>
            <form>
                    <div class="card-body">
                        <div class="ml-3 mr-3" >
                            <div class="form-group " style="position: static;">
                                    
                                <table class="table table-borderless table-responsive" style="justify-content: center; width: 70%;">
                                    <tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Inovasi</strong></h5></td>
                                        <td><input readonly disabled type="text" name="judul" id="inovasi" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['judul'] ?>"></td>
                                    </tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Kategori</strong></h5></td>
                                        <td><div class="form-group row">
                                                <?php $kategori = $riwayat1['kategori_peserta']; ?>
                                                <?php if ($kategori == 'pelajar'): ?>
                                                    <h5 class="col-3" ><input type='radio' name='kategori_peserta' id="kategori" value='umum' class="kat" disabled="">  Umum</h5>
                                                    <h5 class="ml-5"><input checked="" type='radio' name='kategori_peserta' id="kategori" value='pelajar' class="kat">  Pelajar</h5>
                                                <?php else : ?>
                                                    <h5 class="col-3" ><input checked="" type='radio' name='kategori_peserta' id="kategori" value='umum' class="kat">  Umum</h5>
                                                    <h5 class="ml-5"><input type='radio' name='kategori_peserta' id="kategori" value='pelajar' class="kat" disabled="">  Pelajar</h5>
                                                <?php endif; ?>
                                        </div></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><h5 style="margin-top:6px;"><strong>Interaksi</strong></h5></td>
                                        <td><div class="form-group row">
                                            <?php $inter = $riwayat1['interaksi'] ?>
                                            <?php if($inter == 'Individu'): ?>
                                                <h5 class="col-3"><input checked="" type='radio' name="interaksi" id="interaksi" value='Individu' class="int"/>  Individu</h5>
                                                <h5 class="ml-5"><input type='radio' name="interaksi" id="interaksi" value='Kelompok' class="int" disabled="">  Kelompok</h5>
                                            <?php else: ?>
                                                <h5 class="col-3"><input type='radio' name="interaksi" id="interaksi" value='Individu' class="int" disabled="">  Individu</h5>
                                                <h5 class="ml-5"><input checked="" type='radio' name="interaksi" id="interaksi" value='Kelompok' class="int"/>  Kelompok</h5>
                                            <?php endif; ?>
                                        </div></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Bidang Inovasi</strong></h5></td>
                                       <td><select disabled class="form-control" id="id_bidang"  name="id_bidang" style="width: 100%; background:whitesmoke;" >
                                            <?php foreach ($tampil_bidang as $bidang1) ?>
                                                <option selected="" value="<?php echo $bidang1['id'] ?>">
                                                    <?php echo $bidang1['bidang'] ?>
                                                </option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Tim</strong></h5></td>
                                       <td><input disabled="" id="nama_tim" type="text" name="nama_tim" style="width: 100%; background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['nama_tim'] ?>"></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Ketua</strong></h5></td>
                                       <td><input disabled="" id="nama_ketua" type="text" name="nama_ketua" style=" width: 100%; background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['nama_ketua'] ?>"></input></td>
                                    </tr>
                                    <?php if($inter == 'Individu'): ?>
                                        <tr id="target8" style="display: none;position: static;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Nama Anggota</strong></h5></td>
                                           <td align="center">
                                            
                                                <table class="table">
                                                    
                                                       <div  id="itemlist" style=""><input type="text" name="nama_anggota[0]" id="nama_anggota" style="width: 100%; margin-bottom: 12px; background:whitesmoke;" class="form-control" value=""></input></div>
                                                       
                                                </table>
                                                <button disabled="" type="button" class="btn btn-success" style="position: static; margin-top: -10px;" onclick="additem()"><i class="fas fa-plus"></i> Tambah Anggota</button> 
                                           </td>
                                        </tr>
                                    <?php elseif($inter == 'Kelompok') :?>
                                    <tr id="target8" style="display: ;position: static;">
                                       <td width="25%"><h5 style="margin-top:12px;"><strong>Nama Anggota</strong></h5></td>
                                       <td align="center">
                                            <div class="row" align="right" style="justify-content: left;width: 100%; margin-left:px;">
                                                <?php foreach ($nama_anggota as $anggota): ?>

                                                <input disabled="" type="text" name="nama_anggota" id="nama_anggota" style="width: 69%; margin-bottom: ; background:whitesmoke;margin-bottom:50px;" class="form-control mb-2" value="<?php echo $anggota['nama_anggota'] ?>">
                                                <input hidden  type="text" id="id_anggota" name="id_anggota" value="<?php echo $anggota['id'] ?>">
                                                <button disabled data-toggle="modal" data-target="#konfirmasi<?php echo $anggota['id'] ?>" class="btn btn-danger" style="height: 38px; margin-left: 32px;"><i class="fas fa-trash"></i></button>
                                                <button disabled data-toggle="modal" data-target="#update<?php echo $anggota['id'] ?>" class="btn btn-warning" type="submit" style="height: 38px; margin-left: 32px;"><i class="fas fa-pen"></i></button>
                                                <?php endforeach;  ?>
                                            </div>

                                            <div id="itemlist" ></div>

                                            <button type="button" disabled="" class="btn btn-success mt-2" style="position: static; margin-top: -10px;" onclick="additem()"><i class="fas fa-plus"></i> Tambah Anggota</button>  
                                        </td>
                                    </tr>
                                    <?php endif; ?>   
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Email Ketua</strong></h5></td>
                                       <td><input disabled id="email_ketua"  type="email" name="email_ketua" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['email_ketua'] ?>"></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>No. HP/WA</strong></h5></td>
                                       <td><input disabled id="no_hp" type="text" name="no_hp" style="width: 100%;background:whitesmoke;" class="form-control " value="<?php echo $riwayat1['no_hp'] ?>"></input></td>
                                    </tr>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>Alamat Ketua</strong></h5></td>
                                       <td><textarea disabled="" id="alamat_ketua" type="text" name="alamat_ketua" style="width: 100%;background:whitesmoke; height:10 0px;" class="form-control" value=""><?php echo $riwayat1['alamat_ketua'] ?></textarea></td>
                                    </tr>
                                    <?php if($kategori == 'umum'): ?>
                                        <tr id="target10" style="display:none;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Asal sekolah</strong></h5></td>
                                           <td><input disabled id="asal_sekolah" type="text" name="asal_sekolah" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['asal_sekolah'] ?>"></td>
                                        </tr>
                                    <?php elseif($kategori == 'pelajar'): ?>
                                        <tr id="target10" style="display:;">
                                           <td width="25%"><h5 style="margin-top:6px;"><strong>Asal sekolah</strong></h5></td>
                                           <td><input disabled id="asal_sekolah" type="text" name="asal_sekolah" style="width: 100%;background:whitesmoke;" class="form-control" value="<?php echo $riwayat1['asal_sekolah'] ?>"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                       <td width="25%"><h5 style="margin-top:6px;"><strong>KTP/ Kartu Pelajar</strong></h5></td>
                                       <td><input disabled="" id="ktp" type="file" name="ktp" style="height: 44px; width: 100%;background:whitesmoke;" class="form-control" >
                                        <small class="text-danger">Format *jpg/jpeg/png/pdf</small>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group row ml-1" align="left" style="margin-top: -10px; position: static;">
                                                <a onclick="ktp()">
                                                    <?php 
                                                        $kalimat = base_url().'/uploads/'.$riwayat1['ktp'];
                                                        $sub_kalimat = substr($kalimat,-3);
                                                        if($sub_kalimat != 'pdf'):?>
                                                            <img src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>" style="width: 100px; height:auto; cursor: pointer;" class="product-image" alt="Product Image">';
                                                    <?php else: ?>
                                                            <embed src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>" frameborder="0" style="width: 100px; height:50px; cursor: pointer;">
                                                    <?php endif; ?>
                                                </a>
                                                <h5 onclick="ktp()" class="ml-3" style="margin-top: 20px; cursor: pointer"><strong>Foto KTP/ Kartu Pelajar Anda</strong></h5>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" style="background: lavender; height: 80px; position: static; margin-top: -30px;" >
                        <table class="table table-borderless" style="margin-top: -7px;">
                            <td align="center" width="50%">
                                <button class="btn btn-danger" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/') ?>'" type="button"><strong>Batal</strong></button>
                            </td> 
                            <td align="center" width="50%">
                                <button class="btn btn-success" type="button" onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat2/'.$riwayat1['id_usulan']) ?>'" ><strong>Selanjutnya</strong></button>
                            </td>
                        </table>
                    </div>
                </form>
       <?php }?>
                
        <?php endforeach; ?>
    </div>
</div><br><br>

<!-- MODAL GAMBAR -->
<?php foreach ($detail_riwayat as $riwayat1): 
    $kalimat = base_url().'/uploads/'.$riwayat1['ktp'];
    $sub_kalimat = substr($kalimat,-3);
    $kalimat_sub = substr($kalimat,-4);
?>
        <div class="modal fade <?php if($sub_kalimat == 'pdf'){echo 'bd-example-modal-xl';} ?>" <?php if($sub_kalimat == 'pdf'){echo 'aria-labelledby="myExtraLargeModalLabel"';} ?> id="Modal_KTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="<?php if($sub_kalimat == 'pdf'){echo 'modal-dialog modal-xl';}else{echo 'modal-dialog modal-dialog-centered';} ?>">
            <div class="modal-content">
              <div class="modal-header text-center form-group" style="background:blue; justify-content:center; position: static;" align="center">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Foto KTP/Kartu Pelajar</strong></h4>
                <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
              </div>
              <div class="modal-body">
                    <div class="container" <?php if($sub_kalimat == 'pdf'){echo 'hidden';} ?> >
                        <div class="form-group" align="center" >
                            <?php if (($sub_kalimat == 'png' or 'jpg') || ($kalimat_sub == 'jpeg')): ?>
                                <img src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>" style="width: 400px; height:auto;">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="container-fluid text-center" <?php if ($sub_kalimat != 'pdf'){ echo 'hidden';} ?>>
                        <div class="embed-responsive embed-responsive-21by9">
                            <embed src="<?php echo base_url().'/uploads/'.$riwayat1['ktp'] ?>"
                            frameborder="0">
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
<?php endforeach; ?>

<!--MOdal Hapus anggota -->
<?php foreach ($nama_anggota as $anggota): ?>
<div class="modal fade" id="konfirmasi<?php echo $anggota['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi Hapus</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body" align="center">
        
      <form id="HapusAnggota<?php echo $anggota['id'] ?>" enctype="multipart/form-data">
        <div class="container">
            <div class="form-group" align="center" >
                <input  type="text" name="id_anggota" value="<?php echo $anggota['id'] ?>" hidden> 
                <h5>Apakah anda yakin ingin menghapus nama anggota ini ?</h5>
            </div>
        </div>
      </div>
        <div align="center">
            <button type="button" dataHapus="<?php echo $anggota['id'] ?>" onclick="hapus_nama()" class="btn btn-sm btn-primary mr-2" style="width:20%;margin-bottom:20px;" >Iya</button>
            <button type="close" data-dismis="modal" class="btn btn-sm btn-secondary ml-2" style="width:20%;margin-bottom:20px;" >Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!--Modal Update anggota -->
<?php foreach ($nama_anggota as $anggota): ?>
<div class="modal fade" id="update<?php echo $anggota['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Update Nama Anggota</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body" align="center">
        
      <form id="UpdateAnggota<?php echo $anggota['id'] ?>" enctype="multipart/form-data">
        <div class="container">
            <div class="form-group" align="center" >
                <input hidden="" type="text" name="id_anggota" value="<?php echo $anggota['id'] ?>"> 

                <h5>Apakah anda yakin ingin mengupdate nama anggota ini ?</h5><br>
                <input type="text" name="nama_anggota" class="form-control text-center" style="justify-content:center; background: whitesmoke;" value="<?php echo $anggota['nama_anggota'] ?>"><br>
            </div>
        </div>
        <div align="center">
            <button type="button" data="<?php echo $anggota['id'] ?>" onclick="update_nama()" class="btn btn-sm btn-primary mr-2" style="width:20%;margin-bottom:20px;" >Iya</button>
            <button type="close" data-dismis="modal" class="btn btn-sm btn-secondary ml-2" style="width:20%;margin-bottom:20px;" >Tidak</button>
        </div>
        </div>
      
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<script type="text/javascript">
    function ktp()
    {
           $('#Modal_KTP').modal('show');
    };
    function cek_data_form1(){

        if(document.getElementById("ktp").files.length == 0){
               var judul         = document.getElementById("judul").value;
               var nama_tim        = document.getElementById("nama_tim").value;
               var nama_ketua      = document.getElementById("nama_ketua").value;
               var email_ketua     = document.getElementById("email_ketua").value;
               var no_hp           = document.getElementById("no_hp").value;
               var alamat_ketua    = document.getElementById("alamat_ketua").value;
               if (judul != "" && nama_tim != "" && nama_ketua != "" && email_ketua != "" && alamat_ketua != "" && no_hp != "") 
                   {   
                        var kategori = $("input[name='kategori_peserta']:checked").val();
                        if (kategori == 'umum')
                        {
                           // var interaksi = $("input[name='interaksi']:checked").val();
                           //     if (interaksi == 'Individu')
                           //     {
                           //          document.getElementById("FormDataSemua").submit();
                           //     }else{
                           //      var nama_anggota = document.getElementById("nama_anggota").value;
                           //          if (nama_anggota != "") 
                           //          {
                                        document.getElementById("FormDataSemua").submit();
                               //      }else{
                               //          swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                               //      }
                               // }
                        }else{
                            var asal_sekolah    = document.getElementById("asal_sekolah").value;
                            if (asal_sekolah != "")
                            {
                                // var interaksi = $("input[name='interaksi']:checked").val();
                                //     if (interaksi == 'Individu')
                                //     {
                                //         document.getElementById("FormDataSemua").submit();
                                //     }else{
                                //     var nama_anggota = document.getElementById("nama_anggota").value;
                                //         if (nama_anggota != "") 
                                //         {
                                            document.getElementById("FormDataSemua").submit();
                                   //      }else{
                                   //          swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                                   //      }
                                   // }
                            }else{
                                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                            }
                         }
                   }
               else{
                   swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
               }
        }else{
            if(document.getElementById("ktp").files[0].type.indexOf("image") && document.getElementById("ktp").files[0].type.indexOf("application/pdf")==-1){
                // document.getElementById("ktp").focus();
                swal("Informasi","Format file ktp yang anda upload tidak sesuai. Silahkan upload ulang dengan format yang sudah ditentukan","info");
            }else{
                if(document.getElementById("ktp").files[0].size>2097152){
                    // document.getElementById("ktp").focus();
                    swal("Informasi","Ukuran file yang anda upload terlalu besar","info");
                }else{
                   var judul         = document.getElementById("judul").value;
                   var nama_tim        = document.getElementById("nama_tim").value;
                   var nama_ketua      = document.getElementById("nama_ketua").value;
                   var email_ketua     = document.getElementById("email_ketua").value;
                   var no_hp           = document.getElementById("no_hp").value;
                   var alamat_ketua    = document.getElementById("alamat_ketua").value;
                   if (judul != "" && nama_tim != "" && nama_ketua != "" && email_ketua != "" && alamat_ketua != "" && no_hp != "") 
                       {   
                            var kategori = $("input[name='kategori_peserta']:checked").val();
                            if (kategori == 'umum')
                            {
                               // var interaksi = $("input[name='interaksi']:checked").val();
                               //     if (interaksi == 'Individu')
                               //     {
                               //          document.getElementById("FormDataSemua").submit();
                               //     }else{
                               //      var nama_anggota = document.getElementById("nama_anggota").value;
                               //          if (nama_anggota != "") 
                               //          {
                                            document.getElementById("FormDataSemua").submit();
                                   //      }else{
                                   //          swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                                   //      }
                                   // }
                            }else{
                                var asal_sekolah    = document.getElementById("asal_sekolah").value;
                                if (asal_sekolah != "")
                                {
                                    // var interaksi = $("input[name='interaksi']:checked").val();
                                    //     if (interaksi == 'Individu')
                                    //     {
                                    //         document.getElementById("FormDataSemua").submit();
                                    //     }else{
                                    //     var nama_anggota = document.getElementById("nama_anggota").value;
                                    //         if (nama_anggota != "") 
                                    //         {
                                                document.getElementById("FormDataSemua").submit();
                                       //      }else{
                                       //          swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                                       //      }
                                       // }
                                }else{
                                    swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                                }
                             }
                       }
                   else{
                       swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                   }
                }
            }
        }
    }

    function hapus_nama()
    {
        var id = event.target.getAttribute('dataHapus');
        var dataform    = $("#HapusAnggota"+id).serialize();
        var datasemua   = $('#FormDataSemua').serialize();
        // alert(dataform);
        $('#update'+id).modal('hide');
        $.ajax({
            url: "<?php echo base_url('peserta/edit_riwayat/hapus_anggota/')?>",
            type: "POST",
            data: dataform,
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            }
        });
        //$('#FormDataSemua').submit();
        $.ajax({
            url: "<?php echo base_url('peserta/edit_riwayat/update_semua_form1/')?>",
            type: "POST",
            data: datasemua,
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            }
        });

        location.reload();
    }

    function update_nama()
    {
        var id = event.target.getAttribute('data');
        var dataform    = $("#UpdateAnggota"+id).serialize();
        var datasemua   = $('#FormDataSemua').serialize();
        // alert(dataform);
        $('#update'+id).modal('hide');
        $.ajax({
            url: "<?php echo base_url('peserta/edit_riwayat/update_anggota/')?>",
            type: "POST",
            data: dataform,
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            }
        });
        //$('#FormDataSemua').submit();
        $.ajax({
            url: "<?php echo base_url('peserta/edit_riwayat/update_semua_form1/')?>",
            type: "POST",
            data: datasemua,
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            }
        });

        location.reload();
    }

function cek_email(event) {
    var rs = document.getElementById('email_ketua').value;
    var atps=rs.indexOf("@");
    var dots=rs.lastIndexOf(".");
    if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
        document.getElementById('email_ketua').focus();
        swal("Peringatan","Format email tidak valid !","warning");
     } else {
        // document.getElementById('no_hp').focus();
        return cek_no_hp();
    }

    var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
}

function cek_no_hp(){
    var nom = document.getElementById('no_hp').value;
    if (nom.length < 10) {
        document.getElementById('no_hp').focus();
        swal("Peringatan","Jumlah karakter pada nomor hp tidak sesuai !","warning");      
        return false;
    }else{
        if (nom.length > 13) {
            document.getElementById('no_hp').focus();
            swal("Peringatan","Jumlah karakter pada nomor hp tidak sesuai !","warning");
            return false;
        }
    }
    return cek_tim();
}

 function cek_tim(){
        var interaksi = $("input[name='interaksi']:checked").val();
        if(interaksi == "Kelompok"){
            var data = document.getElementById("nama_anggota[0]"); if(data) { if (data.value == "") { 
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data1 = document.getElementById("nama_anggota[1]"); if(data1) { if (data1.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data2 = document.getElementById("nama_anggota[2]"); if(data2) { if (data2.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data3 = document.getElementById("nama_anggota[3]"); if(data3) { if (data3.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data4 = document.getElementById("nama_anggota[4]"); if(data4) { if (data4.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data5 = document.getElementById("nama_anggota[5]"); if(data5) { if (data5.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data6 = document.getElementById("nama_anggota[6]"); if(data6) { if (data6.value == "") { 
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data7 = document.getElementById("nama_anggota[7]"); if(data7) { if (data7.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data8 = document.getElementById("nama_anggota[8]"); if(data8) { if (data8.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data9 = document.getElementById("nama_anggota[9]"); if(data9) { if (data9.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data10 = document.getElementById("nama_anggota[10]"); if(data10) { if (data10.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data11 = document.getElementById("nama_anggota[11]"); if(data11) { if (data11.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data12 = document.getElementById("nama_anggota[12]"); if(data12) { if (data12.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data13 = document.getElementById("nama_anggota[13]"); if(data13) { if (data13.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data14 = document.getElementById("nama_anggota[14]"); if(data14) { if (data14.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            var data15 = document.getElementById("nama_anggota[15]"); if(data15) { if (data15.value == "") {
                swal("Peringatan","Anda diwajibkan mengisi data dengan lengkap pada halaman ini!","warning");
                return false;} }
            //alert("lanjut form 2");
            return cek_data_form1();
        }else{
            return cek_data_form1();
        }
    }

</script>