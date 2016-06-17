<?php
include './student_session_check.php';
include './config.php';
$user_id=$_SESSION['user_id'];
$user_course_query="select tbl_user_course.Course_ID from tbl_user_course where tbl_user_course.User_ID=$user_id";

	$result = mysqli_query($con,$user_course_query) or die(mysqli_error());
        $row = mysqli_fetch_assoc($result);
        $course_id=$row['Course_ID']

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
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
             
            </div>

   
          </div>
            
            
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tasks</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
             
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>Task assigned to student</p>

                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Task Name</th>
			<th style="width: 8%">Due Date</th>
                        <th style="width: 8%">Preferred Hours</th>
                        <th style="width: 8%">Completed Hours</th>
                        <th>Progress</th>
                        <th style="width: 20%">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                                 <?php
                   $assignment_query="select tbl_task.Task_Name,tbl_task.Task_start_date,tbl_task.Task_due_date,tbl_task.preferred_hour,tbl_student_task.completed_hours from tbl_student_task inner join tbl_task on tbl_task.Task_ID=tbl_student_task.task_id where tbl_student_task.student_id='$user_id' and tbl_task.course_id='$course_id'";
                   $results = $con->query($assignment_query);
                   $i=1; 
                     
                     while($row = $results->fetch_assoc()) {
                         $pref_hour=$row['preferred_hour'];
                         $completed_hour=$row['completed_hours'];
                         $progress=  ceil(($completed_hour/$pref_hour)*100);
                         ?>
                      <tr>
                          <td><?php echo "$i"; ?></td>
                        <td>
                          <a><?php echo $row['Task_Name']; ?></a>
                          <br />
                          <small>starts on <?php echo $row['Task_start_date']; ?></small>
                        </td>
			<td>
                         <?php echo $row['Task_due_date']; ?>

                        </td>
                        <td>
                         <?php echo $row['preferred_hour']; ?>

                        </td>
                        <td>
                         <?php echo $row['completed_hours']; ?>

                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo "$progress"; ?>"></div>
                          </div>
                          <small><?php if($progress<=100){ echo "$progress";}else{echo "100";} ?> % Complete</small>
                        </td>
                        <td>
                            <?php if($progress<=100){ ?>
                          <button type="button" class="btn btn-success btn-xs">Started</button>
                            <?php }
                            else{
                            ?>
                          <button type="button" class="btn btn-success btn-xs">Finished</button>
                            <?php } ?>
                        </td>                    
                      </tr>
                     <?php 
                        ++$i;
                            } 
                      ?>

                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
              </div>
            </div>
          </div>
          
                    <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Assignments</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>Assignments assigned to Student</p>

                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Task Name</th>
			<th style="width: 8%">Due Date</th>
                        <th style="width: 8%">Preferred Hours</th>
                        <th style="width: 8%">Completed Hours</th>
                        <th>Progress</th>
                        <th style="width: 20%">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                                 <?php
                   $assignment_query="select tbl_assignment.Assignment_Name,tbl_assignment.Start_Date,tbl_assignment.End_Date,tbl_assignment.preffereed_Hours,tbl_student_assignment.completed_hours from tbl_student_assignment inner join tbl_assignment on tbl_assignment.Assignment_ID=tbl_student_assignment.assignment_id where tbl_student_assignment.student_id='$user_id' and tbl_assignment.course_id='$course_id'";
                   $results = $con->query($assignment_query);
                   $i=1; 
                     
                     while($row = $results->fetch_assoc()) {
                         $pref_hour=$row['preffereed_Hours'];
                         $completed_hour=$row['completed_hours'];
                         $progress=  ceil(($completed_hour/$pref_hour)*100);
                         ?>
                      <tr>
                          <td><?php echo "$i"; ?></td>
                        <td>
                          <a><?php echo $row['Assignment_Name']; ?></a>
                          <br />
                          <small>starts on <?php echo $row['Start_Date']; ?></small>
                        </td>
			<td>
                         <?php echo $row['End_Date']; ?>

                        </td>
                        <td>
                         <?php echo $row['preffereed_Hours']; ?>

                        </td>
                        <td>
                         <?php echo $row['completed_hours']; ?>

                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo "$progress"; ?>"></div>
                          </div>
                          <small><?php if($progress<=100){ echo "$progress";}else{echo "100";} ?> % Complete</small>
                        </td>
                        <td>
                            <?php if($progress<100){ ?>
                          <button type="button" class="btn btn-success btn-xs">Started</button>
                            <?php }
                            else{
                            ?>
                          <button type="button" class="btn btn-success btn-xs">Finished</button>
                            <?php } ?>
                        </td>                    
                      </tr>
                     <?php 
                        ++$i;
                            } 
                      ?>

                    </tbody>
                  </table>
                  <!-- end project list -->

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
  
</body>

</html>
