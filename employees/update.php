<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$id=$_GET['edit'];
$s_em="SELECT * FROM `employees` WHERE id=$id";
$q_s_em=mysqli_query($con,$s_em);
$row=mysqli_fetch_assoc($q_s_em);

$s="SELECT * FROM `role`";
$qs=mysqli_query($con,$s);
$errors = [];
if(isset($_POST['send'])){

$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
$password=strip_tags($_POST['password']);
$new_pass=sha1($password);
$role_id=strip_tags($_POST['role']);
$address=strip_tags($_POST['address']);
$age=strip_tags($_POST['age']);
if(empty($_FILES['image']['name'])){
    $image_name=$row['image'];
}else{
    unlink("./upload/$row[image]");
$image_name=time() . $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];
$location="./upload/";
if (($size / 1024) / 1024 > 1) {
    $errors[] = "you must enter img less than 1:M";
}
if (($type == "image/jpeg") || ($type == "image/png") || ($type == "image/jpg")) {
} else {
    $errors[] = "you must enter img type png jpg jpeg ";
}
}

if(trim($name=="")){
    $errors[] = "please enter name";
}
if(trim($email)==""){
    $errors[] = "please enter email";
}
if(trim($password)==""){
    $errors[] = "please enter password";
}
if(trim($address)==""){
    $errors[] = "please enter address";
}
if(trim($age)==""){
    $errors[] = "please enter age";
}








if (empty($errors)) {


move_uploaded_file($tmp_name,$location.$image_name);
$i="UPDATE `employees` SET `name`='$name',`email`='$email',`password`='$new_pass',`address`='$address',`age`='$age',`image`='$image_name',`role_id`='$role_id' WHERE id=$id";
$qi=mysqli_query($con,$i);
if($qi){
  go('employees/list.php');
}
else{
  go('employees/add.php');
}




}
}


?>
  <main id="main" class="main">

<div class="container">
<h1>Add Employee</h1>

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
    <input type="text" value="<?php echo"$row[name]" ?>" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email"  value="<?php echo"$row[email]" ?>" class="form-control" name="email" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  value="<?php echo"$row[password]" ?>" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text"  value="<?php echo"$row[address]" ?>" class="form-control" name="address" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Age</label>
    <input type="number"  value="<?php echo"$row[age]" ?>" class="form-control" name="age" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="image" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <select name="role" id=""class="form-control">
<?php   foreach($qs as $data) { ?>
<option  value="<?php echo "$data[id]" ?>" <?php if($data['id']==$row['role_id']) {
    echo  "selected";
}?> ><?php echo "$data[name]" ?></option>
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

