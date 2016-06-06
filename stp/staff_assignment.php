<?php
include './config.php';
include './staff_session_check.php';
include './staff_profile_complete_check.php';
$user_id=$_SESSION['user_id'];

$course_id_query="select tbl_user_course.Course_ID from tbl_user_course where tbl_user_course.User_ID='$user_id'";
$q_result=mysqli_query($con,$course_id_query);	
$row= mysqli_fetch_array($q_result);
$course_id=$row['Course_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Student Time Planner </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  
    <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/jqdatepicker/jquery-ui.css" rel="stylesheet" type="text/css" />

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

       <?php include './staff_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include './staff_topbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="" style="min-height: 100% !important;">
          <div class="page-title">
            <div class="title_left">
              <h3>Assignment <small>List </small></h3>
            </div>

   
          </div>
          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12" >
              <div class="x_panel" >
                <div class="x_title">
                    <h2>Assignment</h2> &nbsp;<button class="btn btn-success" onclick="showAddModal();">Add Assignment</button>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
              
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>List Of Assignments</p>
                  <?php
//                  $assignment_query="select tbl_assignment.Assignment_ID,tbl_assignment.Start_Date,tbl_assignment.End_Date,tbl_assignment.Assignment_Name,tbl_assignment.Weightage,tbl_assignment.preffereed_Hours,tbl_course.Course_Name from tbl_assignment inner join tbl_course on tbl_course.Course_ID=tbl_assignment.Course_ID where tbl_assignment.author_id=";
//
//                   $results = $con->query($assignment_query);
//                   $i=1;                          
                  ?>
                  <!-- start project list -->
                  <table id="program_table" class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 8%">Assignment</th>
                         <th style="width: 8%">Description</th>
			<th >Start Date</th>
                        <th>End Date</th> 
                        <th>Weightage</th>  
                        <th>preferred hours</th>  
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                   $assignment_query="select tbl_assignment.Assignment_ID,tbl_assignment.assignment_description,tbl_assignment.Start_Date,tbl_assignment.End_Date,tbl_assignment.Assignment_Name,tbl_assignment.Weightage,tbl_assignment.preffereed_Hours,tbl_course.Course_Name from tbl_assignment inner join tbl_course on tbl_course.Course_ID=tbl_assignment.Course_ID where tbl_assignment.author_id='$user_id' and tbl_assignment.Course_ID='$course_id'";
                   $results = $con->query($assignment_query);
                   $i=1; 
                     
                     while($row = $results->fetch_assoc()) { ?>
                      <tr>
                        <td>
                              <?php echo $i; ?>
                        </td>
                        <td>
                         <?php echo $row['Assignment_Name']; ?>
                  
                        </td>
                        <td>
                         <?php echo $row['assignment_description']; ?>
                  
                        </td>
			<td>
                          <?php echo $row['Start_Date']; ?>

                        </td>
                        <td>
                           <?php echo $row['End_Date']; ?>
                        </td>  
                        <td>
                           <?php echo $row['Weightage']; ?>
                        </td> 
                        <td>
                           <?php echo $row['preffereed_Hours']; ?>
                        </td> 
                        <td>
                        <!--  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                          <button class="btn btn-info btn-xs" onclick="getProgramDetail('<?php echo $row['Assignment_ID']; ?>')"><i class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" onclick="deleteProgram('<?php echo $row['Assignment_ID']; ?>');"><i class="fa fa-trash-o"></i> Delete </button>
                        </td>
                      </tr>
                        <?php 
                      ++$i;  
                        } ?>
                    </tbody>
                  </table>
                  <?php
                   $results->free();
                  ?>
                  <!-- end project list -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php include './staff_footer.php'; ?>
      <!-- /footer content -->
    </div>
  </div>
               <!-- Small modal -->
               <div id="add_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Add Assignment</h4>
                      </div>
                        <form action="staff_controller_add_assignment.php" method="post">
                      <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">     
                           
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Assignment Name</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="name" name="name" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Assignment Description</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="description" name="description" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="start_date">Start Date</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="start_date" name="start_date" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">End date </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="end_date" name="end_date" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="weightage">Weightage </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="weightage" name="weightage" required="required" placeholder="weightage" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                 <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="hour">Prefered Hours </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="hour" name="hours" required="required" placeholder="hours" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <input type="hidden" name="course" value="<?php echo $course_id; ?>">
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Release Assignment</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
               <!-- edit modal -->
               <div class="modal fade bs-example-modal-sm" tabindex="-1" id="edit_modal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Edit Semester</h4>
                      </div>
                        <form action="staff_controller_update_assignment.php" method="post">
           <div class="modal-body">
                        
                               <div class="row">
                            <div class="col-md-12">     
                           
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Assignment Name</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_name" name="name" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Assignment Description</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_description" name="description" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="start_date">Start Date</label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_start_date" name="start_date" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">End date </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_end_date" name="end_date" required="required"  class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="weightage">Weightage </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_weightage" name="weightage" required="required" placeholder="weightage" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                 <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="hour">Prefered Hours </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_hours" name="hours" required="required" placeholder="hours" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <input type="hidden" id="edit_course" name="course" value="<?php echo $course_id; ?>">
                            </div>
                        </div>
                      </div>
                      <input id="edit_id" type="hidden" name="id"> 
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Release Assignment</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
               
                <!-- /modals -->
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
                <form id="delete_form" action="staff_controller_delete_assignment.php" method="post">
                    <input type="hidden" name="id" id="delete_id">
                </form>
  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
          <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>
        <script type="text/javascript" src="js/jqdatepicker/jquery-ui.js"></script>
  <script>
      function deleteProgram(id){
          $("#delete_id").val(id);
          $("#delete_form").submit();
      }
  $("#program_table").DataTable(
             {
    "aoColumnDefs": [{
      "bSortable": false, 
      "aTargets": [7]
    }]
  }       
    );
  
  function getProgramDetail(id){
       $.getJSON('staff_controller_edit_assignment.php?id='+id, function(jd) {
                   $("#edit_id").val(jd.Assignment_ID);
                   $("#edit_start_date").val(jd.Start_Date);
                   $("#edit_end_date").val(jd.End_Date);
                   $("#edit_name").val(jd.Assignment_Name);
                   $("#edit_description").val(jd.assignment_description);
                   $("#edit_course").val(jd.Course_ID); 
                   $("#edit_hours").val(jd.preffereed_Hours); 
                   $("#edit_weightage").val(jd.Weightage); 
               });
               $('#edit_modal').modal('show');  
  }
     function showAddModal(){
      $('#add_modal').modal('show');  
  } 
  
   $(document).ready(function() {
       $( "#start_date" ).datepicker({
             dateFormat: "yy-mm-dd"
        });
         $( "#end_date" ).datepicker({
             dateFormat: "yy-mm-dd"
        });
         $( "#edit_end_date" ).datepicker({
             dateFormat: "yy-mm-dd"
        });
         $( "#edit_start_date" ).datepicker({
             dateFormat: "yy-mm-dd"
        });
    });

  </script>
</body>

</html>
