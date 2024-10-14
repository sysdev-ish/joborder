<?php
if (count($rincian)){
	foreach($rincian as $key => $list){
		echo "<tr>";
		echo "<td>". $list['perner'] ."</td>";
		echo "<td>". $list['nama'] ."</td>";
		echo "<td>". $list['nm_area'] ."</td>";
		echo "<td>". $list['nm_persa'] ."</td>";
		echo "<td>". $list['nm_skilllayanan'] ."</td>";
		echo "<td>". $list['nm_level'] ."</td>";
		echo "<td>". $list['nm_jabatan'] ."</td>";
		echo "</tr>";
	}
}	
		