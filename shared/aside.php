<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="/agancy/">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
<?php if($_SESSION['auth']['role']==1){ ?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Supervisor</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/agancy/supervisor/add.php">
          <i class="bi bi-circle"></i><span>add</span>
        </a>
      </li>
      <li>
        <a href="/agancy/supervisor/list.php">
          <i class="bi bi-circle"></i><span>list</span>
        </a>
      </li>
      <li>
        <a href="/agancy/roles/add.php">
          <i class="bi bi-circle"></i><span>role</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Components Nav -->
<?php }

 if($_SESSION['auth']['role']==1){ 
?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/agancy/employees/add.php">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="/agancy/employees/list.php">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    
    </ul>
  </li><!-- End Forms Nav -->
  <?php }  if($_SESSION['auth']['role']==1){ ?>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/agancy/project/add.php">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="/agancy/project/list.php">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <?php }  if($_SESSION['auth']['role']==1){  ?>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>tasks</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/agancy/tasks/add.php">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="/agancy/tasks/list.php">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>

    </ul>
  </li><!-- End Charts Nav -->
  <?php }  if($_SESSION['auth']['role']==2){  ?>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>tasks_employees</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/agancy/tasks_emplyees/list.php">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
   
    </ul>
  </li><!-- End Icons Nav -->
  <?php }  ?>


</ul>

</aside><!-- End Sidebar-->