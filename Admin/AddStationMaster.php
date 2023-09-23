<?php

require "../database.php";

	$string="INSERT INTO `stationmaster`(`name`, `password`, `train_station`) VALUES ('".$_GET["StationMasterID"]."','".$_GET["cpassword"]."','".$_GET["StationName"]."');";
	echo $string;
	if(insert_uodate_delete_quiry($string)==true)
	{?>
		<p>StationMaster has been added</p><a href="adminpage.php" >view profile</a>
<?php
	}

?>