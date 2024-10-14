<html>
<head>
<title>Cetak PDF</title>
</head>
<style type="text/css">
#halaman {margin:auto; border: 1px solid black; }
#header {  }
#content {  }

#footer { clear:both;}



#garistepi1 {
 border-top: 4px solid black;   
 }

	
#kiri
{
	float:left;

	border: 2px solid black;
}

#kanan
{
	float:right;

	border: 2px solid black;
	
}
</style>
<body>
<div id="halaman" >
	<div id="header">		
		<h5><p align="center"><strong>BERITA ACARA PENERIMAAN PEKERJAAN (BAPP)
			<br>PENYEDIAAN DAN PENGELOLAAN TENAGA OUTSOURCING
			<br>ANTARA
			<br>PT <?php echo strtoupper($nper); ?>
			<br>DENGAN
			<br>PT INFOMEDIA SOLUSI HUMANIKA
			</strong>
			</p>
		</h5>
						 
		<table>
			<tr>
				<td><strong><h5>DIREKTORAT</h5></strong></td>
				<td><strong><h5>:</h5></strong></td>
				<td><strong><h5> <?php echo strtoupper($direk); ?></h5></strong></td>
			</tr>
			
			<tr>
				<td><strong><h5>UNIT</h5></strong></td>
				<td><strong><h5>:</h5></strong></td>
				<td><strong><h5><?php echo strtoupper($unitx); ?></h5></strong></td>
			</tr>
			
			<tr>
				<td><strong><h5>PERIODE</h5></strong></td>
				<td><strong><h5>:</h5></strong></td>
				<td> <strong><h5><?php echo $period; ?></h5></strong></td>
			</tr>
		</table>		
	</div>	
	
	<hr>
			
	<div id="content">
		<p><h6> BERITA ACARA SERAH TERIMA PEKERJAAN INI BERSIFAT RAHASIA DAN TIDAK UNTUK DI SEBARLUASKAN DALAM BENTUK APAPUN</h6></p>
			<table align="center" style="width:80%">
			 	<tr>
			 		<td style="width:15%"><b><h5>Nama </h5></b></td>
			 		<td style="width:5%"><h5>:</h5></td>
			 		<td style="width:60%"><h5><?php echo $nttd ?></h5></td>
			 	</tr>

			 	<tr>
			 		<td style="width:15%"><b><h5>Jabatan</h5> </b></td>
			 		<td style="width:5%"><h5>:</h5></td>
			 		<td style="width:60%"><h5><?php echo $jttd ?></h5></td>
			 	</tr>
				
				<tr>
			 		<td style="width:15%"><br><br></td>
			 		<td style="width:5%"><br><br></td>
			 		<td style="width:60%"><br><br></td>
			 	</tr>
				
				<tr>
			 		<td style="width:15%"><b><h5>Nama</h5> </b></td>
			 		<td style="width:5%"><h5>:</h5></td>
			 		<td style="width:60%"><h5><?php echo $nish; ?></h5></td>
			 	</tr>

			 	<tr>
			 		<td style="width:15%"><b><h5>Jabatan</h5> </b></td>
			 		<td style="width:5%"><h5>:</h5></td>
			 		<td style="width:60%"><h5><?php echo $jish; ?></h5></td>
			 	</tr>
			</table>
			<br><br>
			
			<p style="align:justify;font-size:10px;">Telah mengadakan pemeriksaan terhadap pelaksanaan outsourcing dengan hasil baik, dengan rincian sebagai berikut :</p>
				<table border="1" cellspacing="0" align="center" style="width:100%;font-size:10px;">
					<thead>
					<tr>
						<th>No. </th>
						<th>Pekerjaan</th>
						<th>Jumlah Pekerja</th>
						<th>Lokasi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$i=1;
						$sum=0;
						foreach($detkar as $key => $list){
							echo "<tr>";
							echo "<td align='center'>". $i ."</td>";
							echo "<td align='left'>". $list['jabatan_sap_nm'] ."</td>";
							echo "<td align='center'>". $list['jumlah'] ."</td>";
							echo "<td align='left'>". $list['city_name'] ."</td>";
							echo "</tr>";
							$i++;
							$sum+= $list['jumlah'];
						}
					?>
					<tr>
						<td align="center" colspan="2" ><b>Total</b></td>
						<td align="center"><?php echo $sum; ?></td>
						<td align="justify"></td>
					</tr>
					</tbody>
				</table>
				
			<p  style="font-size:10px;align:justify;">Demikian acara ini di buat dan mengikat kedua belah pihak. Apabila di kemudian hari ditemukan selisih perhitungan, maka kedua belah pihak sepakat untuk memperbaiki kembali dan di perhitungkan dalam Berita Acara Rekonsiliasi</p><br>
		
	</div>
	
		<table  border="1" width="100%" cellspacing="0" style="font-size:10px">
			<thead>
				<tr>
					<th  width="50%" align="left">PT <?php echo strtoupper($nper); ?></th>
					<th  width="50%" align="left">PT INFOMEDIA SOLUSI HUMANIKA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><br><br><br><br></td>
					<td><br><br><br><br></td>
				</tr>
				<tr cellspacing="0">
					<td><?php echo $nttd ?></td>
					<td><?php echo $nish; ?></td>
				</tr>
				<tr cellspacing="0">
					<td><?php echo $jttd ?></td>
					<td><?php echo $jish; ?></td>
				</tr>
			</tbody>
		 </table>
		
		
