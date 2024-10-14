<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										echo "<tr>";
										echo "<td class='id'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='project'>". $list['project'] ."</td>";
										echo "<td class='tanggal'>". $list['tanggal'] ."</td>";
										echo "<td class='jabatan'>". $list['jabatan'] ."</td>";
										echo "<td class='gender'>". $list['gender'] ."</td>";
										echo "<td class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td class='bekerja'>". $list['bekerja'] ."</td>";
										echo "<td class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='atasan'>". $list['atasan'] ."</td>";
										echo "<td class='lokasi'>". $list['lokasi'] ."</td>";										
										echo "
											<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>DETAIL</button>
										";
										if ($level == 'Recruter'){
											echo "
											<button type='submit' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>
											";
										}
										echo "</td>";
										echo "</tr>";
									}
								}								
								?>