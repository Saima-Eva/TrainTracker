<?php
require "database.php";
session_start();
print_r($_FILES);
$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
echo $_FILES["fileToUpload"]["name"]."<br>";
$uploadOk = 1;
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
    echo "Sorry, file already exists<br>";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "File size exceeded<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded<br>";
}
else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$sql1="INSERT INTO `picture`(`email`, `ulr`) values('".$_SESSION["email"]."','".$target_file."')";
		echo $sql1."<br>";
        $sql="UPDATE `regnlog` SET `firstname`='".$_POST["firstname"]."',`lastname`='".$_POST["lastname"]."'where email='".$_SESSION["email"]."'; ";
		echo $sql."<br>";
        if (insert_uodate_delete_quiry($sql)&&insert_uodate_delete_quiry($sql1)) {
    echo "Record updated successfully";?>
<a href="viewProfile.php"><button>View Profile</button></a>

<?php    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
    }else {
        echo "Sorry, there was an error uploading your file<br>";
    }
}


?>