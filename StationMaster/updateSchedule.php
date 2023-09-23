<?php
session_start();
if(!empty($_GET['train'])&&isset($_GET['train'])&&!empty($_GET['status'])&&isset($_GET['status']))
{
    require "../database.php";
    $tr=json_decode(read('SELECT * FROM `trainupdate` where train_name="'.$_GET['train'].'";'));
    print_r($tr);
    if(sizeof($tr)==0){
    $sql='INSERT INTO `trainupdate`(`train_name`, `train_status`, `station_name`, `t_time`) VALUES ("'.$_GET['train'].'","'.$_GET['status'].'","'.$_SESSION['station'].'","'.date("H:i:s").'");';
    echo $sql.'<br>';
    if(insert_uodate_delete_quiry($sql)){
    echo 'train schedule updated'; ?>
    <a href="stationMasterUpdateTrainSchedule.php">go back</a> <?php
    }
    }else
    {
    $sql='UPDATE `trainupdate` SET `train_status`="'.$_GET['status'].'",`station_name`="'.$_SESSION['station'].'",`t_time`="'.date("H:i:s").'" where train_name="'.$_GET['train'].'";';
    if(insert_uodate_delete_quiry($sql)){
    echo 'train schedule updated'; ?>
    <a href="stationMasterUpdateTrainSchedule.php">go back</a> <?php
    }
    }
}else
    header('location:stationMasterUpdateTrainSchedule.php');
?>