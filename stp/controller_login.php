<?php
include './config.php';
session_start();
if(isset($_POST['username']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
        //$user_type=$_POST['user_type'];
	$query = mysqli_query($con,"SELECT * FROM tbl_user WHERE User_Name = '$username' AND Password ='$password'")
 or die(mysqli_error());
	$row=mysqli_fetch_array($query);
		if(mysqli_num_rows($query)==1)
		{       
                        $username=$row['User_Name'];
                        $userid=$row['User_ID'];
                        $user_type=$row['User_Type_ID'];
                        $profile_complete=$row['profile_complete'];
                        $institute=$row['Institute_ID'];
                        $user_approoved=$row['user_approoved'];
			$_SESSION['username']=$username;
			$_SESSION['user_id']=$userid;
                        $_SESSION['user_type']=$user_type;
                        $_SESSION['user_approoved']=$user_approoved;
                        $_SESSION['profile_complete']=$profile_complete;
                         $_SESSION['institute']=$institute;
                        if($user_type==1&&$user_approoved==1){
			header("location:admin_home.php");                       
                        }
                        else if($user_type==2&&$user_approoved==1){
			header("location:staff_home.php");                       
                        }
                        else if($user_type==3&&$user_approoved==1){
			header("location:student_home.php");                       
                        }
                        else
                        {                    
                            header("location:login.php");
                        }
		}
		else
		{                    
                    header("location:login.php");
		}

}
?>

<!-----------------login Script end----------------------->