<?php
							if (count($ljabatan)){
								foreach($ljabatan as $key => $list){
									echo "<tr>";
									echo "<td class='tjabatan'>". $list['jabatan'] ."</td>";
									echo "<td class='tstatus'>". $list['status'] ."</td>";
									echo "<td class='tjawab'>". $list['tggjawab'] ."</td>";
									echo "<td class='tlogin'>". $list['login'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
									echo "</tr>";
								}
							}else{
								echo "<tr align=center><td colspan=3>No data to display</td></tr>";
							}
						?>