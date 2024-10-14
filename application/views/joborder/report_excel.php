
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");

//echo $html;
?>
<table border='1' width="70%">	 
				<tr>
					<td style="border-bottom:1px #000000 solid;" colspan="26" height="30" align="center"><font size="3"><b>REKAP DATA</b></font></td>
				</tr>
				<TR>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">Kode</font></TH>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">Kode_rincian_rekrut</font></TH>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">Nama PM</font></TH>
					<TH  style="background-color:#CC0000; height:20"><font color="#FFFFFF">Nama Customer</font></TH>
					<TH style="background-color:#CC0000; height:20"><font color="#FFFFFF">Nama Project</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">NOJO</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">No BAK</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Jenis JO</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Type JO</font></TH>
					<TH style="background-color:#CC0000; height:20; background-color:#CC0000"><font color="#FFFFFF">Type Captive</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Lokasi</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Nama Creater</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Waktu Input JO</font></TH>
					<!--<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Tanggal Edit JO</font></TH>-->
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Tgl Bekerja</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Lama Project</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Permintaan OS</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Jml Stop</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Jumlah Real</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Jumlah Candidate</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Realisasi Pemenuhan OS</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">ZParameter</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Status JO</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Date Approved</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Jabatan Permintaan/ Perner Replace</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Status Rekrut</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">Alasan Stop/Cancel JO Di Gojobs</font></TH>
					<TH style="background-color:#CC0000; text-align:center; height:20"><font color="#FFFFFF">UAK</font></TH>
				</TR>
				
			
