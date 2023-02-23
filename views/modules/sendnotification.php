

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

                 <?php foreach ($result as $key => $value): ?>

                  <?php if ($_SESSION["userole"] == "Parent" && $value['type'] == 'Parents'): ?>
                    <div class="row">
                    <div class="col-md-12"> <h5>MESSAGE: <?php echo $value['content']; ?></h5></div>
                    </div>
                  <?php elseif ($_SESSION["userole"] == "Accountant" && $value['type'] == 'All Staff'): ?>
                  <div class="row">
                    <div class="col-md-12"> <h5>MESSAGE: <?php echo $value['content']; ?></h5></div>
                    </div>

                    <?php elseif ($_SESSION["userole"] == "HOD" && $value['type'] == 'All Staff'): ?>
                  <div class="row">
                    <div class="col-md-12"> <h5>MESSAGE: <?php echo $value['content']; ?></h5></div>
                    </div>


                    <?php elseif ($_SESSION["userole"] == "System-Admin" && $value['type'] == 'All Staff'): ?>
                  <div class="row">
                    <div class="col-md-12"> <h5>MESSAGE: <?php echo $value['content']; ?></h5></div>
                    </div>

                    <?php elseif ($_SESSION["userole"] == "Student" && $value['type'] == 'Students'): ?>
                  <div class="row">
                    <div class="col-md-12"> <h5>MESSAGE: <?php echo $value['content']; ?></h5></div>
                    </div>
                    
                  <?php endif ?>

                
                 		
                 	
                 <?php endforeach ?>

                
                
                <br>
                

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
 

