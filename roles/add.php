<?php
include("../shared/head.php");
include("../shared/nav.php");
include("../shared/aside.php");
include("../general/connect.php");
include("../general/function.php");
role(1);
$s = "SELECT * FROM `role`";
$qs = mysqli_query($con, $s);
$errors = [];
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    if(trim($name=="")){
        $errors[] = "please enter name";
    }
    if (empty($errors)) {
    $insert = "INSERT INTO `role` VALUES (NULL,'$name')";
    $qi = mysqli_query($con, $insert);
    go("/roles/add.php");
    }
}


?>
<main id="main" class="main">
    <div class="container col-md-8">
        <h1>List Roles</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Name</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qs as $data) { ?>
                    <tr>
                        <td><?php echo "$data[id]" ?></td>
                        <td><?php echo "$data[name]" ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="line"></div>
    <div class="container">
        <h1>Add Roles</h1>
        <div class="card col-md-8">
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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                    </div>


                    <button type="submit" name="send" class="my_btn btn btn-info">Submit</button>
                </form>

            </div>

        </div>

    </div>
</main>


<?php
include("../shared/footer.php");
include("../shared/script.php");



?>