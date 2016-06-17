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
        $insert_query="insert into tbl_assignment(tbl_assignment.author_id,tbl_assignment.Start_Date,tbl_assignment.End_Date,tbl_assignment.Assignment_Name,tbl_assignment.assignment_description,tbl_assignment.Weightage,tbl_assignment.preffereed_Hours,tbl_assignment.Course_ID) "
                . "values('$user_id','$start_date','$end_date','$name','$description','$weightage','$hours','$course')";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $id=mysqli_insert_id($con);
		if($id>0)
		{
                                         
			header("location:staff_assignment.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
