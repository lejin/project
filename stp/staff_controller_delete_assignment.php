<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_assignment where tbl_assignment.Assignment_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:staff_assignment.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
