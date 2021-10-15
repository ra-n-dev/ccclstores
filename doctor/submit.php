<?php 
session_start();

extract($_SESSION['info']);

 
  include("../db/connection.php");
  $fname ="$fname";
  $lname ="$lname";
  $email ="$email";
  $phone ="$phone";
  $address ="$address";
  $query = "INSERT INTO todoo (fname,lname,email,phone,address)VALUES('$fname','$lname','$email','$phone','$address')";  
  $res =mysqli_query($connect,$query)or die(mysqli_error($connect));;  
  if($res){
   
    echo'data saved successfully';
  } 
?>