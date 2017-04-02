<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Students
	*@param int personalid
	*@param enum title
	*@param string firstname 
	*@param string lastname 
	*@param string email 
	*@param date birthdate
	*@param enum gender
  *@param string nationality
  *@param string passport
  *@param date expirydate
  *@param string street
  *@param string town
  *@param string region
  *@param string country
  *@param int phone
  *@param enum livewith
  *@param string pword
	*/

class applicants extends adb{
     function applicants(){

     }

     function signup($firstname='none',$lastname='none',$email='none',$pword='none',$phone='none'){
    
          $strQuery = "insert into applicant SET firstname = '$firstname',lastname = '$lastname',email = '$email',pword = '$pword',phone = '$phone'";
          if($this->query ($strQuery)){
            $strQuery ="select last_insert_id() as id";
            $this->query ($strQuery);
            $last_id = $this->fetch();
          }
          // echo $strQuery;
          var_dump($last_id);
          return $last_id;

     }

     function login($email='none',$pword='none'){
          $strQuery="select applicantid from applicant where email='$email' and pword='$pword'";
          
          return $this->query($strQuery);
     }

     function getApplicant($applicantid='none'){
        $strQuery="select * from applicant where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

     function updatePersonal($applicantid='none',$title='none',$email='none',$firstname='none',$lastname='none',$gender='none',$nationality='none',$passport='none',
      $expirydate='none',$street='none',$town='none',$region='none',$country='none',$birthdate='none',$phone='none',$livewith='none',$married='none',$disable='none',
      $disability='none',$insurance='none',$parentname='none',$alive='none',$parentphone='none',$parentemail='none',$relationship='none',$parentjob='none'){
        $strQuery="update applicant SET title='$title',email='$email',firstname='$firstname',lastname='$lastname',gender='$gender',nationality='$nationality',
        passport='$passport',expirydate='$expirydate',street='$street',town='$town',region='$region',country='$country',birthdate='$birthdate',phone='$phone',
        livewith='$livewith',married='$married',disable='$disable',disability='$disability',insurance='$insurance',parentname='$parentname',alive='$alive',
        parentphone='$parentphone',parentemail='$parentemail',relationship='$relationship',parentjob='$parentjob' where applicantid='$applicantid'";
        return $this->query($strQuery);
     }

     function getId($applicantid='none'){
        $strQuery="select $applicantid from parent where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

     //  function newActivity($name='none',$startmonth='none',$startyear='none',$endmonth='none',$endyear='none',$positions='none',$applicantid='none'){
     //    $strQuery="insert into activity SET name='$name',startmonth='$startmonth',startyear='$startyear',endmonth='$endmonth',endyear='$endyear',positions='$positions',applicantid ='$applicantid'";
     //    return $this->query($strQuery);
     // }

     //  function getActivity($applicantid='none'){
     //    $strQuery="select * from activity where applicantid = '$applicantid'";
     //    return $this->query($strQuery);
     // }

     //  function updateActivity($name='none',$startmonth='none',$startyear='none',$endmonth='none',$endyear='none',$positions='none',$applicantid='none'){
     //    $strQuery="update activity SET name='$name',startmonth='$startmonth',startyear='$startyear',endmonth='$endmonth',endyear='$endyear',positions='$positions' where applicantid ='$applicantid'";
     //    return $this->query($strQuery);
     // }

      function newHighSchool($name='none',$address='none',$startyear='none',$endyear='none',$certificate='none',$language='none',$applicantid='none'){
        $strQuery="insert into highschool SET name='$name',address='$address',startyear='$startyear',endyear='$endyear',certificate='$certificate',language='$language',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getHighSchool($applicantid='none'){
        $strQuery="select * from highschool where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function updateHighSchool($highschoolid='none',$name='none',$address='none',$startyear='none',$endyear='none',$certificate='none',$language='none'){
        $strQuery="update highschool SET name='$name',address='$address',startyear='$startyear',endyear='$endyear',certificate='$certificate',language='$language' where highschoolid='$highschoolid'";
        return $this->query($strQuery);
     }

      function newUniversity($name='none',$address='none',$startdate='none',$major='none',$applicantid='none'){
        $strQuery="insert into university SET name='$name',address='$address',startdate='$startdate',major='$major',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getUniversity($applicantid='none'){
        $strQuery="select * from university where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function updateUniversity($universityid='none',$name='none',$address='none',$startdate='none',$major='none'){
        $strQuery="update university SET name='$name',address='$address',startdate='$startdate',major='$major' where universityid='$universityid'";
        return $this->query($strQuery);
     }


      function newWassce($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into wassce SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getWassce($applicantid='none'){
        $strQuery="select * from wassce where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newIgsce($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into igsce SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getIgsce($applicantid='none'){
        $strQuery="select * from igsce where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newSat($reading='none',$writing='none',$maths='none',$applicantid='none'){
        $strQuery="insert into sat SET reading='$reading',writing='$writing',maths='$maths',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
 
      function getSat($applicantid='none'){
        $strQuery="select * from sat where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newToefl($writing='none',$reading='none',$listening='none',$speaking='none',$applicantid='none'){
        $strQuery="insert into toefl SET writing='$writing',reading='$reading', listening='$listening',speaking='$speaking',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getToefl($applicantid='none'){
        $strQuery="select * from wassce where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newOther($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into other SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getOther($applicantid='none'){
        $strQuery="select * from other where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

     //  function newBasicSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$applicantid='none'){
     //    $strQuery="insert into basicschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear',applicantid ='$applicantid'";
     //    return $this->query($strQuery);
     // }

     //  function getBasicSchool($applicantid='none'){
     //    $strQuery="select * from basicschool where applicantid = '$applicantid'";
     //    return $this->query($strQuery);
     // }

     //  function updateBasicSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$applicantid='none'){
     //    $strQuery="update basicschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear' where applicantid ='$applicantid'";
     //    return $this->query($strQuery);
     // }

   }


