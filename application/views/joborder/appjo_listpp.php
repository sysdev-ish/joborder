<?php
if (count($transjos)){
	foreach($transjos as $key => $list){
		if($level==5){
			if ($list['approval_pm'] == 1) {
				$btn = 'Approved';
				$btny = 'Approved PM';
				$stat = 'btn-success';
			} elseif ($list['approval_pm'] == 0 || $list['approval_pm'] == null) {
				$btn = 'Approve';
				$btny = 'Approve';
				$stat = 'btn-warning';
			} elseif ($list['approval_pm'] == 2) {
				$btn = 'Rejected';
				$btny = 'Rejected PM';
				$stat = 'btn-danger';
			} 
		} else {
			if($level==2)
			{
				if($regional!=1)
				{
					if ($list['approval_atasan'] == 0 || $list['approval_atasan'] == null){
						$btn = 'Approve';
						$btny = 'Approve';
						$stat = 'btn-warning';
					} elseif ($list['approval_atasan'] == 1 && $list['approval_pm'] == 0) {
						$btn = 'Waiting Approval';
						$btny = 'Waiting Approval PM';
						$stat = 'btn-warning';
					} elseif ($list['approval_atasan'] == 2) {
						$btn = 'Rejected';
						$btny = 'Rejected Atasan';
						$stat = 'btn-danger';
					} elseif ($list['approval_pm'] == 1) {
						$btn = 'Approved';
						$btny = 'Approved PM';
						$stat = 'btn-success';
					} elseif ($list['approval_pm'] == 0 || $list['approval_pm'] == null) {
						$btn = 'Waiting Approval';
						$btny = 'Waiting Approval PM';
						$stat = 'btn-warning';
					} elseif ($list['approval_pm'] == 2) {
						$btn = 'Rejected';
						$btny = 'Rejected PM';
						$stat = 'btn-danger';
					} 
				}
				else
				{
					if ($list['approval_atasan'] == 0 || $list['approval_atasan'] == null){
						$btn = 'Waiting Approval';
						$btny = 'Waiting Approval Atasan';
						$stat = 'btn-warning';
					} elseif ($list['approval_atasan'] == 1 && $list['approval_pm'] == 0) {
						$btn = 'Waiting Approval';
						$btny = 'Waiting Approval PM';
						$stat = 'btn-warning';
					} elseif ($list['approval_atasan'] == 2) {
						$btn = 'Rejected';
						$btny = 'Rejected Atasan';
						$stat = 'btn-danger';
					} elseif ($list['approval_pm'] == 1) {
						$btn = 'Approved';
						$btny = 'Approved PM';
						$stat = 'btn-success';
					} elseif ($list['approval_pm'] == 0 || $list['approval_pm'] == null) {
						$btn = 'Waiting Approval';
						$btny = 'Waiting Approval PM';
						$stat = 'btn-warning';
					} elseif ($list['approval_pm'] == 2) {
						$btn = 'Rejected';
						$btny = 'Rejected PM';
						$stat = 'btn-danger';
					}
				}
			}
			else
			{
				if ($list['approval_atasan'] == 0 || $list['approval_atasan'] == null){
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval Atasan';
					$stat = 'btn-warning';
				} elseif ($list['approval_atasan'] == 1 && $list['approval_pm'] == 0) {
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval PM';
					$stat = 'btn-warning';
				} elseif ($list['approval_atasan'] == 2) {
					$btn = 'Rejected';
					$btny = 'Rejected Atasan';
					$stat = 'btn-danger';
				} elseif ($list['approval_pm'] == 1) {
					$btn = 'Approved';
					$btny = 'Approved PM';
					$stat = 'btn-success';
				} elseif ($list['approval_pm'] == 0 || $list['approval_pm'] == null) {
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval PM';
					$stat = 'btn-warning';
				} elseif ($list['approval_pm'] == 2) {
					$btn = 'Rejected';
					$btny = 'Rejected PM';
					$stat = 'btn-danger';
				} 
			}
		}
		
		echo "<tr>";
		echo "<td class='noj'>". $list['nojo'] ."</td>";
		echo "<td class='persaid'>". $list['npersa'] ."</td>";
		if($list['area']=='ALL'){
			echo "<td>ALL</td>";
		} else {
			echo "<td>". $list['narea'] ."</td>";
		}
		
		if($list['skilllayanan']=='ALL'){
			echo "<td>ALL</td>";
		} else {
			echo "<td>". $list['nskill'] ."</td>";
		}
		
		if($list['kd_jabatan']=='ALL'){
			echo "<td>ALL</td>";
		} else {
			echo "<td>". $list['jabatan'] ."</td>";
		}
		
		if($list['level']=='ALL'){
			echo "<td>ALL</td>";
		} else {
			echo "<td>". $list['nlevel'] ."</td>";
		}
		echo "<td>". $list['jml'] ."</td>";
		echo "<td>". $list['start_project'] ."</td>";
		echo "<td>". $list['end_project'] ."</td>";
		echo "<td>". $list['no_lampiran'] ."</td>";
		?>
		<td><a href="<?php echo base_url().'lampiranpp/';?><?php echo $list['lampiran'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['lampiran']; ?> </a></td>
		<?php
		echo "<td>". $list['nupd'] ."</td>";
		echo "<td>". $list['lup'] ."</td>";
		echo "<td class='ppid' style='display:none'>". $list['aid'] ."</td>";
		echo "<td class='ppbtn' style='display:none'>". $btny ."</td>";
		echo "<td class='ppk_atasan' style='display:none'>".  $list['ket_atasan'] ."</td>";
		echo "<td class='ppk_pm' style='display:none'>".  $list['ket_pm'] ."</td>";
		echo "<td class='cekapp' style='display:none'>".  $list['cekapp'] ."</td>";
		echo "<td>";
		echo "<button type='button' class='btn ". $stat ." btn-block btn-xs ppbtnapp' id='ppbtnapp' data-toggle='modal' data-target='#PPGmyModal'>" . $btn . "</button>";
		if ( ($level == 1) || ($level == 14) || ($level == 2 && $regional== 1) ){
			if ($list['approval_atasan'] == 2) {
				$abcde = 'atasan';
				echo "<a href='". base_url() . 'index.php/rotasi/edit_pp' . '/'  . $abcde . '/'  . $list['aid'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
			} else if($list['approval_pm'] == 2) {
				$abcde = 'pm';
				echo "<a href='". base_url() . 'index.php/rotasi/edit_pp' . '/'  . $abcde . '/'  . $list['aid'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
			}
			
		}
		echo "</td>";
		echo "</tr>";
	}
}	

?>