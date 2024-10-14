<?php
	if (count($lclientx)){
		foreach($lclientx as $key => $list){
			echo "<tr>";
			echo "<td class='tnpersa'>". $list['n_persa'] ."</td>";
			echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
			echo "<td class='tclient' >". $list['client'] ."</td>";
			echo "<td class='tpersa' style='display:none'>". $list['persa'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr align=center><td colspan=3>No data to display</td></tr>";
	}
?>