<?php
              if (count($viewlog)){
                $i = 1;             
                $path = "http://joborder.ish.co.id/newbak/";
                  foreach($viewlog as $list){    
                    if($list->attcmt <> ''){
                      $att ="<a href='$path".$list->attcmt." ' target='_blank'><i class='fa fa-cloud-download '></i> Download</a>" ;
                    }else{
                      $att = '';
                    }
                    if($list->namaUpd <> ''){
                      $upd = $list->namaUpd;
                    }else{
                      $upd = $list->upd;
                    }
                      echo "<tr>";
                      echo "<td class=''>". $i ."</td>";
                      echo "<td class=''>". $list->update ."</td>";
                      echo "<td class=''>". $att ."</td>";
                      echo "<td class=''>". $list->status ."</td>";
                      echo "<td class=''>". $upd ."</td>";
                      echo "<td class=''>". $list->tgl_update .' '.$list->time ."</td>";
                    $i++;
                  }
                }   
              else{
    echo "<tr align=center><td colspan=8>No data to display</td></tr>";
  }               
?>


