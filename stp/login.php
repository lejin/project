<?php
include './config.php';
$user_type_query="select * from tbl_user_type";
$institute_query="select * from tbl_institute";
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

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
            
            <form action="controller_login.php" method="post">
            <h1>Login To Continue</h1>
            <?php
            if(isset($_GET['invalid_login']))
            {
            ?>
                 <label  class="text-danger">Login Failed</label>
            <?php 
            }
            else if(isset($_GET['user_permission']))
            {
            ?>
                   <label  class="text-warning">User not approved</label>
            <?php 
            }
            else if(isset($_GET['user_exist']))
            {
            ?>
                   <label  class="text-danger">User already exists</label>
            <?php 
           }
            else if(isset($_GET['register']))
            {
            ?>
                   <label  class="text-success">User registered successfully</label>
            <?php 
            }
             else if(isset($_GET['error']))
            {
            ?>
                   <label  class="text-danger">Oops something went wrong !!</label>
            <?php 
            }
            ?>
           
            <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <div>
                <button class="btn btn-default alignright">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">New here?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-graduation-cap" style="font-size: 26px;"></i> Student Time planner</h1>

                <p>Team STP ©2016 All Rights Reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <section class="login_content">
            <form action="./controller_signup.php" method="post">
            <h1>Create Account</h1>
            <div>
                <input type="text" class="form-control" placeholder="First Name" name="firstname" required="" />
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Last Name" name="lastname" required="" />
            </div>
            <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
            </div>
            <div> 
                        <select class="form-control" name="user_type" required>
                            <?php
                            //$stmt = $con->prepare($user_type_query);
                            $results = $con->query($user_type_query);
                            
                            ?>
				<option value="">User Type</option>
                                <?php while($row = $results->fetch_assoc()) {
                                 if($row["user_Type_ID"]!=1)  
                                 {
                                 ?>
                                <option value="<?php echo $row["user_Type_ID"]; ?>"><?php echo $row["Type_Code"]; ?></option>
                                <?php 
                                 }
                                 } 
                                $results->free();
                                // close connection 
                               // $con->close();
                                ?>
			</select>
            </div>
            <br/>
	    
            <div>
                <select class="form-control" required name="institute">
				               <?php
                            //$stmt = $con->prepare($user_type_query);
                            $results2 = $con->query($institute_query);
                            
                            ?>
				<option value="">Institute</option>
                                <?php while($row = $results2->fetch_assoc()) { ?>
                                <option value="<?php echo $row["Institute_ID"]; ?>"><?php echo $row["Institute_Name"]; ?></option>
                                <?php } 
                                $results2->free();
                                // close connection 
                                $con->close();
                                ?>
			</select>
            </div>
			<br/>
                       
            
                        
            <div>
               
                <input id="username" type="text" class="form-control" placeholder="Username" name="username" required="" />
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <div>
                <button id="submit_button"  class="btn btn-default alignright">Submit</button>
            </div>
                         <label id="username_label" class="text-danger" style="visibility: hidden;">Username already exists</label>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
                <div>
                <h1><i class="fa fa-graduation-cap" style="font-size: 26px;"></i> Student Time planner</h1>

                <p>©2016 All Rights Reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>
    <script>
   
    $('#username').keyup(
            function(){
                username=$('#username').val();
               $.getJSON('controler_login_username_check.php?username='+username,function (data){
                   if(data.count>0){
                       
                       $('#username_label').attr('style','visibility: show');
                        $('#submit_button').prop('disabled',true);
                   }
                   else{
                       $('#username_label').attr('style','visibility: hidden');
                        $('#submit_button').prop('disabled',false);
                   }
               })
            }
            );
    </script>
</body>

</html>
