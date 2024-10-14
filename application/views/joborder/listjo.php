<?php
/*
if (count($transjo)){
	foreach($transjo as $key => $list){
		if ($level == '4')
		{
				if ($list['flag_app'] == 1) {
					$btn = 'Approved MANAR';
					$stat = 'btn-success';
				} elseif ($list['flag_app'] == 2) {
					$btn = 'Rejected MANAR';
					$stat = 'btn-danger';
				} else {
					$btn = 'Approve';
					$stat = 'btn-warning';
				}
				
		}
		else 
		{
				if ($list['flag_app'] == 1) {
					$btn = 'Approved MANAR';
					$stat = 'btn-success';
				} elseif ($list['flag_app'] == 2) {
					$btn = 'Rejected MANAR';
					$stat = 'btn-danger';
				} else {
					$btn = 'Waiting Approval MANAR';
					$stat = 'btn-warning';
				}
		} 
		echo "<tr>";
		echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='nojo'>". $list['nojo'] ."</td>";
		echo "<td class='upd'>". $list['upd'] ."</td>";
		if($list['n_project']!='')
		{
			echo "<td class='project'>". $list['n_project'] ."</td>";
		}
		else
		{
			echo "<td class='project'>". $list['project'] ."</td>";
		}
		
		echo "<td class='tjo'>". $list['ntype'] ."</td>";
		//if(!filter_var($list['lokasi'], FILTER_VALIDATE_INT)) 
		if(!filter_var($list['lokasi'], FILTER_SANITIZE_STRING)) 
		{    
			echo "<td class='lokasi'>". $list['lokasi'] ."</td>"; 
		} 
		else 
		{    
			echo "<td class='lokasi'>". $list['city_name'] ."</td>";   
		}    
		echo "<td class='tanggal'>". $list['bekerja'] ."</td>";
		if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
		{    
			echo "<td class='jabatan'>". $list['jabatan'] . " ( ". $list['gender'] ." )</td>";
		} 
		else 
		{    
			echo "<td class='jabatan'>". $list['name_job_function'] ." ( ". $list['gender'] ." )</td>";
		}  
		echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
		echo "<td align='center' class='hr'>". $list['hr'] ."</td>";
		echo "<td align='center' class='jmluser'>". $list['jmluser'] ."</td>";
		echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
		echo "<td class='notes'>". $list['note'] ."</td>";	
		echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";		
		echo "<td class='gender' style='display:none'>". $list['gender'] ."</td>";	
		echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
		echo "<td class='krej' style='display:none'>". $list['ket_rej'] ."</td>";
		echo "<td class='namz' style='display:none'>". $list['upd'] ."</td>";
		echo "<td class='krek' style='display:none'>". $list['ket_rekrut'] ."</td>";
		
		echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>Detail</button>";
		
		if ($level == '3'){
			if($list['flag_cancel']=='1') 
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
			}
			else if($list['flag_cancel_sap']=='1')
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
			}
			else
			{
				if($list['flag_jobs']!='1') 
				{
					if($list['status_rekrut']==1) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
					}
					else if($list['status_rekrut']==2) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
					}
					else
					{
						echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
					}
					echo "<button type='button' class='btn btn-success btn-block btn-xs btngo' id='btngo' data-toggle='modal' data-target='#OModal'>Publish</button>";
				}
				else
				{
					if($list['status_rekrut']==1) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
					}
					else if($list['status_rekrut']==2) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
					}
					else
					{
						echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
					}
				}
			}
		} 
		else
		{
			$abcde = 'sap';
			if($list['flag_cancel']=='1') 
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
				
				if ($level == '1'){
					//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				} 
			}
			else if($list['flag_cancel_sap']=='1')
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
				
				if ($level == '1'){
					//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				}
				
				if ($level == 2){
					if($regional==1)
					{
						//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					}
				}
			}
			else
			{
				echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btnapz' id='btnapz' data-toggle='modal' data-target='#AmyModal'>" . $btn . "</button>";
				
				//echo "</td>";
			}
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
		if($level == '4') 
		{
				if ($list['flag_app'] == 1) {
					$btn = 'Approved MANAR';
					$stat = 'btn-success';
				} elseif ($list['flag_app'] == 2) {
					$btn = 'Rejected MANAR';
					$stat = 'btn-danger';
				} else {
					$btn = 'Approve';
					$stat = 'btn-warning';
				}
				
		}
		else if($level == '2') 
		{
				if($regional == '1') 
				{
					if ($list['flag_app'] == 1) {
						$btn = 'Approved MANAR';
						$stat = 'btn-success';
					} elseif ($list['flag_app'] == 2) {
						$btn = 'Rejected MANAR';
						$stat = 'btn-danger';
					} else {
						$btn = 'Waiting Approval MANAR';
						$stat = 'btn-warning';
					}
				}
				else
				{
					if($lalalili <= '0')
					{
						if ($list['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($list['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Waiting Approval MANAR';
							$stat = 'btn-warning';
						}
					}
					else
					{
						if ($list['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($list['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Approve';
							$stat = 'btn-warning';
						}
					}
					
					
				}
		}
		else 
		{
				if ($list['flag_app'] == 1) {
					$btn = 'Approved MANAR';
					$stat = 'btn-success';
				} elseif ($list['flag_app'] == 2) {
					$btn = 'Rejected MANAR';
					$stat = 'btn-danger';
				} else {
					$btn = 'Waiting Approval MANAR';
					$stat = 'btn-warning';
				}
		} 
		echo "<tr>";
		echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='nojo'>". $list['nojo'] ."</td>";
		echo "<td class='upd'>". $list['upd'] ."</td>";
		if($list['n_project']!='')
		{
			echo "<td class='project'>". $list['n_project'] ."</td>";
		}
		else
		{
			echo "<td class='project'>". $list['project'] ."</td>";
		}
		
		echo "<td class='tjo'>". $list['ntype'] ."</td>";
		//if(!filter_var($list['lokasi'], FILTER_VALIDATE_INT)) 
		if(!filter_var($list['lokasi'], FILTER_SANITIZE_STRING)) 
		{    
			echo "<td class='lokasi'>". $list['lokasi'] ."</td>"; 
		} 
		else 
		{    
			echo "<td class='lokasi'>". $list['city_name'] ."</td>";   
		}    
		echo "<td class='tanggal'>". $list['bekerja'] ."</td>";
		if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
		{    
			echo "<td class='jabatan'>". $list['jabatan'] . " ( ". $list['gender'] ." )</td>";
		} 
		else 
		{    
			echo "<td class='jabatan'>". $list['name_job_function'] ." ( ". $list['gender'] ." )</td>";
		}  
		echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
		echo "<td align='center' class='hr'>". $list['hr'] ."</td>";
		echo "<td align='center' class='jmluser'>". $list['jmluser'] ."</td>";
		echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
		echo "<td class='notes'>". $list['note'] ."</td>";	
		echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";		
		echo "<td class='gender' style='display:none'>". $list['gender'] ."</td>";	
		echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
		echo "<td class='krej' style='display:none'>". $list['ket_rej'] ."</td>";
		echo "<td class='namz' style='display:none'>". $list['upd'] ."</td>";
		echo "<td class='krek' style='display:none'>". $list['ket_rekrut'] ."</td>";
		
		echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>Detail</button>";
		
		if ($level == '3'){
			if($list['flag_cancel']=='1') 
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
			}
			else if($list['flag_cancel_sap']=='1')
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
			}
			else
			{
				if($list['flag_jobs']!='1') 
				{
					if($list['status_rekrut']==1) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
					}
					else if($list['status_rekrut']==2) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
					}
					else
					{
						echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
					}
					echo "<button type='button' class='btn btn-success btn-block btn-xs btngo' id='btngo' data-toggle='modal' data-target='#OModal'>Publish</button>";
				}
				else
				{
					if($list['status_rekrut']==1) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
					}
					else if($list['status_rekrut']==2) 
					{
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
					}
					else
					{
						echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
						echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
					}
				}
			}
		} 
		else
		{
			$abcde = 'sap';
			if($list['flag_cancel']=='1') 
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
				
				if ($level == '1'){
					//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				} 
			} 
			else if($list['flag_cancel_sap']=='1')
			{
				echo "
				<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
				";
				
				if ($level == '1'){
					//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
				}
				
				if ($level == 2){
					if($regional==1)
					{
						//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
					}
				}
			}
			else
			{
				echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btnapz' id='btnapz' data-toggle='modal' data-target='#AmyModal'>" . $btn . "</button>";
				
				//echo "</td>";
			}
		}
		echo "</td>";				
		
									
		echo "</tr>";
	}
}								
?>