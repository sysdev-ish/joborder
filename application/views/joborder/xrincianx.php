<?php
	if (count($xrincianx)){
		foreach($xrincianx as $key => $list){
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
			
			/*
			if($list['flag_manar']==1)
			{
				echo "<td><label style='color:#99FF99'>Approved Manar</label></td>";
			}
			else if($list['flag_manar']==2)
			{
				echo "<td><label style='color:#99FF99'>Rejected Manar</label></td>";
			}
			else
			{
				echo "<td><label style='color:#99FF99'>Waiting Approve Manar</label></td>";
			}
			*/
			echo "</tr>";
		}
	}
?>