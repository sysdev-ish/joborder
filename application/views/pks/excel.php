<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=PKS_Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
    <tr>
    
      <th bgcolor='#d9d9d9'>NO</th>               
      <th bgcolor='#d9d9d9'>NO BAK</th>
      <th bgcolor='#d9d9d9'>UPDATE</th>
      <th bgcolor='#d9d9d9'>ATTACHMENT</th>
      <th bgcolor='#d9d9d9'>STATUS</th>
      <th bgcolor='#d9d9d9'>PROGRESS</th>
      <th bgcolor='#d9d9d9'>UPD</th>
      <th bgcolor='#d9d9d9'>TIME</th>
    </tr>
  <!-- <tbody> -->
      <?php
      $session_data = $this->session->userdata('logged_in');
      $username = $session_data['userid'];
      $level = $session_data['userlevel'];
      $path = "http://joborder.ish.co.id/newbak/";

    if (count($excelReport)){
      $i = 1;
          foreach($excelReport as $list){
            if($list->namaUpd <> ''){
              $upd = $list->namaUpd;
            }else{
              $upd = $list->upd;
            }
            if($list->attcmt <> ''){
              $att = $path . $list->attcmt;
            }else{
              $att = '';
            }
            echo "<tr>";
            echo "<td class=''>". $i ."</td>";
            echo "<td class=''>". $list->no_bak ."</td>";
            echo "<td class=''>". $list->update ."</td>";
            echo "<td class=''><a href='".$att."'>attcmt</a></td>";
            echo "<td class=''>". $list->status ."</td>";
            echo "<td class=''>". $list->item_name ."</td>";
            echo "<td class=''>". $upd ."</td>";
            echo "<td class=''>". $list->tgl_update .' '.$list->time ."</td>";
            echo "</tr>";
            $i++;
        }
    } else {
      echo "<tr align=center><td colspan=8>No data to display</td></tr>";
    }               
    ?>

  <!-- </tbody> -->
</table>