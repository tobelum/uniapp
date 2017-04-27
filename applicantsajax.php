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
		newHighSchool();
		break;

		case 6:
		delHighSchool();
		break;

		case 7;
		getHighSchool();
		break;

		case 8;
		newUniversity();
		break;

		case 9;
		delUniversity();
		break;

		case 10;
		getUniversity();
		break;

		case 11;
		getDetails();
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
		// $to = "tobel.eze-okoli@ashesi.deu.gh";
		// $subject = "My subject";
		// $txt = "Hello world!";
		// $headers = "From: UniApp";
		// mail($to,$subject,$txt,$headers);

		$sms=$obj->signupsms($phone);
	 echo '{"result":1, "message": "Applicant sucessfully registered"}';
	 $_SESSION['applicantid']=$a['id'];	
	 echo $_SESSION['applicantid'];
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
	$parentname = $_REQUEST['parentname'];
	$alive = $_REQUEST['alive'];
	$parentphone = $_REQUEST['parentphone'];
	$parentemail = $_REQUEST['parentemail'];
	$relationship = $_REQUEST['relationship'];
	$parentjob = $_REQUEST['parentjob'];
	$sponsorname = $_REQUEST['sponsorname'];
	$sponsorphone = $_REQUEST['sponsorphone'];
	$sponsoremail = $_REQUEST['sponsoremail'];

	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->updatePersonal($applicantid,$title,$email,
			$firstname,$lastname,$gender,$nationality,$passport,
			$expirydate,$street,$town,$region,$country,$birthdate,
			$phone,$livewith,$married,$disable,$disability,$insurance,
			$parentname,$alive,$parentphone,$parentemail,$relationship,
			$parentjob,$sponsorname,$sponsorphone,$sponsoremail);
			
			var_dump($sponsorphone);

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

	

function newHighSchool(){
	include_once("applicants.php");
	$obj = new applicants();

	$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$startyear = $_REQUEST['startyear'];
	$endyear = $_REQUEST['endyear'];
	$certificate = $_REQUEST['certificate'];
	$language = $_REQUEST['language'];

	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newHighSchool($name,$address,$startyear,$endyear,$certificate,$language,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "HighSchool failed to create."}';
			}else{
	 			echo '{"result":1, "message": "HighSchool added."}';
			}
	
}

function delHighSchool(){
	include_once("applicants.php");
	$obj = new applicants();

	$highschoolid = $_REQUEST['id'];

		$obj = new applicants();
	
				$res=$obj->delHighSchool($highschoolid);
				//var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "Failed to remove HighSchool."}';
			}else{
	 			echo '{"result":1, "message": "HighSchool removed."}';
			}
	
}

function getHighSchool() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getHighSchool($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display HighSchool"}';
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


function newUniversity(){
	include_once("applicants.php");
	$obj = new applicants();

	$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$startdate = $_REQUEST['startdate'];
	$major = $_REQUEST['major'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newUniversity($name,$address,$startdate,$major,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "University failed to create."}';
			}else{
	 			echo '{"result":1, "message": "University added."}';
			}
	
}

function delUniversity(){
	include_once("applicants.php");
	$obj = new applicants();

	$universityid = $_REQUEST['id'];

		$obj = new applicants();
	
				$res=$obj->delUniversity($universityid);
				//var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "Failed to remove University."}';
			}else{
	 			echo '{"result":1, "message": "University removed."}';
			}
	
}

function getUniversity() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getUniversity($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display University"}';
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


function getDetails(){
	if (($_REQUEST['id']=="")) {
		echo '{"result":0, "message": "applicantid was not given"}';
		return;
	}	
	 $_SESSION['applicantid']=$_REQUEST['id'];
	 echo '{"result":1, "message": "Loading applicant details..."}';
}

?>