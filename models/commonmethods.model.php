<?php 

require_once"connection.php";
class CommonMethodsmdl
{
	
	static public function ShowUnDelInfo($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE deletedstatus = 0 ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlUpdatedetails($table, $item1, $value1, $item2, $value2){
		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		if ($stmt->execute()) {	
			return 'ok';
		} else {
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}


	static public function mdlUpdatedetailstwo($table, $item1, $value1, $item2, $value2){
		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		if ($stmt->execute()) {	
			return 'ok';
		} else {
			return 'error'.var_dump($stmt->errorInfo());
		}
		$stmt -> close();
		$stmt = null;
	}


static public function AddUserActivityMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(userid, activity,  datecreated, ipaddress, timecreated) VALUES (:userid, :activity,  :datecreated, :ipaddress, :timecreated)");
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$stmt -> bindParam(":activity", $data["activity"], PDO::PARAM_STR);
		$stmt -> bindParam(":datecreated", $data["datecreated"], PDO::PARAM_STR);
		$stmt -> bindParam(":ipaddress", $data["ipaddress"], PDO::PARAM_STR);
		$stmt -> bindParam(":timecreated", $data["timecreated"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

}


class StudentResultsMdl
{
	


	static public function AddStudentResultsMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(studentid,subjectid,marks) VALUES (:studentid,:subjectid,:marks)");
		$stmt -> bindParam(":studentid", $data["studentid"], PDO::PARAM_STR);
		$stmt -> bindParam(":subjectid", $data["subjectid"], PDO::PARAM_STR);
		$stmt -> bindParam(":marks", $data["marks"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}





static public function AddSummaryResultsMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(studentid,numberofsubjects,totalmarks,avaerage,semisterid) VALUES (:studentid,:numberofsubjects,:totalmarks,:avaerage,:semisterid)");
		$stmt -> bindParam(":studentid", $data["studentid"], PDO::PARAM_STR);
		$stmt -> bindParam(":numberofsubjects", $data["numberofsubjects"], PDO::PARAM_STR);
		$stmt -> bindParam(":totalmarks", $data["totalmarks"], PDO::PARAM_STR);
		$stmt -> bindParam(":avaerage", $data["avaerage"], PDO::PARAM_STR);
		$stmt -> bindParam(":semisterid", $data["semisterid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

}


class ManageSchoolFeesInfoMdl
{
	
	static public function AddNewSchoolInfoMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(studentid,amountpaid) VALUES (:studentid,:amountpaid)");
		$stmt -> bindParam(":studentid", $data["studentid"], PDO::PARAM_STR);
		$stmt -> bindParam(":amountpaid", $data["amountpaid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}


class CommentsSectionMdl
{
	
	static public function SenCommentsSectionMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(content,senderid,receiverid,convoid) VALUES (:content,:senderid,:receiverid,:convoid)");
		$stmt -> bindParam(":content", $data["content"], PDO::PARAM_STR);
		$stmt -> bindParam(":senderid", $data["senderid"], PDO::PARAM_STR);
		$stmt -> bindParam(":receiverid", $data["receiverid"], PDO::PARAM_STR);
		$stmt -> bindParam(":convoid", $data["convoid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

static public function ConvoCreateMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(userid,userid1) VALUES (:userid,:userid1)");
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$stmt -> bindParam(":userid1", $data["userid1"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}



	static public function SendNotificationMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(content,senderid,receiverid,type) VALUES (:content,:senderid,:receiverid,:type)");
		$stmt -> bindParam(":content", $data["content"], PDO::PARAM_STR);
		$stmt -> bindParam(":senderid", $data["senderid"], PDO::PARAM_STR);
		$stmt -> bindParam(":receiverid", $data["receiverid"], PDO::PARAM_STR);
		$stmt -> bindParam(":type", $data["type"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}


class ManageSemisterMdl
{
	
	static public function ManageSemistemdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(acyear,semistername) VALUES (:acyear,:semistername)");
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":semistername", $data["semistername"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}


class DepartmetnMdl
{
	
	static public function AddDepartmetnMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(department) VALUES (:department)");
		$stmt -> bindParam(":department", $data["department"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}