<?php

	$user_count_query = mysqli_query($con,"select count(*) as user_count from tbl_user") or die(mysqli_error($con));
	$row=mysqli_fetch_array($user_count_query);	     
        $user_count=$row['user_count'];
        
        $institute_count_query = mysqli_query($con,"select count(*) as institute_count from tbl_institute") or die(mysqli_error($con));
	$row=mysqli_fetch_array($institute_count_query);	     
        $institute_count=$row['institute_count'];
        
        $program_count_query = mysqli_query($con,"select count(*) as program_count from tbl_programs") or die(mysqli_error($con));
	$row=mysqli_fetch_array($program_count_query);	     
        $program_count=$row['program_count'];
        
        $course_count_query = mysqli_query($con,"select count(*) as course_count from tbl_course") or die(mysqli_error($con));
	$row=mysqli_fetch_array($course_count_query);	     
        $course_count=$row['course_count'];
?>