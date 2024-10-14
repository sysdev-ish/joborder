<?php
							if (count($lrincian)){
								foreach($lrincian as $key => $list){
									echo "<tr>";
									echo "<td class='tjabatan'>". $list['jabatan'] ."</td>";
									echo "<td class='tkelamin'>". $list['gender'] ."</td>";
									echo "<td class='tpendidikan'>". $list['pendidikan'] ."</td>";
									echo "<td class='tlokasi'>". $list['lokasi'] ."</td>";
									echo "<td class='twaktu'>". $list['waktu'] ."</td>";
									echo "<td class='tatasan'>". $list['atasan'] ."</td>";
									echo "<td class='tkontrak'>". $list['kontrak'] ."</td>";
									echo "<td class='tjumlah'>". $list['jumlah'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tnojo' style='display:none'>". $list['nojo'] ."</td>";
									
									echo "<td><a class='button' id='".$list[id]."' href='#'>X</a></td>";
									 echo "</tr>";
								}
							}else{
								echo "<tr align=center><td colspan=3>No data to display</td></tr>";
							}
						?>


