<?php
	if (count($zrincian)){
		foreach($zrincian as $key => $list){
			echo "<tr>"; 
			?>
			<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile='.$list['komponen'] ?>" target="_blank" style="color:red;"> <?php echo $list['komponen']; ?> </a></td>
			<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile='.$list['komponen_bak'] ?>" target="_blank" style="color:red;"> <?php echo $list['komponen_bak'] ?> </a></td>
			<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile='.$list['komponen_other'] ?>" target="_blank" style="color:red;"> <?php echo $list['komponen_other'] ?> </a></td>
			<?php
			//echo "<td>". $list['komponen'] ."</td>";
			//echo "<td>". $list['komponen_bak'] ."</td>";
			//echo "<td>". $list['komponen_other'] ."</td>";
			echo "</tr>";
		}
	}
	
	$sit = $nana;
?>