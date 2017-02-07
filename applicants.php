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

   }


