<?php
		foreach($vcentang as $listi){
				$ta = $listi->emplo;
				$urut_sk = explode(",", $listi->emplo);
				$jml = count($urut_sk);
		}

		 
		if( ($vrincian!='') || (!empty($vrincian)) ){
			foreach($vrincian as $key => $list){
				echo "<tr>"; 
				//echo "<td class='txcen' align='center'><input type='checkbox' class='active' value='".$list['user_id']."' name='centang' id='centang'></td>"; ?>
				<td align='center'><input type='checkbox' <?php if(strpos($ta, $list['user_id']) !== false) { echo 'checked'; } ?> class='active' value='<?php echo $list['user_id']; ?>' name='centang[]' id='<?php echo $list['user_id']; ?>' onclick='xtestx(<?php echo $list['user_id']; ?>)'></td>
				<?php 
				echo "<td class='txnama'>". $list['first_name'] .' '. $list['middle_name'] .' '. $list['last_name'] ."</td>";
				if($list['gender'] == 1) {
						echo "<td class='txgender'>Wanita</td>";
				}
				else if($list['gender'] == 2) { 
						echo "<td class='txgender'>Pria</td>";
				}
				echo "<td class='txbdate'>". $list['birthdate'] ."</td>";
				if($list['education_id'] == 1) {
						echo "<td class='txedu'>Highschool</td>";
				}
				else if($list['education_id'] == 2) { 
						echo "<td class='txedu'>Diploma</td>";
				}
				else if($list['education_id'] == 3) {        
						echo "<td class='txedu'>Sarjana</td>";
				}
				else if($list['education_id'] == 4) {
						echo "<td class='txedu'>Magister</td>";
				}
				else if($list['education_id'] == 5) {
						echo "<td class='txedu'>Doktoral</td>";
				} else {
						echo "<td class='txedu'>-</td>";
				}  

				echo "<td class='txinstitut'>". $list['institution_name'] ."</td>";
				echo "<td class='txgpa'>". $list['gpa'] ."</td>";
				if( ($list['exper'] == 0) || ($list['exper'] == '') ){
					echo "<td class='txexper'>Fresh Graduate</td>";
				} else if($list['exper'] > 0) {
					echo "<td class='txexper'>". $list['exper'] ."</td>";
				}
				//echo "<td class='txexper'>". $list['exper'] ."</td>";
				echo "<td class='txid' style='display:none'>". $list['user_id'] ."</td>";
				echo "<td class='txidr' style='display:none'>". $xidx ."</td>";
				echo "<td class='typex' style='display:none'>". $typex ."</td>";
				if($typex=='rekrut'){
					echo '<td><center><button type="button" class="btn btn-primary btnhire" id="btnhire" onclick="hire(\''.$list['birthplace'].'\', \''.$list['first_name'].'\', \''.$list['middle_name'].'\', \''.$list['last_name'].'\', \''.$nojov.'\', \''.$xidx.'\', \''.$list['religion'].'\', \''.$list['user_id'].'\', \''.$list['marital_status'].'\', \''.$list['birthdate'].'\', \''.$jkontrak.'\', \''.$tjos.'\', \''.$tnews.'\', \''.$list['gender'].'\', \''.$tloks.'\', \''.$tperv.'\', \''.$tskilv.'\', \''.$tjabv.'\', \''.$tabv.'\', \''.$hjabv.'\')" >Hiring</button></center></td>';
				} else {
					echo "<td><center><button type='button' class='btn btn-primary btndet' id='btndet'>Detail</button></center></td>";
				}
				
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=6>No data to display</td></tr>";
		}	
?>