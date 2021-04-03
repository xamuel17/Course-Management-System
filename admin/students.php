<?php

include("includes/sidebar.php");
include("../includes/config.php");


if (isset($_GET['del'])) {
  mysqli_query($database, "DELETE FROM students WHERE Enrollment_No = '" . $_GET['id'] . "'");
  $_SESSION['delmsg'] = "Course deleted !!";
}

?>







<div class="content">
  <h1>All Students Data</h1>
  <h6> Last updated <?php print_r(date("Y-m-d")); ?></h6>

  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
    <!-- Table starts here -->
    <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>#</th>
          <th>Enrollment Number</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Department</th>

        </tr>
      </thead>
      <tbody>

        <?php

        $data = mysqli_query($database, "SELECT * FROM students");
        $count = 0;
        while ($row = mysqli_fetch_array($data)) {
        ?>
          <tr>
          <tr>
            <td><?php echo $count + 1; ?></td>
            <td><?php echo htmlentities($row['enrollment_no']); ?></td>
            <td><?php echo htmlentities($row['firstname']); ?></td>
            <td><?php echo htmlentities($row['lastname']); ?></td>
            <td><?php echo htmlentities($row['department']); ?></td>

            <td>
              <a href="edit/view.php?id=<?php echo $row['Enrollment_No'] ?>">
                <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
              <a href="students.php?id=<?php echo $row['enrollment_no'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                <button class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
        <?php
          $count++;
        } ?>
      </tbody>
    </table>
  </div>
</div>


<!-- partial -->
<script src="./script.js"></script>

</body>

</html>