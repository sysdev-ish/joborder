<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($layanan == '1'){
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												$btn = 'Approved';
												$stat = 'btn-success';
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										} else {
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												$btn = 'Approved';
												$stat = 'btn-success';
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										}
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>
										<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button></td>";
										echo "</tr>";
									}
								}								
								?>