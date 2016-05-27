<?php
include './config.php';

        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $insert_query="insert into tbl_institute(tbl_institute.Institute_Name,tbl_institute.Institute_Address,tbl_institute.Institute_Phone,tbl_institute.Institute_Email) values('$name','$address','$phone','$email')";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
                $id=mysqli_insert_id($con);
		if($id>0)
		{
                                         
			header("location:admin_institute.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
