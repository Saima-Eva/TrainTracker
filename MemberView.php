<?php
session_start();
if($_SESSION["email"]!=1){
?>





<!DOCTYPE html>
<html>

<?php
 

function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","train_tracker");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}


$jsonData=getJSONFromDB("select * from regnlog where email = '".$_SESSION["email"]."'; ");
//echo $jsonData."<br>";
$json=json_decode($jsonData);
$getpic=getJSONFromDB("select * from picture where email = '".$_SESSION["email"]."'; ");
$pic=json_decode($getpic);
?> 
<head>
<title>Train Tracker</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
            
            .adminView button
			{
                
				width:300px;
				height:60px;
            }
			
		body
			{
			background-image: url("TrainTrack2.jpg");
			background-color: #cccccc;
            
			background-repeat: no-repeat;
			background-position: center;
			}
    #livesearch{
        position: fixed;
        right: 150px;
    }
</style>
</head>
<script type="text/javascript">
        xmlhttp = new XMLHttpRequest();
        function showHint() {
            str=document.getElementById('search').value;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //alert(xmlhttp.responseText);

                    m=document.getElementById("livesearch");
                    m.innerHTML=xmlhttp.responseText;
                }
            };
            var url="search.php?value="+str;
            //alert(url);
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }
</script>

<body>

<div style="padding:1px;">
  
<h2><img src="img/radar-icon.png" height='50' width='50' align="middle" alt="Radar">   Train Tracker <a href="Logout.php">  <input type="image" src="img/Button-Log-Off-icon.png" alt="log-out" align="right" width="48" height="48"></a> </h2>

<div class="AB" style="background-color:black;color:white;padding:3px;">
  <h2> <img src="<?php echo $pic[0]->ulr; ?>" align="Left" alt="Man" style="width:42px;height:42px;"> 
  <span><?php echo $json[0]->lastname; ?></span> 
 <a href="MemberView.php"> 
     <button align="right" type="button" class="w3-btn w3-yellow w3-large" >
        Home <i class="w3-margin-left fa fa-view"></i>
    </button>
</a>
<a href="viewProfile.php"> 
     <button align="right" type="button" class="w3-btn w3-yellow w3-large" >
        View Profile <i class="w3-margin-left fa fa-view"></i>
    </button>
</a>
  <span style="float:right;width:20%;">
<!--
  <?php
	echo date("l").",";
	echo date("d-m-y");
  ?>
--><input type="text" name="search" id="search" onkeyup="showHint()">
      </span>
  </h2>
  
</div>


    <div id="livesearch">
        
    </div>
<div>
    <?php

require "database.php";
$trainSchedule=json_decode(read("select * from trainschedule ;"));

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
    </div>
 
</body>
</html>
<?php
}}else{
    echo 'you must log in first';
    header('location:index.php');
}
?>
