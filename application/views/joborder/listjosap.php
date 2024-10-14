<?php
/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} elseif ($list['skema'] == 1) {
											$btn = 'Done';
											$stat = 'btn-success';
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
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";?>
										<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
										 <?php 
										if($list['flag_cancel']=='1') 
										{
											echo "
											<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled Recruit</button>
											";
										}
										else if($list['flag_cancel_sap']=='1')
										{
											echo "
											<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
											";
										}
										else
										{
											echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
											echo "<button type='submit' class='btn btn-success btn-block btn-xs btnhold' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button></td>";
										}
										 echo "</td>"; 
										 echo "</tr>";
									}
								}	
*/							
								?>



<?php
/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} elseif ($list['skema'] == 1) {
											$btn = 'Done';
											$stat = 'btn-success';
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
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
										echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";?>
										<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
										 <?php 
										if($list['flag_cancel']=='1') 
										{
											echo "
											<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
											";
										}
										else if($list['flag_cancel_sap']=='1')
										{
											echo "
											<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
											";
										}
										else
										{
											//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
											echo "<button type='submit' class='btn btn-success btn-block btn-xs btnhold' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button></td>";
										}
										 echo "</td>"; 
										 echo "</tr>";
									}
								}	
*/								
								?>
								
								
								
<?php
if (count($transjo)){
	foreach($transjo as $key => $list){
		if ($list['skema'] == 0){
			$btn = 'OnProgress';
			$stat = 'btn-warning';
		} elseif ($list['skema'] == 1) {
			$btn = 'Done';
			$stat = 'btn-success';
		} 
	
		echo "<tr>";
		echo "<td class=nojo>". $list['nojo'] ."</td>";
		echo "<td>". $list['ntype'] ."</td>";
		if($list['n_project']!='')
		{
			echo "<td class='knpro'>". $list['n_project'] ."</td>";
		}
		else
		{
			echo "<td>". $list['project'] ."</td>";
		}
		
		//echo "<td>". $list['syarat'] ."</td>";
		echo "<td>". $list['jabatan'] ."</td>";
		echo "<td class='knlok'>". $list['lokasi'] ."</td>";
		echo "<td>". $list['atasan'] ."</td>";
		echo "<td>". $list['kontrak'] ."</td>";
		echo "<td>". $list['waktu'] ."</td>";
		echo "<td>". $list['jumlah'] ."</td>";
		echo "<td>". $list['deskripsi'] ."</td>";
		echo "<td>". $list['bekerja'] ."</td>";
		echo "<td>". $list['dnama'] ."</td>";
		echo "<td>". $list['lup'] ."</td>";
		echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
		echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
		echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
		echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
		echo "<td class='kdone' style='display:none'>". $list['ket_done'] ."</td>";	
		echo "<td class='kid' style='display:none'>". $list['id'] ."</td>";	
		echo "<td class='kpro' style='display:none'>". $list['project'] ."</td>";	
		echo "<td class='klok' style='display:none'>". $list['lokasix'] ."</td>";	
		if($list['skema']==1)
		{
			echo "<td>
			<button type='button' class='btn daud btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>
			<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
		}
		else
		{
			echo "<td>
				
				<button type='button' class='btn daud btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";?>
				<!--<br /><a href="<?php //echo base_url().'uploads/';?><?php //echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php //echo base_url().'uploads/';?><?php //echo $list['komponen'];?>'>Download</button></a><br />-->
				 <?php 
				if($list['flag_cancel']=='1') 
				{
					echo "
					<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
					";
				}
				else if($list['flag_cancel_sap']=='1')
				{
					echo "
					<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
					";
				}
				else
				{
					//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
					echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
					echo "<button type='submit' class='btn btn-success btn-block btn-xs btnhold' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button></td>";
				}
			echo "</td>"; 
		}
		
		 echo "</tr>";
	}
}								
?>
