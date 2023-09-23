<?php
session_start();
if($_SESSION["LV"]==1)
{
//echo $_SESSION['name'];

require "../database.php";
$data=json_decode(read('select * from stationmaster where name="'.$_SESSION['name'].'";')); 
$train=json_decode(read('SELECT * FROM `train` ORDER BY train_name ASC;')); 
echo $data[0]->train_station;
$_SESSION['station']=$data[0]->train_station;
//echo $_SESSION['station'];
echo date("H:i:s");
?>

<form name="update" action="updateSchedule.php" method="get">
    <select name="train">
        <option value="" selected>Select train</option>
        <?php for($i=0;$i<sizeof($train);$i++){ ?>
        <option value="<?php echo $train[$i]->train_name; ?>"><?php echo $train[$i]->train_name; ?></option>
<?php } ?>
    </select>
    <select name="status">
        <option value="" selected>Select status</option>
        <option value="arrived">arrived</option>
        <option value="left">left</option>
    </select>
    <input type="submit" name="updateSchedule" value="update">
	<a href="Logout.php"><input type="button" name="Logout" value="Logout"></a>
</form>
<?php $tr=json_decode(read('SELECT * FROM `trainupdate` ORDER BY t_time DESC;')); 
if(sizeof($tr)!=0){
?>
<table>
    <tr>
        <th>train name</th>
        <th>Status </th>
        <th>Station</th>
        <th>time</th>
    </tr>
    <?php
    for($i=0;$i<sizeof($tr);$i++){ 
    ?>
    <tr>
        <td><?php echo $tr[$i]->train_name ?></td>
        <td><?php echo $tr[$i]->train_status ?></td>
        <td><?php echo $tr[$i]->station_name ?></td>
        <td><?php echo $tr[$i]->t_time ?></td>
    </tr>
    <?php 
    } 
    ?>
</table>
<?php
}else
{
    echo 'you must log in first';
    header('location:stationMasterSignIn.html');
}

?>
<?php } ?>