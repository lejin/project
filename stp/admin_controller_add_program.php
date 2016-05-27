<?php
include './config.php';

        $name=$_POST['name'];
        $description=$_POST['description'];
        $institute=$_POST['institute'];        
        $insert_query="insert into tbl_programs(tbl_programs.program_Name,tbl_programs.program_Description,tbl_programs.Institute_ID) values('$name','$description','$institute')";
	$query = mysqli_query($con,$insert_query)  or die(mysqli_error($con));
                $id=mysqli_insert_id($con);
		if($id>0)
		{
                                         
			header("location:admin_program.php");
		}
		else
		{
                        header("location:page_500.html");
		}


?>
