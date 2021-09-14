<?php 
  include("../db/connection.php");
  $history =$_POST['history'];
  $healthstatus =$_POST['healthstatus'];
  $diagnosis =$_POST['diagnosis'];
  $ward =$_POST['ward'];
  $query = "INSERT INTO todo (history,healthstatus,diagnosis,ward)VALUES('$history','$healthstatus',$diagnosis,'$ward')";  
  $res =mysqli_query($connect,$query)or die(mysqli_error($connect));;  
  if($res){

    echo'data saved successfully';
  } 
?>