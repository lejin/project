<?php
include './config.php';
include './admin_session_check.php';
$institute_dropdown_query="select * from tbl_institute";

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
              <h3>Program <small>List </small></h3>
            </div>

   
          </div>
          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12" >
              <div class="x_panel" >
                <div class="x_title">
                    <h2>Program</h2> &nbsp;<button class="btn btn-success" onclick="showAddModal();">Add Program</button>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
             
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>List Of Programs</p>
                  <?php
                   $program_query="select tbl_programs.Program_ID,tbl_programs.program_Name,tbl_programs.program_Description,tbl_institute.Institute_Name,tbl_institute.Institute_ID from tbl_programs inner join tbl_institute on tbl_programs.Institute_ID=tbl_institute.Institute_ID";
                   $results = $con->query($program_query);
                   $i=1;
                          
                  ?>
                  <!-- start project list -->
                  <table id="program_table" class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 8%">Name</th>
			<th style="width: 20%">Description</th>
                        <th>Institute</th>                        
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
                         <?php echo $row['program_Name']; ?>
                  
                        </td>
			<td>
                          <?php echo $row['program_Description']; ?>

                        </td>
                        <td>
                           <?php echo $row['Institute_Name']; ?>
                        </td>                        
                        <td>
                        <!--  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                            <button class="btn btn-info btn-xs" onclick="getProgramDetail('<?php echo $row['Program_ID']; ?>')"><i class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" onclick="deleteProgram('<?php echo $row['Program_ID']; ?>');"><i class="fa fa-trash-o"></i> Delete </button>
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
                        <h4 class="modal-title" id="myModalLabel2">Add Program</h4>
                      </div>
                        <form action="admin_controller_add_program.php" method="post">
                      <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Program Name </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="name" name="name" required="required" placeholder="name" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Description </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="description" name="description" required="required" placeholder="description" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Institute </label>
                                    </div>
                                    <div class="col-md-6">
                                    <select class="form-control" required name="institute">
				               <?php
                                                    //$stmt = $con->prepare($user_type_query);
                                                    $results2 = $con->query($institute_dropdown_query);
                            
                                                 ?>
				<option value="">Please Select </option>
                                <?php while($row = $results2->fetch_assoc()) { ?>
                                <option value="<?php echo $row["Institute_ID"]; ?>"><?php echo $row["Institute_Name"]; ?></option>
                                <?php } 
                                $results2->free();
                                // close connection 
                               ?>
			</select>
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
                        <h4 class="modal-title" id="myModalLabel2">Add Institute</h4>
                      </div>
                        <form action="admin_controller_update_program.php" method="post">
           <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">Program Name </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_name" name="name" required="required" placeholder="name" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Description </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="edit_description" name="description" required="required" placeholder="description" class="form-control">
                                </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="description">Institute </label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="edit_institute" class="form-control" required name="institute">
				               <?php
                                                    //$stmt = $con->prepare($user_type_query);
                                                    $results2 = $con->query($institute_dropdown_query);
                            
                                                 ?>
				<option value="">Please Select </option>
                                <?php while($row = $results2->fetch_assoc()) { ?>
                                <option value="<?php echo $row["Institute_ID"]; ?>"><?php echo $row["Institute_Name"]; ?></option>
                                <?php } 
                                $results2->free();
                                // close connection 
                                
                                ?>
			</select>
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
                <form id="delete_form" action="admin_controller_delete_program.php" method="post">
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
  <script>
      function deleteProgram(id){
          $("#delete_id").val(id);
          $("#delete_form").submit();
      }
  $("#program_table").DataTable(
       {
    "aoColumnDefs": [{
      "bSortable": false, 
      "aTargets": [4]
    }]
  }       
    );
  
  function getProgramDetail(id){
       $.getJSON('admin_controller_edit_program.php?id='+id, function(jd) {
                   $("#edit_id").val(jd.Program_ID);
                   $("#edit_name").val(jd.program_Name);
                   $("#edit_description").val(jd.program_Description);
                   $("#edit_institute").val(jd.Institute_ID);                   
               });
               $('#edit_modal').modal('show');  
  }
     function showAddModal(){
      $('#add_modal').modal('show');  
  } 
  </script>
</body>

</html>
