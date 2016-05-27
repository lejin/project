<?php
include './config.php';

        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $id=$_POST['id'];
        $insert_query="UPDATE tbl_institute SET tbl_institute.Institute_Name='$name', tbl_institute.Institute_Address='$address',tbl_institute.Institute_Phone='$phone' ,tbl_institute.Institute_Email='$email' where tbl_institute.Institute_ID='$id'";
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
