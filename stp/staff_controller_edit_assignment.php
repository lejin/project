<?php
include './config.php';

       $id=$_GET['id'];
       
        $insert_query="select * from tbl_assignment where tbl_assignment.Assignment_ID='$id'";
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
