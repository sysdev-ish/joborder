<?php
	foreach($bbb as $key => $list){ 
		echo "<tr>";
		echo "<td class='njb'>". $list['name_job_function'] ."</td>";
		echo "<td>". $list['gender'] ."</td>";
		echo "<td>". $list['pendidikan'] ."</td>";
		echo "<td class='cnm'>". $list['city_name'] ."</td>";
		echo "<td>". $list['waktu'] ."</td>";
		echo "<td>". $list['atasan'] ."</td>";
		echo "<td class='kon'>". $list['kontrak'] ."</td>";
		echo "<td class='rjml'>". $list['jumlah'] ."</td>";
		echo "<td class='cnlv'>". $list['level'] ."</td>";
		echo "<td class='hkp'>". $list['hk_pembagi'] ."</td>";
		echo "<td class='cnskill'>". $list['skilllayanan_txt'] ."</td>";
		if($list['train_soft']==1){ $wikwik1 = 'Training Softskill,'; } 
		if($list['train_hard']==1){ $wikwik2 = 'Training Hardskill,'; } 
		if($list['tendem_pasif']==1){ $wikwik3 = 'Tendem Pasif,'; } 
		if($list['tendem_aktif']==1){ $wikwik4 = 'Tendem Aktif'; }
		
		$wikwok = $wikwik1.''.$wikwik2.''.$wikwik3.''.$wikwik4;
		echo "<td class='cntrain'>". $wikwok ."</td>";
		?>
		<!--<td><a href="<?php  //echo base_url()?>index.php/home/rinc_hapus/<?php //echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
		<td><button title='Delete Rincian' type='button' class='btn btn-box-tool' onclick='delete_Row(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button>  <button type='button' class='btn btn-box-tool btnadd_komp' id='btnadd_komp' data-toggle='modal' data-target='#POPmyModal'><i class="glyphicon glyphicon-plus-sign"></i></button>  <button type='button' class='btn btn-box-tool btnedit_rinc' id='btnedit_rinc' data-toggle='modal' data-target='#ROPmyModal'><i class="glyphicon glyphicon-pencil"></i></button></td>
		<?php
		echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='cump' style='display:none'>". $list['ump'] ."</td>";
		echo "<td class='cjab' style='display:none'>". $list['jabatan'] ."</td>";
		echo "<td class='clok' style='display:none'>". $list['lokasi'] ."</td>"; 
		echo "<td class='cklv' style='display:none'>". $list['alevel'] ."</td>";
		echo "<td class='ckskill' style='display:none'>". $list['skilllayanan'] ."</td>";
		echo "<td class='cdet_komp' style='display:none'>". $list['detail_komp'] ."</td>";
		echo "<td class='cnojr' style='display:none'>". $list['nojo'] ."</td>";
		echo "</tr>";
	}
?>