<?php 	
$i = 1;
foreach($allrep as $list){
	echo "<tr>";
	echo "<td class='zid'>". $list['id'] ."</td>";
	echo "<td class='zid_hire'>". $list['id_hire'] ."</td>";
	echo "<td class='npm'>". $list['nuserpm'] ."</td>";
	echo "<td class='san'>". $list['nama_cust'] ."</td>";
	if( ($list['n_project']=='') || ($list['n_project']=='Pilih') ){
		echo "<td class='span'>". $list['project'] ."</td>";
	} else {
		echo "<td class='span'>". $list['n_project'] ."</td>";
	}

	echo "<td class='sperner'>". $list['nojo'] ."</td>";
	echo "<td class='sperner'>". $list['no_bak'] ."</td>";
	if($list['type_jo']=='1'){
		if($list['type_new']=='1'){
			echo "<td class='span'>New Project</td>";
		} else {
			echo "<td class='span'>New Pengembangan</td>";
		}
	} else if($list['type_jo']=='2') {
		echo "<td class='span'>Replacement</td>";
	} else {
		echo "<td class='span'>Rotasi-Mutasi</td>";
	}
	
	if($list['type_jo']=='1'){
		if($list['atrek']!='' OR $list['atrek']!=null){
			if($list['atrek']=='1'){
				echo "<td class='span'>No Rekrutment</td>";
			} else if($list['atrek']=='2') {
				echo "<td class='span'>Rekrutment</td>";
			} else if($list['atrek']=='3') {
				echo "<td class='span'>No Rekrutment Existing</td>";
			}
		} else {
			if($list['new_rekrut']=='1'){
				echo "<td class='span'>No Rekrutment</td>";
			} else if($list['new_rekrut']=='2') {
				echo "<td class='span'>Rekrutment</td>";
			} else if($list['new_rekrut']=='3') {
				echo "<td class='span'>No Rekrutment Existing</td>";
			}
		}
		
	} else if($list['type_jo']=='2') {
		if($list['atrek']!='' OR $list['atrek']!=null){
			if($list['atrek']=='1'){
				echo "<td class='span'>No Rekrutment</td>";
			} else if($list['atrek']=='2') {
				echo "<td class='span'>Rekrutment</td>";
			} else if($list['atrek']=='3') {
				echo "<td class='span'>No Rekrutment Existing</td>";
			}
		} else {
			if($list['type_replace']=='1'){
				echo "<td class='span'>No Rekrutment</td>";
			} else if($list['type_replace']=='2') {
				echo "<td class='span'>Rekrutment</td>";
			} else if($list['type_replace']=='3') {
				echo "<td class='span'>No Rekrutment Existing</td>";
			}
		}
	} else {
		echo "<td class='span'>-</td>";
	}
	
	if($list['jenis_captive']=='1'){
		echo "<td class='span'>Captive</td>";
	} else if($list['jenis_captive']=='2') {
		echo "<td class='span'>Non Captive</td>";
	} else {
		echo "<td class='span'>-</td>";
	}
	
	echo "<td class='span'>". $list['city_name'] ."</td>";
	echo "<td class='span'>". $list['nama'] ."</td>";
	// if($list['lup_edit']!=null && $list['lup_edit']!=''){
		// if($list['lupapp_atasan']!=null && $list['lupapp_atasan']!=''){
			// $tglcr = $list['lupapp_atasan'];
		// } else {
			// $tglcr = $list['lup_edit'];
		// }
	// } else {
		// if($list['lupapp_atasan']!=null && $list['lupapp_atasan']!=''){
			// $tglcr = $list['lupapp_atasan'];
		// } else {
			// $tglcr = $list['tgl_create'];
		// }
	// }
	
	if($list['kunci_tgl_create']!='' && $list['kunci_tgl_create']!=null){
		$tglcreate  = strtotime($list['kunci_tgl_create']);
		$appatas    = strtotime($list['lupapp_atasan']);
		if($tglcreate>$appatas){
			$tglcr = $list['kunci_tgl_create'];
		} else {
			$tglcr = $list['lupapp_atasan'];
		}
		// $tglcr = $list['kunci_tgl_create'];
	} else {
		if($list['alup_edit']!='' && $list['alup_edit']!=null){
			$appatas  = strtotime($list['lupapp_atasan']);
			$dateedit = strtotime($list['alup_edit']);
			if($dateedit>$appatas){
				$tglcr = $list['alup_edit'];
			} else {
				$tglcr = $list['lupapp_atasan'];
			}
			// $tglcr = $list['alup_edit'];
			$tg = 'AA';
		} else {
			if($list['lup_newrej']!=null && $list['lup_newrej']!=''){
				$tglcr = $list['lup_newrej'];
				$tg = 'BB';
			} else {
				if($list['lup_edit']!=null && $list['lup_edit']!=''){
					$appatas  = strtotime($list['lupapp_atasan']);
					$dateedit = strtotime($list['lup_edit']);
					if($list['lupapp_atasan']!=null && $list['lupapp_atasan']!=''){
						if($dateedit>$appatas){
							$tglcr = $list['lup_edit'];
							$tg = 'CC';
						} else {
							$tglcr = $list['lupapp_atasan'];
							$tg = 'DD';
						}
					} else {
						$tglcr = $list['lup_edit'];
						$tg = 'EE';
					}
				} else {
					if($list['lupapp_atasan']!=null && $list['lupapp_atasan']!=''){
						$tglcr = $list['lupapp_atasan'];
						$tg = 'FF';
					} else {
						$tglcr = $list['tgl_create'];
						$tg = 'GG';
					}
				}
			}
		}
	}
	
	// echo "<td class='span'>". $list['tgl_create'] ."</td>";
	// echo "<td class='span'>". $tglcr ."-".$tg."</td>";
	echo "<td class='span'>". $tglcr ."</td>";
	//echo "<td class='span'>". $list['lup_edit'] ."</td>";
	if($list['bekerja_rincian']!='' OR $list['bekerja_rincian']!=null){
		echo "<td class='span'>". $list['bekerja_rincian'] ."</td>";
	} else {
		echo "<td class='span'>". $list['bekerja'] ."</td>";
	}
	
	echo "<td class='span'>". $list['lama'] ."</td>";
	
	echo "<td class='span'>". $list['jumlah'] ."</td>";
	if($list['jml_stop']==''){
		$fixstop = '-';
	} else {
		$fixstop = $list['jumlah']-$list['jml_stop'];
	}
	
	echo "<td class='span'>". $fixstop ."</td>";
	echo "<td class='span'>". $list['jml_stop'] ."</td>";
	// if($list['jml_stop']==''){
		// echo "<td class='span'>". $list['jumlah'] ."</td>";
	// } else {
		// echo "<td class='span'>". $list['jml_stop'] ."</td>";
	// }
	
	echo "<td class='span'>". $list['jml_candidate'] ."</td>";
	
	if($list['jml_hire']!='' or $list['jml_hire']!=null){
		if($list['type_jo']==1){
			if($list['type_rekrut']==3){
				echo "<td class='span'>".$list['status_pernernewjo']."</td>";
				// if($list['status_pernernewjo']==6){
					// echo "<td class='span'>1</td>";
				// } else {
					// echo "<td class='span'>0</td>";
				// }
			} else {
				echo "<td class='span'>". $list['jml_hire'] ."</td>";
			}
		} else {
			if($list['type_rekrut']==1){
				if($list['status_pernernewjo']==4){
					echo "<td class='span'>". $list['jml_hire'] ."</td>";
				} else {
					echo "<td class='span'>". $list['jml_hire'] ."</td>";
				}
			} else {
				echo "<td class='span'>". $list['jml_hire'] ."</td>";
			}
			// if($list['perner_ganti']!='' AND $list['perner_ganti']!='null' AND !is_null($list['perner_ganti'])){
				// echo "<td class='span'>1</td>";
			// } else {
				// echo "<td class='span'>". $list['jml_hire'] ."</td>";
			// }
		}
	} else {
		if($list['type_jo']==1){
			if($list['type_rekrut']==3){
				echo "<td class='span'>".$list['status_pernernewjo']."</td>";
				// if($list['status_pernernewjo']==6){
					// echo "<td class='span'>1</td>";
				// } else {
					// echo "<td class='span'>0</td>";
				// }
			} else {
				echo "<td class='span'>0</td>";
			}
		} else {
			if($list['type_rekrut']==1){
				if($list['status_pernernewjo']==4){
					echo "<td class='span'>0</td>";
				} else {
					echo "<td class='span'>0</td>";
				}
			} else {
				if($list['type_rekrut']==3){
					if($list['rfc_rotasi']==6){
						echo "<td class='span'>1</td>";
					} else {
						echo "<td class='span'>0</td>";
					}
				} else {
					echo "<td class='span'>0</td>";
				}
			}
			
			// if($list['perner_ganti']!='' AND $list['perner_ganti']!='null' AND !is_null($list['perner_ganti'])){
				// echo "<td class='span'>1</td>";
			// } else {
				// echo "<td class='span'>0</td>";
			// }
		}
	}
	
	
	// if($list['flag_cancel_sap']!='1'){
		// if($list['skema']=='1'){
			// echo "<td class='span'>Done PM</td>";
		// } else {
			// echo "<td class='span'>On Progress</td>";
		// }
	// } else {
		// echo "<td class='span'>Reject PM</td>";
	// }
	
	echo "<td class='span'>". $list['zparam'] ."</td>";
	
	if( ($list['skema']==1) || ($list['skemax']==1) )
	{
		echo "<td class='span'>Done PM</td>";
	}
	else 
	{
		if($list['flag_cancel']=='1') 
		{
			echo "<td class='span'>Reject PM</td>";
		}
		else if($list['flag_cancel_sap']=='1')
		{
			echo "<td class='span'>Reject PM</td>";
		}
		else 
		{
			echo "<td class='span'>On Progress</td>";
		}
	}
	
	 
	echo "<td class='span'>". $list['lup_skema'] ."</td>";
	if($list['jabatan']==''){
		echo "<td class='span'>". $list['jabatanx'] ."</td>";
	} else {
		echo "<td class='span'>". $list['jabatan'] ."</td>";
	}
	
	if($list['fstatus_rekrut']=='4'){
		echo "<td class='span'>Stop Fulfilled</td>";
	} else if($list['fstatus_rekrut']=='3'){
		echo "<td class='span'>Stop Not Fulfilled</td>";
	} else {
		echo "<td class='span'>-</td>";
	}
	
	if($list['remarks']==''){
		echo "<td class='span'>-</td>";
	}  else {
		echo "<td class='span'>". $list['remarks'] ."</td>";
	}
	
	echo "<td class='span'>". $list['uak'] ."</td>";
	echo "</tr>";
	$i++;

} ?>

</table>

