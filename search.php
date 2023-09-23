<?php 
if(!empty($_GET['value'])){
require 'database.php';
$sql="select train_name from train where train_name like '%".$_GET['value']."%'";
//echo $sql;
$data=json_decode(read($sql));
if(sizeof($data)>0){
    for($i=0;$i<sizeof($data);$i++){ 
        ?>
<a href="searchResult.php?train=<?php echo $data[$i]->train_name ?>"><?php echo $data[$i]->train_name ?></a><br> <?php

       // echo '<a href="searchResult.php?res="'.$data[$i]->train_name.'>''<br>';
        }
    }
}
?>