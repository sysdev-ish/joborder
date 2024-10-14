<?php
if (count($rincian)){
	foreach($rincian as $key => $list){
		echo "<tr>";
		echo "<td class='noj'>". $list['jabatan'] ."</td>";
		echo "<td class='noj'>". $list['gender'] ."</td>";
		echo "<td class='noj'>". $list['pendidikan'] ."</td>";
		echo "<td class='noj'>". $list['kontrak'] ."</td>";
		echo "<td class='noj'>". $list['lokasi'] ."</td>";
		echo "<td class='noj'>". $list['jumlah'] ."</td>";
		echo "</tr>";
	}
}	
		