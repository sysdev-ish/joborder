<html>
<title>BAST</title>
<head>
</head>

<style>
#halaman {;margin-left:5%; margin-right:5%; font-size:12px; }
#tempelatas{margin-top:0%;}
</style>

<body>
	
				<div id="pusat">
					<p align="center"><b>BERITA ACARA SERAH TERIMA PEKERJAAN (BAST)</b>
					 <br>Nomor : <?php //echo $perner .'/'.  $joindate .'/'. 'ISH' .'/'. $layananz .'/'. 'PKWT ' . $total .'/'. $bulanx .'/'. $tahunx  ?></p>
				</div>
				<br><br>
			<!--</div>-->
		<!--</div>-->
		 
<div id="halaman" align="justify">
		<table style="font-size:12px;">
			<tr>
				<td>Pekerjaan </td>
				<td> :</td>
				<td><?php echo $jpks; ?> </td>
			</tr>

			<tr>
				<td>No Kontrak </td>
				<td> :</td>
				<td><?php echo $nopks; ?></td>
			</tr>
			<tr>
				<td>Tanggal </td>
				<td> :</td>
				<td></td>
			</tr>
			<tr>
				<td>Pelaksana </td>
				<td> :</td>
				<td>PT. INFOMEDIA SOLUSI HUMANIKA</td>
			</tr>
			<tr>
				<td>Nilai SPK </td>
				<td> :</td>
				<td><?php echo $nilpks; ?></td>
			</tr>
		</table>
		
		<br>
		<p align="justify">Pada hari ini <...> tanggal <...> bulan <...> tahun <...> , Kami yang bertanda tangan dibawah ini :</p>
			  
	
		<table style="font-size:12px;">
			<tr>
				<td>1. </td>
				<td>Nama </td>
				<td> :</td>
				<td><?php echo $nttd; ?> </td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan </td>
				<td> :</td>
				<td><?php echo $jttd; ?> </td>
			</tr>
		</table>
		
		<p style="margin-left:2.5%; margin-top:-0.001%;">Dalam hal ini bertindak untuk dan atas nama <?php echo strtoupper($n_perus); ?> yang selanjutnya dalam Berita Acara ini disebut sebagai <b> PIHAK PERTAMA </b>; dan</p>
			
		<table style="font-size:12px;">
			<tr>
				<td>2. </td>
				<td>Nama </td>
				<td> :</td>
				<td><?php echo $nish; ?> </td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan </td>
				<td> :</td>
				<td><?php echo $jish; ?> </td>
			</tr>
		</table>
		
		<p style="margin-left:2.5%; margin-top:-0.001%;">Dalam hal ini bertindak untuk dan atas nama PT. INFOMEDIA SOLUSI HUMANIKA yang selanjutnya dalam Berita Acara ini disebut sebagai <b> PIHAK KEDUA </b>; dan</p>
				
			
		<p align="justify">Bahwa pada tanggal <...> , pihak kedua telah menyerahkan kepada Pihak Pertama, Pekerjaan <?php echo $jpks; ?>, Sebagaimana terlampir dalam uraian pekerjaan sesuai dengan Perjanjian Kerja Sama (PKS) Nomor <?php echo $nopks ?> tanggal <...> dan selanjutnya :
		</p>
		<p align="justify"> PIHAK PERTAMA dengan ini menyatakan menerima penyerahan pekerjaan ini dengan hasil <b> BAIK </b> dan dapat dioperasikan.</p>
		<br>
		<p align="justify"> Demikian Berita Acara Serah Terima Pekerjaan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

		
		<br><br><br>
		<table style=" width:100%;cellspacing:0;border: 0px; font-size:13px;">
			<tr>
			<td  style="width:50%; cellspacing:0;">
				<table border="0" cellspacing="0" style="width:100%;cellspacing:0;border: 0px; font-size:13px;">
					<tr>
						<td style="width:100%;" align="center">PIHAK PERTAMA<br><?php echo strtoupper($n_perus); ?>,</td>
					</tr>
					<tr><td style="width:100%;" align="center"><br><br><br><br></td></tr>
					<tr>
						<td style="width:100%;" align="center"><?php echo $nttd; ?></td>
					</tr>
					<tr>
						<td style="width:100%;" align="center"><?php echo $jttd; ?></td>
					</tr>
				</table>
				</td>
				<td style=" width:50%;cellspacing:0;">
				<table border="0" cellspacing="0" style="width:100%;cellspacing:0;border: 0px; font-size:13px; align=center">
					<tr>
						<td style="width:100%;" align="center">PIHAK KEDUA <br> PT INFOMEDIA SOLUSI HUMANIKA, </td>
					</tr>
					<tr><td style="width:100%;"><br><br><br><br></td></tr>
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