<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
		 <span style="font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;">Dengan Hormat,</span>
		 <br /> 
		 <p> Pada Tanggal <b><?php echo $skrg; ?></b>, Dengan NOJO : <b><?php echo $noj; ?></b></p> <br>
		 <p> Detail : </p><br>
		 <?php 
		 if($stat=1)
		 {
			foreach ($cek_detil as $zar) { 
				if($zar->n_project == '') 
				{ ?>
					<p>- Anda telah dipilih sebagai Rekruter untuk project <b><?php echo $zar->project; ?></b> dan lokasi <b><?php echo $zar->city_name; ?></b> .</p> <br>
				<?php }
				else
				{ ?>
					<p>- Anda telah dipilih sebagai Rekruter untuk project <b><?php echo $zar->n_project; ?></b> dan lokasi <b><?php echo $zar->city_name; ?></b> .</p> <br>
				<?php }
			}
		 }
		 else
		 {
			foreach ($cek_detil as $zar) { 
				if($zar->n_project == '') 
				{ ?>
					<p>- Anda telah dipilih sebagai Rekruter untuk project <b><?php echo $zar->project; ?></b> dan lokasi <b><?php echo $zar->city_name; ?></b> .</p> <br>
				<?php }
				else
				{ ?>
					<p>- Anda telah dipilih sebagai Rekruter untuk project <b><?php echo $zar->n_project; ?></b> dan lokasi <b><?php echo $zar->city_name; ?></b> .</p> <br>
				<?php }
			}
		 }
		 ?>
		 <!--<p>Anda telah dipilih sebagai PIC untuk project <b><?php //echo $proj; ?></b> dan lokasi <b><?php //echo $lok; ?></b> .</p>-->
		 <br/>
		 Best Regards,<br/>

		  
		 
		 Infomedia Solusi Humanika.<br/>
		 <br/>
		 
		 <br />
		 
		 <br />
		
		 
</body>
</html>
