<div class="d-md-flex justify-content-between"> 
    <a id="kembali-usulan-terkini" class="btn btn-sm btn-warning btn-icon-split mb-3">
        <span class="icon text-white-50"><i class="fa fa-backward" aria-hidden="true"></i></span>
        <span class="text">Kembali</span>
    </a>
    <div class="d-md-flex justify-content-between"> 
        <a id="profil-peserta" class="btn btn-sm btn-success btn-icon-split mr-md-2 mb-3">
            <span class="icon text-white-50"><i class="fa fa-user" aria-hidden="true"></i></span>
            <span class="text">Profil Peserta</span>
        </a>
        <a id="data-usulan" class="btn btn-sm btn-info btn-icon-split ml-md-2 mb-3">
            <span class="icon text-white-50"><i class="fa fa-file" aria-hidden="true"></i></span>
            <span class="text">Data Usulan</span>
        </a>
    </div>
</div>
<div style="overflow-y: auto;">
    <table class="table table-bordered table-hover" style="width: 1030px;">
        <?php foreach($usulan as $usul): ?>
        <tbody id="profil">
            <tr>
                <td colspan="2" class="align-middle bg-light">
                    <dt class="text-success"><i class="fa fa-user mr-1"></i> Profil Peserta</dt>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"><dt>Nama Tim</dt></td>
                <td><?= $usul['nama_tim'] ?></td>
            </tr>
            <tr>
                <td><dt>Nama Ketua</dt></td>
                <td><?= $usul['nama_ketua'] ?></td>
            </tr>
            <tr>
                <td><dt>Alamat Ketua</dt></td>
                <td><?= $usul['alamat_ketua'] ?></td>
            </tr>
            <tr>
                <td><dt>Email Ketua</dt></td>
                <td><?= $usul['email_ketua'] ?></td>
            </tr>
            <tr>
                <td><dt>No. HP Ketua</dt></td>
                <td><?= $usul['no_hp'] ?></td>
            </tr>
            <tr>
                <td><dt>Interaksi</dt></td>
                <td><?= $usul['interaksi'] ?></td>
            </tr>
            <tr <?= $usul['interaksi']=="Kelompok" ? "" : "class='d-none'"?>>
                <td><dt>Nama Anggota</dt></td>
                <td>
                    <?php $space=", "; foreach($anggota as $tim){
                        echo $tim['nama_anggota'].$space++;
                    }?>
                </td>
            </tr>
            <tr>
                <td><dt>Kategori Peserta</dt></td>
                <td><?= $usul['kategori_peserta']=="pelajar" ? "Pelajar" : "Umum" ?></td>
            </tr>
            <tr <?= $usul['kategori_peserta']=="pelajar" ? "" : "class='d-none'"?>>
                <td><dt>Asal Sekolah</dt></td>
                <td><?= $usul['asal_sekolah']?></td>
            </tr>
            <tr>
                <td><dt>Gambar KTP</dt></td>
                <td class="align-middle">
                    <a href="<?= base_url('/uploads/'.$usul['ktp'])?>" target="_blank" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon text-white-50"><i class="fa fa-id-card" aria-hidden="true"></i></i></span>
                        <span class="text">Lihat Gambar</span>
                    </a>
                </td>
            </tr>
        </tbody>
        <tbody id="usulan">
            <tr>
                <td colspan="2" class="align-middle bg-light">
                    <dt class="text-info"><i class="fa fa-file mr-1"></i> Data Usulan</dt>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"><dt>Tahun</dt></td>
                <td><?= $usul['tahun'] ?></td>
            </tr>

            <tr>
                <td><dt>Sub Event</dt></td>
                <td><?= $usul['subevent'] ?></td>
            </tr>

            <tr>
                <td><dt>Bidang</dt></td>
                <td><?= $bidang->bidang ?></td>
            </tr>

            <tr>
                <td><dt>Judul</dt></td>
                <td><?= $usul['judul'] ?></td>
            </tr>

            <tr>
                <td><dt>Latar Belakang</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['latar_belakang'] ?></td>
            </tr>

            <tr>
                <td><dt>Kondisi Sebelumnya</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['kondisi_sebelumnya'] ?></td>
            </tr>

            <tr>
                <td><dt>Sasaran & Tujuan</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['sasaran_n_tujuan'] ?></td>
            </tr>

            <tr>
                <td><dt>Deskripsi</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['deskripsi'] ?></td>
            </tr>

            <tr>
                <td><dt>Bahan Baku</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['bahan_baku'] ?></td>
            </tr>

            <tr>
                <td><dt>Cara Kerja</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['cara_kerja'] ?></td>
            </tr>

            <tr>
                <td><dt>Keunggulan</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['keunggulan'] ?></td>
            </tr>

            <tr>
                <td><dt>Hasil yang Diharapkan</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['hasil_yg_diharapkan'] ?></td>
            </tr>

            <tr>
                <td><dt>Manfaat</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['manfaat'] ?></td>
            </tr>

            <tr>
                <td><dt>Rencana</dt></td>
                <td style="text-align: justify; text-justify: inter-word;"><?= $usul['rencana'] ?></td>
            </tr>
            <tr>
                <td><dt>Dokumen / Proposal</dt></td>
                <td class="align-middle">
                    <a href="<?= base_url('/uploads/'.$usul['proposal'])?>" target="_blank" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon text-white-50"><i class="far fa-file-alt"></i></span>
                        <span class="text">Lihat File</span>
                    </a>
                </td>
            </tr>

            <tr>
                <td><dt>Surat Pernyataan</dt></td>
                <td class="align-middle">
                    <a href="<?= base_url('/uploads/'.$usul['jurnal'])?>" target="_blank" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon text-white-50"><i class="far fa-file"></i></span>
                        <span class="text">Lihat Surat Pernyataan</span>
                    </a>
                </td>
            </tr>

            <tr>
                <td><dt>Link Video</dt></td>
                <td class="align-middle">
                    <a href="<?=$usul['link_video']?>" target="_blank" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon text-white-50"><i class="fab fa-youtube"></i></span>
                        <span class="text">Lihat Video</span>
                    </a>
                </td>
            </tr>

            <tr>
                <td><dt>Gambar</dt></td>
                <td class="align-middle">
                    <?php if($usul['gambar'] != null): ?>
                        <a href="<?= base_url('/uploads/'.$usul['gambar'])?>" target="_blank" class="btn btn-sm btn-success btn-icon-split">
                            <span class="icon text-white-50"><i class="far fa-image"></i></span>
                            <span class="text">Lihat Gambar</span>
                        </a>
                    <?php else: ?>
                        <a href="javascript:gambar_kosong()" class="btn btn-sm btn-success btn-icon-split">
                            <span class="icon text-white-50"><i class="far fa-image"></i></span>
                            <span class="text">Lihat Gambar</span>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#usulan').hide();

        $('#profil-peserta').on('click', function(){
            $('#profil').show();
            $('#usulan').hide();
        });
        
        $('#data-usulan').on('click', function(){
            $('#profil').hide();
            $('#usulan').show();
        });

        $('#kembali-usulan-terkini').on('click', function(){
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/Usulan_terkini/semua_usulan/')?>",
                success: function (response) {
                    $('#tempel_data').html(response);
                }
            });
        });
    });

    function gambar_kosong(){
        Swal.fire('Informasi','Peserta tidak menyertakan gambar karyanya.','info')
    }
</script>

