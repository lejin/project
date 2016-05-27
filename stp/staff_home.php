<?php
include './staff_session_check.php';
include './config.php';
include './admin_home_counts.php';
include './staff_profile_complete_check.php';
$user_request_query="select tbl_user.User_ID,tbl_user.F_Name,tbl_user.L_Name,tbl_user.Recovery_Mail,tbl_institute.Institute_Name from tbl_user inner join tbl_institute on tbl_institute.Institute_ID=tbl_user.Institute_ID where tbl_user.User_Type_ID=3 and tbl_user.user_approoved=0";
  $results = $con->query($user_request_query);
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
          <div class="col-md-8" style="margin-top: 30px;">
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                </div>
                  <div class="count"><?php echo $user_count; ?></div>

                <h3>Users</h3>
                <p><?php echo $user_count; ?> active users.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i>
                </div>
                <div class="count"><?php echo $institute_count; ?></div>

                <h3>Institutes</h3>
                <p><?php echo $institute_count; ?> institutes registered.</p>
              </div>
            </div>
              

            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                </div>
                <div class="count"><?php echo $program_count; ?></div>

                <h3>Programs</h3>
                <p><?php echo $program_count; ?> different programs.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i>
                </div>
                <div class="count"><?php echo $course_count; ?></div>

                <h3>Courses</h3>
                <p><?php echo $course_count; ?> courses available.</p>
              </div>
            </div>
        
          </div>
      </div>
      <!-- requests  -->
             
              <div class="col-md-4 col-sm-12 col-xs-12">
                    <div>
                      <div class="x_title">
                        <h2>Student Requests</h2>
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
                      <ul class="list-unstyled top_profiles scroll-view">
                       
                           <?php while($row = $results->fetch_assoc()) { ?>
                          <li class="media event">
                          <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                          </a>
                          <div class="media-body">
                              <?php echo $row['F_Name']." ".$row['L_Name']; ?>
                             
                              <p><?php echo $row['Recovery_Mail']; ?> <a class="title" href="#" onclick="approove(<?php echo $row['User_ID']; ?>);"> <i style="font-size: 25px;" class="fa fa-check-circle pull-right"></i> </a></p>
                            <p><?php echo $row['Institute_Name']; ?>                          </p>
                          </div>
                        </li>
          
                           <?php } ?>
                      </ul>
                    </div>
                  </div>
        
              <!-- requests -->
      </div>
      
      <!-- /page content -->

      <!-- footer content -->
      <?php include './staff_footer.php'; ?>
      <!-- /footer content -->
    </div>
  </div>
    <form id="student_form" action="./staff_controller_approove_student.php" method="post">
        <input type="hidden" id="student_id" name="id">
    </form>          
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
               
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
   function approove(id){
          $("#student_id").val(id);
          $("#student_form").submit();
      }
  </script>
</body>

</html>
