<?php
	if (count($ljabatan)){
		foreach($ljabatan as $key => $list){
			echo "<tr>";
			echo "<td class='tjabatan'>". $list['jabatan'] ."</td>";
			if($list['login']=='1'){ echo "<td class='tlog'>YES</td>"; } else { echo "<td class='tlog'>NO</td>"; }
			if($list['tggjawab']=='1'){ echo "<td class='tjwb'>YES</td>"; } else { echo "<td class='tjwb'>NO</td>"; }
			echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
			echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
			
			echo "</tr>";
		}
	}else{
		echo "<tr align=center><td colspan=3>No data to display</td></tr>";
	}
?>