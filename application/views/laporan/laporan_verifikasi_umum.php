<!DOCTYPE html>
<html><head>
	<title>Cetak</title>
	<link rel="stylesheet" type="text/css" href="">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <style>
	    .line-title{
	      border: 0;
	      border-style: inset;
	      border-top: 1px solid #000;
	    }
	    .table {
	      border-collapse: collapse;
	      border: 1px solid black;
	    }
	  </style>
</head><body>
	<table style="width: 100%;">
      <tr>
        <td align="center">
          <span style="line-height: 10%; font-weight: bold;font-size: 18px; font-family: Arial, Helvetica, sans-serif;">
            <p>BERITA ACARA</p>
            <?php foreach(array_slice($total_nilai, 0,1) as $key => $value) : ?>
            <p>PENILAIAN DAN PENETAPAN <?= strtoupper($value['subevent'])?> </p>
            <p>KABUPATEN MAGETAN TAHUN <?= $value['tahun']?></p>
            <p>Nomor : 065/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/BA/LITBANG/403.202/<?= $value['tahun']?></p>
          <?php endforeach; ?>
          </span>
        </td>
      </tr>
    </table>

    <table style="margin-left:15px;margin-right: 15px;">
    	<tr>
    		<td>
    			<p style="text-indent: 50px;text-align: justify;font-family:Arial, Helvetica, sans-serif;">Pada hari ini, <?php setlocale(LC_ALL, 'id_ID');
																	$hariIni = new DateTime();
																	$day = strftime('%A', $hariIni->getTimestamp());
																	if ($day == "Sunday") {
																		echo "Minggu";
																	}elseif ($day == "Monday") {
																		echo "Senin";
																	}elseif ($day == "Tuesday") {
																		echo "Selasa";
																	}elseif ($day == "Wednesday") {
																		echo "Rabu";
																	}elseif ($day == "Thrusday") {
																		echo "Kamis";
																	}elseif ($day == "Friday") {
																		echo "Jumat";
																	}elseif ($day == "Saturday") {
																		echo "Sabtu";
																	}else{
																		echo "";
																	}
																	?>
															 tanggal 
															 <?php
															 	echo date('d');
															 ?>
															 bulan  <?php
															 	$bln = date('F');
															 	if ($bln == "January") {
																		echo "Januari";
																	}elseif ($bln == "February") {
																		echo "Februari";
																	}elseif ($bln == "March") {
																		echo "Maret";
																	}elseif ($bln == "April") {
																		echo "April";
																	}elseif ($bln == "May") {
																		echo "Mei";
																	}elseif ($bln == "June") {
																		echo "Juni";
																	}elseif ($bln == "July") {
																		echo "Juli";
																	}elseif ($bln == "August") {
																		echo "Agustus";
																	}elseif ($bln == "September") {
																		echo "September";
																	}elseif ($bln == "October") {
																		echo "Oktober";
																	}elseif ($bln == "November") {
																		echo "November";
																	}elseif ($bln == "December") {
																		echo "Desember";
																	}else{
																		echo "";
																	}
															 ?>
															  Tahun 
															  <?php echo date('Y');?>,
															   bertempat di Kantor Bappeda Litbang Kabupaten Magetan diadakan rapat Tim Penilai, membahas hasil penilaian peserta <?php foreach(array_slice($total_nilai, 0,1) as $key => $value) : ?>
															   	<?= $value['subevent']?> Tahun <?= $value['tahun']?>,
															 <?php endforeach;?>
															   untuk menentukan Peserta yang lolos ke tahap selanjutnya dengan hasil keputusan sebagai berikut :</p>
															   <p style="text-indent: 50px;text-align: justify;font-family:Arial, Helvetica, sans-serif;">Dari tahapan verifikasi Proposal, Video dan Demo Peragaan Karya Inovasi dari masing masing peserta,  Tim Penilai menetapkan peserta yang lolos sebagai berikut :</p>
															   <p style="font-size:16px;font-weight: bold;font-family:Arial, Helvetica, sans-serif;"><u>KATEGORI UMUM :</u></p>
    		</td>
    	</tr>
    </table>
	<table class="table" style="width: 100%;margin-left: 15px;margin-right: 15px;margin-bottom: 10px;">
		<tr>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">NO</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">JUDUL</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">INOVATOR</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">ASAL</th>
		</tr>
		<?php  
        $no=1;
        $rank=1;
            $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : 
            	if ($key > 4) break;?>
            <?php if ($value['kategori_peserta'] == 'umum') {  ?>
              <tr>
              <td align="center" class="table" style="width: 5%;font-family:Arial, Helvetica, sans-serif;"><?php echo $no++ ?></td>
              <td class="table" style="width: 40%;font-family:Arial, Helvetica, sans-serif;"><?= $value['judul']?></td>
              <td class="table" style="width: 30%;font-family:Arial, Helvetica, sans-serif;"><?= $value['user']?></td>
              <td class="table" style="width: 25%;font-family:Arial, Helvetica, sans-serif;"><?= $value['alamat_ketua']?></td>
           </tr>
           <?php } ?>             
        <?php endforeach; ?>
	</table>
</body></html>