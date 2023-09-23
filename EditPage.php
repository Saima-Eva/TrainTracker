<?php
session_start();
if($_SESSION["email"]!=1){
?>




<!DOCTYPE html>
<html>

<head>
<script>
    function validate(){
	flag=true;
        //alert(document.update.firstname.value.length);
	if(document.update.fileToUpload.value.length==0 || document.update.firstname.value.length==0 || document.update.lastname.value.length==0){
		flag=false;
	}
        else document.update.submit();
	return flag;
}
</script>
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
  <span style="float:right;">
  <?php
	echo date("l").",";
	echo date("d-m-y");
  ?></span>
  </h2>
  
</div>

  
<div class="EditView">
			<form name="update" action="upload2.php" method="post" enctype="multipart/form-data" >
			<span style="float:right;">
			<a href="ChangePassword.php"> <button class="w3-btn w3-orange w3-xlarge" type="button"  >Change Password <i class="w3-margin-left fa fa-edit"></i> </button></a><br>
			</span>
			<h2>
			<img src="<?php echo $pic[0]->ulr; ?>" align="Left" alt="Man" style="width:80px;height:100px;"></h2>
			<br>
			<!--<button class="w3-btn w3-blue w3-xlarge" type="button" >Upload Profile Picture <i class="w3-margin-left fa fa-upload"></i></button>-->
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br>
			<br>
			
			
		<table>	
		<tr>
		<td>First Name : </td>
		<td><input type="text" name="firstname" id="fname" value="<?php echo $json[0]->firstname; ?>" ></td>
	    </tr>
	    <tr>
		<td>Last Name : </td>
		<td><input type="text" name="lastname" id="lname" value="<?php echo $json[0]->lastname; ?>" ></td>
	    </tr>
        </table>		
		<input class="w3-btn w3-orange w3-xlarge" type="button" onclick="validate()" value="update" />
            </form>
</div>

 
</body>
</html>


<?php
}else{
    echo 'you must log in first';
    header('location:index.php');
}
?>
