<?php
include './config.php';

        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        $week=$_POST['week'];
        $course=$_POST['course']; 
        $id=$_POST['id'];
        $insert_query="update tbl_semester set tbl_semester.Start_Date='$start_date',tbl_semester.End_Date='$end_date',tbl_semester.No_Of_Weeks='$week',tbl_semester.Course_ID='$course' where tbl_semester.Semester_ID='$id'";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
               
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_semester.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
