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
		updateHighSchool();
		break;

		case 7;
		getHighSchool();
		break;

		case 8;
		newUniversity();
		break;

		case 9;
		updateUniversity();
		break;

		case 10;
		getUniversity();
		break;

		case 11:
		newWassce();
		break;

		case 12:
		getWassce();
		break;

		case 13:
		newSat();
		break;

		case 14:
		getSat();
		break;

		case 15:
		newIgsce();
		break;

		case 16:
		getIgsce();
		break;

		case 17;
		newOther();
		break;

		case 18;
		getOther();
		break;

		case 19;
		newToefl();
		break;

		case 20;
		getToefl();
		break;

		case 21;
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

	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->updatePersonal($applicantid,$title,$email,
			$firstname,$lastname,$gender,$nationality,$passport,
			$expirydate,$street,$town,$region,$country,$birthdate,
			$phone,$livewith,$married,$disable,$disability,$insurance,
			$parentname,$alive,$parentphone,$parentemail,$relationship,
			$parentjob);
			
			// var_dump($result);

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

function updateHighSchool(){
	include_once("applicants.php");
	$obj = new applicants();

	$highschoolid = $_REQUEST['highschoolid'];
	$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$startyear = $_REQUEST['startyear'];
	$endyear = $_REQUEST['endyear'];
	$certificate = $_REQUEST['certificate'];
	$language = $_REQUEST['language'];

	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
	
				$res=$obj->updateHighSchool($highschoolid,$name,$address,$startyear,$endyear,$certificate,$language);
				//var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "HighSchool failed to update."}';
			}else{
	 			echo '{"result":1, "message": "HighSchool updated."}';
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

function updateUniversity(){
	include_once("applicants.php");
	$obj = new applicants();

	$universityid = $_REQUEST['universityid'];
	$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$startdate = $_REQUEST['startdate'];
	$major = $_REQUEST['major'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
	
				$res=$obj->updateUniversity($highschoolid,$name,$address,$startdate,$major);
				//var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "University failed to update."}';
			}else{
	 			echo '{"result":1, "message": "University updated."}';
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

function newWassce(){
	include_once("applicants.php");
	$obj = new applicants();

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newWassce($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "WASSCE score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "WASSCE score added."}';
			}
	
}

function getWassce() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getWassce($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display WASSCE scores"}';
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

function newIgsce(){
	include_once("applicants.php");
	$obj = new applicants();

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newIgsce($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "IGSCE score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "IGSCE score added."}';
			}
	
}

function getIgsce() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getIgsce($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display IGSCE scores"}';
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

function newSat(){
	include_once("applicants.php");
	$obj = new applicants();

	$reading = $_REQUEST['reading'];
	$writing = $_REQUEST['writing'];
	$maths = $_REQUEST['maths'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newSat($reading,$writing,$maths,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "SAT score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "SAT score added."}';
			}
	
}

function getSat() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getSat($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display SAT scores"}';
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

function newToefl(){
	include_once("applicants.php");
	$obj = new applicants();

	$writing = $_REQUEST['writing'];
	$reading = $_REQUEST['reading'];
	$listening = $_REQUEST['listening'];
	$speaking = $_REQUEST['speaking'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newToefl($writing,$reading,$listening,$speaking,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "TOEFL scores failed to add."}';
			}else{
	 			echo '{"result":1, "message": "TOEFL scores added."}';
			}
	
}

function getToefl() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getToefl($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display TOEFL scores"}';
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

function newOther(){
	include_once("applicants.php");
	$obj = new applicants();

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new applicants();
		$result=$obj->newOther($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "Score added."}';
			}
	
}

function getOther() {
	include_once("applicants.php");
	$obj = new applicants();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getOther($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display scores"}';
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