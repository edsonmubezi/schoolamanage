

    <div class="pagetitle">
      <h1>Add Student Results</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Add Student Results</li>
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
                   <h5 class="card-title">Add Student Results</h5>
                </div>
                <form method="POST" enctype="multipart/form-data">

                  <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Select Student</label>
                        <div class="col-sm-5">
                          <select class="form-select" id="fltercompanyid" aria-label="Default select example" name="slctstudentid" required="">
                            <option value="">Select Student</option>
                            <?php 

                        

                             $item = null;
                             $value = null;
                             $clients = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
                            foreach ($clients as $key => $value) {

                              if ($value['userole'] == 'Student' && $value['resultstatus'] == 0) {
                                echo '<option value="'.$value["id"].'">'.$value["fullname"].'</option>';
                              }
                              
                             }

                            ?>
                          </select>
                        </div>
                      </div>
                  <?php
                  

                  $item = null;
                  $value = null;
                  $request = ManageUserCtrl::ShowAllSubjectsCtrl($item,$value);

                  $itemx = null;
                  $valuex = null;
                  $semister = ManageSemister::CurrentSemisterCtl($itemx,$valuex);
                   ?>
                   <h3> <b><?php echo $semister["acyear"].'-'.$semister["semistername"]; ?></b></h3>
   
                      <?php foreach ($request as $key => $value): ?>

                        <?php if ($semister['id'] ==$value['semisterid'] ): ?>
                           <input type="hidden" name="subjectid[]" value="<?php echo $value['id']; ?>">
                        <div class="row">
                        <div class="col-sm-4">
                      <label for="inputText" class="form-label"><?php echo ($key+1) ?>- <?php echo $value['subjectname'] ?> </label>
                       </div>
                        <div class="col-sm-5">
                          <input type="number" min="0" class="form-control" required name="marks[]">
                        </div>
                      </div>
                      <br>
                        <?php endif ?>
                       
                      <?php endforeach ?>

                      
                      <div class="row mb-3">
                        <div class="col-md-4"></div>
                         <div class="col-md-4">
                          <button type="submit" name="updatesalary" class=" btn btn-primary">Save Results</button>
                        </div>
                      </div>

                          <?php
            $useradd = new StudentResultsCtrl();
            $useradd ->AddStudentResultsCtrl();
            ?>  
                        
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>
 

