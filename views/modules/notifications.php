

    <div class="pagetitle">
      <h1>Send Notification</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Send Notification</li>
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

                  <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Recipient</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="recipient">
                            <option selected>Select Recipient</option>
                            <option value="All Staff">All Staff</option>
                            <option value="Students">Students</option>
                            <option value="Parents">Parents</option>
                          </select>
                        </div>
                      </div>
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


