<?php
include './config.php';

       $id=$_GET['id'];
       
        $insert_query="select tbl_course.Course_Name,tbl_course.Course_ID,tbl_semester.Semester_ID,tbl_semester.Start_Date,tbl_semester.End_Date,tbl_semester.No_Of_Weeks from tbl_semester inner join tbl_course on tbl_course.Course_ID=tbl_semester.Course_ID where tbl_semester.Semester_ID='$id'";
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
