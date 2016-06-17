<?php
include './config.php';

        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        //$week=$_POST['week'];
        
//        calculate number of weeks
        $date1 = new DateTime($start_date);
        $date2 = new DateTime($end_date);
        $diff = $date2->diff($date1)->format("%a");
        $week=  floor($diff/7);
        
        $course=$_POST['course'];
        $insert_query="insert into tbl_semester(tbl_semester.Start_Date,tbl_semester.End_Date,tbl_semester.No_Of_Weeks,tbl_semester.Course_ID)  values('$start_date','$end_date','$week','$course')";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $id=mysqli_insert_id($con);
		if($id>0)
		{
                                         
			header("location:admin_semester.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
