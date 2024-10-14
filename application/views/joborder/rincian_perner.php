<?php
	if (count($rincian)){
		foreach($rincian as $key => $list){
			echo "<tr>";
			if($list['rotasi_resign']==1){
				echo "<td class='perner'>Resign</td>"; 
			} else if($list['rotasi_resign']==2){
				echo "<td class='perner'>Rotasi</td>"; 
			} else {
				echo "<td class='perner'>-</td>";
			}
			
			echo "<td >". $list['tgl_resign'] ."</td>"; 
			
			if($list['type_rep']!='' and $list['type_rep']!=null){
				if($list['type_rep']==1){
					echo "<td>NO REKRUTMENT</td>"; 
				} else if($list['type_rep']==2){
					echo "<td>REKRUT</td>"; 
				} else if($list['type_rep']==3){
					echo "<td>NO REKRUT (EXISTING)</td>"; 
				} else {
					echo "<td>-</td>";
				}
			} else {
				if($list['type_replace']==1){
					echo "<td>NO REKRUTMENT</td>"; 
				} else if($list['type_replace']==2){
					echo "<td>REKRUT</td>"; 
				} else if($list['type_replace']==3){
					echo "<td>NO REKRUT (EXISTING)</td>"; 
				} else {
					echo "<td>-</td>";
				}
			}
			
			echo "<td class='perner'>". $list['perner'] ."</td>"; 
			echo "<td class='nama'>". $list['nama'] ."</td>";
			echo "<td >". $list['nm_area'] ."</td>";  
			echo "<td >". $list['nm_persa'] ."</td>";
			echo "<td >". $list['nm_skilllayanan'] ."</td>";
			echo "<td >". $list['nm_level'] ."</td>";
			echo "<td >". $list['nm_jabatan'] ."</td>";
			if($list['perner_ganti']!='' or $list['perner_ganti']!=null){
				echo "<td >". $list['perner_ganti'] ."</td>";
			} else {
				echo "<td >-</td>";
			}
			
			/*
			if($list['flag_app']=='1')
			{
				echo "<td ><label style='color:#FF0000'>Approved By ". $list['emanar'] ."</label></td>";
			}
			else if($list['flag_app']=='2')
			{
				echo "<td ><label style='color:#FF0000'>Rejected By ". $list['emanar'] ."</label></td>";
			}
			else
			{
				echo "<td ><label style='color:#FF0000'>Waiting Approval ". $list['emanar'] ."</label></td>";
			}
			*/
			echo "<td class='nojo' style='display:none'>". $list['nojo'] ."</td>";
			echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
			?>
			<!--<td><button type='button' class='btn btn-outline' id='btn_download' value='<?php //echo base_url()."uploads/";?><?php //echo $list['komponen'];?>'>Download Dokumen</button></td>-->
			<?php echo "</tr>";
		}
	}
?>