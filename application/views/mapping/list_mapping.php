<?php
if (count($transjo)){
	foreach($transjo as $key => $list){
		echo "<tr>";
		echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='nojo'>". $list['nojo'] ."</td>";
		if($list['n_project']!='')
		{
			echo "<td class='project'>". $list['n_project'] ."</td>";
		}
		else
		{
			echo "<td class='project'>". $list['project'] ."</td>";
		}
		
		echo "<td class='tjo'>". $list['ntype'] ."</td>";
		echo "<td class='tjo'>". $list['hnama'] ."</td>";
		echo "<td class='upd'>". $list['upd'] ."</td>";
		echo "<td class='pichi'>". $list['n_pic_manar'] ."</td>";
		echo "<td class='pichi'>". $list['n_pic_hi'] ."</td>";
		echo "<td class='pichi'>". $list['n_pic_rekrut'] ."</td>";
		echo "<td class='kdone' style='display:none'>". $list['ket_done'] ."</td>";
		echo "<td class='krek' style='display:none'>". $list['ket_rekrut'] ."</td>";
		echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>Detail</button>
		<button type='button' class='btn btn-success btn-block btn-xs btnpic' id='btnpic' data-toggle='modal' data-target='#PICModal'>Pilih PIC</button>";
		echo "</td>";				
		
									
		echo "</tr>";
	}
}	
?>