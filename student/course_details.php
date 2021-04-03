<?php

include("includes/sidebar.php");
include("../includes/config.php");

echo $_GET['id'];

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $query = mysqli_query($database, "SELECT * from courses WHERE id='$course_id'");
    $values = mysqli_fetch_assoc($query);
} else {
    header('location: dashboard.php');
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
    <input type="email" class="form-control" value="<?php print_r($values['course']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
   
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Course Code</label>
    <input type="email" class="form-control"  value="<?php print_r($values['course_code']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Department</label>
    <input type="email" class="form-control" id="exampleInputEmail1" value="<?php print_r($values['department']) ?>" aria-describedby="emailHelp" readonly>
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Period</label>
    <input type="email" class="form-control" id="exampleInputEmail1" value="<?php print_r($values['period']) ?>" aria-describedby="emailHelp" readonly>
   
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1">Class Limit</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php print_r($values['class_limit']) ?>" aria-describedby="emailHelp" readonly>
   
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
 
    <textarea name="content"  class="form-control" id="" cols="30" rows="10" readonly><?php print_r($values['content']) ?></textarea>
   
  </div>



  
</form>













                </div>
            </div>
        </div>
    </div>
</div>