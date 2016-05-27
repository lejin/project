<?php
include './config.php';

        $name=$_POST['name'];
        $description=$_POST['description'];
        $program=$_POST['program'];    
        $percentage=$_POST['percentage'];    
        $id=$_POST['id'];
        $delete_query="delete from tbl_course_program where tbl_course_program.Course_ID='$id'";
        $update_query="update tbl_course set tbl_course.Course_Name='$name',tbl_course.Course_Dsecription='$description',tbl_course.Percentage_Of_Fulltime='$percentage' where tbl_course.Course_ID='$id'";
        $insert_query="insert into tbl_course_program(tbl_course_program.Course_ID,tbl_course_program.Program_ID) values('$id','$program')";
        $query = mysqli_query($con,$update_query)  or die(mysqli_error($con));
       // if((mysqli_affected_rows($con) > 0))
	//	{
                $query = mysqli_query($con,$delete_query)  or die(mysqli_error($con));
               
	//	if((mysqli_affected_rows($con) > 0))
	//	{
                           $query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));                 
                            header("location:admin_course.php");
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
