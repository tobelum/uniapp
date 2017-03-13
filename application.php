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

      function getCentral($applicantid){
          $strQuery="select * from central where applicantid = '$applicantid'";
          
          return $this->query($strQuery);
     }

    function newCentral($applicantid='none',$code1='none',$code2='none',$type='none',$campus='none'){
    
          $strQuery = "insert into central SET applicantid = '$applicantid', code1 = '$code1', code2 = '$code2',type = '$type',campus='$campus'";
          return $this->query ($strQuery);

     }

     function updateCentral($code1='none',$code2='none',$type='none',$campus='none',$applicantid='none'){
        $strQuery="update central SET code1='$code1',code2='$code2',type='$type',campus='$campus' where applicantid='$applicantid'";
        return $this->query($strQuery);
     }



   }


