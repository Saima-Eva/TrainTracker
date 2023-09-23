<?php
session_start();

require "database.php";
$trainSchedule=json_decode(read("select * from trainschedule where train_name='".$_GET['train']."';"));
$trainLocation=json_decode(read("select * from trainupdate where train_name='".$_GET['train']."';"));

if(!empty($trainSchedule)){ ?>
<h3>Train Schedule</h3>
<table>
    <tr>
        <th>Train No</th>
        <th>Train Name</th>
        <th>off-day</th>
        <th>starting station</th>
        <th>departure time</th>
        <th>arrival station</th>
        <th>arrival time</th>
    </tr><?php
    for($i=0;$i<sizeof($trainSchedule);$i++){?>
    <tr>
        <td><?php echo $trainSchedule[$i]->train_no;?></td>
        <td><?php echo $trainSchedule[$i]->train_name;?></td>
        <td><?php echo $trainSchedule[$i]->off_day;?></td>
        <td><?php echo $trainSchedule[$i]->starting_station;?></td>
        <td><?php echo $trainSchedule[$i]->departure_time;?></td>
        <td><?php echo $trainSchedule[$i]->arrival_station;?></td>
        <td><?php echo $trainSchedule[$i]->arrival_time;?></td>
    </tr> <?php } ?>
</table>

<?php
}
     if(!empty($trainLocation)){ ?>
<h3>Train Location</h3>
<table>
        <tr>
            <th>train name</th>
            <th>Status </th>
            <th>Station</th>
            <th>time</th>
        </tr><?php
        for($i=0;$i<sizeof($trainLocation);$i++){?>
        <tr>
            <td><?php echo $trainLocation[$i]->train_name ?></td>
            <td><?php echo $trainLocation[$i]->train_status ?></td>
            <td><?php echo $trainLocation[$i]->station_name ?></td>
            <td><?php echo $trainLocation[$i]->t_time ?></td>
        </tr>
 </table>
   <?php }
}
?>
