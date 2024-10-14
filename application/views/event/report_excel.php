
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<table border='1' width="70%">	 
	<tr>
		<td style="border-bottom:1px #000000 solid;" colspan="10" height="30" align="center"><font size="3"><b>REKAP DATA EVENT</b></font></td>
	</tr>
	<TR>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Type Event</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">No Event</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Nama Event</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Start Periode</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">End Periode</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Customer</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Jenis Event</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Creator</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Date Create/Approval</font></TH>
		<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Status</font></TH>
	</TR>
				
			
<?php 	
$i = 1;
foreach($allrep as $list){
	if($list['flag_pengadaan']=='1'){
		$fp = 'Pengadaan';	
	} else {
		$fp = 'Insentive';	
	}
	
	if($list['lup_app']==''){
		$tgl = $list['lup'];
	} else {
		$tgl = $list['lup_app'];
	}
	
	if($list['flag']=='1'){
		$stat = 'Waiting Approval PPC';
	}
	else if($list['flag']=='2'){
		$stat = 'Done PPC';
	}
	else if($list['flag']=='3'){
		$stat = 'Done PM';
	}
	else if($list['flag']=='9'){
		$stat = 'Rejected';
	} else {
		$stat = 'Waiting Approval Atasan';
	}
	
	echo "<tr>";
	echo "<td>". $fp ."</td>";
	echo "<td>". $list['no_event'] ."</td>";
	echo "<td>". $list['nama_event'] ."</td>";
	echo "<td>". $list['startperiode'] ."</td>";
	echo "<td>". $list['endperiode'] ."</td>";
	echo "<td>". $list['customer'] ."</td>";
	echo "<td>". $list['jenisevent'] ."</td>";
	echo "<td>". $list['nama'] ."</td>";
	echo "<td>". $tgl ."</td>";
	echo "<td>". $stat ."</td>";
	echo "</tr>";
	$i++;

} ?>

</table>

