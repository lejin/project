<?php
include './config.php';

        $id=$_POST['id'];
        $disable_start="SET FOREIGN_KEY_CHECKS=0";
        $disable_end="SET FOREIGN_KEY_CHECKS=1";
        $insert_query="delete from tbl_programs where tbl_programs.Program_ID='$id'";
	$query = mysqli_query($con,$disable_start)
        or die(mysqli_error());
        $query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                               $query = mysqli_query($con,$disable_end)
        or die(mysqli_error());          
			header("location:admin_program.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
