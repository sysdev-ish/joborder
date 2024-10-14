<?php
	if (count($rincian)){
		foreach($rincian as $key => $list){
			echo "<tr>";
			if($list['tgl_latihan']!=''){
				echo "<td class='tlatihan'>".$list['tgl_latihan']."</td>"; 
			} else {
				if($list['latihan']!=''){
					echo "<td class='tlatihan'>".$list['latihan']."</td>"; 
				} else {
					echo "<td class='tlatihan'>-</td>"; 
				}
			} 
			
			if($list['tgl_bekerja']!=''){
				echo "<td class='tbekerja'>".$list['tgl_bekerja']."</td>"; 
			} else {
				if($list['bekerja']!=''){
					echo "<td class='tbekerja'>".$list['bekerja']."</td>"; 
				} else {
					echo "<td class='tbekerja'>-</td>"; 
				}
			}

				
			if($list['type_rekrut']!=''){
				if($list['type_rekrut']==3){
					echo "<td class='trekrut'>No Rekrut (Existing)</td>";
				} else if($list['type_rekrut']==1){
					echo "<td class='trekrut'>No Rekrut</td>";
				} else {
					echo "<td class='trekrut'>Rekrut</td>";
				}
			} else {
				if($list['new_rekrut']!=''){
					if($list['new_rekrut']==3){
						echo "<td class='trekrut'>No Rekrut (Existing)</td>";
					} else if($list['new_rekrut']==1){
						echo "<td class='trekrut'>No Rekrut</td>";
					} else {
						echo "<td class='trekrut'>Rekrut</td>";
					}
				} else {
					echo "<td class='trekrut'>-</td>"; 
				}
			}
			
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
			if($list['jenis_pkwt']==''){
				echo "<td >-</td>";
			} else {
				echo "<td >". $list['jenis_pkwt'] ."</td>";
			}
			echo "<td >". $list['waktu'] ."</td>";
			echo "<td >". $list['jumlah'] ."</td>";
			
			if($list['aperner_norekrut']!=''){
				echo "<td class='tpernorek'>".$list['aperner_norekrut']."</td>"; 
			} else {
				if($list['perner_norekrut']!=''){
					echo "<td class='tbekerja'>".$list['perner_norekrut']."</td>"; 
				} else {
					echo "<td class='tbekerja'>-</td>"; 
				}
			}
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