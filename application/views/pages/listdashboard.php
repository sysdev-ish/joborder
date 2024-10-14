<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										echo "<tr>";
										echo "<td>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['lokasi'] ."</td>";
										echo "<td>". $list['tanggal'] ."</td>";
										echo "<td>". $list['latihan'] ."</td>";
										echo "<td align='center'>". $list['jumlah'] ."</td>";
										echo "<td align='center'>". $list['hr'] ."</td>";	
										echo "<td align='center'>". $list['user'] ."</td>";		
										echo "<td align='center'>". $list['rekrut'] ."</td>";											
										?>
										<?php
										if ($list['jumlah'] > $list['rekrut']) 
												 {
													if ($list['selisih']==0){
													?>
													<td><center><button type="button" class="btn-warning"><font color="#000000"><?php echo "Last Day, GoGoGo!!" ?></font></button></center></td>
													<?php } else if ($list['selisih'] < 0){
													?>
													<td><center><button type="button" class="btn-danger"><font color="#000000"><?php echo "Overdue" ?></font></button></center></td>
													<?php } else if ($list['selisih'] > 0){
													?>
													<td><center><button type="button" class="btn-warning"><font color="#000000"><?php echo $list['selisih'] . " days left" ?></font></button></center></td>
													<?php } ?>
									       <?php } 
										 else if ($list['jumlah'] = $list['rekrut']) 
												 { ?>
													<td><center><button type="button" class="btn-success"><font color="#000000"><?php echo "Done" ?></font></button></center></td>
												<?php }	?>
										   
									    <?php 
										echo "<td>". $list['note'] ."</td>";
										echo "</tr>";
									}
								}								
								?>