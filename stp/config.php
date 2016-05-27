<?php
$mysqli_host = "localhost";
$mysqli_database = "test";
$mysqli_user = "root";
$mysqli_password = "";

$con=mysqli_connect($mysqli_host,$mysqli_user,$mysqli_password);

mysqli_select_db($con,$mysqli_database)or die(mysqli_error($con)); 
?>