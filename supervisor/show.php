<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
$id=$_GET['show'];
role(1);
$s = "SELECT * FROM `supervisor` WHERE id=$id";
$qs = mysqli_query($con, $s);
$row=mysqli_fetch_assoc($qs);

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$d="DELETE FROM `supervisor` WHERE id=$id";
$qd=mysqli_query($con,$d);
if($qd){
    go("supervisor/list.php");
}

}


?>
<main id="main" class="main">
<div class="container">

<div class="card col-md-8">
    <h1>informations about <span class="name_show"><?php echo "$row[name]" ?></span>  </h1>
    <hr>
    <div class="card-body">
        <h3>Name: <?php echo "$row[name]" ?> </h3>
        <hr>
  
      
        <h4>Email: <?php echo "$row[email]" ?> </h4>
        <hr>
        <a href="/agancy/supervisor/list.php"  class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
        <a href="/agancy/supervisor/show.php?delete=<?php echo"$row[id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
       








    </div>

</div>

</div>


</main>


<?php
include('../shared/footer.php');
include('../shared/script.php');

?>




