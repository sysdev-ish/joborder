<?php
if (count($lmap_city)){
	foreach($lmap_city as $key => $list){
		echo "<tr>";
		echo "<td class='tkota'>". $list['city_name'] ."</td>";
		echo "<td class='tarea'>". $list['name_province'] ."</td>";
		echo "<td class='tmanar'>". $list['nama'] ."</td>";
		echo "<td class='tarea_id' style='display:none'>". $list['city_id'] ."</td>";
		echo "<td class='tpro_id' style='display:none'>". $list['province_id'] ."</td>";
		echo "<td class='tusername' style='display:none'>". $list['username'] ."</td>";
		echo "<td class='tid' style='display:none'>". $list['no'] ."</td>";
		echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
		echo "</tr>";
	}
}else{
	echo "<tr align=center><td colspan=3>No data to display</td></tr>";
}
?>