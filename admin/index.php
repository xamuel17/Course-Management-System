<?php
session_start();

include("../includes/config.php");




if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $Password = $_POST['Password'];
  

  $query = mysqli_query($database, "SELECT * FROM admin WHERE username='$username'");
  $result = mysqli_fetch_row($query);
 

  if ($result > 0) {
    
    $password = $_POST['Password'];
    $hashed_password = $result[2];
    if(password_verify($password, $hashed_password)) {
      // If the password inputs matched the hashed password in the database
      // Do something, you know... log them in.
      $_SESSION['admin_username'] = $_POST['username'];
      $_SESSION['admin_id'] = $result[0];
      $_SESSION['admin_first_name'] = $result[3];
      $_SESSION['admin_last_name'] = $result[4];
      $_SESSION['success'] = "logged you in";
      $log_user = true;
  } else{

   
  }


  
  } else {

    $_SESSION['msg'] = "Invalid Reg no or Password";
    $log_user = false;
  }
}

if (isset($log_user)) {
  if ($log_user) {
    header('location: dashboard.php');
    unset($_SESSION['msg']);
  } else {
    session_destroy();
    header('location: ./');
  }
}
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Admin Panel // Demo University</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link href="./../assets/bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="./../assets/assets/css/ct-paper.css" rel="stylesheet" />
  <link href="./../assets/css/demo.css" rel="stylesheet" />
  <link href="./../assets/css/examples.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>


</head>

<body>
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
        <a class="navbar-brand" href="">Demo University</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navigation-example-2">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li>
                <a href="#" class="btn btn-simple">Components</a>
            </li> -->
          <li>
            <a href="../" class="btn">Student Login</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
  </nav>


  <div class="wrapper">
    <div class="register-background">
      <div class="filter-black"></div>

      <div class="container">
        <!-- <div><?php print_r($_SESSION); ?></div> -->
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
            <div class="register-card">
              <h3 class="title">Administrative Panel</h3>
              <form name="student" method="post">
                <label>Admin ID </label>
                <input type="text" name="username" class="form-control has-success " placeholder="Username">

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