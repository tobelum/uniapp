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

     function getSchools(){
          $strQuery="select * from school ";
          
          return $this->query($strQuery);
     }


   }


