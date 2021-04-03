<?php
include("includes/sidebar.php");
include("../includes/config.php");

$id = $_SESSION['admin_id'];
$query2 = mysqli_query($database, "SELECT * FROM courses WHERE admin_id='$id' ORDER BY id ASC");






unset($_SESSION['msg']);



if (isset($_GET['del'])) {
  mysqli_query($database, "DELETE FROM courses WHERE id = '" . $_GET['id'] . "'");
  $_SESSION['delmsg'] = "Course deleted !!";

  header('location: enrollment.php');
}


if(isset($_POST['submit']))

{
 $val =2;



    $course_id= $_POST['course'];

    $id = $_SESSION['admin_id'];
$query = mysqli_query($database, "SELECT * FROM enrollments WHERE admin_id='$id' AND course_id='$course_id' ORDER BY id ASC");
 
}


?>


<div class="content">

<h3 style="padding-top:90px;color:tomato;">My  Enrollments.</h3>

<br>

<form name="admin" method="post">
  <select name="course">
<?php 
while ($row = mysqli_fetch_array($query2, MYSQLI_ASSOC))
{


    echo "<option value='" . $row['id'] . "'>'" . $row['course'] . "'</option>";
   
}
?>        
</select>

<button type="submit" name="submit"> Search</button>

</form>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student Name</th>
        <th scope="col">Enrollment No</th>
        <th scope="col">Department</th>
        <th scope="col">Course Name</th>
        <th scope="col">Enrol Time</th>
        <th scope="col">Originator</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php if(isset($val)){?>
      <?php
      $i = 1;  // LOOP TILL END OF DATA 
      while ($rows = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>

          <?php

          //Admin username
          $id =  $rows['admin_id'];
          $query = mysqli_query($database,"SELECT username from admin WHERE id='$id'");
          $val2 = mysqli_fetch_assoc($query);

          //Course Name
          $course_id =  $rows['course_id'];
          $query = mysqli_query($database,"SELECT course from courses WHERE id='$course_id'");
          $val = mysqli_fetch_assoc($query);

          //Student details
          $student_id =  $rows['student_id'];
          $query = mysqli_query($database,"SELECT * from students WHERE id='$student_id'");
          $val3 = mysqli_fetch_assoc($query);


          ?>

<td><?php echo $val3['firstname']." ". $val3['lastname']; ?></td>
<td><?php echo $val3['enrollment_no']; ?></td>
<td><?php echo $val3['department']; ?></td>
          <td><?php echo $val['course']; ?></td>
          <td><?php echo $rows['create_at']; ?></td>
          <td><?php echo $val2['username'];?></td>
      </tr>

      <?php
        $i++;
      }
      ?>

      <?php }?>

    </tbody>
  </table>


</div>

</body>

</html>