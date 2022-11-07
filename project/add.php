<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$errors = [];
if(isset($_POST['send'])){
$title=strip_tags($_POST['title']);
$description=strip_tags($_POST['description']);
$sup_id=$_SESSION['auth']['id'];
if(trim($title=="")){
    $errors[] = "please enter title";
}
if(trim($description)==""){
    $errors[] = "please enter description";
}


if(empty($errors)){
$i="INSERT INTO `project`(`id`, `title`, `description`, `super_id`, `create_at`, `update_at`) VALUES (NULL,'$title','$description',$sup_id,default,default)";
$q_i=mysqli_query($con,$i);
go("project/list.php");
}
}
?>



<main id="main" class="main">

<div class="container">
<h1>Add Project</h1>

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
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1">
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