<div style="page-break-after:always"> </div>		
		
		
	<div style="border: 1px solid black;font-size:10px;">
		  <table width="100%">
			<thead>
				<tr>
					<th colspan="7" style="font-size:14px;" align="center">CHECKLIST PEKERJAAN</th>
				</tr>
			</thead>
		  </table>
		  
		  <table style="font-size:10px;">
				<tr>
					<td>UNIT KERJA<td>
					<td>:</td>
					<td><?php echo strtoupper($direk); ?></td>
				</tr>
				<tr>
					<td>PERIODE<td>
					<td>:</td>
					<td><?php echo $period; ?></td>
				</tr>
		  </table>
		  <hr>
		  <table border="1" cellspacing="0" width="100%" style="font-size:10px;">
			<thead>
				<tr style="background-color:#C0C0C0;">
					<th>No.</th>
					<th>Personal Number</th>
					<th>Nama Pekerja</th>
					<th>Pekerjaan</th>
					<th>Lokasi Kerja</th>
					<th>Kehadiran</th>
					<th>Hasil pekerjaan secara umum</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
					foreach($detpek as $keyx => $listx){
						echo "<tr>";
						echo "<td align='center'>". $i ."</td>";
						echo "<td align='center'>". $listx['pernr'] ."</td>";
						echo "<td align='left'>". $listx['cname'] ."</td>";
						echo "<td align='left'>". $listx['platx'] ."</td>";
						echo "<td align='left'>". $listx['btrtx'] ."</td>";
						echo "<td>Lengkap/tidak lenkap(*coret salah satu)</td>";
						echo "<td>Baik/ Cukup/ Kurang (*coret salah satu)</td>";
						echo "<td></td>";
						echo "</tr>";
						$i++;
					}
				?>
			<!--
				<tr>
					<td>1</td>
					<td>47777</td>
					<td>ARIEF SUSILO WIBOWO</td>
					<td>Senior Asisten Project Management (Fasker)</td>
					<td align="center">Jakarta</td>
					<td>Lengkap/tidak lenkap(*coret salah satu)</td>
					<td>Baik/ Cukup/ Kurang (*coret salah satu)</td>
					<td></td>
				</tr>
			-->
			</tbody>
			<!--
				<tr>
					<td colspan="4" align="center" style="background-color:#C0C0C0;">Total</td>
					<td colspan="3" align="center" style="background-color:#C0C0C0;"></td>
				</tr>
			-->
		  </table>
		  <hr>
		  
		  
		  <p style="margin-top:-0.05%;">Catatan Tambahan Untuk Kompetensi, Attitude dan Performansi Tenaga Outsource:<br><br><br></p>
		  <hr>
		  <hr>
		  
		  <p style="margin-top:-0.05%;">Catatan Tambahan Untuk Penambahan / Pengurangan Tenaga Outsource:<br><br><br></p>
		  <hr>
		  
		  <p style="margin-top:-0.05%; background-color:#C0C0C0;">Note:<br>
			THP Fixcost terdiri dari Gaji Pokok + Tunjangan tetap<br>
			Benefit Lain-lain terdiri dari intensif prestasi, lembur fix, pakaian seragam dalam bentuk tunai(tidak termasuk lembur variavle)
		  </p>
		  
		  
		  
		  
		  
		  <table  border="1" width="100%" cellspacing="0" style="font-size:10px">
			<thead>
				<tr>
					<th  width="50%" align="left">PT <?php echo strtoupper($nper); ?></th>
					<th  width="50%" align="left">PT INFOMEDIA SOLUSI HUMANIKA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><br><br><br><br></td>
					<td><br><br><br><br></td>
				</tr>
				<tr cellspacing="0">
					<td><?php echo $nttd ?></td>
					<td><?php echo $nish; ?></td>
				</tr>
				<tr cellspacing="0">
					<td><?php echo $jttd ?></td>
					<td><?php echo $jish; ?></td>
				</tr>
			</tbody>
		 </table>
	</div>
						

</div>
</body>
</html>