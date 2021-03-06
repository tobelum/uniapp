<?php
	
	session_start();	

	if (!isset($_REQUEST['cmd'])) {
		echo '{"result": 0, "message": "Command not entered"}';
	}
	$command = $_REQUEST['cmd'];
	switch($command) {
		case 1:
		login();
		break;

		case 2:
		getApplicants();
		break;

		case 3:
		getSchool();
		break;

		case 4:
		updateSchool();
		break;

		case 5:
		newSchool();
		break;

		case 6:
		saveReview();
		break;

		case 7:
		getReview();
		break;

		default:
		echo "wrong cmd";
		break;
	}

function login(){
	if (($_REQUEST['username']=="") || ($_REQUEST['pword']=="")) {
		echo '{"result":0, "message": "All information required was not given"}';
		return;
	}
	
	include_once("schools.php");
	$obj = new schools();
	$username = $_REQUEST['username'];
	$pword = $_REQUEST['pword'];
	
	$result = $obj->login($username,$pword);
	$row=$obj->fetch();
	
	if (!$row) {
		echo '{"result":0 ,"message": "Incorrect Username or Password"}';
	}
	
	else {

	 echo '{"result":1, "message": "Login Successful"}';
	
	 $_SESSION['schoolid']=$row['schoolid'];

	}
}

function getApplicants() {

	include_once("schools.php");
	$obj = new schools();
	
	// $a = $obj->getSchools();
	$schoolid = $_SESSION['schoolid'];

	$result = $obj->getApplicants($schoolid);



	if (!$result) {
		echo '{"result":0 ,"message": "Could not display applicants"}';
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

function getSchool() {

	include_once("schools.php");
	$obj = new schools();
	
	// $a = $obj->getSchools();
	$schoolid = $_SESSION['schoolid'];

	$result = $obj->getSchool($schoolid);



	if (!$result) {
		echo '{"result":0 ,"message": "Could not display school profile"}';
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

function updateSchool(){
	include_once("schools.php");
	$obj = new schools();

	$name = $_REQUEST['name'];
	$open = $_REQUEST['open'];
	$username = $_REQUEST['username'];
	$pword = $_REQUEST['pword'];
	$street = $_REQUEST['street'];
	$town = $_REQUEST['town'];
	$region = $_REQUEST['region'];
	$ghanafee = $_REQUEST['ghanafee'];
	$foreignfee = $_REQUEST['foreignfee'];

	$schoolid = $_SESSION['schoolid'];

		$result=$obj->updateSchool($name,$open,$username,$pword,$street,$town,$region,$ghanafee,$foreignfee,$schoolid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Profile failed to update."}';
			}else{
	 			echo '{"result":1, "message": "Profile updated."}';
			}
	
}

function newSchool(){
	include_once("schools.php");
	$obj = new schools();

	$name = $_REQUEST['name'];
	$open = $_REQUEST['open'];
	$username = $_REQUEST['username'];
	$pword = $_REQUEST['pword'];
	$street = $_REQUEST['street'];
	$town = $_REQUEST['town'];
	$region = $_REQUEST['region'];
	$ghanafee = $_REQUEST['ghanafee'];
	$foreignfee = $_REQUEST['foreignfee'];
	$paymenturl = $_REQUEST['paymenturl'];
	$websiteurl = $_REQUEST['websiteurl'];

		$result=$obj->newSchool($name,$open,$username,$pword,$street,$town,$region,$ghanafee,$foreignfee,$paymenturl,$websiteurl);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Failed to add school."}';
			}else{
	 			echo '{"result":1, "message": "School Added."}';
			}
	
}


function saveReview(){

	include_once("application.php");
	$obj = new application();

	$applicantid = $_REQUEST['applicantid'];
	$review = $_REQUEST['review'];
	$reviewer = $_REQUEST['reviewer'];
	$comment = $_REQUEST['comment'];
	$schoolid = $_SESSION['schoolid'];

		$obj = new application();
	
				$res=$obj->saveReview($review,$reviewer,$comment,$applicantid,$schoolid);
				//var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "Application failed to update."}';
			}else{
	 			echo '{"result":1, "message": "Application updated."}';
			}
	
}




?>