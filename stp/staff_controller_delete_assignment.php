<?php
include './config.php';

        $id=$_POST['id'];
        $disable_start="SET FOREIGN_KEY_CHECKS=0";
        $disable_end="SET FOREIGN_KEY_CHECKS=1";
        $insert_query="delete from tbl_assignment where tbl_assignment.Assignment_ID='$id'";
        $query = mysqli_query($con,$disable_start) or die(mysqli_error($con));
	$query = mysqli_query($con,$insert_query) or die(mysqli_error($con));
		if((mysqli_affected_rows($con) > 0))
		{
                         $query = mysqli_query($con,$disable_end) or die(mysqli_error($con));                 
			header("location:staff_assignment.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
