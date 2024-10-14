<?php
		if (count($vrincian)){
			foreach($vrincian as $key => $list){
				echo "<tr>";
				echo "<td class='txnama'>". $list['first_name'] .' '. $list['middle_name'] .' '. $list['last_name'] ."</td>";
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
				}

				echo "<td class='txinstitut'>". $list['institution_name'] ."</td>";
				echo "<td class='txgpa'>". $list['gpa'] ."</td>";
				echo "<td class='txexper'>". $list['exper'] ."</td>";
				echo "<td class='txid' style='display:none'>". $list['user_id'] ."</td>";
				echo "<td>
				<select class='form-control' id='jstatus_".$list['user_id']."' name='jstatus' > 
					<option value='1'>Lulus HR</option>
					<option value='2'>Lulus User</option>
					<option value='3'>Lulus Training</option>
					<option value='4'>On Board</option>
				</select></td>";
				echo "<td><button type='button' class='btn btn-primary btn-block btn-xs addrincian' id='addrincian'>ADD</button></td>";
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=10>No data to display</td></tr>";
		}	
?>