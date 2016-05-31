<?php
include './config.php';

$password = $_POST['password'];
$id = $_POST['id'];
$update_query = "update tbl_user set tbl_user.Password='$password' where tbl_user.User_ID='$id'";
$query = mysqli_query($con, $update_query) or die(mysqli_error($con));

header("location:admin_staff.php");

function errorpage() {
    header("location:page_500.html");
}

?>
