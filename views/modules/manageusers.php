

    <div class="pagetitle">
      <h1>Manage Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row">
                <div class="col-md-8">
                   <h5 class="card-title">User Accounts</h5>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                 Add Users
              </button>

                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Student">
                 Add Student
              </button>
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#parent">
                 Add Parent
              </button>
                </div>
              </div>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
              
                  </tr>
                </thead>
                <tbody>
                  <?php

              $item = null;
              $value = null;
              $users = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
              foreach ($users as $key => $value) { 
                
                       echo
                       '<tr>
                       <td>
                       '.($key+1).'</td>
                      <td>'.$value["fullname"].'</td>
                      <td>'.$value["username"].'</td>
                      <td>'.$value["userole"].'</td></tr>';
                        //  if ($value["status"] == 1) {
                        // echo'<td><button class="btn btn-success btnActivate btn-sm" userId="'.$value["id"].'" userStatus="0">Activate</button></td>';
                        //     }else{
                        // echo'<td><button class="btn btn-danger btnActivate btn-sm" userId="'.$value["id"].'"userStatus="1">Deactivated</button></td>';                
                        // }  

                      // echo'<td><button type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                      // <button type="button" class="btn btn-danger"> <i class="bi bi-eraser-fill"></i></button></td>';
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
                      <h5 class="modal-title">Add New User Admin Account</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="username">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Fullname</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="fullname">
                        </div>
                      </div>

                

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" required name="password">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="userole">
                            <option selected>Select Role</option>
                            <option value="System-Admin">Adminstrator</option>
                            <option value="HOD">HOD</option>
                            <option value="Accountant">Accountant</option>
                          </select>
                        </div>
                      </div>

     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageUserCtrl();
            $useradd ->AddManagerialUserCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>


               <div class="modal fade" id="Student" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Student Account</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="username1">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Fullname</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="fullname1">
                        </div>
                      </div>

                

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" required name="password">
                        </div>
                      </div>

     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageUserCtrl();
            $useradd ->AddManagerialUserCtrl1();
            ?>  

                     </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->


              





               <div class="modal fade" id="parent" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Parent Account</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="username2">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Fullname</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="fullname2">
                        </div>
                      </div>

                

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" required name="password1">
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Student</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="studentid" required="">
                            <option value="">Select Student</option>
                            <?php 
                             $item = null;
                             $value = null;
                             $clients = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
                            foreach ($clients as $key => $value) {

                              if ($value['userole'] == 'Student') {
                                echo '<option value="'.$value["id"].'">'.$value["fullname"].'</option>';
                              }
                              
                             }

                            ?>
                          </select>
                        </div>
                      </div>

     


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageUserCtrl();
            $useradd ->AddManagerialUserCtrl2();
            ?>  

                     </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->