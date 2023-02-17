<?php 

class BasicMethodsCtrl
{
	
	static public function GetIpAddress ()
	{
		 $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
         return $ipaddress;
	}


    static public function GetGPACtrl ($marks)
    {


       if ($marks>= 70 && $marks <= 100) {
         $grade = 5;
       } elseif ($marks>= 60 && $marks <= 69) {
         $grade = 4;
       }elseif ($marks>= 50 && $marks <= 59) {
         $grade = 3;
       }elseif ($marks>= 40 && $marks <= 49) {
         $grade = 2;
       }elseif ($marks>= 35 && $marks <= 39) {
         $grade = 1;
       }elseif ($marks>= 0 && $marks <= 34) {
         $grade = 0;
       }

        return $grade;
       
    }


    static public function GetGradeCtrl ($marks)
    {


       if ($marks>= 70 && $marks <= 100) {
         $grade = 'A';
       } elseif ($marks>= 60 && $marks <= 69) {
         $grade = 'B+';
       }elseif ($marks>= 50 && $marks <= 59) {
         $grade = 'B';
       }elseif ($marks>= 40 && $marks <= 49) {
         $grade = 'C';
       }elseif ($marks>= 35 && $marks <= 39) {
         $grade = 'D';
       }elseif ($marks>= 0 && $marks <= 34) {
         $grade = 'E';
       }

        return $postion;
       
    }

     static public function GetClassCtrl ($gpa)
    {


       if ($gpa>= 4.4 && $gpa <= 5) {
         $gpaclass = 'First Class';
       } elseif ($gpa>= 3.5 && $gpa <= 4.3) {
         $gpaclass = 'Upper Second Class';
       }elseif ($gpa>= 2.7 && $gpa <= 3.4) {
         $gpaclass = 'Lower Second Class';
       }elseif ($gpa>= 2.0 && $gpa <= 2.6) {
         $gpaclass = 'Pass';
        }
        return $gpaclass;
       
    }



static public function getime() {
	$hour  = '';
   date_default_timezone_set("Africa/Dar_es_Salaam");
	$hour = date('H:i:s');
	return $hour;
  }

  static public function getdate() {
  	$date  = '';
   date_default_timezone_set("Africa/Dar_es_Salaam");
	$date = date('Y-m-d');
	return $date;
  }

}







class StudentResultsCtrl
{
    
   static public function AddStudentResultsCtrl()
    {
    if (isset($_POST["slctstudentid"])) {
            



            // $credit = BasicMethodsCtrl::GetGPACtrl();
                $totalone = 0;
            $item = null;
            $value = null;
            $request = ManageUserCtrl::ShowAllSubjectsCtrl($item,$value);

            for ($i=0; $i < count($_POST["subjectid"]); $i++) { 

            $item = "id";
            $value = $_POST["subjectid"][$i];
            $request = ManageUserCtrl::ShowAllSubjectsCtrl($item,$value);

            $credit = BasicMethodsCtrl::GetGPACtrl($_POST["marks"][$i]);

            $totalone += $credit*$request['credit'];
            $gpa = $totalone/45;
             $numberofsubjects = count($_POST["marks"]);

            $table = "studentresults";
                $data = array('studentid' =>$_POST["slctstudentid"],
                              'subjectid' =>$_POST["subjectid"][$i],
                              'marks' =>$_POST["marks"][$i]);
                $answer = StudentResultsMdl::AddStudentResultsMdl($table,$data);

            
            }

            $gpaamount = number_format($gpa, 3);

            $table = "resultssummary";
            $data = array('studentid' =>$_POST["slctstudentid"],
                              'numberofsubjects' =>$numberofsubjects,
                              'avaerage' =>$gpaamount,
                              'totalmarks' =>$totalone);
            $answer = StudentResultsMdl::AddSummaryResultsMdl($table,$data);


                if ($answer == 'ok') {

                $table = "useraccounts";
                $item1 = "resultstatus";
                $value1 = 1;
                $value2 = $_POST["slctstudentid"];
                $item2 = "id";        
                $answer = CommonMethodsmdl::mdlUpdatedetailstwo($table, $item1, $value1, $item2, $value2);
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: " Student Results are added succesfully!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "studentresults";
                            }
                        });
                        </script>';
                }
        
        }
    }

    static public function ShowStudentResultsCtrl($item, $value){
        $table = "resultssummary";
        $answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
        return $answer;
    }


}



class ManageSchoolFeesInfoCtrl
{
    
