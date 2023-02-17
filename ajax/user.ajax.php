<?php 

include "../controllers/manageusers.controller.php";
include "../models/manageusers.model.php";
include "../models/commonmethods.model.php";


class ajaxusers
{
	
	public $activateUser;
	public $activateId;	
	public function ajaxActivateUser(){
		$table = "useraccounts";
		$item1 = "status";
		$value1 = $this->activateUser;
		$item2 = "id";
		$value2 = $this->activateId;
		$answer = CommonMethodsmdl::mdlUpdatedetails($table, $item1, $value1, $item2, $value2);
		echo json_encode($answer);
	}
}


if (isset($_POST["activateUser"])) {

	$activateUser = new ajaxusers();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> ajaxActivateUser();
}

?>
