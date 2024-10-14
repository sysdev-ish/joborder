<?php
							if (count($ljobcategory)){
								foreach($ljobcategory as $key => $list){
									echo "<tr>";
									echo "<td class='tid'>". $list['id'] ."</td>";
									echo "<td class='tjobcategory'>". $list['name_job_function_category'] ."</td>";
//									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
									echo "</tr>";
								}
							}else{
								echo "<tr align=center><td colspan=3>No data to display</td></tr>";
							}
						?>