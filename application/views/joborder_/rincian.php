<?php
	if (count($rincian)){
		foreach($rincian as $key => $list){
			echo "<tr>";
			echo "<td>". $list['jabatan'] ."</td>";
			echo "<td>". $list['gender'] ."</td>";
			echo "<td>". $list['pendidikan'] ."</td>";
			echo "<td>". $list['lokasi'] ."</td>";
			echo "<td>". $list['atasan'] ."</td>";
			echo "<td>". $list['kontrak'] ."</td>";
			echo "<td>". $list['waktu'] ."</td>";
			echo "<td>". $list['jumlah'] ."</td>";
			echo "</tr>";
		}
	}
?>