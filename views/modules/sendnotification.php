

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
                <?php
                $itemt = null;
                $valuet = null;
                $result = ManageSchoolFeesInfoCtrl::ShowStudentResultsInfoCtrl($itemt,$valuet);

                 ?>

                 <?php foreach ($result as $key => $value): ?>

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

                
                
                <br>
                <form method="POST" >

                	<div class="mb-3">
					  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sendcomment"></textarea>
					</div>

                      <div class="row mb-3">
                        <div class="col-md-4"></div>
                         <div class="col-md-4">
                          <button type="submit" name="updatesalary" class=" btn btn-primary">Send Comment</button>
                        </div>
                      </div>

                          <?php
            $useradd = new CommentsSectionCtrl();
            $useradd ->SenCommentsSectionCtrl();
            ?>  
                        
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>
 

