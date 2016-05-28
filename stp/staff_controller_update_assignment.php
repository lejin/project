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
        $insert_query="update tbl_assignment set tbl_assignment.author_id='$user_id',tbl_assignment.Start_Date='$start_date',tbl_assignment.End_Date='$end_date',tbl_assignment.Assignment_Name='$name',tbl_assignment.assignment_description='$description',tbl_assignment.Weightage='$weightage',tbl_assignment.preffereed_Hours='$hours',tbl_assignment.Course_ID='$course' where tbl_assignment.Assignment_ID='$id'";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $up_id=mysqli_affected_rows($con);
		//if($up_id>0)
		//{
                                         
			header("location:staff_assignment.php");
		//}
		//else
		//{
               //        header("location:page_500.html");
		//}


?>
