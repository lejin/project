<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_course where tbl_course.Course_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error($con));
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_course.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
