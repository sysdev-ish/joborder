<?php
if (count($transjos)) {
	foreach ($transjos as $key => $list) {
		/*
		if( ($level==4) || ($level==2) )
		{
			if ($list['flag_manar'] == 1) {
				$btn = 'Approved MANAR';
				$stat = 'btn-success';
			} elseif ($list['flag_manar'] == 2) {
				$btn = 'Rejected MANAR';
				$stat = 'btn-danger';
			} 
			else
			{
				$btn = 'Approve';
				$stat = 'btn-warning';
			}
		}
		*/
		if ($level == '4') {
			if ($list['flag_manar'] == 1) {
				$btn = 'Approved MANAR';
				$stat = 'btn-success';
			} elseif ($list['flag_manar'] == 2) {
				$btn = 'Rejected MANAR';
				$stat = 'btn-danger';
			} else {
				$btn = 'Approve';
				$stat = 'btn-warning';
			}
		} else if ($level == '2') {
			if ($regional == '1') {
				if ($list['flag_manar'] == 1) {
					$btn = 'Approved MANAR';
					$stat = 'btn-success';
				} elseif ($list['flag_manar'] == 2) {
					$btn = 'Rejected MANAR';
					$stat = 'btn-danger';
				} else {
					$btn = 'Waiting Approval MANAR';
					$stat = 'btn-warning';
				}
			} else {
				if ($lalalili <= '0') {
					if ($list['flag_manar'] == 1) {
						$btn = 'Approved MANAR';
						$stat = 'btn-success';
					} elseif ($list['flag_manar'] == 2) {
						$btn = 'Rejected MANAR';
						$stat = 'btn-danger';
					} else {
						$btn = 'Waiting Approval MANAR';
						$stat = 'btn-warning';
					}
				} else {
					if ($list['flag_manar'] == 1) {
						$btn = 'Approved MANAR';
						$stat = 'btn-success';
					} elseif ($list['flag_manar'] == 2) {
						$btn = 'Rejected MANAR';
						$stat = 'btn-danger';
					} else {
						$btn = 'Approve';
						$stat = 'btn-warning';
					}
				}
			}
		} else {
			if ($list['flag_manar'] == 1) {
				$btn = 'Approved MANAR';
				$stat = 'btn-success';
			} elseif ($list['flag_manar'] == 2) {
				$btn = 'Rejected MANAR';
				$stat = 'btn-danger';
			} else {
				$btn = 'Waiting Approval MANAR';
				$stat = 'btn-warning';
			}
		}
		echo "<tr>";
		echo "<td class='noj'>" . $list['nojo'] . "</td>";
		if (($level == 4) || ($level == 2)) {
			echo "<td class='bar' >" . $list['n_area'] . "</td>";
			echo "<td class='bpa' >" . $list['n_perar'] . "</td>";
		} else {
			echo "<td class='bar'>" . $list['n_area'] . "</td>";
			echo "<td class='bpa' >" . $list['n_perar'] . "</td>";
		}

?>
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?><?php echo $list['skema']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?><?php echo $list['bak']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
		<td><a href="<?php echo base_url() . 'index.php/home/downloadnas/'; ?><?php echo $list['other']; ?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
		<?php
		echo "<td>" . $list['nama'] . "</td>";
		echo "<td>" . $list['lup'] . "</td>";
		echo "<td class='tejo' style='display:none'>" . $list['id'] . "</td>";
		echo "<td class='nojk' style='display:none'>" . $list['nojo'] . "</td>";
		echo "<td class='keter' style='display:none'>" . $list['ket_manar'] . "</td>";
		echo "<td class='ketcan' style='display:none'>" . $list['ket_cancel'] . "</td>";
		echo "<td class='bare' style='display:none'>" . $list['area'] . "</td>";
		echo "<td class='pare' style='display:none'>" . $list['perar'] . "</td>";
		if ($typer == '1') {
			echo "
				<td>";
			if (($level == 4) || ($level == 2)) {
				// echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>";
				// echo "-";
				echo "<button type='button' class='btn btn-success btn-block btn-xs vbtnapp' id='vbtnapp' >Approved PM</button>";
			} else { ?>
				<button type='button' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
			<?php }

			$abcde = 'sap';
			if ($list['flag_cancel_sap'] == '1') {
				// echo "<button type='button' class='btn btn-danger btn-block btn-xs btnholderz' id='btnholderz' data-toggle='modal' data-target='#ERModal'>Canceled SAP</button>";
				echo "<button type='button' class='btn btn-danger btn-block btn-xs btnholderz' id='btnholderz' data-toggle='modal' data-target='#ERModal'>Canceled SAP</button>";

				if (($level == 1) || ($level == 14)) {
					//echo "<a href='". base_url() . 'index.php/home/edit_skema_sk' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					echo "<a href='" . base_url() . 'index.php/home/edit_all_skema' . '/' . $abcde . '/'  . $list['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				}

				if ($level == 2) {
					if ($regional == 1) {
						echo "<a href='" . base_url() . 'index.php/home/edit_all_skema' . '/' . $abcde . '/'  . $list['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					}
				}

				echo "</td>";
			} else {
				echo "</td>";
			}
		} else {
			echo "
				<td>";
			if (($level == 4) || ($level == 2)) {
				echo "<button type='button' class='btn btn-success btn-block btn-xs vbtnapp' id='vbtnapp' >Approved PM</button>";
				// echo "-";
			} else { ?>
				<button type='button' class='btn btn-primary btn-block btn-xs vbtndetailx' id='vbtndetailx' data-toggle='modal' data-target='#VUmyModal'>DETAIL</button>
<?php }

			echo "</td>";
		}



		echo "</tr>";
	}
}

?>