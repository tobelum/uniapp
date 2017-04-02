<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param int schoolid
	*@param string name
	*@param enum open 
	*@param string username
	*@param string pword
  *@param string street
  *@param string town
  *@param string region
	*/

class schools extends adb{
     function schools(){

     }

     function getSchools($applicantid){
          $strQuery="select * from school where schoolid not in( select schoolid from application where applicantid = '$applicantid')";
          
          return $this->query($strQuery);
     }

     function login($username,$pword){
          $strQuery="select schoolid from school where username='$username' and pword='$pword'";
          
          return $this->query($strQuery);
     }


     function getGender($schoolid='none'){
        $strQuery = "SELECT gender,count(*) count from applicant, 
        application where application.schoolid='$schoolid' && applicant.applicantid =application.applicantid group by gender";
        return $this->query($strQuery);
     }

     // function getNationality($schoolid='none'){

     //    return $this->query($strQuery);
     // }

     function getApplicants($schoolid='none'){
        $strQuery = "select applicant.applicantid, applicant.firstname, applicant.lastname, application.status,application.comment from applicant, 
        application where application.schoolid='$schoolid' && applicant.applicantid =application.applicantid";
        return $this->query($strQuery);
     }

     function getSchool($schoolid){
      $strQuery="select * from school where schoolid='$schoolid'";
      return $this->query($strQuery);
     }

     function updateSchool($name='none',$open='none',$username='none',$pword='none',$street='none',$town='none',$region='none',$ghanafee='none',$foreignfee='none',$schoolid='none'){
      $strQuery="update school set name = '$name', open = '$open', username='$username', pword='$pword',
                street='$street', town='$town', region='$region', ghanafee='$ghanafee', foreignfee='$foreignfee' where schoolid='$schoolid'";
     return $this->query($strQuery);
     }


   }


