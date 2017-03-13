<?php
     include_once("adb.php");
     


class centralapply extends adb{
     function centralapply(){

     }

     function getInfo($applicantid){
          $strQuery="select * from central where applicantid = '$applicantid'";
          
          return $this->query($strQuery);
     }


   }


