<?php
include './config.php';

        $name=$_POST['name'];
        $description=$_POST['description'];
        $percentage=$_POST['percentage'];        
        $program=$_POST['program'];  
        $insert_query="insert into tbl_course(tbl_course.Course_Name,tbl_course.Course_Dsecription,tbl_course.Percentage_Of_Fulltime) values('$name','$description','$percentage')";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
        $id=mysqli_insert_id($con);
		if($id>0)
		{
                           $insert_query="insert into tbl_course_program(tbl_course_program.Course_ID,tbl_course_program.Program_ID) values('$id','$program')";
                           $query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                           $id=mysqli_insert_id($con);
                           
                if($id>0)
		{                 
			header("location:admin_course.php");
                }    
                else
		{
                        header("location:page_500.html");
		}
		}
		else
		{
                        header("location:page_500.html");
		}


?>
