<?php
include './config.php';
session_start();
if(isset($_POST['user_type']))
{   
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $user_type=$_POST['user_type'];
        $institute=$_POST['institute'];
	$username=$_POST['username'];
	$password=$_POST['password'];
        $email=$_POST['email'];
        $approval_status=0;
        if($user_type==3)
        {
//            exit();
            $approval_status=1;
        }
        $insert_query="insert into tbl_user(tbl_user.F_Name,tbl_user.L_Name,tbl_user.User_Name,tbl_user.Password,tbl_user.User_Type_ID,tbl_user.Institute_ID,tbl_user.Recovery_Mail,tbl_user.user_approoved) values('$firstname','$lastname','$username','$password','$user_type','$institute','$email','$approval_status')";
	$query = mysqli_query($con,$insert_query)
        or die(mysqli_error());
                $userid=mysqli_insert_id($con);
		if($userid>0)
		{
                        $institute_query="insert into tbl_user_institute (tbl_user_institute.User_ID,tbl_user_institute.Institute_ID) values('$userid','$institute');";
			$query = mysqli_query($con,$institute_query) or die(mysqli_error());
                        //$_SESSION['username']=$row['username'];
			//$_SESSION['user_id']=$row['user_id'];
			header("location:index.html");
		}
		else
		{
                        header("location:login.php");
		}

}
?>
