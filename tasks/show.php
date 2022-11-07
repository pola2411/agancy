<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$pro_id = $_GET['show'];

$s = "SELECT tasks.id,tasks.project_id,tasks.details,tasks.employee_id,tasks.create_at,tasks.update_at,employees.name ,em_task.details as em_details,em_task.create_at as em_create FROM `tasks`  JOIN employees on tasks.employee_id=employees.id JOIN em_task ON tasks.id=$pro_id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $d="DELETE FROM `tasks` WHERE id=$id";
    $qd=mysqli_query($con,$d);
    if($qd){
        go("tasks/list_all.php");
    }
    
    }

?>




<main id="main" class="main">
<div class="container">

<div class="card col-md-8">
    <h1>informations about <span class="name_show"><?php echo "$row[id]" ?></span>  </h1>
    <hr>
    <div class="card-body">
       
        <h3>Name: <?php echo "$row[name]" ?> </h3>
        <hr>
        <h3>details: <?php echo "$row[details]" ?> </h3>
        <hr>
        <h3>task create at: <?php echo "$row[create_at]" ?> </h3>
        <hr>
        <h3>task update at: <?php echo "$row[update_at]" ?> </h3>
        <hr>
        <h3>employee reply: <?php echo "$row[em_details]" ?> </h3>
        <hr>
        <h3>employee reply at: <?php echo "$row[em_create]" ?> </h3>
        <hr>


  
      
        <a href="/agancy/tasks/list.php"  class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
        <a href="/agancy/tasks/update.php?edit=<?php echo"$row[id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>

        <a href="/agancy/tasks/show.php?delete=<?php echo"$row[id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
       








    </div>

</div>

</div>


</main>


<?php
include('../shared/footer.php');
include('../shared/script.php');

?>