<?php
include("includes/sidebar.php");
include("../includes/config.php");

$id = $_SESSION['admin_id'];
$query = mysqli_query($database, "SELECT * FROM courses WHERE admin_id='$id' ORDER BY id ASC");

unset($_SESSION['msg']);



if (isset($_GET['del'])) {
  mysqli_query($database, "DELETE FROM courses WHERE id = '" . $_GET['id'] . "'");
  $_SESSION['delmsg'] = "Course deleted !!";
  header('location: dashboard.php');

}


?>


<div class="content">

  <h2>Welcome <?php echo strtoupper($_SESSION['admin_first_name']); ?>, </h2>

  <h3 style="padding-top:90px;color:tomato;">My Courses.</h3>




  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Course</th>
        <th scope="col">Date</th>
        <th scope="col">Period</th>
        <th scope="col">Class Limit</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;  // LOOP TILL END OF DATA 
      while ($rows = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $rows['course']; ?></td>
          <td><?php echo $rows['course_date']; ?></td>
          <td><?php echo $rows['period']; ?></td>
          <td><?php echo $rows['class_limit']; ?></td>
          <td><a class="btn btn-outline-success" href="course_details.php?id=<?php echo $rows['id'] ?>">View </a></td>
          <td><a class="btn btn-outline-danger" href="dashboard.php?id=<?php echo $rows['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete </a></td>
        </tr>

      <?php
        $i++;
      }
      ?>

    </tbody>
  </table>


</div>

</body>

</html>