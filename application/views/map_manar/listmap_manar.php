<?php
	if (count($lmap_manar)){
		foreach($lmap_manar as $key => $list){
//                                    $kd_area = $list['province_id'];
//									$area2 = $list['name_province'];
			echo "<tr>";
			echo "<td class='tkota'>". $list['personalarea'] ."</td>";
			echo "<td class='tarea'>". $list['city_name'] ."</td>";
			echo "<td class='tmanar'>". $list['nama'] ."</td>";
			echo "<td class='tarea_id' style='display:none'>". $list['city_id'] ."</td>";
			echo "<td class='tper_id' style='display:none'>". $list['personalareaid'] ."</td>";
			echo "<td class='tusername' style='display:none'>". $list['username'] ."</td>";
			echo "<td class='tid' style='display:none'>". $list['no'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr align=center><td colspan=3>No data to display</td></tr>";
	}
?>