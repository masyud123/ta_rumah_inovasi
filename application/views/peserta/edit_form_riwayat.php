<!-- fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="ml-2 mr-2">
    <?php foreach($data_usulan as $usulan): ?>
    <div id="card-1" class="card shadow bg-gradient-light">
        <div class="card-body">
            <div class="text-center">
                <h3 class="col-12"><b>FORM PENDAFTARAN INOVASI</b></h3>
                <h6>Isi semua formulir untuk melanjutkan ke langkah berikutnya</h6>
            </div>
            <!-- header form -->
            <div class="d-none d-md-block col-12 mb-4">
                <!-- header 1 -->
                <div id="header1">
                    <div class="d-flex align-items-center" style="height: 100px;">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="d-flex justify-content-center col-12">
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                                <div class="bg-gray-500 col-4" style="height: 5px;"></div>
                                <div class="bg-gray-500 col-4" style="height: 5px;"></div>
                            </div>
                            <div class="col-12 d-flex justify-content-around" style="position: absolute; margin-top: -27px;">
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fa fa-user fa-2x text-light "></i></div>
                                <div class="bg-gray-500 d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-alt fa-2x text-light "></i></div>
                                <div class="bg-gray-500 d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-upload fa-2x text-light "></i></div>
                            </div>
                            <div class="col-12 d-flex justify-content-between" style="position: absolute; margin-top: 35px;">
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>PROFIL</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-gray-500"><b>INOVASI</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-gray-500"><b>BERKAS</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- isian formulir -->
            <div id="formulir1">
                <form id="form1" class="form-submit" method="POST" enctype="multipart/form-data">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">
                                        <dt>Kategori</dt>
                                        <div class="form-check form-check-inline">
                                            <input id="kategori1" value="umum" name="kategori_peserta" class="form-check-input kategori" type="radio" <?= $usulan['kategori_peserta'] == "umum" ? "checked":""?>>
                                            <label for="kategori1" class="form-check-label">Umum</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input id="kategori2" value="pelajar" name="kategori_peserta" class="form-check-input kategori" type="radio" <?= $usulan['kategori_peserta'] == "pelajar" ? "checked":""?>>
                                            <label for="kategori2" class="form-check-label">Pelajar</label>
                                        </div>
                                    </div><br>
                                    <div class="">
                                        <dt>Interaksi</dt>
                                        <div class="form-check form-check-inline">
                                            <input id="interaksi1" value="Individu" name="interaksi" class="form-check-input interaksi" type="radio" <?= $usulan['interaksi'] == "Individu" ? "checked":""?>>
                                            <label for="interaksi1" class="form-check-label">Individu</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-3">
                                            <input id="interaksi2" value="Kelompok" name="interaksi" class="form-check-input interaksi" type="radio" <?= $usulan['interaksi'] == "Kelompok" ? "checked":""?>>
                                            <label for="interaksi2" class="form-check-label">Kelompok</label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <dt>Nama Inovasi</dt>
                                        <input class="form-control" type="text" name="judul" id="judul" value="<?=$usulan['judul']?>">
                                    </div>
                                    <div class="form-group">
                                        <dt>Bidang</dt>
                                        <select class="form-control" name="id_bidang">
                                            <?php foreach($list_bidang as $bidang):?>
                                            <option <?=$bidang['id'] == $usulan['id_bidang'] ? "selected":"" ?> value="<?=$bidang['id']?>"><?=$bidang['bidang']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <dt>Nama Ketua/ Nama Pengusul</dt>
                                        <input class="form-control" type="text" name="nama_ketua" value="<?=$usulan['nama_ketua']?>">
                                    </div>
                                    <div class="form-group">
                                        <dt>Email Ketua</dt>
                                        <input class="form-control" type="text" name="email_ketua" value="<?=$usulan['email_ketua']?>">
                                    </div>
                                    <div class="form-group">
                                        <dt>No. HP/WA</dt>
                                        <input class="form-control" type="text" name="no_hp" value="<?=$usulan['no_hp']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="form-group">
                                        <dt>Alamat</dt>
                                        <input class="form-control" type="text" name="alamat_ketua" value="<?=$usulan['alamat_ketua']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <dt>Foto KTP/ Kartu Pelajar</dt>
                                        <small class="text-danger">Format gambar *.jpg/*.jpeg/*.png || Ukuran gambar max 5mb.</small>
                                        <div class="d-md-flex align-items-center justify-content-between">
                                            <div class="custom-file col-lg-7 mb-3">
                                                <input id="ktp" name="ktp" type="file" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label" for="gambar">Pilih file...</label>
                                            </div>
                                            <div class="col-lg-5">
                                                <img id="tampil-gambar" src="<?=base_url('./uploads/'.$usulan['ktp'])?>" alt="your image" width="100%"/>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?=$usulan['ktp']?>" name="ktp2" id="ktp2">
                                    </div>
                                    <div class="form-group" id="pelajar" <?= $usulan['kategori_peserta']!="pelajar" ? "style='display: none;'" : ""?>>
                                        <dt>Asal Sekolah</dt>
                                        <input class="form-control" type="text" name="asal_sekolah" value="<?=$usulan['asal_sekolah']?>">
                                    </div>
                                    <div id="kelompok" <?= $usulan['interaksi']!="Kelompok" ? "style='display: none;'" : ""?>>
                                        <div class="form-group">
                                            <dt>Nama Tim</dt>
                                            <input class="form-control" type="text" name="nama_tim" value="<?=$usulan['nama_tim']?>">
                                        </div>
                                        <div id="nama_anggota">
                                            <dt>Nama Anggota</dt>
                                            <?php if(count($list_anggota ) != null):
                                                foreach($list_anggota as $key => $val): 
                                                    if($key == 0): ?>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <input class="form-control col-10" type="text" name="nama_anggota[<?=$key?>]" value="<?=$val['nama_anggota']?>">
                                                            <div class="d-flex justify-content-center col-2"></div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <input class="form-control col-10" type="text" name="nama_anggota[<?=$key?>]" value="<?=$val['nama_anggota']?>">
                                                            <div class="d-flex justify-content-center col-2">
                                                                <button type="button" class="btn btn-danger btn-circle remove-anggota"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                    <?php endif; 
                                                endforeach;
                                            else: ?>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <input class="form-control col-10" type="text" name="nama_anggota[0]">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="button" class="btn btn-sm btn-info" id="tambah-anggota">
                                                <i class="fa fa-plus mr-1"></i> Tambah Anggota
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($usulan['status'] == 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?=base_url('peserta/riwayat/')?>" class="btn btn-sm btn-secondary" type="button"><i class="fas fa-arrow-left mr-1"></i>Batal</a>
                        <button id="submit1" class="btn btn-sm btn-primary ml-3" type="submit">Selanjutnya<i class="fas fa-arrow-right ml-1"></i></button>
                    </div>
                    <?php endif;?>
                </form>
                <?php if($usulan['status'] != 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?=base_url('peserta/riwayat/')?>" class="btn btn-sm btn-secondary" type="button"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
                        <a class="btn btn-sm btn-primary ml-3 head2">Selanjutnya<i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div id="card-2" class="card shadow bg-gradient-light">
        <div class="card-body">
            <div class="text-center">
                <h3 class="col-12"><b>FORM PENDAFTARAN INOVASI</b></h3>
                <h6>Isi semua formulir untuk melanjutkan ke langkah berikutnya</h6>
            </div>
            <!-- header form -->
            <div class="d-none d-md-block col-12 mb-4">
                <!-- header 2 -->
                <div id="header2">
                    <div class="d-flex align-items-center" style="height: 100px;">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="d-flex justify-content-center col-12">
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                                <div class="bg-gray-500 col-4" style="height: 5px;"></div>
                            </div>
                            <div class="col-12 d-flex justify-content-around" style="position: absolute; margin-top: -27px;">
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fa fa-user fa-2x text-light"></i></div>
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-alt fa-2x text-light"></i></div>
                                <div class="bg-gray-500 d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-upload fa-2x text-light"></i></div>
                            </div>
                            <div class="col-12 d-flex justify-content-between" style="position: absolute; margin-top: 35px;">
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>PROFIL</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>INOVASI</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-gray-500"><b>BERKAS</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- isian formulir -->
            <div id="formulir2">
                <form id="form2" class="form-submit" method="POST" enctype="multipart/form-data">
                    <div class="card shadow">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col">
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Latar Belakang (Permasalahan)</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea id="latar_belakang" name="latar_belakang" class="form-control"><?=$usulan['latar_belakang']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Kondisi Sebelum Inovasi</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="kondisi_sebelumnya" class="form-control"><?=$usulan['kondisi_sebelumnya']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Sasaran Dan Tujuan Inovasi</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="sasaran_n_tujuan" class="form-control"><?=$usulan['sasaran_n_tujuan']?></textarea>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>
                                <h5><b>Materi Inovasi</b></h5>

                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Deskripsi</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="deskripsi" class="form-control"><?=$usulan['deskripsi']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Bahan Baku</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="bahan_baku" class="form-control"><?=$usulan['bahan_baku']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Cara Kerja</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="cara_kerja" class="form-control"><?=$usulan['cara_kerja']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Keunggulan</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="keunggulan" class="form-control"><?=$usulan['keunggulan']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Hasil Yang Diharapkan</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="hasil_yg_diharapkan" class="form-control"><?=$usulan['hasil_yg_diharapkan']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Manfaat Bagi Masyarakat / Lingkungan</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="manfaat" class="form-control"><?=$usulan['manfaat']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Rencana Keberlanjutan</dt>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="rencana" class="form-control"><?=$usulan['rencana']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($usulan['status'] == 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-sm btn-secondary head1" type="button"><i class="fas fa-arrow-left mr-1"></i>Sebelumnya</a>
                        <button id="submit2" class="btn btn-sm btn-primary ml-3" type="submit">Selanjutnya<i class="fas fa-arrow-right ml-1"></i></button>
                    </div>
                    <?php endif; ?>
                </form>
                <?php if($usulan['status'] != 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-sm btn-secondary head1"><i class="fas fa-arrow-left mr-1"></i>Sebelumnya</a>
                        <a class="btn btn-sm btn-primary ml-3 head3">Selanjutnya<i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="card-3" class="card shadow bg-gradient-light">
        <div class="card-body">
            <div class="text-center">
                <h3 class="col-12"><b>FORM PENDAFTARAN INOVASI</b></h3>
                <h6>Isi semua formulir untuk melanjutkan ke langkah berikutnya</h6>
            </div>
            <!-- header form -->
            <div class="d-none d-md-block col-12 mb-4">
                <!-- header 3 -->
                <div id="header3">
                    <div class="d-flex align-items-center" style="height: 100px;">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="d-flex justify-content-center col-12">
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                                <div class="bg-primary col-4" style="height: 5px;"></div>
                            </div>
                            <div class="col-12 d-flex justify-content-around" style="position: absolute; margin-top: -27px;">
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fa fa-user fa-2x text-light"></i></div>
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-alt fa-2x text-light"></i></div>
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="cursor: pointer; width: 60px; height: 60px; border-radius: 100%;"><i class="fas fa-file-upload fa-2x text-light"></i></div>
                            </div>
                            <div class="col-12 d-flex justify-content-between" style="position: absolute; margin-top: 35px;">
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>PROFIL</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>INOVASI</b></h5>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="text-dark"><b>BERKAS</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- isian formulir -->
            <style>
                ::-webkit-file-upload-button {
                    display: none;
                }
                ::file-selector-button {
                    display: none;
                }
            </style>
            <div id="formulir3">
                <form id="form3" class="form-submit" method="POST" enctype="multipart/form-data">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <small class="text-danger">*Catatan: Anda tidak perlu mengupload ulang file pada form ini. Jika Anda ingin melakukan perubahan, silakan upload ulang.</small>
                            </div>
                            <div class="proposal/dokumen">
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Dokumen / Proposal</dt>
                                    </div>
                                    <div class="col-lg-6 p-1">
                                        <div class="input-group">
                                            <input id="proposal" name="proposal" type="file" class="form-control" aria-describedby="inputGroupPrepend" accept=".pdf" >
                                            <div class="input-group-prepend" style="margin-left: -95px; z-index: 100;">
                                                <span class="input-group-text" id="inputGroupPrepend">Cari File...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-lg-3 align-self-center">
                                        <div class="d-flex align-items-lg-center justify-content-center">
                                            <a class="btn btn-link btn-sm bg-gradient-primary text-white col" data-toggle="collapse" href="#collapseProposal" role="button" aria-expanded="false" aria-controls="collapseProposal">
                                                <i class="fa fa-search-plus mr-2"></i>Lihat File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseProposal">
                                    <input type="hidden" value="<?=$usulan['proposal']?>" name="proposal2" id="proposal2">
                                    <embed class="card shadow-lg" id="tempel-proposal" src="<?=base_url('./uploads/'.$usulan['proposal'])?>" width="100%" height="650px" style="border-radius: 2%;"></embed>
                                    <div class="text-center">
                                        <a class="btn btn-link" data-toggle="collapse" href="#collapseProposal" role="button" aria-expanded="false" aria-controls="collapseProposal">Tutup File</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="surat_pernyataan">
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Surat Pernyataan</dt>
                                    </div>
                                    <div class="col-lg-6 p-1">
                                        <div class="input-group">
                                            <input id="surat-pernyataan" name="jurnal" type="file" class="form-control" aria-describedby="inputGroupPrepend" accept=".pdf" >
                                            <div class="input-group-prepend" style="margin-left: -95px; z-index: 100;">
                                                <span class="input-group-text" id="inputGroupPrepend">Cari File...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-lg-3 align-self-center">
                                        <div class="d-flex align-items-lg-center justify-content-center">
                                            <a class="btn btn-link btn-sm bg-gradient-primary text-white col" data-toggle="collapse" href="#collapseSuratPernyataan" role="button" aria-expanded="false" aria-controls="collapseSuratPernyataan">
                                                <i class="fa fa-search-plus mr-2"></i>Lihat File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseSuratPernyataan">
                                    <input type="hidden" value="<?=$usulan['jurnal']?>" name="jurnal2" id="jurnal2">
                                    <embed class="card shadow-lg" id="tempel-surat-pernyataan" src="<?=base_url('./uploads/'.$usulan['jurnal'])?>" width="100%" height="650px" style="border-radius: 2%;"></embed>
                                    <div class="text-center">
                                        <a class="btn btn-link" data-toggle="collapse" href="#collapseSuratPernyataan" role="button" aria-expanded="false" aria-controls="collapseSuratPernyataan">Tutup File</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="gambar_inovasi">
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Gambar Inovasi</dt>
                                    </div>
                                    <div class="col-lg-6 p-1">
                                        <div class="input-group">
                                            <input id="gambar-inovasi" name="gambar" type="file" class="form-control" aria-describedby="inputGroupPrepend" accept="image/*" >
                                            <div class="input-group-prepend" style="margin-left: -95px; z-index: 100;">
                                                <span class="input-group-text" id="inputGroupPrepend">Cari File...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-lg-3 align-self-center">
                                        <div class="d-flex align-items-lg-center justify-content-center">
                                            <a class="btn btn-link btn-sm bg-gradient-primary text-white col" data-toggle="collapse" href="#collapseGambar" role="button" aria-expanded="false" aria-controls="collapseGambar">
                                                <i class="fa fa-search-plus mr-2"></i>Lihat File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseGambar">
                                    <input type="hidden" value="<?=$usulan['gambar']?>" name="gambar2" id="gambar2">
                                    <embed class="card shadow-lg" id="tempel-gambar-inovasi" src="<?=base_url('./uploads/'.$usulan['gambar'])?>" width="100%" height="auto" style="border-radius: 2%;"></embed>
                                    <div class="text-center">
                                        <a class="btn btn-link" data-toggle="collapse" href="#collapseGambar" role="button" aria-expanded="false" aria-controls="collapseGambar">Tutup File</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="video-youtube">
                                <div class="form-group row">
                                    <div class="col-lg-3 d-flex align-items-lg-center">
                                        <dt>Link Video</dt>
                                    </div>
                                    <div class="col-lg-6 p-1">
                                        <input id="link-video" name="link_video" type="text" class="form-control col-12" value="<?=$usulan['link_video']?>">
                                        <input id="tmpl-judul" name="judul" value="<?=$usulan['judul']?>" type="hidden">
                                    </div>
                                    <div class="d-none d-md-block col-lg-3 align-self-center">
                                        <div class="d-flex align-items-lg-center justify-content-center">
                                            <a id="lihat_video" class="btn btn-sm bg-gradient-primary text-white col">
                                                <i class="fa fa-search-plus mr-2"></i>Lihat Video
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($usulan['status'] == 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-sm btn-secondary head2" type="button"><i class="fas fa-arrow-left mr-1"></i>Sebelumnya</a>
                        <button id="submit3" class="btn btn-sm btn-primary ml-3" type="submit">Simpan Data<i class="fas fa-save ml-1"></i></button>
                    </div>
                    <?php endif;?>
                </form>
                <?php if($usulan['status'] != 1):?>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-sm btn-secondary head2"><i class="fas fa-arrow-left mr-1"></i>Sebelumnya</a>
                        <a href="<?=base_url('peserta/riwayat')?>" class="btn btn-sm btn-primary ml-3">Selesai<i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<br><br>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script type="text/javascript">
    // konfigurasi toaster
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        background: '#F8F8FF',
        iconColor: '#FFA500',
        width: '20em',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $(document).ready(function(){
        $('#card-1').show(); $('#card-2').hide(); $('#card-3').hide();
        $('.head1').on('click', function() {
            $('#card-1').show();$('#card-2').hide();$('#card-3').hide();
        })
        $('.head2').on('click', function() {
            $('#card-1').hide();$('#card-2').show();$('#card-3').hide();
        })
        $('.head3').on('click', function() {
            $('#card-1').hide();$('#card-2').hide();$('#card-3').show();
        })
        //lihat video
        $('#lihat_video').on('click', function() {
            var link = $('#link-video').val();
            if(link == ""){
                Toast.fire({icon: 'warning',title: 'Link video masih kosong!'});
            }else{
                window.open(link);
            }
        })
        <?php foreach($data_usulan as $usulan): 
            if($usulan['status'] != 1):?>
            $("#form1 :input").prop('disabled', true);
            $("#form2 :input").prop('disabled', true);
            $("#form3 :input").prop('disabled', true);
        <?php endif; endforeach; ?>

        <?php foreach($data_usulan as $usulan): 
            if($usulan['status'] == 1):?>
        //tempel judul
        $('#judul').on('change', function() { 
            var isi = $(this).val();
            $('#tmpl-judul').val(isi);
        })

        // tampil nama sekolah jika kategori pelajar
        $('.kategori').on('click', function() {
            if($(this).val() == 'pelajar'){
                $('#pelajar').show();
            }else{
                $('#pelajar').hide();
            }
        })

        // tampil nama anggota jika interaksi kelompok
        $('.interaksi').on('click', function() {
            if($(this).val() == 'Kelompok'){
                $('#kelompok').show();
            }else{
                $('#kelompok').hide();
            }
        })

        // tampil gambar ktp
        $('#ktp').on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#tampil-gambar').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
            $('#ktp2').val("");
        })

        // tambah nama anggota
        var wrapper = $("#nama_anggota");
        a = 10;
        $('#tambah-anggota').on('click', function() {
            if(wrapper.children().length >= 6){
                Swal.fire('Informasi','Jumlah anggota maksimal 5','info');
            }else{
                $(wrapper).append(''+
                    '<div class="d-flex justify-content-between mb-3">'+
                        '<input class="form-control col-10" type="text" name="nama_anggota['+ a++ +']">'+
                        '<div class="d-flex justify-content-center col-2">'+
                            '<button type="button" class="btn btn-danger btn-circle remove-anggota"><i class="fa fa-trash"></i></button>'+
                        '</div>'+
                    '</div>'+
                '');
            }
        })

        // hapus nama anggota
        $(wrapper).on('click', '.remove-anggota', function() {
            if(wrapper.children().length <= 2){
                Swal.fire('Informasi','Jumlah anggota minimal ada 1','info');
            }else{
                $(this).parent('div').parent('div').remove();
            }
        });

        // tampil file proposal
        $('#proposal').on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#tempel-proposal').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
            $('#proposal2').val("");
        });

        // tampil file surat pernyataan
        $('#surat-pernyataan').on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#tempel-surat-pernyataan').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
            $('#jurnal2').val("");
        });

        // tampil gambar inovasi
        $('#gambar-inovasi').on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#tempel-gambar-inovasi').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
            $('#gambar2').val("");
        });

        //submit form 1
        $("form#form1").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url('peserta/riwayat/cek_riwayat_1/')?>",
                type: 'POST',
                data: formData,
                success: (hasil) => {
                    if(hasil != 0 && hasil != 1 && hasil != 2 && hasil != 3 && hasil != 4 && hasil != 5 && hasil != 6 && hasil != 7 && hasil != 8){
                        $('#card-1').hide();
                        $('#card-2').show();
                        $('#card-3').hide();
                        $('#latar_belakang').focus();
                    }else{
                        if(hasil == 0){Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});return false;}
                        if(hasil == 1){Toast.fire({icon: 'warning',title: 'Format No. HP / WA tidak sesuai!'});return false;}
                        if(hasil == 2){Toast.fire({icon: 'warning',title: 'Jumlah karakter pada No. HP / WA tidak sesuai!'});return false;}
                        if(hasil == 3){Toast.fire({icon: 'warning',title: 'Format email tidak sesuai!'});return false;}
                        if(hasil == 4){Toast.fire({icon: 'warning',title: 'Foto KTP / Kartu Pelajar wajib diisi!'});return false;}
                        if(hasil == 5){Toast.fire({icon: 'warning',title: 'Format foto tidak sesuai!'});return false;}
                        if(hasil == 6){Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});return false;}
                        if(hasil == 7){Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});return false;}
                        if(hasil == 8){Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});return false;}
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        //submit form 2
        $("form#form2").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url('peserta/riwayat/cek_riwayat_2/')?>",
                type: 'POST',
                data: formData,
                success: (hasil) => {
                    if(hasil == 0){
                        Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});
                    }else{
                        $('#card-1').hide();
                        $('#card-2').hide();
                        $('#card-3').show();
                        $('#proposal').focus();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        //submit form 3
        $("form#form3").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url('peserta/riwayat/cek_riwayat_3/')?>",
                type: 'POST',
                data: formData,
                success: (hasil) => {
                    if(hasil != 1 && hasil != 2 && hasil != 3 && hasil != 4 && hasil != 5){
                        return submit_3();
                    }else{
                        if(hasil == 1){Toast.fire({icon: 'warning',title: 'Semua form wajib diisi!'});return false;}
                        if(hasil == 2){Toast.fire({icon: 'warning',title: 'Format proposal tidak sesuai!'});return false;}
                        if(hasil == 3){Toast.fire({icon: 'warning',title: 'Format surat pernyataan tidak sesuai!'});return false;}
                        if(hasil == 4){Toast.fire({icon: 'warning',title: 'Format gambar tidak sesuai!'});return false;}
                        if(hasil == 5){Toast.fire({icon: 'warning',title: 'Format link video tidak sesuai!'});return false;}
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        <?php endif; endforeach;?>
    });

    <?php foreach($data_usulan as $usulan): 
    if($usulan['status'] == 1):?>
    function submit_3(){
        $.ajax({
            type: "POST",
            url: "<?=base_url('peserta/edit_riwayat/simpan_riwayat_3/'.$id_usulan)?>",
            data: new FormData(document.getElementById('form3')),
            success: function(response) {
                return submit_2();
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    }

    function submit_2(){
        $.ajax({
            type: "POST",
            url: "<?=base_url('peserta/edit_riwayat/simpan_riwayat_2/'.$id_usulan)?>",
            data: new FormData(document.getElementById('form2')),
            success: function(response) {
                return submit_1();
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    }

    function submit_1(){
        $.ajax({
            type: "POST",
            url: "<?=base_url('peserta/edit_riwayat/simpan_riwayat_1/'.$id_peserta)?>",
            data: new FormData(document.getElementById('form1')),
            success: function(response) {
                if(response != 0 && response != 1){
                    return sukses();
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    }

    function sukses() {
        Swal.fire({
            title: 'Sukses',
            text: "Data berhasil disimpan",
            icon: 'success',
            confirmButtonText: 'Oke'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('peserta/riwayat/')?>";
            }
        })
    }
    <?php endif; endforeach;?>
</script>