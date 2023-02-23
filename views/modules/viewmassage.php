

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
                <?php
                $itemt = null;
                $valuet = null;
                $result = ManageSchoolFeesInfoCtrl::ShowNotificationCtrl($itemt,$valuet);

                 ?>

                 <?php foreach ($result as $key => $value): 
                 	$receiverid = $value['receiverid'];
                 	?>

                 	<?php if ($value['type'] == null): ?>
                 		<?php if ($value['receiverid'] == $_SESSION['id']): ?>
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
 

