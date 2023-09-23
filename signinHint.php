<?php
if(!empty($_GET['uname'])&&isset($_GET['uname'])&&!empty($_GET['password'])&&isset($_GET['password']))
{
    require 'database.php';
    $data=json_decode(read('select * from regnlog where email="'.$_GET['uname'].'";'));
    if(empty($data))
    {
        echo 'incorrect user name or password';
        return false;
    }
    
    if($data[0]->email==$_GET['uname']&&$data[0]->password==md5($_GET['password']))
    {
        
        if($data[0]->confirmed==0)
        {   
            $q=0;
            echo "your account is not verified yet, please verify your account";
            return false;
        }
        else
        {
            $q=1;
            //echo $q;
            return true;
        }
    }
    else
    {
        echo "user name or password incorrect";
        $q=0;
        return false;
    }
}
else
{
    echo "user name and password cannot be empty";
    $q=0;
    return false;
}
?>