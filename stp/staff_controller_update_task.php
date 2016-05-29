<?php
include './staff_session_check.php';
include './config.php';

        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        $name=$_POST['name'];
        $course=$_POST['course'];
        $description=$_POST['description'];
        $hours=$_POST['hours'];
        $weightage=$_POST['weightage'];
        $user_id=$_SESSION['user_id'];
        $id=$_POST['id'];
        $insert_query="update tbl_task set tbl_task.author_id='$user_id',tbl_task.Task_start_date='$start_date',tbl_task.Task_due_date='$end_date',tbl_task.Task_Name='$name',tbl_task.Task_Description='$description',tbl_task.weightage='$weightage',tbl_task.preferred_hour='$hours',tbl_task.course_id='$course' where tbl_task.Task_ID='$id'";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $up_id=mysqli_affected_rows($con);
		//if($up_id>0)
		//{
                                         
			header("location:staff_task.php");
		//}
		//else
		//{
               //        header("location:page_500.html");
		//}


?>
