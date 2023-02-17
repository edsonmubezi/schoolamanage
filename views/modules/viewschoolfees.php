
    <div class="pagetitle">
      <h1>View Student School Fees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">View Student School Fees</li>
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
                   <h5 class="card-title">View Student School Fees</h5>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    New Record
                   </button>
                </div>
              </div>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Total School Fees</th>
                    <th scope="col">Paid School Fees</th>
                     <th scope="col">Balance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $cnt = 0;
              $item = null;
              $value = null;
              $users = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
              foreach ($users as $key => $value) { 

                $itemt = 'id';
                $valuet = $value["id"];
                $fees = ManageSchoolFeesInfoCtrl::ShowFeesSchoolInfoCtrl($itemt,$valuet);
                if ($value['userole'] == 'Student') {
                  $cnt++;
                  echo
                       '<tr>
                       <td>
                       '.$cnt.'</td>
                      <td>'.$value["fullname"].'</td>
                      <td>1,200,000</td>
                      <td>'.number_format($fees["totalfees"]).'</td>
                      <td>'.number_format((1200000-$fees["totalfees"])).'</td>
                      </tr>';
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
                      <h5 class="modal-title">Add Student School Fees Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                         <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Student</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="slctstudentid" required="">
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


                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Amount Paid</label>
                        <div class="col-sm-9">
                          <input type="number" min="0" class="form-control" required name="amountpaidfees">
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageSchoolFeesInfoCtrl();
            $useradd ->AddNewSchoolInfoCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>
