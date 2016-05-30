<?php
include './student_session_check.php';
require_once './config.php';
//mysqli connection
$connection = new mysqli();
$connection->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
if ($connection->errno) {
    printf("Unable to connect to the database:<br /> %s", $connection->error);
    exit();
}
//mysqli connection
//mysqli connection2
$connection2 = new mysqli();
$connection2->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
if ($connection2->errno) {
    printf("Unable to connect to the database:<br /> %s", $connection2->error);
    exit();
}
//mysqli connection2
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
                    <div class="row top_tiles">
                        <!--data and user interactive controls--> 
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Task name</th>
                                    <th>Course</th>
                                    <th>Task description</th>
                                    <th>Preferred hours</th>
                                    <th>Completed hours</th>
                                    <th>Start date</th>
                                    <th>Due date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--fetch and add all rows of courses enrolled by student-->
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $course_query = "SELECT uc.Course_ID,course.Course_Name
FROM tbl_user_course uc
INNER JOIN tbl_course course
ON course.Course_ID=uc.Course_ID
WHERE uc.User_ID=?";
                                if (($stmt = $connection2->prepare($course_query))) {
                                    $stmt->bind_param('i', $user_id);
                                    $stmt->execute();
                                    $stmt->bind_result($cid, $course_name);
                                    echo $connection->error;
                                    while ($stmt->fetch()) {
//                                       fetch all tasks of the current course with id $cid
                                        $task_query = "SELECT assi.Assignment_ID,assi.Assignment_Name,assi.assignment_description,
assi.End_Date,assi.Start_Date,assi.preffereed_Hours,assi.Weightage,(SELECT sassig.completed_hours
FROM tbl_student_assignment sassig
WHERE sassig.student_id=? AND sassig.assignment_id=assi.Assignment_ID)
FROM tbl_assignment assi
WHERE assi.Course_ID=?";
                                        if (($stmt_task = $connection->prepare($task_query))) {
                                            $stmt_task->bind_param('ii', $user_id,$cid);
                                            $stmt_task->execute();
                                            $stmt_task->bind_result($assignment_id, $task_name, $task_desc, $task_due_date, $task_start_date, $task_pref_hours, $task_weightage,$completed_hours);
                                            while ($stmt_task->fetch()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $task_name; ?></td>
                                                    <td><?php echo $course_name; ?></td>
                                                    <td><?php echo $task_desc; ?></td>
                                                    <td><?php echo $task_pref_hours; ?></td>
                                                    <td><?php echo $completed_hours; ?></td>
                                                    <td><?php echo $task_start_date; ?></td>
                                                    <td><?php echo $task_due_date; ?></td>
                                                    <td>
                                                        <a class="btn btn-success" onclick="$('#user_id').val(<?php echo $user_id; ?>);
                                                                                $('#assignment_id').val(<?php echo $assignment_id; ?>);
                                                                                $('#completed_hour').val(<?php echo $completed_hours; ?>);
                                                                                $('#edit_modal').modal('show');">
                                                            <i class="fa fa-pencil fa-lg"></i> Add progress</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                            $stmt_task->free_result();
                                        } else {
                                            echo $connection->error;
                                        }
                                        ?>

                                        <?php
                                    }
                                    $stmt->free_result();
                                }
                                ?>

                                <!--end of fetch and add all rows of course in the institute registered by student-->

                            </tbody>
                        </table>

                        <!--end of data and user interactive controls--> 
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
                        <h4 class="modal-title" id="myModalLabel2">Enter progress</h4>
                    </div>
                    <form action="student_controller_update_assignment.php" method="post">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="time">Total progress in hours </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="edit_name" name="time" required="required" placeholder="Example 1.5" class="form-control">
                                            <input type="hidden" id='assignment_id' name='assignment_id'>
                                            <input type="hidden" id='user_id' name='user_id'>
                                            <input type="hidden" id='completed_hour' name='completed_hour'>
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
        <!--table script-->
        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $('#datatable').dataTable();
                                                                $('#datatable-keytable').DataTable({
                                                                    keys: true
                                                                });
                                                                $('#datatable-responsive').DataTable();
                                                                $('#datatable-scroller').DataTable({
                                                                    ajax: "js/datatables/json/scroller-demo.json",
                                                                    deferRender: true,
                                                                    scrollY: 380,
                                                                    scrollCollapse: true,
                                                                    scroller: true
                                                                });
                                                                var table = $('#datatable-fixed-header').DataTable({
                                                                    fixedHeader: true
                                                                });
                                                            });
                                                            TableManageButtons.init();
        </script>
        <!--table script ends-->
    </body>

</html>


