<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(2);
$task_id = $_GET['task_id'];

$s = "SELECT tasks.id,tasks.details,tasks.employee_id,tasks.create_at,tasks.update_at,project.title,project.description,project.id as project_id FROM `tasks` JOIN project on tasks.project_id=project.id  WHERE tasks.id=$task_id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);
$errors = [];

    if(isset($_POST['send'])){
        $details=strip_tags($_POST['de']);
        if (trim($details=="")) {
            $errors[] = "please enter details";
        }
        $pro_id=$row['project_id'];
        $task_id=$row['id'];
        $em_id=$_SESSION['auth']['id'];
        if(empty($errors)){
            $i="INSERT INTO `em_task`(`id`, `pro_id`, `task_id`, `employee_id`, `details`, `create_at`) VALUES (NULL,$pro_id, $task_id,$em_id,'$details',default)";
            $qi=mysqli_query($con,$i);
            go('/tasks_emplyees/list.php');
        }

    }

?>




<main id="main" class="main">
<div class="container">

<div class="card col-md-8">
    <h1>informations about <span class="name_show"><?php echo "$row[title]" ?></span>  </h1>
    <hr>
    <div class="card-body">
       
        <h3>project description: <?php echo "$row[description]" ?> </h3>
        <hr>
        <h3>task details: <?php echo "$row[details]" ?> </h3>
        <hr>
        <h3>create at: <?php echo "$row[create_at]" ?> </h3>
        <hr>
        <h3>update at: <?php echo "$row[update_at]" ?> </h3>
        <hr>

        <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Details</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="de" >
                    </div>
                 


                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                </form>


  
      
   







    </div>

</div>

</div>


</main>


<?php
include('../shared/footer.php');
include('../shared/script.php');

?>