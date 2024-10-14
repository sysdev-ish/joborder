<?php
if (count($rincian)){
	foreach($rincian as $key => $list){
		echo "<tr>";
		echo "<td class='noj'>". $list['perner'] ."</td>";
		if($list['flagrfc']==4){
			echo "<td class='noj'>Succesfull</td>";
		} else {
			echo "<td class='noj'>". $list['messagerfc'] ."</td>";
		}
		
		echo "</tr>";
	}
}	
		