 <div class="pagetitle">
      <h1>Manage Departments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Manage Departments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row">
                <div class="col-md-8">
                   <h5 class="card-title">Manage Departments</h5>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal">
                 Add Departments
              </button>
          </div>
           
              </div>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


              $item = null;
              $value = null;
              $users = DepartmetnCtrl::ShowDepartmetnCtrl($item,$value); 
              foreach ($users as $key => $value) { 
                
                       echo
                       '<tr>
                       <td>
                       '.($key+1).'</td>
                      <td>'.$value["department"].'</td>';
                      
                      
                      } 
                  ?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
 


  <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Department</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                 
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required name="department"  >
                        </div>
                      </div>

     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new DepartmetnCtrl();
            $useradd ->AddDepartmetnCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>