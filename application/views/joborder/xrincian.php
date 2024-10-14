<?php
	if (count($rincianx)){
		foreach($rincianx as $key => $list){
			echo "<tr>";
			if( ($list['n_area']!='') && ($list['n_area']!=null) ){
				echo "<td>". $list['n_area'] ."</td>";
			} else {
				echo "<td>". $list['new_narea'] ."</td>";
			}
			
			if( ($list['n_perar']!='') && ($list['n_perar']!=null) ){
				echo "<td>". $list['n_perar'] ."</td>";
			} else {
				echo "<td>". $list['new_nperar'] ."</td>";
			}
			echo "</tr>";
		}
	}
?>