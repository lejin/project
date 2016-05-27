<?php
include './admin_session_check.php';
include './config.php';
include './admin_home_counts.php';
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
                <?php
                include './admin_topbar.php';
                ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                                </div>
                                <div class="count"><?php echo $user_count; ?></div>

                                <h3>Users</h3>
                                <p><?php echo $user_count; ?> active users.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-comments-o"></i>
                                </div>
                                <div class="count"><?php echo $institute_count; ?></div>

                                <h3>Institutes</h3>
                                <p><?php echo $institute_count; ?> institutes registered.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                                </div>
                                <div class="count"><?php echo $program_count; ?></div>

                                <h3>Programs</h3>
                                <p><?php echo $program_count; ?> different programs.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
        <script>

        </script>
    </body>

</html>
