<?php
session_start();
if($_SESSION['email']!=1){ ?>
<!DOCTYPE html>
<html>







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
</style>
</head>


<?php
//session_start(); 

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


<body>

<div style="padding:1px;">
  
<h2><img src="img/radar-icon.png" height='50' width='50' align="middle" alt="Radar">   Train Tracker <a href="Logout.php">  <input type="image" src="img/Button-Log-Off-icon.png" alt="log-out" align="right" width="48" height="48"></a> </h2>
</div>

<div class="AB" style="background-color:black;color:white;padding:3px;">
  <h2> <img src="<?php echo $pic[0]->ulr; ?>" align="Left" alt="Man" style="width:42px;height:42px;"> <?php echo $json[0]->lastname; ?>
  <a href="MemberView.php"> 
     <button align="right" type="button" class="w3-btn w3-yellow w3-large" >
        Home <i class="w3-margin-left fa fa-view"></i>
    </button>
</a>
  <a href="EditPage.php"> <button align="right" type="button" class="w3-btn w3-yellow w3-large" >Edit Profile <i class="w3-margin-left fa fa-edit"></i></button></a>
  <span style="float:right;">
  <?php
	echo date("l").",";
	echo date("d-m-y");
  ?></span>
  </h2>
  
</div> 

<table>
	<tr>
		<td><img src="<?php echo $pic[0]->ulr; ?>" width="150px" height="150px"></td>
	</tr>
	<tr>
		<td>First Name : </td>
		<td><?php echo $json[0]->firstname; ?></td>
	</tr>
	<tr>
		<td>Last Name : </td>
		<td><?php echo $json[0]->lastname; ?></td>
	</tr>
	<tr>
		<td>Gender : </td>
		<td><?php echo $json[0]->gender; ?></td>
	</tr>
	<tr>
		<td>Email : </td>
		<td><?php echo $json[0]->email; ?></td>
	</tr>
</table>
  

</body>
</html> <?php
}else{
    echo 'you must log in first';
    header('location:index.php');
}
?>