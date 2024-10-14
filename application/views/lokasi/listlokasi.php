<?php
	if (count($llokasi)){
		foreach($llokasi as $key => $list){
//                                    $kd_area = $list['province_id'];
//									$area2 = $list['name_province'];
			
			echo "<tr>";
			echo "<td class='tkd_kota'>". $list['city_id'] ."</td>";
			echo "<td class='tkota'>". $list['city_name'] ."</td>";
			echo "<td class='tarea'>". $list['name_province'] ."</td>";
//									echo "<td class='tstatus'>". $list['status'] ."</td>";
			echo "<td class='tareas' style='display:none'>". $list['id'] ."</td>";
			echo "<td class='tid' style='display:none'>". $list['no'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr align=center><td colspan=3>No data to display</td></tr>";
	}
?>