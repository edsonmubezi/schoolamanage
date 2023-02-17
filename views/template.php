<?php
  session_start();
  ini_set('display_errors',0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SCHOOL SYSTEM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 <!--  <link href="views/assets/img/favicon.png" rel="icon"> -->
<!--   <link href="views/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="views/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="views/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="views/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="views/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="views/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="views/assets/css/style.css" rel="stylesheet">
  <script src="views/js/sweetalert2@9.js"></script>

</head>

<body>

  


 <?php 
 if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "ok") {
   echo '<main id="main" class="main">';
      include "views/modules/navigation/navbar.php";
      include "views/modules/navigation/sidemenu.php";

      if($_SESSION["userole"] == "System-Admin"){
        if (isset($_GET["route"])) {
           if($_GET["route"] == "home"|| 
              $_GET["route"] == "logout"||
              $_GET["route"] == "semister"||
               $_GET["route"] == "notifications"||
              $_GET["route"] == "studentresults"||
              $_GET["route"] == "viewschoolfees"||
              $_GET["route"] == "viewstudentresults"||
              $_GET["route"] == "myprofile"||
              $_GET["route"] == "manageusers"){
            include "views/modules/".$_GET["route"].".php";
           } else{
            include "modules/404.php";
           }
        } else{
          include "modules/home.php";
        }
      }


      if($_SESSION["userole"] == "Parent"){
        if (isset($_GET["route"])) {
           if($_GET["route"] == "home"|| 
              $_GET["route"] == "viewstudntresults"|| 
              $_GET["route"] == "sendnotification"|| 
              $_GET["route"] == "viewfeesinfo"|| 
              $_GET["route"] == "logout"){
            include "views/modules/".$_GET["route"].".php";
           } else{
            include "modules/404.php";
           }
        } else{
          include "modules/home.php";
        }
      }


       if($_SESSION["userole"] == "Student"){
        if (isset($_GET["route"])) {
           if($_GET["route"] == "home"|| 
              $_GET["route"] == "studentviewrslt"||
              $_GET["route"] == "logout"){
            include "views/modules/".$_GET["route"].".php";
           } else{
            include "modules/404.php";
           }
        } else{
          include "modules/home.php";
        }
      } 
      // else{
      //   //other userole
      // }
  if($_SESSION["userole"] == "Accountant"){
        if (isset($_GET["route"])) {
           if($_GET["route"] == "home"|| 
              $_GET["route"] == "viewschoolfees"||
              $_GET["route"] == "logout"){
            include "views/modules/".$_GET["route"].".php";
           } else{
            include "modules/404.php";
           }
        } else{
          include "modules/home.php";
        }
      } 


      if($_SESSION["userole"] == "HOD"){
        if (isset($_GET["route"])) {
           if($_GET["route"] == "home"|| 
              $_GET["route"] == "studentresults"||
              $_GET["route"] == "viewstudentresults"||
              $_GET["route"] == "semister"||
              $_GET["route"] == "notifications"||
              $_GET["route"] == "logout"){
            include "views/modules/".$_GET["route"].".php";
           } else{
            include "modules/404.php";
           }
        } else{
          include "modules/home.php";
        }
      } 






  
    echo '</main>';
 } else{
    include "views/modules/login.php";
 }



 ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="views/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="views/assets/vendor/chart.js/chart.min.js"></script>
  <script src="views/assets/vendor/echarts/echarts.min.js"></script>
  <script src="views/assets/vendor/quill/quill.min.js"></script>
  <script src="views/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="views/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="views/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="views/assets/js/main.js"></script>
  <script src="views/js/validation.js"></script>
  <script src="views/js/users.js"></script>

</body>

</html>