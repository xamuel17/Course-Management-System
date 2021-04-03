<?php
session_start();
session_destroy();
session_start();

include("includes/config.php");

if (isset($_POST['submit'])) {

  $Enrollment_No = $_POST['Enrollment_No'];
  $Password = $_POST['Password'];

  $query = mysqli_query($database, "SELECT * FROM students WHERE Enrollment_No='$Enrollment_No'");
  $result = mysqli_fetch_array($query);

  if ($result > 0) {

    $password = $_POST['Password'];
    $hashed_password = $result[5];
    if(password_verify($password, $hashed_password)) {

      $_SESSION['Enrollment_No'] = $_POST['Enrollment_No'];
      $_SESSION['student_id'] = $result[0];
      $_SESSION['student_fullname'] = $result[2].' '.$result[3];
      $_SESSION['success'] = "logged you in";
      $log_user = true;

    }

  } else {
    $_SESSION['errmsg'] = "Invalid Reg no or Password";
    $log_user = false;
  }
}

if (isset($log_user)) {
  if ($log_user) {
    unset($_SESSION['errmsg']);
    header('location: student/dashboard.php');
  } else {
    //session_destroy();
    header('location: index.php');
  }
}
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- <link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Student Registration // Demo University</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="assets/bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/assets/css/ct-paper.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />
  <link href="assets/css/examples.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>


</head>

<body style="bg-color:whg">
  <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Demo University</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navigation-example-2">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li>
                <a href="#" class="btn btn-simple">Components</a>
            </li> -->
          <li>
            <a href="./admin/" class="btn ">Admin Login</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
  </nav>


  <div class="wrapper">
    <div class="register-background">
      <div class="filter-black"></div>

      <div class="container">
        <?php
        if (isset($_SESSION['errmsg'])) {
          print_r("<div class=\"alert alert-danger\">Invalid ID or Passord , Please try again.</div>");
        }
        ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
            <div class="register-card">
              <h3 class="title">Student Login</h3>
              <form name="student" method="post">
                <label>Enrollment No </label>
                <input type="text" name="Enrollment_No" class="form-control has-success " placeholder="CSB17074">

                <label>Password</label>
                <input type="password" name="Password" value="" class="form-control" placeholder="Password">
                <button name="submit" type="submit" class="btn btn-danger btn-block">Log in</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      <div class="footer register-footer text-center">

      </div>
    </div>
  </div>

</body>


</html>