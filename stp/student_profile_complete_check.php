<?php
if(isset($_SESSION['profile_complete']))
{
    $profile_complete=$_SESSION['profile_complete'];
    echo $profile_complete;
    if($profile_complete!=1){
        header ("location:student_profile.php");
        exit();
    }
   
}
else 
{
    header ("location:login.php");
}

?>