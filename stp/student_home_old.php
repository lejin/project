<?php
include './student_session_check.php';
require_once './config.php';
include './student_profile_complete_check.php';
//mysqli connection
$connection = new mysqli();
$connection->connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_database);
if ($connection->errno) {
    printf("Unable to connect to the database:<br /> %s", $connection->error);
    exit();
}
//mysqli connection
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
        <script>
            function add_course(cid, userid)
            {
                $.post('student_controller_register4course.php', {'cid': cid, 'studentid': userid}, function(data, status) {
                location.reload();});
                
            }
        </script>

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
                                    <th>Course name</th>
                                    <th>Course description</th>
                                    <th>Percentage Of Fulltime</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--fetch and add all rows of course in the institute registered by student-->
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $course_query = "SELECT course.Course_ID,course.Course_Name,course.Course_Dsecription,course.Percentage_Of_Fulltime
FROM tbl_course course
INNER JOIN tbl_course_program cp
on course.Course_ID=cp.Course_ID
INNER JOIN tbl_user_program up
on up.program_id=cp.Program_ID 
 where up.user_id=? and course.Course_ID NOT IN(SELECT uc.Course_ID from tbl_user_course uc WHERE uc.User_ID=?)";
                                if (($stmt = $connection->prepare($course_query))) {
                                    $stmt->bind_param('ii', $user_id,$user_id);
                                    $stmt->execute();
                                    $stmt->bind_result($cid, $cname, $cdesc, $cpercent_full_time);
                                    echo $connection->error;
                                    while ($stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cname; ?></td>
                                            <td><?php echo $cname; ?></td>
                                            <td><?php echo $cpercent_full_time; ?></td>
                                            <td>
                                                <button class="btn btn-success" value="<?php echo $cid; ?>" onclick="add_course('<?php echo $cid; ?>', '<?php echo $user_id; ?>')">Add course</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    echo $connection->error;
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
        <!-- Small modal -->
        <div id="add_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Add Institute</h4>
                    </div>
                    <form action="admin_controller_add_institute.php" method="post">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="name">Institute Name </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="name" name="name" required="required" placeholder="institute name" class="form-control">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="address">Address </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="address" name="address" required="required" placeholder="institute address" class="form-control">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="phone">Phone Number </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="phone" name="phone" required="required" placeholder="institute address" class="form-control ">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="phone">Email </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" id="email" name="email" required="required" placeholder="institute email" class="form-control ">
                                        </div>
                                    </div>
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
                    <form action="admin_controller_update_institute.php" method="post">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="name">Institute Name </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="edit_name" name="name" required="required" placeholder="institute name" class="form-control">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="address">Address </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="edit_address" name="address" required="required" placeholder="institute address" class="form-control">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="phone">Phone Number </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="edit_phone" name="phone" required="required" placeholder="institute address" class="form-control ">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-md-6">  
                                            <label for="phone">Email </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" id="edit_email" name="email" required="required" placeholder="institute email" class="form-control ">
                                        </div>
                                    </div>
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
