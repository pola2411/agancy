<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$tasks_id=$_GET['edit'];
$s_tasks="SELECT * FROM `tasks` where id=$tasks_id";
$q_s_tasks=mysqli_query($con,$s_tasks);
$row1=mysqli_fetch_assoc($q_s_tasks);



$sup_id = $_SESSION['auth']['id'];

$s_pr = "SELECT * FROM `project` where super_id=$sup_id";
$q_s_pr = mysqli_query($con, $s_pr);
$s_em = "SELECT * FROM `employees`";
$q_s_em = mysqli_query($con, $s_em);

$errors = [];

if (isset($_POST['send'])) {
    $details = strip_tags($_POST['de']);
    $project_id = $_POST['project_id'];
    $em_id = $_POST['employee_id'];

    if (trim($details=="")) {
        $errors[] = "please enter details";
    }


    if (empty($errors)) {
        $i = "UPDATE `tasks` SET `project_id`='$project_id',`details`='$details',`employee_id`='$em_id',`update_at`=default WHERE id=$tasks_id";
        $q_i = mysqli_query($con, $i);
        go('tasks/list.php');
       
    }
}

?>



<main id="main" class="main">

    <div class="container">
        <h1>update task</h1>

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
                        <label for="exampleInputEmail1">Details</label>
                        <input type="text" value="<?= $row1['details'] ?>" class="form-control" id="exampleInputEmail1" name="de" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">project</label>

                        <select name="project_id" class="form-control">
                            <?php foreach ($q_s_pr as $data1) { ?>
                                <option value="<?php echo $data1['id']?>" <?php if($data1['id']==$row1['project_id']){   echo  "selected";} ?>><?= $data1['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Employee</label>

                        <select name="employee_id" class="form-control">
                            <?php foreach ($q_s_em as $data) { ?>
                                <option value="<?= $data['id'] ?>" <?php if($data['id']==$row1['employee_id']){   echo  "selected";} ?>><?= $data['name'] ?></option>
                            <?php } ?>
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