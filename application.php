<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param string name
	*@param enum open
	*@param string username 
	*@param string pword
	*@param string street
  *@param string town
  *@param string region
	*/

class application extends adb{
     function application(){

     }

     function addSchool($applicantid='none',$schoolid='none'){
    
          $strQuery = "insert into application SET applicantid = '$applicantid',schoolid = '$schoolid'";
          // echo $strQuery;
          
          return $this->query ($strQuery);

     }

     function getMySchools($applicantid='none'){
        $strQuery="select school.name,school.schoolid from school,application where application.applicantid = '$applicantid' && application.schoolid=school.schoolid";
        return $this->query($strQuery);
     }


   }


