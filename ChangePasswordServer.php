<?php
session_start();
$email=$_SESSION["email"];
require "database.php";

$data=json_decode(read("select * from regnlog where email = '".$_SESSION["email"]."'; "));
//print_r($data);
if($data[0]->password==md5($_GET["OldPassword"]))
{
	//echo $data[0]->password;
	$string="UPDATE `regnlog` SET `password`='".md5($_GET["RepeatPassword"])."' WHERE email = '".$_SESSION["email"]."';";
	//echo $string;
	if(insert_uodate_delete_quiry($string)==true){?>
	<p>password changed</p><a href="viewProfile.php" >view profile</a>
<?php	}
}


?>