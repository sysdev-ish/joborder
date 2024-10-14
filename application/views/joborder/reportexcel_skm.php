
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");

//echo $html;
?>
<table border='1' width="70%">	
				<tr>
					<td style="border-bottom:1px #000000 solid;" colspan="8" height="30" align="center"><font size="3"><b>REKAP DATA SKEMA</b></font></td>
				</tr>
				<TR>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">NOJO</font></TH>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">Area</font></TH>
					<TH style="background-color:#CC0000; height:20"><font color="#FFFFFF">PersonalArea</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Creater</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Tgl Create</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Updater PM</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Tgl Updater PM</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Status PM</font></TH>
				</TR>
				
			
<?php 	
$i = 1;
foreach($allrep as $list){
	echo "<tr>";
	echo "<td class='npm'>". $list['nojo'] ."</td>";
	echo "<td class='san'>". $list['n_area'] ."</td>";
	echo "<td class='san'>". $list['n_perar'] ."</td>";
	echo "<td class='san'>". $list['nama'] ."</td>";
	echo "<td class='san'>". $list['tgl_input'] ."</td>";
	echo "<td class='san'>". $list['npm'] ."</td>";
	echo "<td class='san'>". $list['lupapp_skema'] ."</td>";
	
	if($typesk=='SKEMA')
	{
		if($list['flag_cancel_sap']==1)
		{
			echo "<td class='span'>Canceled PM</td>";
		}
		else 
		{
			if ($list['flag_skema'] != 1){
				echo "<td class='span'>OnProgress</td>";
			} else {
				echo "<td class='span'>Done PM</td>";
			} 
		}
	}
	else 
	{
		if ($list['flag_approval'] == 1){
			echo "<td class='span'>OnProgress</td>";
		} elseif ($list['flag_approval'] == 5) {
			echo "<td class='span'>Done PM</td>";
		} elseif ($list['flag_approval'] == 2) {
			echo "<td class='span'>Canceled PM</td>";
		} 
	}	
	
	echo "</tr>";
	$i++;

} ?>

</table>

