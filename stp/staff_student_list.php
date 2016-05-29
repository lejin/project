<?php
include './staff_session_check.php';
include './config.php';
$userid=$_SESSION['user_id'];
$student_query="select distinct tbl_user.F_Name,tbl_user.L_Name,tbl_user.Recovery_Mail,tbl_institute.Institute_Name  from tbl_user inner join tbl_user_course on tbl_user_course.User_ID=tbl_user.User_ID inner join tbl_institute on tbl_institute.Institute_ID=tbl_user.Institute_ID where tbl_user_course.Course_ID in(select tbl_user_course.Course_ID where tbl_user_course.User_ID='$userid') and tbl_user.User_Type_ID=3";
$staff_student_quer="select tbl_user.F_Name  from tbl_user inner join tbl_user_course on tbl_user_course.User_ID=tbl_user.User_ID where tbl_user_course.Course_ID=(select tbl_user_course.Course_ID where tbl_user_course.User_ID=1) and tbl_user.User_Type_ID=3";

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

       <?php include './staff_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include './staff_topbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="" style="min-height: 100% !important;">
          <div class="page-title">
            <div class="title_left">
              <h3>Institute <small>List </small></h3>
            </div>

   
          </div>
          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12" >
              <div class="x_panel" >
                <div class="x_title">
                 
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>List Of Institutes</p>
                  <?php
                   //$institute_query="select * from tbl_institute";
                   $results = $con->query($student_query);
                   $i=1;
                          
                  ?>
                  <!-- start project list -->
                  <table id="institute_table" class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Name</th>
			<th style="width: 15%">Email</th>
                        <th>Institute</th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $results->fetch_assoc()) { ?>
                      <tr>
                        <td>
                              <?php echo $i; ?>
                        </td>
                        <td>
                         <?php echo $row['F_Name']."  ".$row['L_Name']; ?>
                  
                        </td>
			<td>
                          <?php echo $row['Recovery_Mail']; ?>

                        </td>
                        <td>
                           <?php echo $row['Institute_Name']; ?>
                        </td>
                    
                    
                      </tr>
                        <?php 
                        ++$i;
                        }
                        ?>
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

               
                <!-- /modals -->
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
                <form id="delete_form" action="admin_controller_delete_institute.php" method="post">
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
</body>

</html>
