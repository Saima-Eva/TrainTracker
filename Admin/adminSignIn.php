<?php
if(!empty($_POST['user'])&&isset($_POST['user'])&&!empty($_POST['password'])&&isset($_POST['password'])){
    require '../database.php';
    session_start();
    $data=json_decode(read('select * from admin;'));
    
    if($data[0]->uname==$_POST['user']&&$data[0]->password==$_POST['password']){
        $_SESSION['name']=$data[0]->uname;
        $_SESSION['id']=true;
        header("location:adminPage.php");
        
    }else{
        echo "user name or password incorrect";
        $_SESSION['id']=false;
    }
}else{
    echo "user name and password cannot be empty";
    //return false;
}
?>