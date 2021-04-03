<?php
include("includes/sidebar.php");
include("../includes/config.php");

$id = $_SESSION['student_id'];


$query2 = mysqli_query($database, "SELECT * FROM enrollments e JOIN courses c  ON c.id = e.course_id WHERE e.student_id ='$id'");
$row = mysqli_fetch_array($query2, MYSQLI_ASSOC);






unset($_SESSION['msg']);



if (isset($_GET['del'])) {
  mysqli_query($database, "DELETE FROM enrollments WHERE id = '" . $_GET['id'] . "'");
  $_SESSION['delmsg'] = "Course deleted !!";
}




?>


<div class="content">

<h3 style="padding-top:90px;color:tomato;">My  Enrollments.</h3>

<br>




  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Course Name</th>
        <th scope="col">Course Code</th>
        <th scope="col">Department</th>
        <th scope="col">Period</th>
        <th scope="col">Enroll Date</th>
        <th></th>
    
      </tr>
    </thead>
    <tbody>

    
    <?php
 
    
    if(isset($row)){?>
      <?php
      $i = 1;  // LOOP TILL END OF DATA 
      while ($row = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {

      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>

    

<td><?php echo $row['course'] ?></td>
<td><?php echo $row['course_code']; ?></td>
<td><?php echo $row['department']; ?></td>
          <td><?php echo $row['period']; ?></td>
          <td><?php echo $row['create_at']; ?></td>
          <td><a class="btn btn-outline-success" href="course_details.php?id=<?php echo $row['course_id'] ?>">View </a></td>
        
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