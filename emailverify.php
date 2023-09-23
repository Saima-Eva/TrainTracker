<!DOCTYPE html>
<html>
    <body>
<?php
require ('database.php');
if(!empty($_GET['email'])&&isset($_GET['email'])&&!empty($_GET['code'])&&isset($_GET['code'])){
    $b='select * from regnlog where email="'.$_GET['email'].'";';
    //echo $b;
    $a=read($b);
    $data=json_decode($a);
//    print_r($data)."<br>";
//    echo $data[0]->confirmed."<br>";
//    echo $data[0]->confirm_code."<br>";
//    echo $_GET['code']."<br>";
    
    if($data[0]->confirmed==1){
        echo "you have already verified your email<br>";
        
    }
    if($data[0]->confirmed==0 && $data[0]->confirm_code==$_GET['code']){
        $x=1;
        $y='0';
        $up='update regnlog set confirmed="'.$x.'", confirm_code="'.$y.'"where email="'.$_GET['email'].'";';
        //echo $up;
        if(insert_uodate_delete_quiry($up)==true){?>
            <p>you have sucessfully verified your email<br><a href="index.php">sign in</a></p>
    <?php }
    }
}else
    {echo 'no data';}

?>
        </body>
</html>