<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$s="SELECT * FROM `role`";
$qs=mysqli_query($con,$s);
$errors = [];
if(isset($_POST['send'])){

$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
$password=strip_tags($_POST['password']);
$new_pass=sha1($password);
$role_id=strip_tags($_POST['role']);
$image_name=time() . $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];

if(trim($name=="")){
    $errors[] = "please enter name";
}
if(trim($email)==""){
    $errors[] = "please enter email";
}
if(trim($password)==""){
    $errors[] = "please enter password";
}
if (($size / 1024) / 1024 > 1) {
  $errors[] = "you must enter img less than 1:M";
}
if (($type == "image/jpeg") || ($type == "image/png") || ($type == "image/jpg")) {
} else {
  $errors[] = "you must enter img type png jpg jpeg ";
}












if (empty($errors)) {

$location="./upload/";
move_uploaded_file($tmp_name,$location.$image_name);
$i="INSERT INTO `supervisor`(`id`, `name`, `email`, `password`, `image`, `role_id`) VALUES (Null,'$name','$email','$new_pass','$image_name',$role_id)";
$qi=mysqli_query($con,$i);
if($qi){
  go('supervisor/list.php');
}
else{
  go('supervisor/add.php');
}

}

}



?>
  <main id="main" class="main">

<div class="container">
<h1>Add Supervisor</h1>

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
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="image" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <select name="role" id=""class="form-control">
<?php   foreach($qs as $data) { ?>
<option  value="<?php echo "$data[id]" ?>"><?php echo "$data[name]" ?></option>
<?php }?>
    </select>

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

