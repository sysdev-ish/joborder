<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										echo "<tr>";
										echo "<td>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['lokasi'] ."</td>";
										echo "<td>". $list['tanggal'] ."</td>";
										echo "<td>". $list['latihan'] ."</td>";
										echo "<td>". $list['jumlah'] ."</td>";
										echo "<td>". $list['rekrut'] ."</td>";										
										?>
										<?php
										if ($list['jumlah'] > $list['rekrut']) 
												 {
													if ($list['selisih']==0){
													?>
													<td><?php echo "Last Day, GoGoGo!!" ?></td>
													<?php } else if ($list['selisih'] < 0){
													?>
													<td><?php echo "Overtime" ?></td>
													<?php } else if ($list['selisih'] > 0){
													?>
													<td><?php echo $list['selisih'] . " days left" ?></td>
													<?php } ?>
									       <?php } 
										 else if ($list['jumlah'] = $list['rekrut']) 
												 { ?>
													<td><?php echo "Done" ?></td>
												<?php }	?>
										   
									    <?php 
										echo "<td>". $list['note'] ."</td>";
										echo "</tr>";
									}
								}								
								?>