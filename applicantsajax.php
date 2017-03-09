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

		case 4:
		getPersonal();
		break;

		case 5:
		saveParent();
		break;

		case 6:
		getParent();
		break;

		case 7;
		saveActivity();
		break;

		case 8;
		getActivity();
		break;

		case 9;
		saveHighSchool();
		break;

		case 10;
		getHighSchool();
		break;

		case 11;
		saveBasicSchool();
		break;

		case 12;
		getBasicSchool();
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
	
	if (!$row) {
		echo '{"result":0 ,"message": "Login Failed"}';
	}
	
	else {

	 echo '{"result":1, "message": "Login Successful"}';
	
	 $_SESSION['applicantid']=$row['applicantid'];

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

		$obj = new applicants();
		$result=$obj->updatePersonal($applicantid,$title,$email,$firstname,$lastname,$gender,$nationality,$passport,$expirydate,$street,$town,$region,$country,$birthdate,$phone,$livewith,$married,$disable,$disability,$insurance);
			
			var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Profile failed to update."}';
			}else{
	 			echo '{"result":1, "message": "Profile updated."}';
			}
	
}

function getPersonal() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getApplicant($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display Personal information"}';
	}
	else {
		$row=$obj->fetch();
		echo '{"result":1,"row":[';
		while($row){
			echo json_encode($row);

			$row=$obj->fetch();
			if($row!=false){
				echo ",";
			}
		}
		echo "]}";	
	}
	
}

// function saveParent(){
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$firstname = $_REQUEST['firstname'];
// 	$lastname = $_REQUEST['lastname'];
// 	$alive = $_REQUEST['alive'];
// 	$relationship = $_REQUEST['relationship'];
// 	$education = $_REQUEST['education'];
// 	$phone = $_REQUEST['phone'];
// 	$email = $_REQUEST['email'];
// 	$employer = $_REQUEST['employer'];
// 	$job = $_REQUEST['job'];

// 	$applicantid = $_SESSION['applicantid'];

// 		$obj = new applicants();
// 		$result=$obj->updateParent($firstname,$lastname,$alive,$relationship,$education,$phone,$email,$employer,$job,$applicantid);
			
// 			var_dump($result);

// 			if (!$result) {
// 				$res=$obj->newParent($firstname,$lastname,$alive,$relationship,$education,$phone,$email,$employer,$job,$applicantid);
// 				var_dump($res);
// 				if (!$res) {
// 					echo '{"result":0 ,"message": "Parent failed to create."}';
// 				}else{
// 					echo '{"result":1, "message": "Parent created."}';
// 				}
// 				echo '{"result":0 ,"message": "Parent failed to update."}';
// 			}else{
// 	 			echo '{"result":1, "message": "Parent updated."}';
// 			}
	
// }

// function getParent() {
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$applicantid = $_SESSION['applicantid'];

// 	$result = $obj->getParent($applicantid);

// 	if (!$result) {
// 		echo '{"result":0 ,"message": "Could not display Parent information"}';
// 	}
// 	else {
// 		$row=$obj->fetch();
// 		echo '{"result":1,"row":[';
// 		while($row){
// 			echo json_encode($row);

// 			$row=$obj->fetch();
// 			if($row!=false){
// 				echo ",";
// 			}
// 		}
// 		echo "]}";	
// 	}
	
// }

// function saveActivity(){
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$name = $_REQUEST['name'];
// 	$startmonth = $_REQUEST['startmonth'];
// 	$startyear = $_REQUEST['startyear'];
// 	$endmonth = $_REQUEST['endmonth'];
// 	$endyear = $_REQUEST['endyear'];
// 	$positions = $_REQUEST['positions'];

// 	$applicantid = $_SESSION['applicantid'];

// 		$obj = new applicants();
// 		$result=$obj->updateActivity($name,$startmonth,$startyear,$endmonth,$endyear,$positions,$applicantid);
			
// 			var_dump($result);

// 			if (!$result) {
// 				$res=$obj->newActivity($name,$startmonth,$startyear,$endmonth,$endyear,$positions,$applicantid);
// 				var_dump($res);
// 				if (!$res) {
// 					echo '{"result":0 ,"message": "Activity failed to create."}';
// 				}else{
// 					echo '{"result":1, "message": "Activity created."}';
// 				}
// 				echo '{"result":0 ,"message": "Activity failed to update."}';
// 			}else{
// 	 			echo '{"result":1, "message": "Activity updated."}';
// 			}
	
