<?php
session_start();
$id=$_SESSION['applicantid'];
header('Content-Type: application/pdf');

// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="transcript.pdf"');
header('Content-Disposition:  filename="transcript.pdf"');
// The PDF source is in original.pdf
readfile('./uploads/passports/'.$id.'.pdf');
//http_send_content_disposition("document.pdf", true);
//http_send_content_type("application/pdf");
//http_throttle(0.1, 2048);
//$content = file_get_contents("./uploads/transcripts/4.pdf");
//print ($content);
?>