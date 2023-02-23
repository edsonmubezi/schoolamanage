

    <div class="pagetitle">
      <h1>Send  Message</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Send  Message</li>
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
                   <h5 class="card-title">Send Message</h5>
                </div>
                
               
               
                
                <form method="POST" >

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Recipient</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="recipientid" id="receipent">
                            <option selected>Select Recipient</option>
                            <option value="All Staff">All Staff</option>
                            <option value="Students">Students</option>
                            <option value="Parents">Parents</option>
                          </select>
                        </div>
                      </div>

                       <div class="row mb-3" style='display:none;' id="staff">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Staff</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="staffid" >
                            <option value="">Select Staff</option>
                            <?php 
                             $item = null;
                             $value = null;
                             $clients = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
                            foreach ($clients as $key => $value) {

                              if ($value["userole"] == 'System-Admin' ||$value["userole"] == 'Accountant' || $value["userole"] == 'HOD') {
                                echo '<option value="'.$value["id"].'">'.$value["fullname"].'</option>';
                              }
                              
                             }

                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="row mb-3" style='display:none;' id="parent">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Parent</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="parentid" >
                            <option value="">Select Student</option>
                            <?php 
                             $item = null;
                             $value = null;
                             $clients = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
                            foreach ($clients as $key => $value) {

                              if ($value['userole'] == 'Parent') {
                                echo '<option value="'.$value["id"].'">'.$value["fullname"].'</option>';
                              }
                              
                             }

                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="row mb-3" style='display:none;' id="student">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Student</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="student" >
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



                	<br>
                	<div class="mb-3">
					  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
					</div>

                      <div class="row mb-3">
                        <div class="col-md-4"></div>
                         <div class="col-md-4">
                          <button type="submit" class=" btn btn-primary">Send Message</button>
                        </div>
                      </div>

                          <?php
            $useradd = new CommentsSectionCtrl();
            $useradd ->SendMessageCtrl();
            ?>  
                        
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>


