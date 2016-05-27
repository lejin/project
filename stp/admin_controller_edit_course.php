<?php
include './config.php';

       $id=$_GET['id'];
       
        $insert_query="select tbl_course.Course_ID,tbl_course.Course_Name,tbl_course.Course_Dsecription,tbl_course.Percentage_Of_Fulltime,tbl_programs.Program_ID,tbl_programs.program_Name from tbl_course inner join tbl_course_program on tbl_course_program.Course_ID=tbl_course.Course_ID inner join tbl_programs on tbl_course_program.Program_ID=tbl_programs.Program_ID where tbl_course.Course_ID='$id'";
	$result = mysqli_query($con,$insert_query)
        or die(mysqli_error());
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
//		 while($row = mysqli_fetch_assoc($result)) {
//		 $record[]=array("id"=>$row['Institute_ID'],"name"=>ucwords($row['Institute_Name']),"address"=>$row["Institute_Address"],"phone"=>$row["Institute_Phone"],"email"=>$row["Institute_Email"]);
//                                    
//			//header("location:admin_institute.php");
//		
//		echo json_encode($row);
//                       // header("location:page_500.html");
//		}
//echo json_encode($record);

?>
