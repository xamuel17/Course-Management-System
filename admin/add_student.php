<?php



include('../includes/config.php');
include("includes/sidebar.php");

if (isset($_POST['submit'])) {
    $enrollment_no = $_POST['enrollment_no'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    //check if enrollment number already exists
    $query = mysqli_query($database, "SELECT * FROM students WHERE enrollment_no='$enrollment_no'");

    if($query){
        $_SESSION['msgr'] = "Enrollment number already taken!.";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $update_query = mysqli_query($database, "INSERT INTO students (enrollment_no,fistname,lastname,password,department) VALUES ('$enrollment_no','$firstname', '$lastname', '$hashed_password', '$department' )");


    if ($update_query) {
        $_SESSION['msgr'] = "Added Students !!";
        header('location:  registered_students.php');
    } else {
        $_SESSION['msgr'] = "Error : Student coudn't be added.";
    }
}
?>







<div class="content">


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Student:</h2>
                    <div class="title"><?php if (isset($_SESSION['msgr'])) {
                                            print_r($_SESSION['msgr']);
                                        } ?></div>
                </div>
                <div class="card-body">




                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enrollment Number</label>
                            <input type="text" class="form-control" name="enrollment_no" pattern="[A-Z]+[0-9]+" required="">
                            <small id="emailHelp" class="form-text text-muted">This number should be unique for each student.</small>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">FirstName</label>
                            <input type="text" class="form-control" name="firstname" required>

                        </div>




                        <div class="form-group">
                            <label for="exampleInputEmail1">LastName</label>
                            <input type="text" class="form-control" name="lastname" required>

                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Department</label>
                            </div>
                            <select name="department" class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Physics">Physics</option>
                                <option value="Computer_Science">Computer Science</option>
                            </select>
                        </div>



                        <button type="submit" onClick="return confSubmit(this.form);" class="btn btn-primary">CREATE STUDENT </button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="../others/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="../others/vendor/select2/select2.min.js"></script>
<script src="../others/vendor/datepicker/moment.min.js"></script>
<script src="../others/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="../others/js/global.js"></script>

</body>

</html>
<!-- end document-->