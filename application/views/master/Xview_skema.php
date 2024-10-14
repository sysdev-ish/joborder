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
				
				echo "<td class='tlv'>". $list['level'] ."</td>";
				echo "<td class='tkomp'>". $list['komponen'] ."</td>";
				echo "<td class='tval'>". $list['value'] ."</td>";
				echo "<td class='tket'>". $list['keterangan'] ."</td>";
				echo "<td class='tgaji'>". $list['tgl_gajian'] ."</td>";
				echo "<td class='tbid' style='display:none'>". $list['bid'] ."</td>";
				echo "<td class='taid' style='display:none'>". $list['aid'] ."</td>";
				echo "<td><center><input class='active' type='checkbox' name='active5[]' id=".$list['bid']. " value=".$list['bid']. "></center><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#EModal'>Edit</button></td>";
				echo "</tr>";
			}
		}else{
			echo "<tr align=center><td colspan=10>No data to display</td></tr>";
		}		
?>