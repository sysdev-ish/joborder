<?php
							/*	if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
												$btn = 'OnProgress';
												$stat = 'btn-warning';
											} elseif ($list['skema'] == 1) {
												$btn = 'Done';
												$stat = 'btn-success';
											} 
										echo "<tr>";
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='project'>". $list['project'] ."</td>";
										echo "<td class='tanggal'>". $list['tanggal'] ."</td>";
										echo "<td class='jabatan'>". $list['jabatan'] ."</td>";
										echo "<td class='gender'>". $list['gender'] ."</td>";
										echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td class='bekerja'>". $list['bekerja'] ."</td>";
										echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='atasan'>". $list['atasan'] ."</td>";
										echo "<td class='lokasi'>". $list['lokasi'] ."</td>";	
										echo "<td class='upd'>". $list['upd'] ."</td>";	
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";										
										echo "
											<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>DETAIL</button>
										";
										if ($level == 'Recruter'){
											echo "
											<button type='submit' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>
											";
										} else if ($level == 'AdminSAP'){?>
											<button type='button' class='btn btn-primary btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button>
											<?php 
											echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btndone' id='btnkomentar1' data-toggle='modal' data-target='#PModal'>Done</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
											
										}
										echo "</td>";											
										echo "</tr>";
									}
								}	*/							
								?>
								
<?php
							/*	if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
												$btn = 'OnProgress';
												$stat = 'btn-warning';
											} elseif ($list['skema'] == 1) {
												$btn = 'Done';
												$stat = 'btn-success';
											} 
										echo "<tr>";
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='project'>". $list['project'] ."</td>";
										echo "<td class='tanggal'>". $list['tanggal'] ."</td>";
										echo "<td class='jabatan'>". $list['jabatan'] ."</td>";
										echo "<td class='gender'>". $list['gender'] ."</td>";
										echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td class='bekerja'>". $list['bekerja'] ."</td>";
										echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='atasan'>". $list['atasan'] ."</td>";
										echo "<td class='lokasi'>". $list['lokasi'] ."</td>";	
										echo "<td class='upd'>". $list['level'] ."</td>";	
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";										
										echo "
											<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>DETAIL</button>
										";
										if ($level == 'Recruter'){
											echo "
											<button type='submit' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>
											";
										} else if ($level == 'AdminSAP'){?>
											<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
											<?php 
											echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btndone' id='btnkomentar1' data-toggle='modal' data-target='#PModal'>Done</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
											
										}
										echo "</td>";											
										echo "</tr>";
									}
								}	*/							
								?>
								
								
<?php
						/*		if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
												$btn = 'OnProgress';
												$stat = 'btn-warning';
											} elseif ($list['skema'] == 1) {
												$btn = 'Done';
												$stat = 'btn-success';
											} 
										echo "<tr>";
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='project'>". $list['project'] ."</td>";
										echo "<td class='lokasi'>". $list['lokasi'] ."</td>";	
										echo "<td class='tanggal'>". $list['bekerja'] ."</td>";
										echo "<td class='jabatan'>". $list['jabatan'] . " ( ". $list['gender'] ." )</td>";
										echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td align='center' class='hr'>". $list['hr'] ."</td>";
										echo "<td align='center' class='jmluser'>". $list['jmluser'] ."</td>";
										echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='notes'>". $list['note'] ."</td>";	
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";		
										echo "<td class='gender' style='display:none'>". $list['gender'] ."</td>";										
										echo "
											<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>DETAIL</button>
										";
										if ($level == '3'){
											echo "
											<button type='submit' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>
											";
										} else if ($level == '5'){?>
											<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
											<?php 
											echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btndone' id='btnkomentar1' data-toggle='modal' data-target='#PModal'>Done</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
											
										}
										echo "</td>";											
										echo "</tr>";
									}
								}	
								*/							
								?>
								
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
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='project'>". $list['project'] ."</td>";
										if(!filter_var($list['lokasi'], FILTER_VALIDATE_INT)) 
										{    
										 	echo "<td class='lokasi'>". $list['lokasi'] ."</td>"; 
										} 
										else 
										{    
											echo "<td class='lokasi'>". $list['city_name'] ."</td>";   
										}    
										echo "<td class='tanggal'>". $list['bekerja'] ."</td>";
										if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
										{    
											echo "<td class='jabatan'>". $list['jabatan'] . " ( ". $list['gender'] ." )</td>";
										} 
										else 
										{    
											echo "<td class='jabatan'>". $list['name_job_function'] ." ( ". $list['gender'] ." )</td>";
										}   
										echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td align='center' class='hr'>". $list['hr'] ."</td>";
										echo "<td align='center' class='jmluser'>". $list['jmluser'] ."</td>";
										echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='notes'>". $list['note'] ."</td>";	
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";		
										echo "<td class='gender' style='display:none'>". $list['gender'] ."</td>";										
										echo "
											<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>DETAIL</button>
										";
										if ($level == '3'){
											echo "
											<button type='submit' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>
											";
										} else if ($level == '5'){?>
											<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
											<?php 
											echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
											//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btndone' id='btnkomentar1' data-toggle='modal' data-target='#PModal'>Done</button>";
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
											
										}
										echo "</td>";											
										echo "</tr>";
									}
								}								
								?>