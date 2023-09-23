<?php
function read($sql){
	//echo $sql;
    $conn = mysqli_connect("localhost", "root", "","train_tracker");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

function insert_uodate_delete_quiry($sql){
    $conn = mysqli_connect("localhost", "root", "","train_tracker");
    if(!$conn){
        die("connection failed :".mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }
    mysqli_close($conn);
}
?>