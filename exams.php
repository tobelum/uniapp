<?php

include_once("adb.php");

class exams extends adb{
  function exams(){
    }
          function newWassce($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into wassce SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
      function getWassce($applicantid='none'){
        $strQuery="select * from wassce where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delWassce($id='none'){
          $strQuery = "delete from wassce where id = '$id'";          
          return $this->query ($strQuery);
     }
      function newIgsce($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into igsce SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
      function getIgsce($applicantid='none'){
        $strQuery="select * from igsce where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delIgsce($id='none'){
          $strQuery = "delete from igsce where id = '$id'";          
          return $this->query ($strQuery);
     }
      function newSat($reading='none',$writing='none',$maths='none',$applicantid='none'){
        $strQuery="insert into sat SET reading='$reading',writing='$writing',maths='$maths',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
 
      function getSat($applicantid='none'){
        $strQuery="select * from sat where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delSat($applicantid='none'){
          $strQuery = "delete from sat where applicantid = '$applicantid'";          
          return $this->query ($strQuery);
     }
      function newToefl($writing='none',$reading='none',$listening='none',$speaking='none',$applicantid='none'){
        $strQuery="insert into toefl SET writing='$writing',reading='$reading', listening='$listening',speaking='$speaking',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
      function getToefl($applicantid='none'){
        $strQuery="select * from toefl where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delToefl($applicantid='none'){
          $strQuery = "delete from toefl where applicantid = '$applicantid'";          
          return $this->query ($strQuery);
     }
      function newOther($subject='none',$grade='none',$applicantid='none'){
        $strQuery="insert into other SET subject='$subject',grade='$grade',applicantid ='$applicantid'";
        return $this->query($strQuery);
     }
      function getOther($applicantid='none'){
        $strQuery="select * from other where applicantid = '$applicantid'";
        return $this->query($strQuery);
     }
      function delOther($id='none'){
          $strQuery = "delete from other where id = '$id'";          
          return $this->query ($strQuery);
     }
}

?>