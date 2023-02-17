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
        <div class="col-md-2"></div>
        <div class="col-md-8">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row">
                <div class="col-md-8">
                   <h5 class="card-title">Student Results</h5>
                </div>
               
              </div>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">GPA</th>
                    <th scope="col">Grade</th>
              		<th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

              $item = null;
              $value = null;
              $users = StudentResultsCtrl::ShowStudentResultsCtrl($item,$value); 
              foreach ($users as $key => $value) { 

                		$itemt = 'id';
              			$valuet = $value["studentid"];
                        $users = ManageUserCtrl::AllManagerUsersCtrl($itemt,$valuet); 

                       echo
                       '<tr>
                       <td>
                       '.($key+1).'</td>
                      <td>'.$users["fullname"].'</td>
                      <td>'.$value["avaerage"].'</td>';

                      // if ($value["avaerage"] >= 75 ) {
                      // $grade = 'A';
                      // } else if ($value["avaerage"] >= 60 && $value["avaerage"] < 75)  {
                      // $grade = 'B';
                      // }else if ($value["avaerage"] >= 45 && $value["avaerage"] < 60)  {
                      // $grade = 'C';
                      // }else if ($value["avaerage"] >= 30 && $value["avaerage"] < 45)  {
                      // $grade = 'D';
                      // }else if ($value["avaerage"] >= 0 && $value["avaerage"] < 30)  {
                      // $grade = 'E';
                      // }

                      

                      $gpaclass = BasicMethodsCtrl::GetClassCtrl($value["avaerage"]);

                      if ($value["avaerage"] >= 2.0 ) {
                       $status = '<span class="badge bg-success">PASS</span>';
                      }else if ($value["avaerage"] >= 0 && $value["avaerage"] < 2.0)  {
                      $status = '<span class="badge bg-danger">FAIL</span>';
                      }

                       echo'<td>'.$gpaclass.'</td>';
                       echo'<td>'.$status.'</td>';
                       echo'</tr>';
                     
                      } 
                  ?>
                 
                </tbody>
              </table>
              

            </div>
          </div>

        </div>
      </div>
    </section>
 