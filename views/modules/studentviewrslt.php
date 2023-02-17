<?php
$itemt = 'id';
$valuet = $_SESSION["id"];
$users = ManageUserCtrl::AllManagerUsersCtrl($itemt,$valuet); 


 $item = "studentid";
 $value = $_SESSION["id"];
 $results = StudentResultsCtrl::ShowStudentResultsCtrl($item,$value); 

 // if ($results["avaerage"] >= 75 ) {
 //  $grade = 'A';
 //  } else if ($results["avaerage"] >= 60 && $results["avaerage"] < 75)  {
 //  $grade = 'B';
 //  }else if ($results["avaerage"] >= 45 && $results["avaerage"] < 60)  {
 //  $grade = 'C';
 //  }else if ($results["avaerage"] >= 30 && $results["avaerage"] < 45)  {
 //  $grade = 'D';
 //  }else if ($results["avaerage"] >= 0 && $results["avaerage"] < 30)  {
 //  $grade = 'E';
 //  }

   $grade = BasicMethodsCtrl::GetClassCtrl($results["avaerage"]);

 if ($results["avaerage"] >= 2.0 ) {
   $status = '<span class="badge bg-success">PASS</span>';
  }else if ($results["avaerage"] >= 0 && $results["avaerage"] < 2.0)  {
  $status = '<span class="badge bg-danger">FAIL</span>';
  }


?>

<div class="pagetitle">
      <h1>Student Results</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Student Results</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      	 <div class="col-md-3"></div>
        <div class="col-md-6">

          <div class="card">
          	<div class="card-header">
          		Student Results for: <?php echo $users["fullname"];?>
          	</div>
          	<br>
            <div class="card-body">
               <?php
                  

                  $item = null;
                  $value = null;
                  $request = ManageUserCtrl::ShowAllSubjectsCtrl($item,$value);
                   ?>

                      <?php foreach ($request as $key => $value): 

                      	

                    $itemt = $value["id"];
                		$valuet =  $_SESSION["id"];
                		$result = ManageSchoolFeesInfoCtrl::ShowStudentResultsInfoCtrl($itemt,$valuet);

                    $itemx = null;
                    $valuex = null;
                    $semister = ManageSemister::CurrentSemisterCtl($itemx,$valuex);

                      	?>
                         <?php if ($semister['id'] ==$value['semisterid'] ): ?>

                          <input type="hidden" name="subjectid[]" value="<?php echo $value['id']; ?>">
                        <div class="row">
                        <div class="col-sm-4">
                      <label for="inputText" class="form-label"><?php echo ($key+1) ?>- <?php echo $value['subjectname'] ?> </label>
                       </div>

                        <div class="col-sm-3">
                          <?php 
                          echo $result['marks'];
                          ?>
                        </div>
                        <div class="col-sm-3">
                          <?php 
                          $gradetype = BasicMethodsCtrl::GetGradeCtrl($result['marks']);
                          echo $gradetype;
                          ?>
                        </div>

                      </div>
                        <?php endif ?>
                        
                
                      <br>
                      <?php endforeach ?>
                      <h5>GPA:<?php echo number_format($results['avaerage'],2); ?></h5>
                      <h5>Grade: <?php echo $grade; ?></h5>
                      <h5>Status:<?php echo $status; ?></h5>
            </div>
          </div>
        </div>

      </div>
    </section>