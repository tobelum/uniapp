<?php
session_start();
// var_dump($_SESSION);
$applicantid=$_SESSION['applicantid'];
// echo $applicantid;

// $target_dir = "C:/xampp/htdocs/uniapp/example_upload/uploads/";
$target_dir = "uploads/scores/";
$original_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo "<div>Extension is : $imageFileType</div>";

$target_file = $target_dir . $applicantid.".".$imageFileType;

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// Check if file already exists
// if (file_exists($original_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// else{
//     $uploadOk = 1;

// }
// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
if($imageFileType != "pdf") {
    	echo "Sorry, only PDF files are allowed.";
    	$uploadOk = 0;
	}else{
		$uploadOk = 1;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>