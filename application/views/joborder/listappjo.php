<?php
				/*				if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == 'Administrator')
									{
										if ($list['approval_admin'] == 0){
												$btn = 'Approve Admin';
												$stat = 'btn-warning';
											} elseif ($list['approval_admin'] == 1) {
												$btn = 'Approved Admin';
												$stat = 'btn-success';
											} elseif ($list['approval_admin'] == 2) {
												$btn = 'Rejected Admin';
												$stat = 'btn-danger';
											} 
									}
									else
									{
										if ($layanan == '1'){
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										} else {
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										}
									}
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
										if ($level == 'Administrator')
										{ ?><br />
										<a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn btn-primary btn-block btn-xs btn_download' id='btn_download'>Download</button></a>
										 <?php } echo "</td>"; echo "</tr>";
									}
								}	
								*/							
								?>
								
<?php
							/*	if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == 'Administrator')
									{
										if ($list['approval_admin'] == 0){
												$btn = 'Approve Admin';
												$stat = 'btn-warning';
											} elseif ($list['approval_admin'] == 1) {
												$btn = 'Approved Admin';
												$stat = 'btn-success';
											} elseif ($list['approval_admin'] == 2) {
												$btn = 'Rejected Admin';
												$stat = 'btn-danger';
											} 
									}
									else
									{
										if ($layanan == '1'){
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										} else {
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										}
									}
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
										if ($level == 'Administrator')
										{ ?><br />
										<a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btn_download' id='btn_download'>Download</button></a>
										 <?php } echo "</td>"; echo "</tr>";
									}
								}	
								*/							
								?>
								

<?php
/*						
						if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == '4')
									{
										if ($list['approval_admin'] == 0){
												$btn = 'Approve Admin';
												$stat = 'btn-warning';
											} elseif ($list['approval_admin'] == 1) {
												$btn = 'Approved Admin';
												$stat = 'btn-success';
											} elseif ($list['approval_admin'] == 2) {
												$btn = 'Rejected Admin';
												$stat = 'btn-danger';
											} 
									}
									else if ($level == '2')
									{
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
									}
									else 
									{
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
									}
									
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
										if ($level == '4')
										{ ?><br />
										<a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btn_download' id='btn_download'>Download</button></a>
										 <?php } echo "</td>"; echo "</tr>";
									}
								}	
*/								
								?>
								
								
								
<?php
if (count($transjo)){
	foreach($transjo as $key => $list){
	if ($level == '2')
	{
			if ($list['approval'] == 0){
				$btn = 'Approve';
				$stat = 'btn-warning';
			} elseif ($list['approval'] == 1) {
				$btn = 'Approved';
				$stat = 'btn-success';
			} elseif ($list['approval'] == 2) {
				$btn = 'Rejected';
				$stat = 'btn-danger';
			}
	}
	else 
	{
			if ($list['approval'] == 0){
				$btn = 'Waiting Approval';
				$stat = 'btn-warning';
			} elseif ($list['approval'] == 1) {
				$btn = 'Approved';
				$stat = 'btn-success';
			} elseif ($list['approval'] == 2) {
				$btn = 'Rejected';
				$stat = 'btn-danger';
			}
	}
	
		echo "<tr>";
		echo "<td class=nojo>". $list['nojo'] ."</td>";
		if($list['n_project']!='')
		{
			echo "<td class='project'>". $list['n_project'] ."</td>";
		}
		else
		{
			echo "<td class='project'>". $list['project'] ."</td>";
		}
		
		if($list['type_jo']==1){
			if($list['type_new']==1){
				echo "<td>". $list['ntype_jo'] ." - New Project</td>";
			}
			else {
				echo "<td>". $list['ntype_jo'] ." - Pengembangan</td>";
			} 
		} else {
			if($list['type_replace']==1){
				echo "<td>". $list['ntype_jo'] ." - No Rekrutment</td>";
			}
			else {
				echo "<td>". $list['ntype_jo'] ." - Rekrutment</td>";
			}
		}
		echo "<td>". $list['syarat'] ."</td>";
		echo "<td>". $list['deskripsi'] ."</td>";
		echo "<td>". $list['bekerja'] ."</td>";
		echo "<td>". $list['nupd'] ."</td>";
		echo "<td>". $list['lup'] ."</td>";
		echo "<td class='tjo' style='display:none'>". $list['type_jo'] ."</td>";
		echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
		echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
		if($level=='6')
		{
			echo "<td class='natasan' style='display:none'>Atasan masing-masing</td>";
		}
		else if ($level == '2')
		{
			echo "<td class='natasan' style='display:none'>Anda</td>";
		}
		else
		{
			echo "<td class='natasan' style='display:none'>". $list['natasan'] ."</td>";
		}
		echo "<td class='trep' style='display:none'>". $list['type_replace'] ."</td>";
		//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
		echo "<td>";
		//echo "<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
		//echo "<button type='button' class='btn bg-navy btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";
		
		if($list['type_jo']==1){
			echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>" . $btn . "</button>";
		}
		else {
			echo "<button type='button' class='btn ". $stat ." btn-block btn-xs vbtndetail' id='vbtndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
		} 
		
		//echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
		if ($level == '1'){
			if ($list['approval'] == 2) {
				$abcde = 'atasan';
				echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
			}
		}
		echo "</td>"; echo "</tr>";
	}
}								
?>