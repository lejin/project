<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="delete from tbl_institute where tbl_institute.Institute_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_institute.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
