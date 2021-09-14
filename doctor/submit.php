<?php 
session_start();

extract($_SESSION['info']);
echo"$fname <br>";
echo"$lname <br>";
echo"$email <br>";
echo"$phone <br>";
echo"$address <br>";
echo"$age";
 ?>