<?php
include './config.php';

        $id=$_POST['id'];
        $insert_query="update tbl_user set tbl_user.user_approoved=1 where tbl_user.User_ID='$id'";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:staff_home.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
