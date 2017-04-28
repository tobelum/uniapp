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
          // if($this->query ($strQuery)){
            //$strQuery ="select last_insert_id() as id";
           return $this->query($strQuery);
            // $last_id = $this->fetch();
         // }
          // echo $strQuery;
          // var_dump($last_id);
          // return $last_id;
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
      $disability='none',$insurance='none',$parentname='none',$alive='none',$parentphone='none',$parentemail='none',$relationship='none',$parentjob='none',$sponsorname=
      'none',$sponsorphone='none',$sponsoremail='none'){
        $strQuery="update applicant SET title='$title',email='$email',firstname='$firstname',lastname='$lastname',gender='$gender',nationality='$nationality',
        passport='$passport',expirydate='$expirydate',street='$street',town='$town',region='$region',country='$country',birthdate='$birthdate',phone='$phone',
        livewith='$livewith',married='$married',disable='$disable',disability='$disability',insurance='$insurance',parentname='$parentname',alive='$alive',
        parentphone='$parentphone',parentemail='$parentemail',relationship='$relationship',parentjob='$parentjob', sponsorname='$sponsorname',sponsorphone='$sponsorphone',
        sponsoremail='$sponsoremail' where applicantid='$applicantid'";
        return $this->query($strQuery);
     }
     function getId($applicantid='none'){
        $strQuery="select $applicantid from parent where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }

      function newHighSchool($name='none',$address='none',$startyear='none',$endyear='none',$certificate='none',$language='none',$applicantid='none'){
        $strQuery="insert into highschool SET name='$name',address='$address',startyear='$startyear',endyear='$endyear',certificate='$certificate',language='$language',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
      function getHighSchool($applicantid='none'){
        $strQuery="select * from highschool where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delHighSchool($highschoolid='none'){
        $strQuery="delete from highschool where highschoolid='$highschoolid'";
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
      function delUniversity($universityid='none'){
        $strQuery="delete from university where universityid='$universityid'";
        return $this->query($strQuery);
     }

      function sendEmail($email='none', $firstname='none'){
        mail($email,"Thank you for registering with UniApp","Dear $firstname, Thank you for registering with UniApp. 
          Log in with this link localhost/uniapp/index.html. We look forward to assisting you with your applications.
          Best,
          The UniApp Team.");
     }

      function signupsms($phone){
        require './Smsgh/Api.php';

      $auth = new BasicAuth("mbdoleqn", "ffbdrjpg");
      // instance of ApiHost
      $apiHost = new ApiHost($auth);

      // instance of AccountApi
      $accountApi = new AccountApi($apiHost);
      // Get the account profile
      // Let us try to send some message
      $messagingApi = new MessagingApi($apiHost);
      try {
    // Send a quick message
       // var_dump($phone);
    $mesg = new Message();
    $mesg->setContent("Thank you for registering with UniApp. Goodluck with your applications!");
    $mesg->setTo("+".$phone);
    $mesg->setFrom("UniApp");
    $mesg->setRegisteredDelivery(true);

    // Let us say we want to send the message 3 days from today
   
    $messageResponse = null; #
    $messageResponse = $messagingApi->sendMessage($mesg);
      if($messageResponse)
      {
        if ($messageResponse instanceof MessageResponse) {
            echo $messageResponse->getStatus();
        } elseif ($messageResponse instanceof HttpResponse) {
            echo "\nServer Response Status : " . $messageResponse->getStatus();
        }
      }
    } catch (Exception $ex) {
        echo $ex->getTraceAsString();
      }


   }


   }