<?php
              if (count($viewNojo)){
                $i = 1;             

                  foreach($viewNojo as $key => $list){
                    
                    echo "<tr>";
                    echo "<td class=''>". $i ."</td>";
                    echo "<td class=''>". $list['nojo'] ."</td>";
                    echo "<td class=''>". $list['approval'] ."</td>";
                    $i++;
                  }
                }   
              else{
    echo "<tr align=center><td colspan=8>No data to display</td></tr>";
  }               
?>


