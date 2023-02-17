<?php 
$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


include "controllers/template.controller.php";
include "controllers/manageusers.controller.php";
include "controllers/BasicController.php";


include "models/manageusers.model.php";
include "models/commonmethods.model.php";

$newview = new deftemplate;
$newview ->	template();

// $newview ->	api();
