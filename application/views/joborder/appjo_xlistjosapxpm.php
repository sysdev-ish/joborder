<?php

if (count($transjos)){
	foreach($transjos as $key => $list){
		/*
		if ($list['flag_approval'] == 1){
			$btn = 'Approve';
			$stat = 'btn-warning';
		} elseif ($list['flag_approval'] == 5) {
			$btn = 'Approved';
			$stat = 'btn-success';
		} elseif ($list['flag_approval'] == 2) {
			$btn = 'Rejected';
			$stat = 'btn-danger';
		} 
		*/	
		
		if ($list['flag_approval'] == 1){
			$btn = 'Approve';
			$stat = 'btn-warning';
		} elseif ($list['flag_approval'] == 5) {
			$btn = 'Approved';
			$stat = 'btn-success';
		} elseif ($list['flag_approval'] == 2) {
			$btn = 'Rejected';
			$stat = 'btn-danger';
		} 
		
		echo "<tr>";
		echo "<td class='noj'>". $list['nojo'] ."</td>";
		echo "<td class='bar' style='display:none'>". $list['n_area'] ."</td>";
		echo "<td class='bpa'>". $list['n_perar'] ."</td>";
		?>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/';?><?php echo $list['skema'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/';?><?php echo $list['bak'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/';?><?php echo $list['other'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
		<?php
		echo "<td>". $list['nama'] ."</td>";
		echo "<td>". $list['lup'] ."</td>";
		echo "<td class='tejo' style='display:none'>". $list['nojo'] ."</td>";
		echo "<td class='keter' style='display:none'>". $list['ket_reject'] ."</td>";
		echo "<td class='bare' style='display:none'>". $list['area'] ."</td>";
		echo "<td class='pare' style='display:none'>". $list['perar'] ."</td>";
		echo "<td>";
		
		if($cekik=='SKM'){
			echo "<button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>";
			echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>";
		}
		else {
			echo "<button type='submit' class='btn btn-primary btn-block btn-xs vbtndetailx' id='vbtndetailx' data-toggle='modal' data-target='#ZUmyModal'>DETAIL</button>";
			echo "<button type='button' class='btn ". $stat ." btn-block btn-xs vbtnapp' id='vbtnapp' data-toggle='modal' data-target='#VGmyModal'>" . $btn . "</button>";
		}
		
		echo "</td>";
		
		echo "</tr>";
	}
}	

?>