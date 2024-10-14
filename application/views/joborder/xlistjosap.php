<?php
if (count($transjos)){
	foreach($transjos as $key => $list){
		if ($list['flag_skema'] != 1){
			$btn = 'OnProgress';
			$stat = 'btn-warning';
		} else {
			$btn = 'Done';
			$stat = 'btn-success';
		} 
		echo "<tr>";
		echo "<td class='noj'>". $list['nojo'] ."</td>";
		echo "<td class='bar' style='display:none'>". $list['n_area'] ."</td>";
		echo "<td class='bpa' >". $list['new_nperar'] ."</td>";
		?>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile=';?><?php echo $list['skema'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile=';?><?php echo $list['bak'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
		<td><a href="<?php echo base_url().'index.php/home/downloadnas/?nfile=';?><?php echo $list['other'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
		<?php
		echo "<td>". $list['nama'] ."</td>";
		echo "<td>". $list['lup'] ."</td>";
		echo "<td class='tejo' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='keter' style='display:none'>". $list['ket_reject'] ."</td>";
		echo "<td class='ketcan' style='display:none'>". $list['ket_cancel'] ."</td>";
		echo "<td class='ketdon' style='display:none'>". $list['ket_done'] ."</td>";
		if($list['flag_cancel_sap']=='1')
		{
			echo "<td>
			<button type='button' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
			<button type='button' class='btn btn-danger btn-block btn-xs btnholderz' id='btnholderz' data-toggle='modal' data-target='#ERModal'>Canceled</button></td>";
		}
		else
		{
			if($list['flag_skema']==1)
			{
				echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
				<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button></td>";
			}
			else
			{
				echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
				<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>
				<button type='button' class='btn btn-success btn-block btn-xs btnholder' id='btnholder' data-toggle='modal' data-target='#EGModal'>Cancel</button></td>";
			}
			
		}
		
		echo "</tr>";
	}
}	
?>