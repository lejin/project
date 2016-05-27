<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_programs where tbl_programs.Program_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_program.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
