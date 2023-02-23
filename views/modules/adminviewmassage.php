

    <div class="pagetitle">
      <h1>View Notification</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">View Notification</li>
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
                   <h5 class="card-title">View Notification</h5>
                </div>
                <div class="col-md-4">
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setactive">
                 View Convo
              </button>
          </div>
          </div>
                <?php
                $item = "id";
              	$value = $_SESSION['id'];
              	$users = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 

                $itemt = $users["conviewid"];
                $valuet = $_SESSION['id'];
                $result = ManageSchoolFeesInfoCtrl::ShowNotificationTwoCtrl($itemt,$valuet);

                // var_dump($users["conviewid"]);
                // var_dump($_SESSION['id']);
                 ?>

                 <?php foreach ($result as $key => $value): 
                 	$receiverid = $value['receiverid'];
                 	?>

                 	<?php if ($value['type'] == null): ?>
                 		<?php if ($value['receiverid'] == $_SESSION["conviewid"]): ?>
                  		<div class="row">
                  			<div class="col-md-4"> <span class="badge bg-primary">ADMIN:</span></div>
                    <div class="col-md-8"> <h5><?php echo $value['content']; ?></h5></div>
                    </div>
                  <?php elseif ($value['senderid'] == $_SESSION['id']): ?>
                  		<div class="row">
                  			<div class="col-md-4"><span class="badge bg-success">USER:</span></div>
                    <div class="col-md-8"> <h5><?php echo $value['content']; ?></h5></div>
                    </div>
                    <?php endif ?>
                 	<?php endif ?>

                  
                 <?php endforeach ?>

                 <form method="POST">
                 	<input type="hidden" name="recipientidtwo" value="<?php echo $receiverid ?>" readonly>
                 	<div class="mb-3">
					  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
					</div>

                      <div class="row mb-3">
                        <div class="col-md-4"></div>
                         <div class="col-md-4">
                          <button type="submit" class=" btn btn-primary">Send Message</button>
                        </div>
                      </div>
                 </form>

                

                          <?php
            $useradd = new CommentsSectionCtrl();
            $useradd ->SendMessageCtrlTwo();
            ?>  
                        
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>
 




  <div class="modal fade" id="setactive" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Select Person to View conversation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">

            
              

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Select Person</label>
                        <div class="col-sm-9">
                           <select class="form-select" aria-label="Default select example" name="viewsenderid">
                            <option selected>Select Person</option>
                            <?php 
                             $item = null;
                             $value = null;
                             $clients = ManageUserCtrl::AllManagerUsersCtrl($item,$value); 
                            foreach ($clients as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["fullname"].'</option>';
                        
                             }

                            ?>
                          </select>
                        </div>
                      </div>


     




                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">View</button>
                    </div>
                       <?php
            $useradd = new ManageSemister();
            $useradd ->SetPersonToViewConvoCtrl();
            ?>  

                     </form>
                  </div>
                </div>
              </div>

