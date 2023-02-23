
<?php 


 
class ManageUserCtrl 
{
	


		static public function AddManagerialUserCtrl()
	{
	if (isset($_POST["fullname"])) {
			

		       $encryptpass = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "useraccounts";
				$data = array('username' =>$_POST["username"],
								'fullname' =>$_POST["fullname"],
								'email' =>'admin@gmail.com',
								'password' =>$encryptpass,
								'departmentid' =>$_POST["departmentid"],
								'studentid' =>0,
								'userole' =>$_POST["userole"]);
				$answer = ManageUserMdl::AddManagerialUserMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "New User is added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "manageusers";
							}
						});
						</script>';
				}
		
		}
	}

	 //Show All Users
	static public function AllManagerUsersCtrl($item, $value){
		$table = "useraccounts";
		$answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
		return $answer;
	}

	static public function ShowUnDelUsersCtrl($item, $value){
		$table = "useraccounts";
		$answer = CommonMethodsmdl::ShowUnDelInfo($table, $item, $value);
		return $answer;
	}


	static public function UserLoginctrl(){
		if (isset($_POST["username"])) {
			if (preg_match('/^[a-zA-Z0-9 ]+$/',  $_POST["username"]) &&
				preg_match('/^[a-zA-Z0-9 ]+$/',  $_POST["password"])) {
			 $encryptpass = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		
				$item = "username";
				$value = $_POST["username"];
				$request = ManageUserCtrl::AllManagerUsersCtrl($item,$value);
			if ($request["username"] == $_POST["username"] && $request["password"] == $encryptpass) {	
					
			
					 $_SESSION["loggedIn"] = "ok";
					 $_SESSION["id"] = $request["id"];
					 $_SESSION["fullname"] = $request["fullname"];
					 $_SESSION["username"] = $request["username"];
					 $_SESSION["userole"] = $request["userole"];
					 $_SESSION["studentid"] = $request["studentid"];
					 $_SESSION["conviewid"] = $request["convoviewid"];

				$getip = BasicMethodsCtrl::GetIpAddress();
				$hour = BasicMethodsCtrl::getime();
				$date = BasicMethodsCtrl::getdate();



				$table = "useractivity";
				$data = array('userid' =>$_SESSION["id"],
								'activity' =>"logged In",
								'datecreated' =>$date,
								'ipaddress' =>$getip,
								'timecreated' =>$hour);
				$answer = CommonMethodsmdl::AddUserActivityMdl($table,$data);
						if ($answer == 'ok') {
							echo'<script>
					 	window.location = "home";
							</script>';	
						}
					

				} else{
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "Wrong password or username!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
				}

			}
		}

	}


	static public function AddManagerialUserCtrl1()
	{
	if (isset($_POST["password"])) {
			


		       $encryptpass = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "useraccounts";
				$data = array('username' =>$_POST["username1"],
								'fullname' =>$_POST["fullname1"],
								'email' =>'student@gmail.com',
								'password' =>$encryptpass,
								'departmentid' =>$_POST["departmentid"],
								'studentid' =>0,
								'userole' =>'Student');
				$answer = ManageUserMdl::AddManagerialUserMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "New Student is added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "manageusers";
							}
						});
						</script>';
				}
		
		}
	}


	

	static public function AddManagerialUserCtrl2()
	{
	if (isset($_POST["password1"])) {
			


		       $encryptpass = crypt($_POST["password1"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "useraccounts";
				$data = array('username' =>$_POST["username2"],
								'fullname' =>$_POST["fullname2"],
								'email' =>'parent@gmail.com',
								'password' =>$encryptpass,
								'studentid' =>$_POST["studentid"],
								'departmentid' =>$_POST["departmentid"],
								'userole' =>'Parent');
				$answer = ManageUserMdl::AddManagerialUserMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "New Parent is added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "manageusers";
							}
						});
						</script>';
				}
		
		}
	}

static public function ShowAllSubjectsCtrl($item, $value){
		$table = "subjects";
		$answer = ManageUserMdl::AllManagerUsersMdl($table, $item, $value);
		return $answer;
	}
static public function SumOFCreditCtrl($item, $value){
		$table = "subjects";
		$answer = ManageUserMdl::SumOFCreditMdl($table, $item, $value);
		return $answer;
	}




	static public function UpdateViewConvoCtrl()
	{
	if (isset($_POST["convoview"])) {
			
				$table = "useraccounts";
                $item1 = "convoviewid";
                $value1 = $_POST["convoview"];
                $value2 = $_SESSION['id'];
                $item2 = "id";        
                $answer = CommonMethodsmdl::mdlUpdatedetailstwo($table, $item1, $value1, $item2, $value2);

				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully Set!",
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


