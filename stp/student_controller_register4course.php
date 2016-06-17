<?php

require_once './config.php';
$user_id = $_POST['studentid'];
$course_id = $_POST['cid'];
//mysqli connection
$connection = new mysqli();
$connection->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
if ($connection->errno) {
    printf("Unable to connect to the database:<br /> %s", $connection->error);
    exit();
}
//mysqli connection
$query_add_course = "INSERT INTO tbl_user_course(tbl_user_course.Course_ID,tbl_user_course.User_ID) VALUES(?,?)";
if(($stmt=$connection->prepare($query_add_course)))
{
    $stmt->bind_param('ii', $course_id,$user_id);
    $stmt->execute();
    if($connection->error)
    {
        echo $connection->error;
    }
}
?>
