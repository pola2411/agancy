<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$id=$_GET['edit'];
$s="SELECT * FROM `project` WHERE id=$id";
$q_s=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($q_s);
$errors = [];
if(isset($_POST['send'])){
$title=strip_tags($_POST['title']);
$description=strip_tags($_POST['description']);
$sup_id=$_SESSION['auth']['id'];
if(trim($title=="")){
    $errors[] = "please enter title$title";
}
if(trim($description)==""){
    $errors[] = "please enter description";
}


if(empty($errors)){
$i="UPDATE `project` SET `title`='$title',`description`='$description',`update_at`=default WHERE id=$id";
$q_i=mysqli_query($con,$i);
go("project/list.php");
}
}
?>



<main id="main" class="main">

<div class="container">
<h1>Update Project</h1>

<div class="card col-md-8" >
<?php if (empty($errors)) {
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $errors_view) { ?>
                            <li><?= $errors_view ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
  <div class="card-body">
  <form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" value="<?= $row['title'] ?>" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" value="<?= $row['description'] ?>" class="form-control" name="description" id="exampleInputPassword1">
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

