<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param int schoolid
	*@param string name
	*@param enum open 
	*@param string username
	*@param string pword
	*@param date birthdate
  *@param string street
  *@param string town
  *@param string region
	*/

class school extends adb{
     function school(){

     }

     function getSchools($applicantid){
          $strQuery="select * from school where schoolid not in( select schoolid from application where applicantid = '$applicantid')";
          
          return $this->query($strQuery);
     }

   }


