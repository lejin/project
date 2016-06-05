<?php
include './config.php';
include './admin_session_check.php';
//$staff_query="select * from tbl_user where tbl_user.User_Type_ID=2";

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

                  <p>List Of Staffs</p>
                  <?php
                   $staff_query="select tbl_user.User_ID,tbl_user.F_Name,tbl_user.L_Name,tbl_user.Recovery_Mail,tbl_institute.Institute_Name from tbl_user inner join tbl_institute on tbl_institute.Institute_ID=tbl_user.Institute_ID where tbl_user.User_Type_ID=2";
                   $results = $con->query($staff_query);
                   $i=1;
                          
                  ?>
                  <!-- start project list -->
                  <table id="program_table" class="table table-striped projects">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Name</th>
			<th >Email</th>
                        <th>Institute</th>                        
                        <th >#Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $results->fetch_assoc()) { ?>
                      <tr>
                        <td>
                              <?php echo $i; ?>
                        </td>
                        <td>
                         <?php echo $row['F_Name']." ".$row['L_Name']; ?>
                  
                        </td>
			<td>
                          <?php echo $row['Recovery_Mail']; ?>

                        </td>
                        <td>
                           <?php echo $row['Institute_Name']; ?>
                        </td>                        
                        <td>
                        <!--  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                            <button class="btn btn-info btn-xs" onclick="getProgramDetail('<?php echo $row['User_ID']; ?>')"><i class="fa fa-pencil"></i> Change Password </button>
                          
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

               <!-- edit modal -->
               <div class="modal fade bs-example-modal-sm" tabindex="-1" id="edit_modal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Add Institute</h4>
                      </div>
                        <form action="admin_controller_update_staff_password.php" method="post">
                        <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">  
                                        <label for="name">New Password </label>
                                    </div>
                                <div class="col-md-6">
                                    <input type="text" id="password" name="password" required="required" placeholder="Password" class="form-control">
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
                          <button type="submit" class="btn btn-primary">Change</button>
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

  $("#program_table").DataTable(
            {
    "aoColumnDefs": [{
      "bSortable": false, 
      "aTargets": [4]
    }]
  }      
    );
  
  function getProgramDetail(id){       
                   $("#edit_id").val(id);      
                   $('#edit_modal').modal('show');  
  }

  </script>
</body>

</html>
