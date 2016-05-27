<?php
include './config.php';

        $name=$_POST['name'];
        $description=$_POST['description'];
        $institute=$_POST['institute'];    
        $id=$_POST['id'];
        $insert_query="update tbl_programs set tbl_programs.program_Name='$name',tbl_programs.program_Description='$description',tbl_programs.Institute_ID='$institute' where tbl_programs.Program_ID='$id'";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
               
		if((mysqli_affected_rows($con) > 0))
		{
                                         
			header("location:admin_program.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
