<?php
$data_ar = ["Interview","Psikotest","User Interview","Training Soft","Training Hard","Tendem Pasif","Tendem Aktif"];

$data_jml = ["".$rincian->jml_interview."","".$rincian->jml_psikotest."","".$rincian->jml_userinterview."","".$rincian->jml_tsoft."","".$rincian->jml_thard."","".$rincian->jml_tpasif."","".$rincian->jml_taktif.""];

$data_lls = ["".$rincian->jmlpass_interview."","".$rincian->jmlpass_psikotest."","".$rincian->jmlpass_userinterview."","".$rincian->jmlpass_tsoft."","".$rincian->jmlpass_thard."","".$rincian->jmlpass_tpasif."","".$rincian->jmlpass_taktif.""];

for($i=0;$i<count($data_ar);$i++){
	echo "<tr>";
	echo "<td>". $data_ar[$i] ."</td>"; 
	if($data_jml[$i]==''){echo "<td>0</td>";}else{echo "<td>". $data_jml[$i] ."</td>";}
	if($data_lls[$i]==''){echo "<td>0</td>";}else{echo "<td>". $data_lls[$i] ."</td>";}
	echo "</tr>";
}

echo "<tr>";
echo "<td colspan='2'>Lulus Semua Tahapan</td>";
if($rincian->jml_pass=='0' || $rincian->jml_pass==''){echo "<td>0</td>";}else{echo "<td>". $rincian->jml_pass ."</td>";}
echo "</tr>";

echo "<tr>";
echo "<td colspan='2'>Hiring</td>";
if($rincian->perner==''){echo "<td>-</td>";}else{echo "<td><textarea id='aaa' cols='70'>". $rincian->perner ."</textarea></td>";}
echo "</tr>";



		