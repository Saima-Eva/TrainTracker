<?php
session_start();
$_SESSION["email"]=1;
header('Location:index.php');
?>