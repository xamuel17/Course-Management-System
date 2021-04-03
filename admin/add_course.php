<?php 
include("includes/sidebar.php");
include("../includes/config.php");

unset($_SESSION['msg']);


if(isset($_POST['submit']))

{
 
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course'];
    $period = $_POST['period'];
    $class_limit = $_POST['class_limit'];
    $content = $_POST['content'];
    $admin_id =   $_SESSION['admin_id'];

$update_query = mysqli_query($database,"INSERT INTO courses (admin_id,course_code,course,period,class_limit,content) 
                            VALUES ('$admin_id','$course_code','$course_title','$period','$class_limit', '$content')");



if($update_query)
{
    $_SESSION['msg']="Course Added !!";
    header('location: dashboard.php');
}
else
{
    print_r($update_query);
    $_SESSION['msg']="Error : Course couldn't be Updated.";
}

}




 ?>







<div class="content">


<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                
                    
                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">
                            <div class="name">Add Course</div>
                            <br>
                            <div class="title"><?php

if(isset($_SESSION['msg']))
{
    print_r($_SESSION['msg']);
}

?>
</div>
                        </div>






                                             
                        <div class="form-row">
                            <div class="name">Course Title</div>

                            
                            
                        <div class="col-2">
                                        <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="course"  required="">
                                        </div>
                                    </div>
                                </div>  



                                                     
                        <div class="form-row">
                            <div class="name">Course Code</div>
                        <div class="col-2">
                                        <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="course_code"  required="">
                                        </div>
                                    </div>
                                </div>  


                                                <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="department" required="">
                  <option value="Computer_science">Computer Science</option>
                  <option value="Mathematics">Mathematics</option>
                    
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        
                        <div class="form-row">
                            <div class="name">Period</div>
                        <div class="col-2">
                                        <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="period"  required="">
                                        </div>
                                    </div>
                                </div>  




                                <div class="form-row">
                            <div class="name">Class Limit</div>
                        <div class="col-2">
                                        <div class="input-group-desc">
                                        <input class="input--style-5" type="number" name="class_limit"  required="">
                                        </div>
                                    </div>
                                </div> 








                                
                                <div class="form-row">
                            <div class="name">Content</div>
                        <div class="col-2">
                                        <div class="input-group-desc">
                                     <textarea name="content" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div> 


                        <div>
                            <button name="submit" class="btn btn--radius-2 btn--red"   onClick="return confSubmit(this.form);" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>






