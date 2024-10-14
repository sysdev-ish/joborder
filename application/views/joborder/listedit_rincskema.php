<?php
	foreach($bbb as $key => $list){ 
		echo "<tr>";
		echo "<td>". $list['n_perar'] ."</td>";
		echo "<td>". $list['n_area'] ."</td>";
		?>
		<td><button type='button' class='btn btn-box-tool btnedit_rinc' id='btnedit_rinc' data-toggle='modal' data-target='#ROPmyModal'><i class="glyphicon glyphicon-pencil"></i></button>   <button title='Delete Rincian' type='button' class='btn btn-box-tool' onclick='delete_Row(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button>  </td>
		<?php
		echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
		echo "</tr>";
	}
?>