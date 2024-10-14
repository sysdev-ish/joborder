<?php
	if (count($rincian)){
		foreach($rincian as $key => $list){
			echo "<tr>";
			//echo "<td>". $list['jabatan'] ."</td>";
			if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
			{    
				echo "<td class='jabatan'>". $list['jabatan'] ."</td>"; 
			} 
			else 
			{    
				echo "<td class='jabatan'>". $list['name_job_function'] ."</td>";   
			}   
			echo "<td>". $list['gender'] ."</td>";
			echo "<td>". $list['pendidikan'] ."</td>";
			if(!filter_var($list['lokasi'], FILTER_VALIDATE_INT)) 
			{    
				echo "<td class='lokasi'>". $list['lokasi'] ."</td>"; 
			} 
			else 
			{    
				echo "<td class='lokasi'>". $list['city_name'] ."</td>";   
			}   
			//echo "<td>". $list['lokasi'] ."</td>";
			echo "<td>". $list['atasan'] ."</td>";
			echo "<td>". $list['kontrak'] ."</td>";
			echo "<td>". $list['waktu'] ."</td>";
			echo "<td>". $list['jumlah'] ."</td>";
			//echo "<td><a href=''>". $list['komponen'] ."</a></td>";
			?>
			<!--<td><button type='button' class='btn btn-outline' id='btn_download' value='<?php echo base_url()."uploads/";?><?php echo $list['komponen'];?>'>Download Dokumen</button></td>-->
			<?php echo "</tr>";
		}
	}
?>