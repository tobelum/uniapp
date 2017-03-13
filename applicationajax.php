<?php
	
	session_start();	

	if (!isset($_REQUEST['cmd'])) {
		echo '{"result": 0, "message": "Command not entered"}';
	}
	$command = $_REQUEST['cmd'];
	switch($command) {
		case 1:
		getSchools();
		break;

		case 2:
		getMySchools();
		break;

		case 3:
		addSchool();
		break;

		case 4;
		delSchool();
		break;

		case 5;
		newCentral();
		break;

		case 6;
		updateCentral();
		break;

		case 7;
		getCentral();
		break;

		default:
		echo "wrong cmd";
		break;
	}


function getSchools() {

	include_once("school.php");
	$obj = new school();
	
	// $a = $obj->getSchools();
	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getSchools($applicantid);



	if (!$result) {
		echo '{"result":0 ,"message": "Could not display schools"}';
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

function getMySchools() {

	include_once("application.php");
	$obj = new application();

	$applicantid = $_SESSION['applicantid'];
	
	// $a = $obj->getMySchools();

	$result = $obj->getMySchools($applicantid);



	if (!$result) {
		echo '{"result":0 ,"message": "Could not display schools"}';
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

function addSchool() {
	if (($_REQUEST['schoolid']=="")) {
		echo '{"result":0, "message": "Schoolid was not given"}';
		return;
	}
	
	include_once("application.php");
	$obj = new application();
	$schoolid= $_REQUEST['schoolid'];

	$applicantid = $_SESSION['applicantid'];

	$a = $obj->addSchool($applicantid,$schoolid);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not add school"}';
	}
	
	else {
	 echo '{"result": 1, "message": "School added"}';	
	}


	
}

function delSchool() {
	if (($_REQUEST['schoolid']=="")) {
		echo '{"result":0, "message": "Schoolid was not given"}';
		return;
	}
	
	include_once("application.php");
	$obj = new application();
	$schoolid= $_REQUEST['schoolid'];

	$applicantid = $_SESSION['applicantid'];

	$a = $obj->delSchool($applicantid,$schoolid);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not add school"}';
	}
	
	else {
	 echo '{"result": 1, "message": "School removed"}';	
	}
	
}


function newCentral(){
	include_once("application.php");
	$obj = new application();

	$code1 = $_REQUEST['code1'];
	$code2 = $_REQUEST['code2'];
	$type = $_REQUEST['type'];
	$campus = $_REQUEST['campus'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new application();
		$result=$obj->newCentral($applicantid,$code1,$code2,$type,$campus);
			
			var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": " Application for Central failed to create."}';
			}else{
	 			echo '{"result":1, "message": "Application for Central created."}';
			}
	
}

function updateCentral(){

	include_once("application.php");
	$obj = new application();

	$code1 = $_REQUEST['code1'];
	$code2 = $_REQUEST['code2'];
	$type = $_REQUEST['type'];
	$campus = $_REQUEST['campus'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new application();
	
				$res=$obj->updateCentral($code1,$code2,$type,$campus,$applicantid);
				var_dump($res);
				if (!$res) {
				echo '{"result":0 ,"message": "Application failed to update."}';
			}else{
	 			echo '{"result":1, "message": "Application updated."}';
			}
	
}

function getCentral() {
	include_once("application.php");
	$obj = new application();

	$applicantid = $_SESSION['applicantid'];

	$result = $obj->getCentral($applicantid);

	if (!$result) {
		echo '{"result":0 ,"message": "Could not display Application"}';
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

?>