<?php
include './config.php';

        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];        
        $id=$_POST['id'];
        $password=$_POST['password'];     
        $update_query="update tbl_user set tbl_user.F_Name='$first_name', tbl_user.L_Name='$last_name', tbl_user.Recovery_Mail='$email',tbl_user.Password='$password', tbl_user.profile_complete=1 where tbl_user.User_ID='$id'";

        $query = mysqli_query($con,$update_query)  or die(mysqli_error($con));                  
        header("location:student_profile.php");

                function errorpage() {
                   header("location:page_500.html");
                                 }
?>
