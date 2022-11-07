<?php 
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connect.php');
include('../general/function.php');
role(1);
$s = "SELECT * FROM `supervisor`";
$qs = mysqli_query($con, $s);


?>




<main id="main" class="main">

<div class="container col-md-8">
        <h1>List Supervisor</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">SHOW</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qs as $data) { ?>
                    <tr>
                        <td><?php echo "$data[id]" ?></td>
                        <td><?php echo "$data[name]" ?></td>
                      <td><a href="/agancy/supervisor/show.php?show=<?php echo"$data[id]" ?>"> <i class='bx bx-show'></i> </a></td>

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












