<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param int applicantid
	*@param int schoolid
	*@param enum status
	*@param date applydate
	*/

class application extends adb{
     function application(){

     }

     function addSchool($applicantid='none',$schoolid='none'){
    
          $strQuery = "insert into application SET applicantid = '$applicantid',schoolid = '$schoolid'";
          // echo $strQuery;
          
          return $this->query ($strQuery);

     }

     function delSchool($applicantid='none',$schoolid='none'){
    
          $strQuery = "delete from application where applicantid = '$applicantid' && schoolid = '$schoolid'";          
          return $this->query ($strQuery);

     }

     function getMySchools($applicantid='none'){
        $strQuery="select school.name,school.schoolid,application.status,school.username from school,application where application.applicantid = '$applicantid' && application.schoolid=school.schoolid";
        return $this->query($strQuery);
     }



   }


