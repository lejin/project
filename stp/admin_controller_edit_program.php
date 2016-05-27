<?php
include './config.php';

       $id=$_GET['id'];
       
        $insert_query="select tbl_programs.Program_ID,tbl_programs.program_Name,tbl_programs.program_Description,tbl_institute.Institute_Name,tbl_institute.Institute_ID from tbl_programs inner join tbl_institute on tbl_programs.Institute_ID=tbl_institute.Institute_ID where tbl_programs.Program_ID='$id'";
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
