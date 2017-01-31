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
  *@param enum livewithparents
  *@param string pword
  *@param string career
	*/

class students extends adb{
     function students(){

     }

     function getStudent($email='none', $pword='none'){

        $strQuery = "select personalid from personal where email = '$email', pword = '$pword'";
        return $this->query ($strQuery);
     }

     function signup($firstname='none',$lastname='none',$email='none',$pword='none',$phone='none'){
    
          $strQuery = "insert into personal SET firstname = '$firstname',lastname = '$lastname',email = '$email',pword = '$pword',phone = '$phone'";
          // echo $strQuery;
          // return $this->query ($strQuery);

          if ($this->query ($strQuery)==true){

            $last_id = $this->getStudent($email,$pword);
            echo $last_id;
          }

          $strQuery = "insert into student SET personalid ='$last_id'";
          return $this->query ($strQuery);

     }

     function login($email='none',$pword='none'){
          $strQuery="select student.studentid from student,personal where personal.email='$email' & personal.pword='$pword' & personal.personalid=student.personalid";
          return $this->query($strQuery);
     }

   }


