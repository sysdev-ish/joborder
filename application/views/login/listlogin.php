<?php
	if (count($llogin)){
		foreach($llogin as $key => $list){
			echo "<tr>";
			echo "<td class='tusernama'>". $list['username'] ."</td>";
			echo "<td class='tnama'>". $list['nama'] ."</td>";
			echo "<td class='tjabatan' style='display:none'>". $list['jabatan'] ."</td>";
			echo "<td class='tlayanan' style='display:none'>". $list['layanan'] ."</td>";
			echo "<td class='tjabat' >". $list['jabat'] ."</td>";
			echo "<td class='tlayan' >". $list['layan'] ."</td>";
			echo "<td class='tlevel' style='display:none'>". $list['level'] ."</td>";
			echo "<td class='tdnama' >". $list['dnama'] ."</td>";
			echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
			echo "<td class='treg' style='display:none'>". $list['regional'] ."</td>";
			echo "<td class='temail' >". $list['email'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button><button type='button' class='btn btn-success btn-block btn-xs btnres' id='btnres'>Reset</button></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr align=center><td colspan=3>No data to display</td></tr>";
	}
?>