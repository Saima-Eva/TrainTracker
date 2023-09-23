<?php
require '../database.php';
$sql="INSERT INTO `trainschedule`(`train_no`, `train_name`, `off_day`, `starting_station`, `departure_time`, `arrival_station`, `arrival_time`) VALUES ('".$_POST['train_no']."','".$_POST['train_name']."','".$_POST['off_day']."','".$_POST['starting_station']."','".$_POST['departure_time']."','".$_POST['arrival_station']."','".$_POST['arrival_time']."')";

if(insert_uodate_delete_quiry($sql)){
    echo 'data inserted sucessfully';
    ?>
<a href="adminPage.php"><button>teturn</button></a>
<?php }
?>