<?php
include './student_session_check.php';
include './config.php';
$user_id=$_SESSION['user_id'];
$query = mysqli_query($con,"select tbl_user.F_Name,tbl_user.L_Name,tbl_user.Recovery_Mail,tbl_user.Password,tbl_user_course.Course_ID from tbl_user left join tbl_user_course on tbl_user.User_ID=tbl_user_course.User_ID where tbl_user.User_ID = '$user_id'")
 or die(mysqli_error());
$row=mysqli_fetch_array($query);
	   


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

       <?php include './student_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include './student_topbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main" style="height: 100%;">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Profile</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-offset-1 col-md-9 col-sm-9 col-xs-9" >
              <div class="x_panel">
                <div class="x_title">
                  <h2>Student Profile <small>update profile</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
              
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="staff_profile_form" method="post" action="student_controller_update_profile.php">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" name="first_name" value="<?php echo $row['F_Name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <br/>
                      <br/>
                      <br/>
                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name
                      </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last_name" name="last_name" value="<?php echo $row['L_Name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    </div>
                      <br/>
                      <br/>
                    <div class="form-group">
                      <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" class="form-control col-md-7 col-xs-12" value="<?php echo $row['Recovery_Mail']; ?>" type="email" name="email">
                      </div>
                    </div>   
                      <br/>
                      <br/>
                    <div class="form-group">
                      <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" class="form-control col-md-7 col-xs-12" value="<?php echo $row['Password']; ?>" type="password" name="password">
                      </div>
                    </div>   
                      <br/>
                      <br/>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Course 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="course" class="form-control col-md-7 col-xs-12">
                              <option value="">please select</option>
                              <?php 
                               $course_query="select tbl_course.Course_ID,tbl_course.Course_Name,tbl_course.Course_Dsecription,tbl_course.Percentage_Of_Fulltime,tbl_programs.Program_ID,tbl_programs.program_Name from tbl_course inner join tbl_course_program on tbl_course_program.Course_ID=tbl_course.Course_ID inner join tbl_programs on tbl_course_program.Program_ID=tbl_programs.Program_ID";
                               $results2 = $con->query($course_query);
                               while($row2 = $results2->fetch_assoc()) {
                              ?>
                              <option  <?php if($row2['Course_ID']==$row['Course_ID']){echo "selected";} ?> value="<?php echo $row2['Course_ID']; ?>"><?php echo $row2['Course_Name']; ?> <?php echo"&nbsp;&nbsp;&nbsp;&nbsp;(". $row2['program_Name'].")"; ?></option>
                              <?php
                             
                               }
                                $results2->free();
                              ?>
                          </select>
                      </div>
                    </div>
                        <br/>
                      <br/>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                        
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>




        


        




         
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php include './student_footer.php'; ?>
      <!-- /footer content -->
    </div>
  </div>
   
               
                
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

  </script>
</body>

</html>
