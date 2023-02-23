
<?php 
require_once"connection.php";
class ManageUserMdl
{
	
	static public function AddManagerialUserMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(username, fullname,  email, password, userole,studentid,departmentid) VALUES (:username, :fullname,  :email, :password, :userole,:studentid,:departmentid)");
		$stmt -> bindParam(":username", $data["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":userole", $data["userole"], PDO::PARAM_STR);
		$stmt -> bindParam(":studentid", $data["studentid"], PDO::PARAM_STR);
		$stmt -> bindParam(":departmentid", $data["departmentid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function AllManagerUsersMdl($table, $item, $value){
		if($item != null){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT * FROM $table");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;
	}

static public function ShowFeesSchoolInfoMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT SUM(amountpaid) AS totalfees FROM $table WHERE studentid = $value ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}

	static public function ShowStudentResultsInfoTwoMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE senderid = $value OR receiverid = ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}

static public function ShowStudentResultsInfoMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT *  FROM $table WHERE studentid = $value AND subjectid = $item ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}


	static public function CurrentSemisterMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT *  FROM $table WHERE semisterstatus = 1 ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}


static public function SumOFCreditMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT SUM(credit) AS totalcredit FROM $table WHERE semisterid = $value ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}



	static public function FindDuplicateMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT *  FROM $table WHERE semisterid = $value AND studentid = $item  ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}

   static public function ShowNotificationTwoMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT *  FROM $table WHERE senderid = $value OR receiverid = $item  ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}


	static public function ShowConvoMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT *  FROM $table WHERE userid = $item AND userid1 = $value  ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;
	}

}
