<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../assets/css/admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css" >

    <script type="text/javascript">
        function confSubmit(form) {
            if (confirm("Are you sure you want to Add the Course?")) {
                form.submit();
            } else {
                return false;
            }
        }


        function confUpdate(form){
            if (confirm("Are you sure you want to Update the Course?")) {
                form.submit();
            } else {
                return false;
            }

        }
    </script>

</head>

<body>

    <div class="sidebar">
        <a class="active" href="dashboard.php">Home</a>
        <a href="enrollments.php">My Enrollments</a>


        <a href="logout.php">Logout</a>

    </div>