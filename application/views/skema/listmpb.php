<?php
	if (count($lmpb)){
		foreach($lmpb as $key => $list){
			echo "<tr>";
			echo "<td class='tnkomp'>". $list['n_komponen'] ."</td>";
			echo "<td class='tnpersa'>". $list['n_persa'] ."</td>";
			echo "<td class='tnarea'>". $list['n_area'] ."</td>";
			echo "<td class='tjml' >". $list['jml'] ."</td>";
			echo "<td class='tjns' >". $list['jns'] ."</td>";
			echo "<td class='tpersa' style='display:none'>". $list['persa'] ."</td>";
			echo "<td class='tarea' style='display:none'>". $list['area'] ."</td>";
			echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
			echo "<td class='tkomp' style='display:none'>". $list['komponen'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
			echo "</tr>";
		}
	}
?>