   static public function AddNewSchoolInfoCtrl()
    {
    if (isset($_POST["amountpaidfees"])) {
            

                $table = "schoolfees";
                $data = array('studentid' =>$_POST["slctstudentid"],
                              'amountpaid' =>$_POST["amountpaidfees"]);
                $answer = ManageSchoolFeesInfoMdl::AddNewSchoolInfoMdl($table,$data);
                if ($answer == 'ok') {

                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: " School Fees Details have been added succesfully!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "viewschoolfees";
                            }
                        });
                        </script>';
                }
        
        }
    }

       static public function ShowFeesSchoolInfoCtrl($item, $value){
        $table = "schoolfees";
        $answer = ManageUserMdl::ShowFeesSchoolInfoMdl($table, $item, $value);
        return $answer;
    }
 static public function ShowStudentResultsInfoCtrl($item, $value){
        $table = "studentresults";
        $answer = ManageUserMdl::ShowStudentResultsInfoMdl($table, $item, $value);
        return $answer;
    }
    // static public function ShowStudentResultsInfoCtrl($item, $value){
    //     $table = "comments";
    //     $answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
    //     return $answer;
    // }


     static public function ShowStudentResultsInfoTwoCtrl($item, $value){
        $table = "comments";
        $answer = ManageUserMdl::ShowStudentResultsInfoTwoMdl($table, $item, $value);
        return $answer;
    }

}



class CommentsSectionCtrl
{
    
    static public function SenCommentsSectionCtrl()
    {
    if (isset($_POST["sendcomment"])) {
            

                $table = "comments";
                $data = array('content' =>$_POST["sendcomment"],
                              'receiverid' =>1,
                              'senderid' =>$_SESSION['id']);
                $answer = CommentsSectionMdl::SenCommentsSectionMdl($table,$data);
                if ($answer == 'ok') {

                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Succesfully Sent!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "sendnotification";
                            }
                        });
                        </script>';
                }
        
        }
    }

    static public function ShowCommentsSectionCtrl($item, $value){
        $table = "comments";
        $answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
        return $answer;
    }

    

      static public function SenCommentsSectionTwoCtrl()
    {
    if (isset($_POST["sendcommenttwo"])) {
            

                $table = "comments";
                $data = array('content' =>$_POST["sendcommenttwo"],
                              'senderid' =>1,
                              'receiverid' =>$_SESSION['convoviewid']);
                $answer = CommentsSectionMdl::SenCommentsSectionMdl($table,$data);
                if ($answer == 'ok') {

                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Succesfully Sent!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "notifications";
                            }
                        });
                        </script>';
                }
        
        }
    }
}


class ManageSemister
{
    
      static public function AddSemisterCtrl()
    {
    if (isset($_POST["acyear"])) {
            

                $table = "semister";
                $data = array('acyear' =>$_POST["acyear"],
                              'semistername' =>$_POST["semister"]);
                $answer = ManageSemisterMdl::ManageSemistemdl($table,$data);
                if ($answer == 'ok') {

                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Succesfully Added!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "semister";
                            }
                        });
                        </script>';
                }
        
        }
    }


     static public function ShowSemisterCtrl($item, $value){
        $table = "semister";
        $answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
        return $answer;
    }



     static public function CurrentSemisterCtl($item, $value){
        $table = "semister";
        $answer = ManageUserMdl::CurrentSemisterMdl($table, $item, $value);
        return $answer;
    }





     static public function SetActiveSemisterCtrl()
    {
    if (isset($_POST["semisterid"])) {
            

                $item = null;
                $value = null;
                $clients = ManageSemister::ShowSemisterCtrl($item,$value); 

                foreach ($clients as $key => $value) {

                if ($value['id'] == $_POST["semisterid"]) {
                $table = "semister";
                $item1 = "semisterstatus";
                $value1 = 1;
                $value2 = $value['id'];
                $item2 = "id";        
                $answer = CommonMethodsmdl::mdlUpdatedetailstwo($table, $item1, $value1, $item2, $value2);
                } 
                else{
                $table = "semister";
                $item1 = "semisterstatus";
                $value1 = 0;
                $value2 = $value['id'];
                $item2 = "id";        
                $answer = CommonMethodsmdl::mdlUpdatedetailstwo($table, $item1, $value1, $item2, $value2);
                }


                }

               
                

                  if ($answer == 'ok') {

                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Succesfully Set!",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "semister";
                            }
                        });
                        </script>';
                }
        
        }
    }

}

 

