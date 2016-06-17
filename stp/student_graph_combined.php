<?php
include './student_session_check.php';
require_once './config.php';
//echo 'here2';
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

        <!--graph script-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>

        <!-- 2. You can add print and export feature by adding this line -->
        <script src="http://code.highcharts.com/modules/exporting.js"></script>       

        <?php
//create data for category section text of graph starts
        $graph_categories = '[';
        $pending_work = '[';
        $completed_work = '[';
        $flag = 0;
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
//                                       fetch all tasks of the current course with id $cid in ascending order of end date
                $task_query = "SELECT assi.Assignment_ID,assi.Assignment_Name,assi.assignment_description,
assi.End_Date,assi.Start_Date,assi.preffereed_Hours,assi.Weightage,(SELECT sassig.completed_hours
FROM tbl_student_assignment sassig
WHERE sassig.student_id=? AND sassig.assignment_id=assi.Assignment_ID)
FROM tbl_assignment assi
WHERE assi.Course_ID=? ORDER BY assi.End_Date ASC";

                if (($stmt_task = $connection->prepare($task_query))) {
                    $stmt_task->bind_param('ii', $user_id, $cid);
                    $stmt_task->execute();
                    $stmt_task->bind_result($assignment_id, $task_name, $task_desc, $task_due_date, $task_start_date, $task_pref_hours, $task_weightage, $completed_hours);
                    while ($stmt_task->fetch()) {
                        $assignment_date =$task_due_date;
//                         $year = date('Y', strtotime($date));
                        $assignment_month = date('m', strtotime($assignment_date));
                        if ($flag == 0) {
                            $graph_categories.="'" . $course_name . "'";
                            $pending_work.= "[".$assignment_month.",".($task_pref_hours - $completed_hours)."]";
                            $completed_work.="[".$assignment_month.',-' .$completed_hours."]";
                            $flag = 1;
                        } else {
                            $graph_categories.=",'" . $course_name . "'";
                            $pending_work.= ",[".$assignment_month.",".($task_pref_hours - $completed_hours)."]";
                            $completed_work.=",[".$assignment_month.',-' .$completed_hours."]";
                        }
//                                                
                    }
//                  
                }
            }
        }
//        closing bracket
        $graph_categories.=']';
        $pending_work.=']';
        $completed_work.=']';
//create data for category section text of graph ends
        //create data for category section text of graph starts
        $graph_categories2 = '[';
        $pending_work2 = '[';
        $completed_work2 = '[';
        $flag = 0;
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
//                                       fetch all tasks of the current course with id $cid in ascending order of end date
                $task_query = "SELECT task.Task_ID,task.Task_Name,task.Task_Description,
task.Task_due_date,task.Task_start_date,task.preferred_hour,task.weightage,(SELECT taskst.completed_hours
FROM tbl_student_task taskst
WHERE taskst.student_id=? AND taskst.task_id=task.Task_ID)
FROM tbl_task task
WHERE task.course_id=? ORDER BY task.Task_due_date ASC";

                if (($stmt_task = $connection->prepare($task_query))) {
                    $stmt_task->bind_param('ii', $user_id, $cid);
                    $stmt_task->execute();
                    $stmt_task->bind_result($assignment_id, $task_name, $task_desc, $task_due_date, $task_start_date, $task_pref_hours, $task_weightage, $completed_hours);
                    while ($stmt_task->fetch()) {
                        $task_date =$task_due_date;
//                         $year = date('Y', strtotime($date));
                        $task_month = date('m', strtotime($task_due_date));
                        if ($flag == 0) {
                            $graph_categories2.="'" . $course_name . '/' . $task_name . '<br\>(' . $task_due_date . ')' . "'";
                            $pending_work2.="[".$task_month.",". ($task_pref_hours - $completed_hours)."]";
                            $completed_work2.="[".$task_month.",".'-'.$completed_hours."]";
                            $flag = 1;
                        } else {
                            $graph_categories2.=",'" . $course_name . '/' . $task_name . '<br\>(' . $task_due_date . ')' . "'";
                            $pending_work2.=",[".$task_month.",". ($task_pref_hours - $completed_hours)."]";
                            $completed_work2.=",[".$task_month.",".'-'.$completed_hours."]";
                        }
//                                                
                    }
//                  
                }
            }
        }
//        closing bracket
        $graph_categories2.=']';
        $pending_work2.=']';
        $completed_work2.=']';
//create data for category section text of graph ends
        ?>


        <script type="text/javascript">
            $(function() {
                // Age categories
//                var categories = ['IT1000 - Information Security/Assignment 1', 'IT1000 - Information Security/Assignment 2', 'IT1000 - Information Security/Assignment 3', 'IT6269 - ITIL2/assignment 15', 'IT6269 - ITIL2/assignment 1', 'IT6269 - ITIL2/assignment 10'];
                var categories = <?php echo $graph_categories; ?>;
                var categories2 = <?php echo $graph_categories2; ?>;
                $(document).ready(function() {
                    $('#container').highcharts({
                        chart: {
                            //type: 'bar'
                            type: 'column'
                        },
                        title: {
                            text: 'Assignments And Tasks'
                        },
                        subtitle: {
                            text: 'Pending work to the top and Completed work to the bottom'
                        },
                        xAxis: [{
//                                categories: categories,
                                 categories:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                reversed: false, title: {
                                    text: '(Assignments/Tasks)'
                                },
                                labels: {
                                    step: 1
                                }
                            }, {// mirror axis on right side
                                opposite: true,
                                reversed: false,
//                                categories: categories,
                                 categories:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                                linkedTo: 0,
                                labels: {
                                    step: 1
                                }
                            }],
                        yAxis: {
                            title: {
                                text: null
                            },
                            labels: {
                                formatter: function() {
                                    return Math.abs(this.value) + 'hrs';
                                }
                            }
                        },
                        plotOptions: {
                            series: {
                                stacking: 'normal'
                            }
                        },
                        tooltip: {
                            formatter: function() {
                                return '<b>' + this.series.name + ', under ' + this.point.category+ '</b><br/>' +
                                        'Hour(s): ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                            }
                        },
                        series: [{
                                type:'column',
                                name: 'Assignment Pending work',
                                data: <?php echo $pending_work; ?>,
                                stack:'assignment'
//                                data: [-20, -20]

                            }, {
                                type:'column',
                                name: 'Assignment Completed work',
                                data: <?php echo $completed_work; ?>,
//                                data: [10, 5,]
                                 stack:'assignment'
                            },
                            {
                                type:'column',
                                name: 'Task Pending work',
//                                data: <?php echo $pending_work2; ?>,
                                stack:'task',
                                data: [[0,7],[2,6]]

                            }, 
                            {
                                type:'column',
                                name: 'Task Completed work',
//                                data: <?php echo $completed_work2; ?>,
                               data: [[0,-10], [2,-5]],
                                 stack:'task'
                            }]
                    });
                });

            });
        </script>
        <!--graph script ends-->
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
                        <!--graph container-->
                        <div id="container" style="width: 1100px; height: 450px; margin: 0 auto"></div>
                        <!--graph container ends-->
                        <!--end of data and user interactive controls--> 
                    </div>

                </div>
                <!-- /page content -->


                <!-- footer content -->
                <?php include './student_footer.php'; ?>
                <!-- /footer content -->
            </div>
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
            //TableManageButtons.init();
        </script>
        <!--table script ends-->
    </body>

</html>


