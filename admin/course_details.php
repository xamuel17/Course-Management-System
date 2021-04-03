<?php

include("includes/sidebar.php");
include("../includes/config.php");

if (isset($_GET['id'])) {
    $enrollNo = $_GET['id'];
    $query = mysqli_query($database, "SELECT * from courses WHERE id='$enrollNo'");
    $values = mysqli_fetch_assoc($query);
} else {
    header('location: dashboard.php');
}




if (isset($_POST['submit'])) {

    $id = $_POST['enroll_no'];
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course'];
    $period = $_POST['period'];
    $class_limit = $_POST['class_limit'];
    $content = $_POST['content'];
    $update_query = mysqli_query($database, "UPDATE `courses` SET `course` = '$course_title', `course_code` = '$course_code', `period` = '$period', `class_limit` = '$class_limit',`content`='$content' WHERE `id` = '$id'");


    if ($update_query) {
        $_SESSION['msg'] = "Enrollment Updated !!";
    } else {
        $_SESSION['msg'] = "Error : Enrollment couldn't be Updated.";
    }
}


?>



<div class="content">


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"> <?php echo $values['course']; ?></h2>

                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">

                            <br>
                            <div class="title"><?php

                                                if (isset($_SESSION['msg'])) {
                                                    print_r($_SESSION['msg']);
                                                }

                                                ?>
                            </div>
                        </div>





                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Title</label>
                                <input type="email" class="form-control" name="course" value="<?php print_r($values['course']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Code</label>
                                <input type="email" class="form-control" name="course_code" value="<?php print_r($values['course_code']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label>

                                <select name="department" class="form-control" required="">
                                    <option value="Computer_science">Computer Science</option>
                                    <option value="Mathematics">Mathematics</option>

                                </select>


                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Period</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="period" value="<?php print_r($values['period']) ?>" aria-describedby="emailHelp" readonly>

                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Class Limit</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="class_limit" value="<?php print_r($values['class_limit']) ?>" aria-describedby="emailHelp" readonly>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>

                                <textarea name="content" name="content" class="form-control" id="" cols="30" rows="10" readonly><?php print_r($values['content']) ?></textarea>

                            </div>





                            <div>
                                <button name="submit" class="btn btn-success" onClick="return confUpdate(this.form);" type="submit">Update</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>