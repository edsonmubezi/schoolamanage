 <div class="pagetitle">
      <h1>Manage Semister</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Manage Semister</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row">
                <div class="col-md-8">
                   <h5 class="card-title">Manage Semister</h5>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal">
                 Add Semister
              </button>
          </div>
              <div class="col-md-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setactive">
                 Set Active Semister
              </button>
                  
                </div>
              </div>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Academic Year</th>
                    <th scope="col">Semister Name</th>
                    <th scope="col">Semister Status</th>
                  </tr>



                </thead>
                <tbody>
                  <?php

              $item = null;
              $value = null;
              $users = ManageSemister::ShowSemisterCtrl($item,$value); 
              foreach ($users as $key => $value) { 
                
                       echo
                       '<tr>
                       <td>
                       '.($key+1).'</td>
                      <td>'.$value["acyear"].'</td>
                      <td>'.$value["semistername"].'</td>';

                        if ($value["semisterstatus"] == 1) {
                        echo'<td><button class="btn btn-success  btn-sm" >Active </button></td>';
                            }else{
                        echo'<td><button class="btn btn-danger btnActivate btn-sm">In Active</button></td>';                
                        }  
                      
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
                      <h5 class="modal-title">Add New Semister</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                    
                      <?php
                       date_default_timezone_set("Africa/Dar_es_Salaam");
						$date = date('Y');
						$dateone = $date -1;
                       $academicyear = $dateone.'/'.$date;
                       ?>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Academic Year</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required name="acyear" value="<?php echo $academicyear; ?>" readonly>
                        </div>
                      </div>

              

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Semister</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="semister">
                            <option selected>Select Semister</option>
                            <option value="Semister One">Semister One</option>
                            <option value="Semister Two">Semister Two</option>
                          </select>
                        </div>
                      </div>

     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageSemister();
            $useradd ->AddSemisterCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>


  <div class="modal fade" id="setactive" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Set Active  Semister</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

            
              

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Semister</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="semisterid">
                            <option selected>Select Semister</option>
                            <?php 
                             $item = null;
                             $value = null;
                             $clients = ManageSemister::ShowSemisterCtrl($item,$value); 
                            foreach ($clients as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["acyear"].'-'.$value["semistername"].'</option>';
                        
                             }

                            ?>
                          </select>
                        </div>
                      </div>


     


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">SET ACTIVE</button>
                    </div>
                       <?php
            $useradd = new ManageSemister();
            $useradd ->SetActiveSemisterCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>

