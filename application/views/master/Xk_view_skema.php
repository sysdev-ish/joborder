<?php
		if (count($scema)){
			foreach($scema as $key => $list){
				echo "<tr>";
				if($list['BTRTL']=='ALL') 
				{
					echo "<td class='tar'>ALL AREA</td>";
				}
				else
				{
					echo "<td class='tar'>". $list['carea'] ."</td>";
				}
				
				echo "<td class='tpa'>". $list['cpa'] ."</td>";
				
				if($list['PERSK']=='ALL')
				{
					echo "<td class='tsl'>ALL SKILLLAYANAN</td>";
				}
				else
				{
					echo "<td class='tsl'>". $list['csl'] ."</td>";
				}
				
				
				if($list['STEXT']=='ALL')
				{
					echo "<td class='tjb'>ALL JABATAN</td>";
				}
				else
				{
					echo "<td class='tjb'>". $list['cjb'] ."</td>";
				}
				
				echo "<td class='tlv'>". $list['TRFAR'] ."</td>";
				echo "<td class='tkomp'>". $list['nko'] ."</td>";
				echo "<td class='tval'>". $list['nkz'] ."</td>";
				echo "<td class='tket'>". $list['keterangan'] ."</td>";
				echo "<td class='taid' style='display:none'>". $list['id'] ."</td>";
				echo "<td><center><input class='active' type='checkbox' name='active5[]' id=".$list['id']. " value=".$list['id']. "></center><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#EModal'>Edit</button></td>";
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=10>No data to display</td></tr>";
		}		
?>