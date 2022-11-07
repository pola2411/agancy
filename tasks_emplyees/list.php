<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(2);
$em = $_SESSION['auth']['id'];

$s = "SELECT tasks.id,tasks.details,tasks.employee_id,tasks.create_at,tasks.update_at,project.title,project.description FROM `tasks` JOIN project on tasks.project_id=project.id WHERE tasks.employee_id=$em";
$qs = mysqli_query($con, $s);


?>




<main id="main" class="main">

<div class="container col-md-8">
        <h1>List Your tasks</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">Details</th>
                    <th scope="col">Title</th>
                    <th scope="col">SHOW </th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qs as $data) { ?>
                    <tr>
                        <td><?= $data['details'] ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><a href="/agancy/tasks_emplyees/show.php?task_id=<?php echo"$data[id]" ?>"> <i class='bx bx-show'></i> </a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>




</main>


</main>

<?php
include('../shared/footer.php');
include('../shared/script.php');

?>












