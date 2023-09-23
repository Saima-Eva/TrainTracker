<?php
$str="";
for($i=0;$i<9999999;$i++){
	$str.="z";
}

//read from file
/*$f=fopen("data.txt","r") or die("can't open");
$a=0;
while(!feof($f)){
	$line=fgets($f);
	$ar=explode(" ",$line);
	if($ar[0]==$_REQUEST["email"]){
		$a=1;
		}
	}
if($a==1) echo "email used";
else echo "email available";*/

//read from database

function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","train_tracker");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

$jsonData=getJSONFromDB("select * from regnlog;");
//echo $jsonData."<br>";
$q=0;
$json=json_decode($jsonData);
for($i=0;$i<sizeof($json);$i++){
	//echo $json[$i]->firstname."<br>";
	if($_REQUEST["email"]==$json[$i]->email)
		$q=1;
}
if($q==1) echo "email used";
else echo "email available";
?>