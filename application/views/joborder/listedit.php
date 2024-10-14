<?php
	foreach($ccc as $key => $list){ 
		echo "<tr>";
		echo "<td class='jbz'>". $list['jabatan_txt'] ."</td>";
		echo "<td class='arz'>". $list['area_txt'] ."</td>";
		echo "<td class='kpz'>". $list['komponen_txt'] ."</td>";
		echo "<td class='vlz'>". $list['value'] ."</td>";
		echo "<td class='ktz'>". $list['keterangan'] ."</td>";
		echo "<td class='psz'>". $list['persentase'] ."</td>";
		/*
		echo "<td>". $list['perusahaan'] ."</td>";
		echo "<td>". $list['karyawan'] ."</td>";
		echo "<td>". $list['jkk'] ."</td>";
		echo "<td>". $list['jkm'] ."</td>";
		echo "<td>". $list['jht_per'] ."</td>";
		echo "<td>". $list['jht_kar'] ."</td>"; */
		?>
		<!--<td><a href="<?php  //echo base_url()?>index.php/home/rinc_hapus/<?php //echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
		<td><button title='Delete Komponen' type='button' class='btn btn-box-tool' onclick='delete_Row2(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button>
		<?php //if( ($list['komponen']!=4065) && ($list['komponen']!=4066) && ($list['komponen']!=4058) && ($list['komponen']!=8002) ){ ?>
		<button type='button' class='btn btn-box-tool btnedit_komp' id='btnedit_komp' data-toggle='modal' data-target='#OPmyModal'><i class="glyphicon glyphicon-pencil"></i></button>
		<?php //} ?>
		</td>
		<?php
		echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
		echo "<td class='cnoj' style='display:none'>". $list['nojo'] ."</td>";
		echo "<td class='ckompy' style='display:none'>". $list['komponen'] ."</td>";
		echo "</tr>";
	}
?>