// }

// function getActivity() {
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$applicantid = $_SESSION['applicantid'];

// 	$result = $obj->getActivity($applicantid);

// 	if (!$result) {
// 		echo '{"result":0 ,"message": "Could not display Activity"}';
// 	}
// 	else {
// 		$row=$obj->fetch();
// 		echo '{"result":1,"row":[';
// 		while($row){
// 			echo json_encode($row);

// 			$row=$obj->fetch();
// 			if($row!=false){
// 				echo ",";
// 			}
// 		}
// 		echo "]}";	
// 	}
	
// }

// function saveHighSchool(){
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$name = $_REQUEST['name'];
// 	$town = $_REQUEST['town'];
// 	$region = $_REQUEST['region'];
// 	$country = $_REQUEST['country'];
// 	$startyear = $_REQUEST['startyear'];
// 	$endyear = $_REQUEST['endyear'];
// 	$certificate = $_REQUEST['certificate'];
// 	$language = $_REQUEST['language'];

// 	$applicantid = $_SESSION['applicantid'];

// 		$obj = new applicants();
// 		$result=$obj->updateHighSchool($name,$town,$region,$country,$startyear,$endyear,$certificate,$language,$applicantid);
			
// 			var_dump($result);

// 			if (!$result) {
// 				$res=$obj->newHighSchool($name,$town,$region,$country,$startyear,$endyear,$certificate,$language,$applicantid);
// 				var_dump($res);
// 				if (!$res) {
// 					echo '{"result":0 ,"message": "HighSchool failed to create."}';
// 				}else{
// 					echo '{"result":1, "message": "HighSchool created."}';
// 				}
// 				echo '{"result":0 ,"message": "HighSchool failed to update."}';
// 			}else{
// 	 			echo '{"result":1, "message": "HighSchool updated."}';
// 			}
	
// }

// function getHighSchool() {
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$applicantid = $_SESSION['applicantid'];

// 	$result = $obj->getHighSchool($applicantid);

// 	if (!$result) {
// 		echo '{"result":0 ,"message": "Could not display BasicSchool"}';
// 	}
// 	else {
// 		$row=$obj->fetch();
// 		echo '{"result":1,"row":[';
// 		while($row){
// 			echo json_encode($row);

// 			$row=$obj->fetch();
// 			if($row!=false){
// 				echo ",";
// 			}
// 		}
// 		echo "]}";	
// 	}
	
// }

// function saveBasicSchool(){
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$name = $_REQUEST['name'];
// 	$town = $_REQUEST['town'];
// 	$region = $_REQUEST['region'];
// 	$country = $_REQUEST['country'];
// 	$startyear = $_REQUEST['startyear'];
// 	$endyear = $_REQUEST['endyear'];

// 	$applicantid = $_SESSION['applicantid'];

// 		$obj = new applicants();
// 		$result=$obj->updateBasicSchool($name,$town,$region,$country,$startyear,$endyear,$applicantid);
			
// 			var_dump($result);

// 			if (!$result) {
// 				$res=$obj->newBasicSchool($name,$town,$region,$country,$startyear,$endyear,$applicantid);
// 				var_dump($res);
// 				if (!$res) {
// 					echo '{"result":0 ,"message": "BasicSchool failed to create."}';
// 				}else{
// 					echo '{"result":1, "message": "BasicSchool created."}';
// 				}
// 				echo '{"result":0 ,"message": "BasicSchool failed to update."}';
// 			}else{
// 	 			echo '{"result":1, "message": "BasicSchool updated."}';
// 			}
	
// }

// function getHighSchool() {
// 	include_once("applicants.php");
// 	$obj = new applicants();

// 	$applicantid = $_SESSION['applicantid'];

// 	$result = $obj->getBasicSchool($applicantid);

// 	if (!$result) {
// 		echo '{"result":0 ,"message": "Could not display BasicSchool"}';
// 	}
// 	else {
// 		$row=$obj->fetch();
// 		echo '{"result":1,"row":[';
// 		while($row){
// 			echo json_encode($row);

// 			$row=$obj->fetch();
// 			if($row!=false){
// 				echo ",";
// 			}
// 		}
// 		echo "]}";	
// 	}
	
// }

?>