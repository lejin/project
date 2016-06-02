<?php
include './student_session_check.php';
require_once './config.php';
//mysqli connection
$connection = new mysqli();
$connection->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
if ($connection->errno) {
    printf("Unable to connect to the database:<br /> %s", $connection->error);
    exit();
}
//mysqli connection

$hours = $_POST['time'];
$user_id=$_POST['user_id'];
$assignment_id=$_POST['assignment_id'];
$completed_hour=$_POST['completed_hour'];
$completed_hours=$hours;
$preferred_hour=$_POST['preferred_hour'];
$hours=$hours+$completed_hour;
//check if competed hour grater than preffered hour
if($hours>=$preferred_hour){
    header('Location: student_assignment.php?hour=false');
    exit();
}

//delete row
$delete_query="DELETE from tbl_student_assignment where tbl_student_assignment.assignment_id=? and tbl_student_assignment.student_id=?";
if(($stmt=$connection->prepare($delete_query)))
{
    $stmt->bind_param('ii',$assignment_id,$user_id);
    $stmt->execute();
    $connection->error;
}
else
{
    echo $connection->error;
}
$stmt->free_result();
//insert new row with updated hours
$insert_query="INSERT INTO tbl_student_assignment(tbl_student_assignment.student_id,tbl_student_assignment.assignment_id,tbl_student_assignment.completed_hours) VALUES(?,?,?)";
if(($stmt=$connection->prepare($insert_query)))
{
    $stmt->bind_param('iis',$user_id,$assignment_id,$hours);
    $stmt->execute();
    $connection->error;
}
else
{
    echo $connection->error;
}
$stmt->free_result();
header('Location: student_assignment.php');
?>

