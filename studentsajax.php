<?php
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
	
	include_once("students.php");
	$obj = new students();
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
	
	include_once("students.php");
	$obj = new students();
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['pword'];
	
	$result = $obj->login($email,$pword);

	if ($result==false) {
		echo '{"result":0 ,"message": "Login Failed"}';
	}
	
	else {

	 echo '{"result":1, "message": "Login Successful"}';	
	}
}



?>