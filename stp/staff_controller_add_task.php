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
        $insert_query="insert into tbl_task(tbl_task.author_id,tbl_task.Task_start_date,tbl_task.Task_due_date,tbl_task.Task_Name,tbl_task.Task_Description,tbl_task.weightage,tbl_task.preferred_hour,tbl_task.course_id) "
                . "values('$user_id','$start_date','$end_date','$name','$description','$weightage','$hours','$course')";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $id=mysqli_insert_id($con);
		if($id>0)
		{
                                         
			header("location:staff_task.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
