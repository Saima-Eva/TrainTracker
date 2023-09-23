<html>
    <head></head>
    <body>
<?php
if(!empty($_POST['firstname']) && isset($_POST['firstname']) &&
  !empty($_POST['lastname']) && isset($_POST['lastname']) &&
  !empty($_POST['gender']) && isset($_POST['gender']) &&
  !empty($_POST['email']) && isset($_POST['email']) &&
  !empty($_POST['password']) && isset($_POST['password'])){
    $first=$_POST['firstname'];
    $last=$_POST['lastname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $conn= mysqli_connect("localhost","root","","train_tracker");
    if(!$conn){
        die("connection failed :".mysqli_connect_error());
    }
    $code=md5(rand());
    $sql="INSERT INTO regNlog (firstname,lastname,gender,email,password,confirm_code) values('".$first."','".$last."','".$gender."','".$email."','".$password."','".$code."')";
    $pic="INSERT INTO `picture`(`email`) VALUES ('".$email."')";
    if (mysqli_query($conn, $sql)&&mysqli_query($conn, $pic)) {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'polash098@gmail.com';                 // SMTP username
        $mail->Password = 'Zxcvb789*';                           // SMTP password
        $mail->Port =587;                                    // TCP port to connect to

        $mail->setFrom('polash098@gmail.com', 'Admin');
        $mail->addAddress($_POST['email'], $_POST["firstname"]);
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Verify email account';
        $mail->Body    = '<p>Confirm your email<br>Click the link below to verify your account<br>http://localhost/TrainTrackar/emailverify.php?email='.$email.'&code='.$code.'</p>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
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