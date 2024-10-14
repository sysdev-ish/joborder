<?php
	if (count($zproc)){
		foreach($zproc as $key => $list){
			echo "<tr>"; 
			echo "<td>". $list['item_name'] ."</td>";
			echo "<td>". $list['qty'] ."</td>";
			echo "<td>". $list['spec'] ."</td>";
			echo "<td>". $list['budget'] ."</td>";
			echo "</tr>";
		}
	}
	
	$rit = $nana;
?>