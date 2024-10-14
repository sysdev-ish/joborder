<?php
	foreach($bbb as $key => $list){ 
		echo "<tr>";
		echo "<td>". $list['name_job_function'] ."</td>";
		echo "<td>". $list['gender'] ."</td>";
		echo "<td>". $list['pendidikan'] ."</td>";
		echo "<td>". $list['city_name'] ."</td>";
		echo "<td>". $list['waktu'] ."</td>";
		echo "<td>". $list['atasan'] ."</td>";
		echo "<td>". $list['kontrak'] ."</td>";
		echo "<td>". $list['jumlah'] ."</td>";
		?>
		<td><a href="<?php  echo base_url()?>index.php/home/rinc_hapus/<?php echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ID Rincian = <?php echo $list['id']; ?> ?')"><i class="glyphicon glyphicon-trash"></i></a></td>
		<?php
		echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
		echo "</tr>";
	}
?>