<html>
<head>
	<title>LPP</title>
</head>

<style>
	
#halaman {margin-left:5%; margin-right:5%; }
#tempelatas{margin-top:0%;}

.kiri
{

float:left;
width:20%;



}

.kanan
{
width:80%;

float:right;
}


</style>

<body>

<h3><p align="center"><strong>
					LAPORAN PELAKSANAAN PEKERJAAN
					 
					 </strong>
					 </p>
					 </h3>
				
<div id="halaman" align="justify">

				
					
				
	
		 
			  	<table>
			  		<tr>
			  			<td>Pekerjaan</td>
						<td >:</td>
						<td> <?php echo $jpks; ?></td>
			  		</tr>
			  		<tr>
						<td>No.KL</td>
						<td>:</td>
						<td> <?php echo $nopks; ?></td>
			  		</tr>
			  		<tr>
						<td>Nilai Kontrak </td>
						<td>:</td>
						<td> <?php echo $nilpks; ?></td>
			  		</tr>
					<tr>
						<td>Pelaksanaan</td>
						<td>:</td>
						<td> PT. Infomedia Solusi Humanika</td>
			  		</tr>
					
					
			  	</table>
				<hr>
				<br>
				<div style="text-align:justify">
					<?php echo $isi; ?>
				</div>
				
				<!--
				<p align="justify">Pada hari ini, Rabu tanggal Tiga bulan Januari tahun Dua Ribu Delapan Belas (03/01/2018),
				bertempat di gedung Prudential Tower Jalan Jenderal Sudirman Kav. 79, Jakarta Pusat, dengan ini 
				dilaporkan bahwa telah dilaksanakan dengan baik proses Pengadaan Jasa Tenaga 
				IT Java Developer Tahap I untuk PT Prudential Life Assurance, Nomor: K.TEL. 0217-0607/HK.810/DES-A2020000/2017 
				periode Desember 2017. </p>
				
					<p >Dinyatakan :</p>
			
					<p style="margin-left:30px; align:justify">
						-	Pekerjaan telah selesai dilaksanakan dengan baik dan kinerja karyawan selama 1 (satu) bulan ini sangat baik.
					</p><br>


				<p>Demikian Laporan Pelaksanaan Pekerjaan ini ditandatangani oleh kedua belah pihak untuk dapat dipergunakan sebagaimana mestinya.</p>
				-->
<br><br><br>

	<table style=" width:100%;cellspacing:0;border: 0px;">
		<tr>
		<td  style="width:50%; cellspacing:0;">
			<table border="0" cellspacing="0" style="width:100%;cellspacing:0;border: 0px;">
				<tr>
					<td style="width:100%;" align="center"><?php echo strtoupper($n_perus); ?></td>
					
				</tr>
				<tr><td style="width:100%;" align="center"><br><br><br><br><br><br></td></tr>
				<tr>
					<td style="width:100%;" align="center"><?php echo $nttd; ?></td>
				</tr>
				<tr>
					<td style="width:100%;" align="center"><?php echo $jttd; ?></td>
				</tr>
			</table>
			</td>
			<td style=" width:50%;cellspacing:0;">
			<table border="0" cellspacing="0" style="width:100%;cellspacing:0;border: 0px;">
				<tr>
					<td style="width:100%;" align="center">PT INFOMEDIA SOLUSI HUMANIKA </td>
				</tr>
				<tr><td style="width:100%;" align="center"><br><br><br><br><br><br></td></tr>
				<tr>
					<td style="width:100%;" align="center"><?php echo $nish; ?></td>
				</tr>
				<tr>
					<td style="width:100%;" align="center"><?php echo $jish; ?></td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
	
	
	
</div>

</body>
</html>