<?php
/*
		if( ($vkomp!='') || (!empty($vkomp)) ){
			foreach($vkomp as $key => $list){
				echo "<tr>"; 
				//echo "<td class='txlevel'>". $list['level_txt'] ."</td>";
				//echo "<td class='txkdlevel' style='display:none'>". $list['level'] ."</td>";
				echo "<td class='txlevel'>". $list['blvl_txt'] ."</td>";
				echo "<td class='txkdlevel' style='display:none'>". $list['blvl'] ."</td>";
				echo "<td class='txump'>". $list['ump'] ."</td>";
				echo "<td class='txkomp'>". $list['komponen_txt'] ."</td>";
				echo "<td class='txkdkomp' style='display:none'>". $list['komponen'] ."</td>";
				echo "<td class='txval'>". $list['value'] ."</td>";
				echo "<td class='txket'>". $list['keterangan'] ."</td>";
				echo "<td class='txhk'>". $list['hk_pembagi'] ."</td>";
				//echo "<td class='txid' style='display:none'>". $list['user_id'] ."</td>";
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=8>No data to display</td></tr>";
		}	
*/
?>

<?php
		
		if( ($vkomp!='') || (!empty($vkomp)) ){
			foreach($vkomp as $key => $list){
				echo "<tr>"; 
				echo "<td class='txlevel'>". $list['blvl_txt'] ."</td>";
				echo "<td class='txkdlevel' style='display:none'>". $list['blvl'] ."</td>";
				echo "<td class='txump'>". $list['ump'] ."</td>";
				echo "<td class='txkomp'>". $list['komponen_txt'] ."</td>";
				echo "<td class='txkdkomp' style='display:none'>". $list['komponen'] ."</td>";
				echo "<td class='txval'>". $list['value'] ."</td>";
				echo "<td class='txper'>". $list['persentase'] ."</td>";
				/*
				echo "<td class='txper'>". $list['perusahaan'] ."</td>";
				echo "<td class='txkar'>". $list['karyawan'] ."</td>";
				echo "<td class='txjkk'>". $list['jkk'] ."</td>";
				echo "<td class='txjkm'>". $list['jkm'] ."</td>";
				echo "<td class='txjhtp'>". $list['jht_per'] ."</td>";
				echo "<td class='txjhtk'>". $list['jht_kar'] ."</td>";
				*/
				echo "<td class='txket'>". $list['keterangan'] ."</td>";
				echo "<td class='txhk'>". $list['hk_pembagi'] ."</td>";
				if($list['pengkali_tk']==''){
					echo "<td class='txtk'>-</td>";
				} else {
					echo "<td class='txtk'>". $list['pengkali_tk'] ."</td>";
				}
				
				if($list['pengkali_kes']==''){
					echo "<td class='txkes'>-</td>";
				} else {
					echo "<td class='txkes'>". $list['pengkali_kes'] ."</td>";
				}
				//echo "<td class='txid' style='display:none'>". $list['user_id'] ."</td>";
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=8>No data to display</td></tr>";
		}	
?>