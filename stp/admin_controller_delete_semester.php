<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_semester where tbl_semester.Semester_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_semester.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
