<?php
include './config.php';

        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];    
        $course=$_POST['course'];    
        $id=$_POST['id'];
        $password=$_POST['password'];
        $delete_query="delete from tbl_user_course where tbl_user_course.User_ID='$id'";
        $update_query="update tbl_user set tbl_user.F_Name='$first_name', tbl_user.L_Name='$last_name', tbl_user.Recovery_Mail='$email',tbl_user.Password='$password', tbl_user.profile_complete=1 where tbl_user.User_ID='$id'";
        $insert_query="insert into tbl_user_course(tbl_user_course.User_ID,tbl_user_course.Course_ID)  values('$id','$course')";
        $query = mysqli_query($con,$update_query)  or die(mysqli_error($con));
       // if((mysqli_affected_rows($con) > 0))
	//	{
                $query = mysqli_query($con,$delete_query)  or die(mysqli_error($con));
               
	//	if((mysqli_affected_rows($con) > 0))
	//	{
                           $query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));                 
                            header("location:staff_profile.php");
		//}
//		else
//		{
//                    errorpage();   
//		}
//
//                }
//                else{
//                    errorpage();
//                }
//                
                function errorpage() {
                   header("location:page_500.html");
                                 }
?>
