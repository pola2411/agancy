<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$id=$_GET['show'];
$s = "SELECT project.id,project.title,project.description,project.create_at,project.update_at,supervisor.name,project.super_id  FROM `project` JOIN supervisor on project.super_id =supervisor.id where project.id=$id";
$qs = mysqli_query($con, $s);
$row=mysqli_fetch_assoc($qs);

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$d="DELETE FROM `project` WHERE id=$id";
$qd=mysqli_query($con,$d);
if($qd){
    go("project/list.php");
}

}


?>
<main id="main" class="main">
<div class="container">

<div class="card col-md-8">
    <h1>informations about <span class="name_show"><?php echo "$row[title]" ?></span>  </h1>
    <hr>
    <div class="card-body">
    <h3>Name: <?php echo "$row[name]" ?> </h3>
        <hr>
        <h3>Title: <?php echo "$row[title]" ?> </h3>
        <hr>
  
      
        <h4>Description: <?php echo "$row[description]" ?> </h4>
        <hr>
           
        <h4>Create At: <?php echo "$row[create_at]" ?> </h4>
        <hr>
           
        <h4>Update At: <?php echo "$row[update_at]" ?> </h4>
        <hr>
        
        <a href="/agancy/project/list.php"  class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>

            <?php 
            
            $super_id=$_SESSION['auth']['id'];
            if($row['super_id']==$super_id){
            
            ?>
        <a href="/agancy/project/update.php?edit=<?php echo"$row[id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
       

       
        <a href="/agancy/project/show.php?delete=<?php echo"$row[id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
       
        <?php  } ?>







    </div>

</div>

</div>


</main>


<?php
include('../shared/footer.php');
include('../shared/script.php');

?>




