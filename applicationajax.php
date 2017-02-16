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

		default:
		echo "wrong cmd";
		break;
	}


function getSchools() {

	include_once("school.php");
	$obj = new school();
	
	$a = $obj->getSchools();

	$result = $obj->getSchools();



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
	
	$a = $obj->getMySchools();

	$result = $obj->getMySchools();



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



?>