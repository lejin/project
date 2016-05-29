<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_task where tbl_task.Task_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:staff_task.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
