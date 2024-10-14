<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} elseif ($list['skema'] == 1) {
											$btn = 'Done';
											$stat = 'btn-success';
										} 
									
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";?>
										<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
										 <?php 
										 echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
										 echo "</td>"; 
										 echo "</tr>";
									}
								}								
								?>