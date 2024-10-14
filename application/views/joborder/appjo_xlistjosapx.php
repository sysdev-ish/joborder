<?php

if (count($transjos)) {
	foreach ($transjos as $key => $list) {
		if ($level == 2) {
			if ($regional != 1) {
				if ($list['flag_approval'] == 0) {
					$btn = 'Approve';
					$btny = 'Approve';
					$stat = 'btn-warning';
				} elseif ($list['flag_approval'] == 1) {
					$btn = 'Approved';
					$btny = 'Approved Atasan';
					$stat = 'btn-success';
				} elseif ($list['flag_approval'] == 2) {
					$btn = 'Rejected';
					$btny = 'Rejected';
					$stat = 'btn-danger';
				} elseif ($list['flag_skema'] == 1) {
					$btn = 'Approved';
					$btny = 'Approved PM';
					$stat = 'btn-success';
				} elseif ($list['flag_skema'] == null) {
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval PM';
					$stat = 'btn-warning';
				}
			} else {
				if ($list['flag_approval'] == 0) {
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval Atasan';
					$stat = 'btn-warning';
				} elseif ($list['flag_approval'] == 1) {
					$btn = 'Approved';
					$btny = 'Approved Atasan';
					$stat = 'btn-success';
				} elseif ($list['flag_approval'] == 2) {
					$btn = 'Rejected';
					$btny = 'Rejected';
					$stat = 'btn-danger';
				} elseif ($list['flag_skema'] == 1) {
					$btn = 'Approved';
					$btny = 'Approved PM';
					$stat = 'btn-success';
				} elseif ($list['flag_skema'] == null) {
					$btn = 'Waiting Approval';
					$btny = 'Waiting Approval PM';
					$stat = 'btn-warning';
				}
			}
		} else {
			if ($list['flag_approval'] == 0) {
				$btn = 'Waiting Approval';
				$btny = 'Waiting Approval Atasan';
				$stat = 'btn-warning';
			} elseif ($list['flag_approval'] == 1) {
				$btn = 'Approved';
				$btny = 'Approved Atasan';
				$stat = 'btn-success';
			} elseif ($list['flag_approval'] == 2) {
				$btn = 'Rejected';
				$btny = 'Rejected';
				$stat = 'btn-danger';
			} elseif ($list['flag_skema'] == 1) {
				$btn = 'Approved';
				$btny = 'Approved PM';
				$stat = 'btn-success';
			} elseif ($list['flag_skema'] == null) {
				$btn = 'Waiting Approval';
				$btny = 'Waiting Approval PM';
				$stat = 'btn-warning';
			}
		}
		echo "<tr>";
		echo "<td class='noj'>" . $list['nojo'] . "</td>";
		echo "<td class='bar' style='display:none'>" . $list['n_area'] . "</td>";
		echo "<td class='bpa'>" . $list['n_perar'] . "</td>";
?>
		<!-- <td><a href="<?php //echo base_url().'uploads/';
											?><?php //echo $list['skema'];
																														?>" target="_blank" style="color:#FF6633;"> <?php //echo $list['skema']; 
																																																																		?> </a></td> -->
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?>><?php echo $list['skema']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?><?php echo $list['bak']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?><?php echo $list['other']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
<?php
		echo "<td>" . $list['nama'] . "</td>";
		echo "<td>" . $list['lup'] . "</td>";
		echo "<td class='tejo' style='display:none'>" . $list['nojo'] . "</td>";
		echo "<td class='keter' style='display:none'>" . $list['ket_reject'] . "</td>";
		echo "<td class='bare' style='display:none'>" . $list['area'] . "</td>";
		echo "<td class='pare' style='display:none'>" . $list['perar'] . "</td>";
		// add by kaha 19-01-2024 -> detail approved
		echo "<td class='ketdon' style='display:none'>" . $list['ket_done'] . "</td>";
		if ($xyxy == 1) {
			echo "<td>";
			echo "<button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
			<button type='button' class='btn " . $stat . " btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btny . "</button>";
			if (($level == 1) || ($level == 14)) {
				if ($list['flag_approval'] == 2) {
					$abcde = 'atasan';
					echo "<a href='" . base_url() . 'index.php/home/edit_all_skema' . '/'  . $abcde . '/'  . $list['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				}
			}
			echo "</td>";
		} else {
			echo "<td>";
			echo "<button type='button' class='btn btn-primary btn-block btn-xs vbtndetailx' id='vbtndetailx' data-toggle='modal' data-target='#ZUmyModal'>DETAIL</button>";
			if ($level == 2) {
				echo "<button type='button' class='btn btn-success btn-block btn-xs vbtnapp' id='vbtnapp' >Approved PM</button>";
			} else {
				if ($list['flag_approval'] == 5) {
					echo "<button type='button' class='btn btn-success btn-block btn-xs vbtnapp' id='vbtnapp' >Approved PM</button>";
				} else {
					echo "<button type='button' class='btn btn-success btn-block btn-xs vbtnapp' id='vbtnapp' >Waiting Approval PM</button>";
				}
			}

			echo "</td>";
		}


		echo "</tr>";
	}
}

?>