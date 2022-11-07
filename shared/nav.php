<?php

if(isset($_GET['sign_out'])){
  session_unset();
  session_destroy();
  
}
?>




<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="/agancy/" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">AGANCY</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->



<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

   

 

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
   <?php if($_SESSION['auth']['role']==1){ ?>
      <img src="/agancy/supervisor/upload/<?= $_SESSION['auth']['image'] ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['auth']['name'] ?> </span>
    <?php } else{ 
      ?>
      
        <img src="/agancy/employees/upload/<?= $_SESSION['auth']['image']?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['auth']['name'] ?> </span>
    
      
        <?php }?>
   
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?= $_SESSION['auth']['name']  ?></h6>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

  
        <li>
          <hr class="dropdown-divider">
        </li>

        
        <li>
          <hr class="dropdown-divider">
        </li>

      
        <li>
          <hr class="dropdown-divider">
        </li>
        <form action="">
            <li>
              <button name="sign_out" class="sign_btn btn btn-danger"> <span class="sign">Sign Out</span><i class="bi bi-box-arrow-right"></i> </button>


            </li>
          </form>
        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->