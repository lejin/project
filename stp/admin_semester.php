<?php
include './config.php';
include './admin_session_check.php';
$course_dropdown_query="select * from tbl_course";

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

       <?php include './admin_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include './admin_topbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="" style="min-height: 100% !important;">
          <div class="page-title">
            <div class="title_left">
              <h3>Semester <small>List </small></h3>
            </div>

   
          </div>
          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12" >
              <div class="x_panel" >
                <div class="x_title">
                    <h2>Semester</h2> &nbsp;<button class="btn btn-success" onclick="showAddModal();">Add Semester</button>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
              
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>List Of Semesters</p>
                  <?php
                   $semester_query="select tbl_course.Course_Name,tbl_programs.program_Name,tbl_institute.Institute_Name,tbl_semester.Semester_ID,tbl_semester.Start_Date,tbl_semester.End_Date,tbl_semester.No_Of_Weeks from tbl_semester inner join tbl_course on tbl_course.Course_ID=tbl_semester.Course_ID inner join tbl_course_program on tbl_course_program.Course_ID=tbl_course.Course_ID inner join tbl_programs on tbl_programs.Program_ID=tbl_course_program.Program_ID inner join tbl_institute on tbl_institute.Institute_ID=tbl_programs.Institute_ID";
                   $results = $con->query($semester_query);
                   $i=1;
                          
                  ?>
                  <!-- start project list -->
                  <table id="program_table" class="table table-striped projects">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th >Course</th>
                        <th >Program</th>
                        <th >Institute</th>
			<th >Start Date</th>
                        <th>End Date</th>  
                        <th>Number Of Weeks</th>  
                        <th style="width: 15%">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $results->fetch_assoc()) { ?>
                      <tr>
                        <td>
                              <?php echo $i; ?>
                        </td>
                        <td>
                         <?php echo $row['Course_Name']; ?>
                  
                        </td>
                        <td>
                         <?php echo $row['program_Name']; ?>
                  
                        </td>
                        <td>
                         <?php echo $row['Institute_Name']; ?>
                  
                        </td>
			<td>
                          <?php echo $row['Start_Date']; ?>

                        </td>
                        <td>
                           <?php echo $row['End_Date']; ?>
                        </td>  
                        <td>
                           <?php echo $row['No_Of_Weeks']; ?>
                        </td> 
                        <td>
                        <!--  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                          <button class="btn btn-info btn-xs" onclick="getProgramDetail('<?php echo $row['Semester_ID']; ?>')"><i class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" onclick="deleteProgram('<?php echo $row['Semester_ID']; ?>');"><i class="fa fa-trash-o"></i> Delete </button>
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
      <?php include './admin_footer.php'; ?>
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
                        <h4 class="modal-title" id="myModalLabel2">Add Semester</h4>
                      </div>
                        <form action="admin_controller_add_semester.php" method="post">
                      <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                                              <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Course </label>
                                    </div>
                                    <div class="col-md-6">
                                    <select class="form-control" required name="course">
				               <?php
                                                    //$stmt = $con->prepare($user_type_query);
                                                    $results2 = $con->query($course_dropdown_query);
                            
                                                 ?>
				<option value="">Please Select </option>
                                <?php while($row = $results2->fetch_assoc()) { ?>
                                <option value="<?php echo $row["Course_ID"]; ?>"><?php echo $row["Course_Name"]; ?></option>
                                <?php } 
                                $results2->free();
                                // close connection 
                               ?>
                                </select>
                                </div>
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Start Date</label>
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
                    
                          
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
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
                        <form action="admin_controller_update_semester.php" method="post">
           <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                                              <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Course </label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="edit_course" class="form-control" required name="course">
				               <?php
                                                    //$stmt = $con->prepare($user_type_query);
                                                    $results2 = $con->query($course_dropdown_query);
                            
                                                 ?>
				<option value="">Please Select </option>
                                <?php while($row = $results2->fetch_assoc()) { ?>
                                <option value="<?php echo $row["Course_ID"]; ?>"><?php echo $row["Course_Name"]; ?></option>
                                <?php } 
                                $results2->free();
                                // close connection 
                               ?>
                                </select>
                                </div>
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Start Date</label>
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
                
                          
                            </div>
                        </div>
                      </div>
                      <input id="edit_id" type="hidden" name="id"> 
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
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
                <form id="delete_form" action="admin_controller_delete_semester.php" method="post">
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
       $.getJSON('admin_controller_edit_semester.php?id='+id, function(jd) {
                   $("#edit_id").val(jd.Semester_ID);
                   $("#edit_start_date").val(jd.Start_Date);
                   $("#edit_end_date").val(jd.End_Date);
                   $("#edit_week").val(jd.No_Of_Weeks);
                   $("#edit_course").val(jd.Course_ID);                   
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
