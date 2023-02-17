<?php
$itemt = 'id';
$valuet = $_SESSION["studentid"];
$users = ManageUserCtrl::AllManagerUsersCtrl($itemt,$valuet); 


?>

<div class="pagetitle">
      <h1>School Fees Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">School Fees Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      	 <div class="col-md-3"></div>
        <div class="col-md-6">

          <div class="card">
          	<div class="card-header">
          		School Fees Info for: <?php echo $users["fullname"];?>
          	</div>
          	<br>
            <div class="card-body">
            <?php
             $itemt = 'studentid';
             $valuet = $_SESSION["studentid"];
             $fees = ManageSchoolFeesInfoCtrl::ShowFeesSchoolInfoCtrl($itemt,$valuet);

             ?>

              <h5>Total School Fees: 1,200,000</h5>
              <h5>Paid School Fees:<?php echo number_format($fees["totalfees"]); ?></h5>
              <h5>Balance: <?php echo number_format((1200000-$fees["totalfees"])); ?></h5>
              

       

            </div>
          </div>
        </div>

      </div>
    </section>