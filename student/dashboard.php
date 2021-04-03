<?php



include('../includes/config.php');
include("includes/sidebar.php");


$query = mysqli_query($database, "SELECT * FROM courses");


if (isset($_GET['enroll'])) {
//check if course has been previously enrolled
$student_id =  $_SESSION['student_id'];
$query = mysqli_query($database, "SELECT * FROM enrollments WHERE course_id= '" . $_GET['id'] . "' AND student_id = '$student_id' LIMIT 1");
$values = mysqli_fetch_row($query);

if( $values != 0 ){

  $_SESSION['errmsg'] = "Student Has Previously For Course";
  header('location:  dashboard.php');

}else{
 //check if class limit is exceeded
 

 $id = $_GET['id'];
 $query = mysqli_query($database,"SELECT class_limit from courses WHERE id='$id'");
 $values = mysqli_fetch_assoc($query);


 $query = mysqli_query($database,"SELECT count(1) from enrollments WHERE course_id='$id'");
 $rowcount = mysqli_fetch_array($query, MYSQLI_BOTH);


 


    $vals = (int) $values['class_limit'];
$rwcount = (int) $rowcount[0];



  if($vals <= $rwcount){
   
   

    $_SESSION['errmsg'] = "Enrollment Limit Has been Exceeded"; 
    header('location:  dashboard.php');

  }
 else{
 


  //enroll student
  $admin_id =   $_SESSION['course_admin_id'];

  // print_r($admin_id);
  // die();

  $update_query = mysqli_query($database, "INSERT INTO enrollments (admin_id,course_id,student_id) VALUES ('$admin_id','$id', '$student_id' )");


  if ($update_query) {
      $_SESSION['errmsg'] = "Course Enrolled !!";
      header('location:  enrollments.php');
  } else {
      $_SESSION['errmsg'] = "Error : Student coudn't be added.";
  }

 }
}
 






}



?>



<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>





<div class="content" style="padding: 100px;">
 
<h1 style="color:tomato;">Available Courses</h1>



<h2>
<div class="title"><?php

if(isset($_SESSION['errmsg']))
{
    print_r($_SESSION['errmsg']);
}

?>
</div>
</h2>
<?php
      $i = 1;  // LOOP TILL END OF DATA 
      while ($rows = mysqli_fetch_array($query, MYSQLI_BOTH)) {


      ?>

<div class="row">

<div class="card">
  <img src="./../assets//images/book.jpg" alt="Avatar" style="width:10%">
  <div class="container">
    <h4><b><?php echo $rows['course']; ?></b>&nbsp;(<?php echo $rows['course_code']; ?>)</h4> 
    <?php $course_id = $rows['id'];
     $_SESSION['course_admin_id'] = $rows['admin_id'];
    ?>

<i style="color:red;">Class Limit :<?php echo $rows['class_limit']?></i>
<br>

    <a style="float:right;" class="btn btn-outline-danger" href="dashboard.php?id=<?php echo $rows['id'] ?>&enroll=create"> Enroll</a>
  </div>
</div>

</div>
<br><br>


<?php



        $i++;
      }
      ?>







</div>
<!-- partial -->

</body>
</html>