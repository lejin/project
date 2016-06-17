<?php

include './config.php';
$username=$_GET['username'];
$count_query="select count(*) as count from tbl_user where tbl_user.User_Name='$username'";
$result = mysqli_query($con,$count_query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
echo json_encode($row);       
        
?>