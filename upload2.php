<?php
session_start();
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
        $sq="UPDATE `regnlog` SET `firstname`='".$_POST["firstname"]."',`lastname`='".$_POST["lastname"]."'where email='".$_SESSION["email"]."';";
		$sql="UPDATE `picture` SET `ulr`='".$target_file."' WHERE `email`='".$_SESSION["email"]."';";
		echo $sql."<br>";
		$conn = mysqli_connect("localhost", "root", "", "train_tracker");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if (mysqli_query($conn, $sql)) {
            if(mysqli_query($conn, $sq)){
			 echo "New records inserted successfully";
                ?>
<a href="viewProfile.php"><button>View Profile</button></a>

<?php    
            }
		} else {
			echo "Error: " . mysqli_error($conn);
		}
		
        echo "The file ".  $_FILES["fileToUpload"]["name"]. " has been uploaded<br>";
    }else {
        echo "Sorry, there was an error uploading your file<br>";
    }
}
?>