<?php
$conn= mysqli_connect("localhost","root","","train_tracker");
if(!$conn){
    die("connection failed :".mysqli_connect_error());
}

$sql="DELETE FROM `regnlog` WHERE email='".$_GET['mid']."';";

if (mysqli_query($conn, $sql)) {
    echo "record deleted successfully";?>
<a href="adminPage.php">Return to admin page</a>

<?php    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
