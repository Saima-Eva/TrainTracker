<?php
session_start();

if(!empty($_POST['user'])&&isset($_POST['user'])&&!empty($_POST['password'])&&isset($_POST['password']))
	{
    require '../database.php';
    $data=json_decode(read('select * from stationmaster where name="'.$_POST['user'].'";'));
    
    if(!empty($data))
		{
			if($data[0]->name==$_POST['user']&&$data[0]->password==$_POST['password'])
			{
				$_SESSION["LV"]=1;
				$_SESSION['name']=$data[0]->name;
				header("location:stationMasterUpdateTrainSchedule.php");
        
			}
			else
			{
				$_SESSION["LV"]=0;
				echo "user name or password incorrect";		
			}
		}
	else
		{
			echo "user name and password cannot be empty";
			//return false;
		}
	}
else
	{
		echo "user name and password cannot be empty";
	}
?>