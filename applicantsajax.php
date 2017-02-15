<?php
	
	session_start();	

	if (!isset($_REQUEST['cmd'])) {
		echo '{"result": 0, "message": "Command not entered"}';
	}
	$command = $_REQUEST['cmd'];
	switch($command) {
		case 1:
		signup();
		break;

		case 2:
		login();
		break;

		case 3:
		fillPersonal();
		break;

		default:
		echo "wrong cmd";
		break;
	}


function signup() {
	if (($_REQUEST['firstname']=="") || ($_REQUEST['lastname']=="") || ($_REQUEST['email']=="")
		|| ($_REQUEST['pword']=="") || ($_REQUEST['phone']=="")) {
		echo '{"result":0, "message": "All information required was not given"}';
		return;
	}
	
	include_once("applicants.php");
	$obj = new applicants();
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['pword'];
	$phone= $_REQUEST['phone'];
	
	$a = $obj->signup($firstname,$lastname,$email,$pword,$phone);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not register applicant"}';
	}
	
	else {
	 echo '{"result":1, "message": "Applicant sucessfully registered"}';	
	}
	
}

function login(){
	if (($_REQUEST['email']=="") || ($_REQUEST['pword']=="")) {
		echo '{"result":0, "message": "All information required was not given"}';
		return;
	}
	
	include_once("applicants.php");
	$obj = new applicants();
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['pword'];
	
	$result = $obj->login($email,$pword);
	$row=$obj->fetch();
	//var_dump($row);
	if (!$row) {
		echo '{"result":0 ,"message": "Login Failed"}';
	}
	
	else {

	 echo '{"result":1, "message": "Login Successful"}';
	
	 // session_destroy();
	 // session_start();
	 $_SESSION['applicantid']=$row['applicantid'];
	 // echo $_SESSION['applicantid'];

	}
}

function fillPersonal(){
	include_once("applicants.php");
	$obj = new applicants();

	$title = $_REQUEST['title'];
	$email = $_REQUEST['email'];
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$gender = $_REQUEST['gender'];
	$nationality = $_REQUEST['nationality'];
	$passport = $_REQUEST['passport'];
	$expirydate = $_REQUEST['expirydate'];
	$street = $_REQUEST['street'];
	$town = $_REQUEST['town'];
	$region = $_REQUEST['region'];
	$country = $_REQUEST['country'];
	$birthdate = $_REQUEST['birthdate'];
	$phone = $_REQUEST['phone'];
	$livewith = $_REQUEST['livewith'];
	$married = $_REQUEST['married'];
	$disable = $_REQUEST['disable'];
	$disability = $_REQUEST['disability'];
	$insurance = $_REQUEST['insurance'];

	$applicantid = $_SESSION['applicantid'];

	// $result = $obj->getApplicant($applicantid);
	// $row = $obj->fetch();
	// var_dump($row);

	// if(!$row){
	// 	echo '{"result":0 ,"message": "Profile could not be retrieved."}';
	// }else{
		$obj = new applicants();
		$result=$obj->updatePersonal($applicantid,$title,$email,$firstname,$lastname,$gender,$nationality,$passport,$expirydate,$street,$town,$region,$country,$birthdate,$phone,$livewith,$married,$disable,$disability,$insurance);
			// $r=$obj->fetch();
			var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Profile failed to update."}';
			}else{
	 			echo '{"result":1, "message": "Profile updated."}';
			}
	// }
}



?>