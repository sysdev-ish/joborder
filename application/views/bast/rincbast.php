<?php
	if (count($rincian)){
		foreach($rincian as $key => $list){
			echo "<tr>";
			if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
			{    
				echo "<td class='jabatan' >". $list['jabatan'] ."</td>"; 
			} 
			else 
			{    
				echo "<td class='jabatan' >". $list['name_job_function'] ."</td>";   
			}   
			echo "<td>". $list['gender'] ."</td>";
			echo "<td >". $list['pendidikan'] ."</td>";
			echo "<td class='lokasi' >". $list['city_name'] ."</td>";   
			echo "<td >". $list['atasan'] ."</td>";
			echo "<td >". $list['kontrak'] ."</td>";
			echo "<td >". $list['waktu'] ."</td>";
			echo "<td >". $list['jumlah'] ."</td>";
			if($list['jml_hire']==''){
				echo "<td >0</td>";
			} else {
				echo "<td >". $list['jml_hire'] ."</td>";
			}
			echo "</tr>";
		}
	}
?>