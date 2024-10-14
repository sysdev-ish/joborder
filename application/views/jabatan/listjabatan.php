<?php
							if (count($ljabatan)){
								foreach($ljabatan as $key => $list){
                                    
                                         $listjob = $list['name_job_function'] ;
                                    $listjob1 = $list['name_job_function_category'] ;
									echo "<tr>";
									echo "<td class='tjabatan'>". $list['name_job_function'] ."</td>";
									echo "<td class='tstatus'>". $list['name_job_function_category'] ."</td>";
								echo "<td class='tkategoris' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['no'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
									echo "</tr>";
								}
							}else{
								echo "<tr align=center><td colspan=3>No data to display</td></tr>";
							}
						?>