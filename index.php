<?php 
include('./shared/head.php');
include('./shared/nav.php');
include('./shared/aside.php');
include('./general/connect.php');
include('./general/function.php');


?>
  <main id="main" class="main">
  </main>
<?php

echo $_SESSION['auth']['role'];

?>
  <?php
  include('./shared/footer.php');
  include('./shared/script.php');

  ?>