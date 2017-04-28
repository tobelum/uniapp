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
        $strQuery="select school.name,school.schoolid,application.status,school.username,school.ghanafee, application.paid, school.foreignfee, 
        school.paymenturl from school,application where application.applicantid = '$applicantid' && application.schoolid=school.schoolid";
        return $this->query($strQuery);
     }

    function getApplicants(){
        $strQuery="select applicant.phone, school.name,school.schoolid, applicant.applicantid, applicant.firstname, applicant.lastname,
         application.paid, application.reference from school,application,applicant where application.applicantid = applicant.applicantid && application.schoolid=school.schoolid";
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

     function submit($applicantid='none',$schoolid='none'){
        $strQuery="update application SET status = 'Submitted' where applicantid='$applicantid' && schoolid='$schoolid'";
        return $this->query($strQuery);
     }

      function getReview($applicantid,$schoolid){
          $strQuery="select * from application where applicantid = '$applicantid' && schoolid='$schoolid'";
          
          return $this->query($strQuery);
     }

     function saveReview($review='none',$reviewer='none',$comment='none',$applicantid='none',$schoolid='none'){
        $strQuery="update application SET review='$review',reviewer='$reviewer',comment='$comment' where applicantid='$applicantid' && schoolid='$schoolid'";
        return $this->query($strQuery);
     }
     function paid($applicantid='none',$schoolid='none'){
        $strQuery="update application SET paid = 'Paid' where applicantid='$applicantid' && schoolid='$schoolid'";
        return $this->query($strQuery);
     }

     function addReference($reference='none',$applicantid='none',$schoolid='none'){
        $strQuery="update application SET reference = '$reference' where applicantid='$applicantid' && schoolid='$schoolid'";
        return $this->query($strQuery);
     }
   }


