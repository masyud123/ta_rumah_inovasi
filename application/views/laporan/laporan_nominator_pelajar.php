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
	    .page_break { page-break-before: always; }
	  </style>
</head><body>
	<table style="margin-left: 15px;margin-right: 15px;">
		<tr>
			<td> <p style="font-size:16px;font-weight: bold;font-family:Arial, Helvetica, sans-serif;"><u>KATEGORI PELAJAR :</u></p></td>
		</tr>
	</table>

  <table class="table" style="width: 100%;margin-left: 15px;margin-right: 15px;">
		<tr>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">NO</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">JUDUL</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">INOVATOR</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">ASAL</th>
			<th class="table" style="font-family:Arial, Helvetica, sans-serif;">TERBAIK</th>
		</tr>
		<?php  
        $no=1;
        $rank=0;
            $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : ?>
            <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>
              <tr>
              <td align="center" class="table" style="width: 5%;font-family:Arial, Helvetica, sans-serif;"><?php echo $no++ ?></td>
              <td class="table" style="width: 40%;font-family:Arial, Helvetica, sans-serif;"><?= $value['judul']?></td>
              <td class="table" style="width: 20%;font-family:Arial, Helvetica, sans-serif;"><?= $value['user']?></td>
              <td class="table" style="width: 20%;font-family:Arial, Helvetica, sans-serif;"><?= $value['asal_sekolah']?></td>
              <td align="center" class="table" style="width: 15%;font-family:Arial, Helvetica, sans-serif;"><?php $rank++;
              																																									if ($rank == 1){
              																																										echo "I";
              																																									}elseif ($rank == 2) {
              																																										echo "II";
              																																									}elseif ($rank == 3) {
              																																										echo "III";
              																																									}elseif ($rank == 4) {
              																																										echo "Harapan I";
              																																									}elseif ($rank == 5) {
              																																										echo "Harapan II";
              																																									}else{
              																																										echo "";
              																																									}

              																																									 ?>
              	
            </td>
           </tr>
           <?php } ?>             
        <?php endforeach; ?>
	</table>
	<br><br><center align="center" style="font-family:Arial, Helvetica, sans-serif;">Demikian berita acara  ini dibuat, untuk dipergunakan sebagaimana mestinya</center>

	<div class="page_break">
		<table style="width: 100%">
      <tr>
        <td align="center">
          <span style="line-height: 10%; font-weight: bold;font-size: 18px; font-family: Arial, Helvetica, sans-serif;">
            <?php foreach(array_slice($total_nilai, 0,1) as $key => $value) : ?>
            <p>Tim Penilai <?= $value['subevent']?> <?= $value['tahun']?> :</p>
          <?php endforeach; ?>
          </span>
        </td>
      </tr>
    </table>
<br>
<br>
<br>
    <table style="width: 100%;margin-left: 15px;margin-right: 15px;">
    	<?php
    	  $nomor=1;
    	  $nomor2=1;
    	  foreach($tim_penilai as $pnl) : ?>
		    	<tr style="line-height:30px;">
		    		<td style="width: 3%; font-family: Arial, Helvetica, sans-serif;"><?php echo $nomor++ ?>.</td>
		    		<td style="width: 62%; font-family: Arial, Helvetica, sans-serif;"><?php echo $pnl->nama ?></td>
		    		<td style="width: 35%; font-family: Arial, Helvetica, sans-serif;"><?php echo $nomor2++ ?>_ _ _ _ _ _ _ _ _ _ _</td>
		    	</tr>
		    <?php endforeach; ?>
    </table>
	</div>
</body></html>