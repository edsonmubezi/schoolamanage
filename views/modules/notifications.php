

    <div class="pagetitle">
      <h1>Send Comments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Send Comments</li>
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
                   <h5 class="card-title">Send Comment</h5>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                 View Convo
              </button>
                </div>
                <?php
                $itemt = $_SESSION["convoviewid"];
                $valuet = $_SESSION["id"];
                $result = ManageSchoolFeesInfoCtrl::ShowStudentResultsInfoTwoCtrl($itemt,$valuet);

                 ?>

                 <?php foreach ($result as $key => $value): 


                 	?>


                 		
                		
                	<?php if ($value['senderid'] == $_SESSION["id"] ): ?>
                 		<div class="row">
                		<div class="col-md-4">ME:</div>
                		<div class="col-md-8"><?php echo $value['content']; ?></div>
                		</div>
                 	<?php else: ?>
                 		<div class="row">
                		<div class="col-md-8"> <?php echo $value['content']; ?></div>
                		<div class="col-md-4">ADMIN</div>
                		</div>
                 	<?php endif ?>
                 
                 	
                 
              
                 <?php endforeach ?>

               
                
                <form method="POST" >
                	<br>
                	<div class="mb-3">
					  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sendcommenttwo"></textarea>
					</div>

                      <div class="row mb-3">
                        <div class="col-md-4"></div>
                         <div class="col-md-4">
                          <button type="submit" name="updatesalary" class=" btn btn-primary">Send Comment</button>
                        </div>
                      </div>

                          <?php
            $useradd = new CommentsSectionCtrl();
            $useradd ->SenCommentsSectionTwoCtrl();
            ?>  
                        
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>



     <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Set Person To View Conversion</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

                       <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Select Student</label>
                        <div class="col-sm-5">
                          <select class="form-select" id="convoview" aria-label="Default select example" name="convoview" required="">
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

     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                       <?php
            $useradd = new ManageUserCtrl();
            $useradd ->UpdateViewConvoCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>
 

