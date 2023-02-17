 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <?php if ($_SESSION["userole"] == "System-Admin"): ?>
         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="manageusers">
              <i class="bi bi-circle"></i><span>All Users</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#componentssemis" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Set Semister</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="componentssemis" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="semister">
              <i class="bi bi-circle"></i><span>Add Semister</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    
      <?php elseif ($_SESSION["userole"] == "Parent"): ?>
         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Parent Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewstudntresults">
              <i class="bi bi-circle"></i><span>View Results</span>
            </a>
          </li>
           <li>
            <a href="viewfeesinfo">
              <i class="bi bi-circle"></i><span>School Fees Info</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="sendnotification">
          <i class="bi bi-grid"></i>
          <span>Send Comment</span>
        </a>
        <?php elseif ($_SESSION["userole"] == "Student"): ?>
             <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Student Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentviewrslt">
              <i class="bi bi-circle"></i><span>View Results</span>
            </a>
          </li>
          
        </ul>
      </li>

      <?php elseif ($_SESSION["userole"] == "Accountant"): ?>
           <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Student School Fees</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewschoolfees">
              <i class="bi bi-circle"></i><span>View Student School Fees</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Tables Nav -->


       <?php elseif ($_SESSION["userole"] == "HOD"): ?>
          <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Student Results</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentresults">
              <i class="bi bi-circle"></i><span>Add Student Results</span>
            </a>
          </li>
           <li>
            <a href="viewstudentresults">
              <i class="bi bi-circle"></i><span>View Student Results</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

     
    
      <li class="nav-item">
        <a class="nav-link " href="notifications">
          <i class="bi bi-grid"></i>
          <span>Notification</span>
        </a>
      </li><!-- End Dashboard Nav -->
 
     
      <?php endif ?>
     
    </ul>

  </aside><!-- End Sidebar-->