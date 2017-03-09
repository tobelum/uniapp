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
          // echo $strQuery;
          
          return $this->query ($strQuery);

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
      $disability='none',$insurance='none'){
        $strQuery="update applicant SET title='$title',email='$email',firstname='$firstname',lastname='$lastname',gender='$gender',nationality='$nationality',passport='$passport',expirydate='$expirydate',street='$street',town='$town',region='$region',country='$country',birthdate='$birthdate',phone='$phone',livewith='$livewith',married='$married',disable='$disable',disability='$disability',insurance='$insurance' where applicantid='$applicantid'";
        return $this->query($strQuery);
     }

      function updateParent($firstname='none',$lastname='none',$alive='none',$relationship='none',$education='none',$phone='none',$email='none',$employer='none',
      $job='none',$applicantid='none'){
        $strQuery="update parent SET firstname='$firstname',lastname='$lastname',relationship='$relationship',education='$education',phone='$phone',email='$email',employer='$employer',job='$job' where applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function newParent($firstname='none',$lastname='none',$alive='none',$relationship='none',$education='none',$phone='none',$email='none',$employer='none',
      $job='none',$applicantid='none'){
        $strQuery="insert into parent SET firstname='$firstname',lastname='$lastname',relationship='$relationship',education='$education',phone='$phone',email='$email',employer='$employer',job='$job',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

     function getParent($applicantid='none'){
        $strQuery="select * from parent where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

     function getId($applicantid='none'){
        $strQuery="select $applicantid from parent where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newActivity($name='none',$startmonth='none',$startyear='none',$endmonth='none',$endyear='none',$positions='none',$applicantid='none'){
        $strQuery="insert into activity SET name='$name',startmonth='$startmonth',startyear='$startyear',endmonth='$endmonth',endyear='$endyear',positions='$positions',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getActivity($applicantid='none'){
        $strQuery="select * from activity where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function updateActivity($name='none',$startmonth='none',$startyear='none',$endmonth='none',$endyear='none',$positions='none',$applicantid='none'){
        $strQuery="update activity SET name='$name',startmonth='$startmonth',startyear='$startyear',endmonth='$endmonth',endyear='$endyear',positions='$positions' where applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function newHighSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$certificate='none',$language='none',$applicantid='none'){
        $strQuery="insert into highschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear',certificate='$certificate',language='$language',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getHighSchool($applicantid='none'){
        $strQuery="select * from highschool where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function updateHighSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$certificate='none',$language='none',$applicantid='none'){
        $strQuery="update highschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear',certificate='$certificate',language='$language' where applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function newBasicSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$applicantid='none'){
        $strQuery="insert into basicschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

      function getBasicSchool($applicantid='none'){
        $strQuery="select * from basicschool where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function updateBasicSchool($name='none',$town='none',$region='none',$country='none',$startyear='none',$endyear='none',$applicantid='none'){
        $strQuery="update basicschool SET name='$name',town='$town',region='$region',country='$country',startyear='$startyear',endyear='$endyear' where applicantid ='$applicantid'";
        return $this->query($strQuery);
     }

   }


