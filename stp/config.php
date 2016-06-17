<?php
$mysqli_host = "localhost";
$mysqli_database = "test";
$mysqli_user = "root";
$mysqli_password = "";
$port="3306";

$con=mysqli_connect($mysqli_host,$mysqli_user,$mysqli_password);
//mysqli connection
//$connection=new mysqli();
//$connection->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
//if ($connection->errno) {
//    printf("Unable to connect to the database:<br /> %s", $connection->error);
//    exit();
//}
//mysqli connection

mysqli_select_db($con,$mysqli_database)or die(mysqli_error($con)); 
?>