<html>
    <head></head>
    <body>
<?php
if(!empty($_POST['firstname']) && isset($_POST['firstname']) &&
    !empty($_POST['lastname']) && isset($_POST['lastname']) &&
    !empty($_POST['gender']) && isset($_POST['gender']) &&
    !empty($_POST['email']) && isset($_POST['email']) &&
    !empty($_POST['password']) && isset($_POST['password']))
{ 
    $conn= mysqli_connect("localhost","root","","train_tracker");
    if(!$conn){
        die("connection failed :".mysqli_connect_error());
    }

    $sql="INSERT INTO regNlog (firstname,lastname,gender,email,password,confirmed) values('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["gender"]."','".$_POST["email"]."','".md5($_POST['password'])."',1)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";?>
    <a href="index.php">Return to Log-in page</a>

    <?php    
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
    </body>
</html>