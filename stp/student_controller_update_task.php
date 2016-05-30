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
$task_id=$_POST['task_id'];
$completed_hour=$_POST['completed_hour'];
$hours=$hours+$completed_hour;
//delete row
$delete_query="DELETE from tbl_student_task where tbl_student_task.task_id=? and tbl_student_task.student_id=?";
if(($stmt=$connection->prepare($delete_query)))
{
    $stmt->bind_param('ii',$task_id,$user_id);
    $stmt->execute();
    $connection->error;
}
else
{
    echo $connection->error;
}
$stmt->free_result();
//insert new row with updated hours
$insert_query="INSERT INTO tbl_student_task(tbl_student_task.student_id,tbl_student_task.task_id,tbl_student_task.completed_hours) VALUES(?,?,?)";
if(($stmt=$connection->prepare($insert_query)))
{
    $stmt->bind_param('iis',$user_id,$task_id,$hours);
    $stmt->execute();
    $connection->error;
}
else
{
    echo $connection->error;
}
$stmt->free_result();
header('Location: student_tasks.php');
?>

