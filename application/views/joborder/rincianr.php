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
			/*
			if($list['flag_app']=='1')
			{
				echo "<td ><label style='color:#FF0000'>Approved By ". $list['enama'] ."</label></td>";
			}
			else if($list['flag_app']=='2')
			{
				echo "<td ><label style='color:#FF0000'>Rejected By ". $list['enama'] ."</label></td>";
			}
			else
			{
				echo "<td ><label style='color:#FF0000'>Waiting Approval ". $list['enama'] ."</label></td>";
			}
			*/
			//echo "<td><a href=''>". $list['komponen'] ."</a></td>";
			echo "<td ><button type='button' class='btn btn-primary btn-block btn-xs btndetkomx' id='btndetkomx'>DETAIL SKEMA</button></td>";
			echo "<td class='nojo' style='display:none'>". $list['nojo'] ."</td>";
			echo "<td class='kjab' style='display:none'>". $list['jabatan'] ."</td>";
			echo "<td class='klok' style='display:none'>". $list['lokasi'] ."</td>";
			echo "<td class='klv' style='display:none'>". $list['level'] ."</td>";
			echo "<td class='ksl' style='display:none'>". $list['skilllayanan'] ."</td>";
			echo "<td class='dkomp' style='display:none'>". $list['detail_komp'] ."</td>";
			echo "<td class='rid' style='display:none'>". $list['id'] ."</td>";
			?>
			<!--<td><button type='button' class='btn btn-outline' id='btn_download' value='<?php //echo base_url()."uploads/";?><?php //echo $list['komponen'];?>'>Download Dokumen</button></td>-->
			<?php echo "</tr>";
		}
	}
?>