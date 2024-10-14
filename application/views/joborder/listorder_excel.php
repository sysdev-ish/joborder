
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");

//echo $html;
?>
<table border='1' width="70%">	
				<tr>
					<td style="border-bottom:1px #000000 solid;" colspan="14" height="30" align="center"><font size="3"><b>REKAP PEMENUHAN DATA LISTORDER</b></font></td>
				</tr>
				<TR>
					<TH  style="background-color:#CC0000; height:20">
					<font color="#FFFFFF">NOJO</font></TH>
					<TH  style="background-color:#CC0000; height:20">
					<font color="#FFFFFF">Tanggal Created</font></TH>
					<TH style="background-color:#CC0000; height:20">
					<font color="#FFFFFF">Created By</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000">
					<font color="#FFFFFF">Lama Project</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000">
					<font color="#FFFFFF">Project</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000">
					<font color="#FFFFFF">Type JO</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000">
					<font color="#FFFFFF">Lokasi</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Duedate</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Kebutuhan</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Jumlah</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Proses HR</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Proses Assesment</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Proses User</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Proses PKWT</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20">
					<font color="#FFFFFF">Status</font></TH>
				</TR>
				
			
<?php 	
$i = 1;
foreach($listall as $key => $list){ 
	if( ($list['n_project']!='') && ($list['n_project']!='Pilih') )
	{
		$abc = $list['n_project'];
	}
	else
	{
		$abc = $list['project'];
	}
	
	if(!filter_var($list['lokasi'], FILTER_SANITIZE_STRING)) 
	{    
		$cde = $list['lokasi']; 
	} 
	else 
	{    
		$cde = $list['city_name'];   
	}  
	
	if($list['type_jo']==2){
		$fgh = $list['ntype'];
	} else {
		if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
		{    
			$fgh = $list['jabatan'] . "(". $list['gender'] .") ";
		} 
		else 
		{    
			$fgh = $list['name_job_function'] ."(". $list['gender'] .") ";
		} 
	}
	
	if($list['type_jo']==2){
		$qwq = '1';
	} else {
		$qwq = $list['jumlah'];
	} 
	
	if($list['hr']=='')
	{
		$wa = '0';
	}
	else
	{
		$wa = $list['hr'];
	}
	 
	if($list['training']=='')
	{
		$wd = '0';
	}
	else
	{
		$wd = $list['training'];
	}
	
	if($list['jmluser']=='')
	{
		$wb = '0';
	}
	else
	{
		$wb = $list['jmluser'];
	}
	
	if($list['rekrut']=='')
	{
		$wc = '0';
	}
	else
	{
		$wc = $list['rekrut'];
	}
	
	
	if( ($row['flag_jobs']!=1) || ($row['flag_jobs']==null) ) 
	{
		if($row['status_rekrut']==1) 
		{
			$vvv = 'Hold';
		}
		else if($row['status_rekrut']==2) 
		{
			$vvv = 'Done';
		}
		else
		{
				$vvv = 'OnProgress';
		}
	}
	else
	{
		if($row['status_rekrut']==1) 
		{
			$vvv = 'Hold';
		}
		else if($row['status_rekrut']==2) 
		{
			$vvv = 'Done';
		}
		else
		{
			$vvv = 'OnProgress';
		}
	}
	
	echo "<tr>";
	echo "<td>".$list['nojo']."</td>";
	echo "<td>".$list['tanggal']."</td>";
	echo "<td>".$list['upd']."</td>";
	echo "<td>".$list['lama']. " bulan</td>";
	echo "<td>".$abc."</td>";
	echo "<td>".$list['ntype']."</td>";
	echo "<td>'".$cde."'</td>";
	echo "<td>".$list['bekerja']."</td>";
	echo "<td>'".$fgh."'</td>";
	echo "<td>'".$qwq."'</td>";
	echo "<td>'".$wa."'</td>";
	echo "<td>'".$wd."'</td>";
	echo "<td>'".$wb."'</td>";
	echo "<td>'".$wc."'</td>";
	echo "<td>'".$vvv."'</td>";
	echo "</tr>";
	
$i++;
} ?>

</table>

