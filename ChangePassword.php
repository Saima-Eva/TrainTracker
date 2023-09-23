<?php
session_start();
if($_SESSION["email"]!=1){
?>





<!DOCTYPE html>
<html>
<head>
<title>Train Tracker</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
            
            input[type=text],input[type=password]
			{
                padding: 10px 60px;
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


<script type="text/javascript">
   
		
		function valPass(elm)
		{
            var p = document.ChangePassword.NewPassword.value;
            var cp = document.ChangePassword.RepeatPassword.value;
            var msg = document.getElementById("errormsg");
            if (p == cp)
			{
                msg.innerHTML = "Password matched";
                msg.style.color = "green";
                return true;
            }
			else
			{
                msg.innerHTML = "Password didn't match";
                msg.style.color = "red";
                return false;
            }
        }
	document.getElementById("demo").innerHTML = Date();
	</script>
	
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

<div style="background-color:black;color:white;padding:3px;">
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

<div class="logIn">
            <form style="text-align: center" name="ChangePassword" action="ChangePasswordServer.php" method="get">
			
		<table align="center">	
		<tr>
		<td>OLd Password: </td>
		<td><input type="Password" name="OldPassword" id="OP" placeholder="Enter Old Password" required></td>
	    </tr>
		<td>New Password: </td>
		<td><input type="password" name="NewPassword" id="NP" onkeyup="valPass(this)" required placeholder="Enter New Password" ></td>
	    </tr>
	    <tr>
		<td>Repeat Password: </td>
		<td> <input type="password" name="RepeatPassword" id="RP" onkeyup="valPass(this)" required placeholder="Repeat Password" ></tr>
		<td><span id="errormsg"></span></td></tr>
		<td> <button type="submit" >Change Password</button></td>
        </table>		
		
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
