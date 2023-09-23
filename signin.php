<?php
if(!empty($_POST['uname'])&&isset($_POST['uname'])&&!empty($_POST['password'])&&isset($_POST['password'])){
    require 'database.php';
    $data=json_decode(read('select * from regnlog where email="'.$_POST['uname'].'";'));
    
    if($data[0]->email==$_POST['uname']&&$data[0]->password==md5($_POST['password'])){
        if($data[0]->confirmed==0){
            echo "your account is not verified yet, please verify your account";
        }else{
        //echo 'welcome '.$data[0]->email;
        session_start();
        $_SESSION['email']=$data[0]->email;
        //return true;
        header('location:MemberView.php');
        }
    }else{
        echo "user name or password incorrect";
    }
}else{
    echo "user name and password cannot be empty";
    //return false;
}
?>