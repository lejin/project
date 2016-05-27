<?php
if(isset($_SESSION['profile_complete']))
{
    $profile_complete=$_SESSION['profile_complete'];
    if($profile_complete!=1){
        header ("location:staff_profile.php");
    }
}
else 
{
    header ("location:login.php");
}

?>