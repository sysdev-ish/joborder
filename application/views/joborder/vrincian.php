<?php
	if (!empty($vrincian)){
		foreach($vrincian as $key => $list){
			echo "<tr>"; 
			if(!filter_var($list['upd'], FILTER_VALIDATE_INT)) 
			{    
				echo "<td>". $list['upd'] ."</td>";
			} 
			else 
			{    
				echo "<td>". $list['nama'] ."</td>";
			}  
			//echo "<td>". $list['upd'] ."</td>";
			echo "<td>". $list['lup'] ."</td>";
			echo "<td>". $list['jml_hr'] ."</td>";
			echo "<td>". $list['jml_user'] ."</td>";
			echo "<td>". $list['jml_pkwt'] ."</td>";
			echo "</tr>";
		}
	}
	else
	{
		foreach($vrincian as $key => $list){
			echo "<tr align=center><td colspan=5>No data to display</td></tr>";
		}
	}
?>