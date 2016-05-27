<?php
session_start();
if(isset($_SESSION['user_type']))
{
    $user_type=$_SESSION['user_type'];
    if($user_type!=1){
        header ("location:login.php");
    }
}
else 
{
    header ("location:login.php");
}

?>