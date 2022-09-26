<?php 
include("../../../db/connection.php");
//print_r($_POST);

$funder =$_POST['funder'];
$amount =$_POST['amount'];
$cashtype =$_POST['cash_purpose'];
$description =$_POST['description'];
$dat =date('Y-m-d');



$exp ="INSERT INTO billsheet(datebilled,caseid,caseid_status,cash_category,nhisstatus,nhisnumber,patientname,other_cash,charged_for,labs,drugs,cashtype,total_income,costofsales,note)VALUES('$dat','none','expired','external','none','none','$funder','$amount','none','none','none','$cashtype','$amount','0','$description')";

$expres = mysqli_query($connect,$exp)or die(mysqli_error($connect));

//echo "$expres";


 ?>