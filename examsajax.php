<?php
	session_start();	

	if (!isset($_REQUEST['cmd'])) {
		echo '{"result": 0, "message": "Command not entered"}';
	}
	$command = $_REQUEST['cmd'];
	switch($command) {

		case 1:
		newWassce();
		break;

		case 2:
		getWassce();
		break;

		case 3:
		newSat();
		break;

		case 4:
		getSat();
		break;

		case 5:
		newIgsce();
		break;

		case 6:
		getIgsce();
		break;

		case 7;
		newOther();
		break;

		case 8;
		getOther();
		break;

		case 9;
		newToefl();
		break;

		case 10;
		getToefl();
		break;

		case 11;
		delWassce();
		break;

		case 12;
		delIgsce();
		break;

		case 13;
		delSat();
		break;

		case 14;
		delToefl();
		break;

		case 15;
		delOther();
		break;

		default:
		echo "wrong cmd";
		break;
	}

	
function newWassce(){
	include_once("exams.php");

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new exams();
		$result=$obj->newWassce($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "WASSCE score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "WASSCE score added."}';
			}
	
}

function getWassce() {
	include_once("exams.php");
	$obj = new exams();

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
	include_once("exams.php");

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$obj = new exams();
		$result=$obj->newIgsce($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "IGSCE score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "IGSCE score added."}';
			}
	
}

function getIgsce() {
	include_once("exams.php");
	$obj = new exams();

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
	include_once("exams.php");
	$obj = new exams();

	$reading = $_REQUEST['reading'];
	$writing = $_REQUEST['writing'];
	$maths = $_REQUEST['maths'];
	$applicantid = $_SESSION['applicantid'];

		$result=$obj->newSat($reading,$writing,$maths,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "SAT score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "SAT score added."}';
			}
	
}

function getSat() {
	include_once("exams.php");
	$obj = new exams();

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
	include_once("exams.php");
	$obj = new exams();

	$writing = $_REQUEST['writing'];
	$reading = $_REQUEST['reading'];
	$listening = $_REQUEST['listening'];
	$speaking = $_REQUEST['speaking'];
	$applicantid = $_SESSION['applicantid'];

		$result=$obj->newToefl($writing,$reading,$listening,$speaking,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "TOEFL scores failed to add."}';
			}else{
	 			echo '{"result":1, "message": "TOEFL scores added."}';
			}
	
}

function getToefl() {
	include_once("exams.php");
	$obj = new exams();

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
	include_once("exams.php");
	$obj = new exams();

	$subject = $_REQUEST['subject'];
	$grade = $_REQUEST['grade'];
	$applicantid = $_SESSION['applicantid'];

		$result=$obj->newOther($subject,$grade,$applicantid);
			
			//var_dump($result);

			if (!$result) {
				echo '{"result":0 ,"message": "Score failed to add."}';
			}else{
	 			echo '{"result":1, "message": "Score added."}';
			}
	
}

function getOther() {
	include_once("exams.php");
	$obj = new exams();

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

function delWassce() {
	if (($_REQUEST['id']=="")) {
		echo '{"result":0, "message": "id was not given"}';
		return;
	}
	
	include_once("exams.php");
	$obj = new exams();
	$id= $_REQUEST['id'];

	$a = $obj->delWassce($id);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not delete score"}';
	}
	
	else {
	 echo '{"result": 1, "message": "Score removed"}';	
	}
	
}

function delIgsce() {
	if (($_REQUEST['id']=="")) {
		echo '{"result":0, "message": "id was not given"}';
		return;
	}
	
	include_once("exams.php");
	$obj = new exams();
	$id= $_REQUEST['id'];

	$a = $obj->delIgsce($id);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not add score"}';
	}
	
	else {
	 echo '{"result": 1, "message": "Score removed"}';	
	}
	
}

function delSat() {
	
	include_once("exams.php");
	$obj = new exams();

	$applicantid = $_SESSION['applicantid'];

	$a = $obj->delSat($applicantid);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not delete score"}';
	}
	
	else {
	 echo '{"result": 1, "message": "Score removed"}';	
	}
	
}

function delToefl() {

	include_once("exams.php");
	$obj = new exams();

	$applicantid = $_SESSION['applicantid'];

	$a = $obj->delToefl($applicantid);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not delete score"}';
	}
	
	else {
	 echo '{"result": 1, "message": "Score removed"}';	
	}
	
}

function delOther() {
	if (($_REQUEST['id']=="")) {
		echo '{"result":0, "message": "id was not given"}';
		return;
	}
	
	include_once("exams.php");
	$obj = new exams();
	$id= $_REQUEST['id'];

	$a = $obj->delOther($id);

	if (!$a) {
		echo '{"result":0 ,"message": "Could not delete score"}';
	}
	
	else {
	 echo '{"result": 1, "message": "Score removed"}';	
	}
	
}

?>