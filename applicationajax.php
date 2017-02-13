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
		getSchool();
		break;

		default:
		echo "wrong cmd";
		break;
	}


function getSchools() {

	include_once("school.php");
	$obj = new school();
	
	$a = $obj->getSchools();

	$result = $obj->getSchool($schoolid);
	$row=$obj->fetch();

	if (!$a) {
		echo '{"result":0 ,"message": "Could not display schools"}';
	}
	
	else {
	 echo '{"result":1, "message": "Schools retrieved"}';	
	}
	
}

function getSchool(){
	if (($_REQUEST['schoolid']=="")) {
		echo '{"result":0, "message": "SchoolID was not given"}';
		return;
	}
	
	include_once("school.php");
	$obj = new school();
	$schoolid = $_REQUEST['schoolid'];
	
	$result = $obj->getSchool($schoolid);
	$row=$obj->fetch();
	//var_dump($row);
	if (!$row) {
		echo '{"result":0 ,"message": "School could not selected"}';
	}
	
	else {

	 echo '{"result":1, "message": "School was selected"}';

	}
}



?>