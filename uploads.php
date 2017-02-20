<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param string transcript
	*@param enum examtype
	*@param string paasport
	*@param string picture
	*@param int applicantid
	*/

class uploads extends adb{
     function uploads(){

     }

     function uploadTranscript($transcript='none',$applicantid='none'){
    
          $strQuery = "update attachment SET transcript = '$transcript' where applicantid = '$applicantid'";
          if(!$this->query($strQuery)){
            $strQuery = "insert into attachment SET transcript = '$transcript', applicantid='$applicantid'";

          }
          // echo $strQuery;
          return $this->query ($strQuery);

     }
     function getUploads($applicantid='none'){
        $strQuery = "select * from attachment where applicantid = '$applicantid'";
        return $this->query ($strQuery);
     }


   }


