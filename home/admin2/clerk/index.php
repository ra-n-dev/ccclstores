



<?php

 session_start();
 $uname= $_SESSION['admin'];
// include("../includes/header.php");
 //include("../includes/navbar.php");
 include("../../../db/connection.php");

//$qry ="SELECT * FROM staff_table";
//$rst =mysqli_query($connect,$qry) or die($connect);
//$row =mysqli_fetch_array($rst);
//$ssum =mysqli_num_rows($rst);
//echo"$ssum";

$qryy ="SELECT * FROM customers_table";
$rstt =mysqli_query($connect,$qryy) or die($connect);
$row =mysqli_fetch_array($rstt);
$ssumm =mysqli_num_rows($rstt);

$qqr ="SELECT * FROM drug_available_table ";
$wrs =mysqli_query($connect,$qqr);
$row =mysqli_fetch_array($wrs);
$ssummz =mysqli_num_rows($wrs);
$abena =$row['expiry_date'];
$fun = date("Ymd ");


$sam =0;
   //$ash =[];
foreach ($wrs as $row) {
           $abena =$row['expiry_date'];
           $wow =preg_replace('/-|:/', null, $abena);
         
         
           $name =$row['drug_name'];
           $quantz =$row['quantity'];
           $mx =(int)$wow -(int)$fun;
           if($mx <=0){  
             $sam =(int)$sam + (int)$quantz;
            // $ash[] =$name;
          
           }
           
      }        

      //$sam =count($ash);
  
// how to add items in one column
$drug_cost =0;
$drug_sell =0;
$drug_quantity =0;

foreach ($wrs as $row) {
        
         $drug_cost += (int)$row['total_cost_price'];
         $drug_sell += (int)$row['total_selling_price'];
         $drug_quantity += (int)$row['quantity'];
}
     
 //look below this codes makes sense .
// how to get monthly income

    $first = date("Y-m-d", strtotime("first day of this month"));
    $last = date("Y-m-d", strtotime("last day of this month"));
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));

    

/*
    $try ="SELECT * FROM cash_inflow_book WHERE pay_date BETWEEN '$first' AND '$last' " ;
    $trial = mysqli_query($connect,$try);
    $row =mysqli_fetch_array($trial);


    
    if(mysqli_num_rows($trial)>0){
        $sum =0;
       // echo "$sum <br>";
        foreach ($trial as $row) {
        
            $income =$row['income'];
            $pname =$row['patient_name'];
            $day =$row['pay_date'];
            $sum =$sum + $income;
             //echo "$pname<br>";
            //echo "$income<br>";
             //echo "$day<br>";

        }
       //echo "$sum <br>";


    }else{
        echo"No data available";
    }
*/




  //look below this codes makes sense.
    // how to get yearly income


    $ma1 = date('Y-m-d',strtotime('first day of January ' . date('Y')));
    $ma2 = date('Y-m-d',strtotime('last day of December ' . date('Y')));
    

/*
    $endofyear ="SELECT * FROM cash_inflow_book WHERE pay_date BETWEEN '$ma1' AND '$ma2' " ;
    $yeardata = mysqli_query($connect,$endofyear);
    $row =mysqli_fetch_array($yeardata);


    
    if(mysqli_num_rows($yeardata)>0){
        $yearsum =0;
       // echo "$sum <br>";
        foreach ($yeardata as $row) {
        
            $income =$row['income'];
            $pname =$row['patient_name'];
            $day =$row['pay_date'];
            $yearsum =$yearsum + $income;
             //echo "$pname<br>";
            //echo "$income<br>";
             //echo "$day<br>";

        }
      // echo"$ma1<br>";
       //echo"$ma2<br>";


    }else{
        echo"No data available";
    }
*/




//Plotting a linechart for monthly icome for a particular year

$weekly_income=[];
$dates_income =[];
$merh ="SELECT sum(total_income),datebilled FROM billsheet  WHERE caseid_status='expired' AND WEEK(datebilled)=WEEK(now()) GROUP BY date_format(datebilled,'%d')";
$merhres =mysqli_query($connect,$merh);
while ($row=mysqli_fetch_array($merhres)) {
    $rrr =$row["sum(total_income)"];
    $dt =$row['datebilled'];
    array_push($weekly_income,$rrr);
    array_push($dates_income,$dt);

}
  
 
  $final ='['. implode(',',$weekly_income).']';
  $date_final = implode(',',$dates_income);



// getting the monthly drugs expenses
    $tro ="SELECT * FROM drug_available_table WHERE stock_date BETWEEN '$first' AND '$last' " ;
    $vat = mysqli_query($connect,$tro);
    $row =mysqli_fetch_array($vat);


    
    if(mysqli_num_rows($vat)>0){
        $drug_expenses =0;
        foreach ($vat as $row) {
        
            $exp =$row['total_cost_price'];
            $drug_expenses =$drug_expenses + $exp;

        }


    }

    // look above this codes makes sense.
    

    
  



    //$quer ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status ='pending' ";
    // $reess =mysqli_query($connect, $quer);
     //$pedreq =mysqli_num_rows($reess);


   //$month_expenses =$normal_expenses;
   //$monthly_net =$sum - $month_expenses


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Clerk Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <!-- -->
   
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">

   <!-- 


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
   <-->
    

    <!-- Bootstrap core CSS -->
 <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="dashboard.css" rel="stylesheet">

 



    <style>

    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
       #topp{
        width:15.4%;
        background: white;
        color: black; 
      }

      .sideb{
        background: #2C3E50;
        overflow-y: scroll;
      }
      .sideb #aa{
        color: white;
      }
      .sideb #aaa{
        color: #D35400;
      }
      .sideb #aaa1{
        color: #D35400;
        margin-left: 9%;
      }
      .sideb #aaa hover:{
        color: white;
      }
      .sideb .endside{
        background:#2C3E50 ;
      }
      #userbg{

      }

      #user{
        color: black;
      }

     

      .tre{
        background: red;
        border-radius: 5px;
        margin-left: -5%;
        margin-right: 13%;
        padding-left: 2%;
        padding-right: 2%;
        color: white;
        margin-left: -8%;
        opacity: 0.7;
        font-size: 10px;
      }
      .bel{
       color: #808B96;
       margin-left: -8%;
       padding-right: 2%;

      }
      .prof{
        width: 2.5em;
        height: 2em;
        border-radius: 35px;
        margin-left: 4%;
      }
      .dropp1{
        margin-left:8%;
        margin-right: 1%;
      }
      
      .dropp2{
        color: white;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
      }
      .dropp2:hover {
        color: white;
      }
      .menuu{
        width: 90%;
        margin-top: 2%;
      } 
 

      .menuu  a{
        width: 100%;
        text-decoration: none;
        color: black;
        margin-left: 2%;
      }
      .menuu #aaa{
        padding-right: 2%;
      }
      .menuu #wok{
        margin-left: 2%;
        margin-top: -9%;
      }
      .menuu #wok:hover{
        background: #F2F3F4;
      }

      .menuu a:hover {
        background: #F2F3F4;
        width: 100%;
        margin-bottom: 1%;
      }

      .doit{
        margin-top: 3%;
      }


      .doit .dropdown .pagess{
        margin-left: 9%;
      }
       .bett {
            padding-right: 2%;
        }
        
        .bet {
            background: #f35017;
            border-radius: 20px;
            padding-right: 7px;
            padding-left: 7px;
            padding-bottom: 3px;
            color: #f9c953;
            margin-left: 24px;
        }
                .imma {
            width: 25%;
            height: 20%;
            background: white;
            background: black;
        }
        
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        #topp {
            width: 16.7%;
            background: white;
            color: black;
        }
        
        .sideb {
            background: #2C3E50;
            overflow-y: scroll;
        }
        
        .sideb #aa {
            color: white;
        }
        
        .sideb #aaa {
            color: #D35400;
        }
        
        .sideb #aaa1 {
            color: #D35400;
            margin-left: 9%;
        }
        
        .sideb #aaa hover: {
            color: white;
        }
        
        .sideb .endside {
            background: #2C3E50;
        }
        
        #userbg {}
        
        #user {
            color: black;
        }
        
        .tre {
            background: red;
            border-radius: 5px;
            margin-left: -5%;
            margin-right: 13%;
            padding-left: 2%;
            padding-right: 2%;
            color: white;
            margin-left: -8%;
            opacity: 0.7;
            font-size: 10px;
        }
        
        .bel {
            color: #808B96;
            margin-left: -8%;
            padding-right: 2%;
        }
        
        .prof {
            width: 2.5em;
            height: 2em;
            border-radius: 35px;
            margin-left: 4%;
        }
        
        .dropp1 {
            margin-left: 8%;
            margin-right: 1%;
        }
        
        .dropp2 {
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        
        .dropp2:hover {
            color: white;
        }
        
        .menuu {
            width: 90%;
            margin-top: 2%;
        }
        
        .menuu a {
            width: 100%;
            text-decoration: none;
            color: black;
            margin-left: 2%;
        }
        
        .menuu #aaa {
            padding-right: 2%;
        }
        
        .menuu #wok {
            margin-left: 2%;
            margin-top: -9%;
        }
        
        .menuu #wok:hover {
            background: #F2F3F4;
        }
        
        .menuu a:hover {
            background: #F2F3F4;
            width: 100%;
            margin-bottom: 1%;
        }
        
        .doit {
            margin-top: 3%;
        }
        
        .doit .dropdown .pagess {
            margin-left: 9%;
        }
        
        .bett {
            padding-right: 2%;
        }
        
        .bet {
            background: #f35017;
            border-radius: 20px;
            padding-right: 7px;
            padding-left: 7px;
            padding-bottom: 3px;
            color: #f9c953;
            margin-left: 24px;
        }
        
        .new-classs {
            margin-top: 1%;
            text-decoration: none;
            margin-right: 2%;
            background: #95a5a6;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 5px;
            padding-right: 2%;
            padding-left: 2%;
            padding-top: 0.5%;
            padding-bottom: 0.5%;
            border: 2px solid orange;
        }
        
        .tees {
            background: white;
            padding-left: 2%;
            padding-right: 2%;
            border-radius: 20px;
            color: black;
            margin-left: 2%;
            border: 1px solid #e67e22;
        }
        
        .tees h5 {
            font-weight: bold;
        }
        
        .adx {
            margin-top: 6%;
        }
        
        .adx form input {
            width: 100%;
            height: 2.5em;
            border-radius: 5px;
            border: 0.3px solid black;
            padding-left: 2%;
            background: transparent;
        }
        .adx .fform select {
            width: 100%;
            height: 2.5em;
            border-radius: 5px;
            border: 0.3px solid black;
            padding-left: 2%;
            background: transparent;
        }
        
        .adx form select {
            width: 100%;
            height: 2.5em;
            border-radius: 5px;
            border: 0.3px solid black;
            padding-left: 2%;
            background: transparent;
        }
        
        #www {
            width: 24%;
            height: 2em;
            padding-left: 5%;
            padding-top: 1%;
        }
        
        #wwwwe {
            width: 28%;
            height: 2em;
        }
        
        .subbx {
            width: 73%;
            border: transparent;
        }
        
        .subb .cancc {
            opacity: 2;
            background: green;
            color: white;
            border-radius: 5px;
            border: 0.3px solid green;
            text-decoration: none;
        }
        
        .subbx .canc {
            background: red;
            color: white;
            border-radius: 5px;
            border: 0.3px solid red;
            text-decoration: none;
        }
        
        .subbx .cancc {
            opacity: 2;
            background: green;
            color: white;
            border-radius: 5px;
            border: 0.3px solid green;
            text-decoration: none;
        }
        
        .pro {
            opacity: 2;
            background: black;
            border-radius: 5px;
            color: white;
            border: 0.3px solid black;
        }
        
        label {
            font-weight: bold;
        }
        
        .card1 {
            border-left: 5px solid #102473;
        }
        
        .card2 {
            border-left: 5px solid orange;
        }
        
        .card3 {
            border-left: 5px solid #ccb9a1;
        }
        
        .card4 {
            border-left: 5px solid #73c6b6;
            ;
        }
        
        .card11 {
            border-left: 5px solid #2e86c1;
        }
        
        .card12 {
            border-left: 5px solid #27ae60;
        }
        
        .card13 {
            border-left: 5px solid #7adff8;
        }
        
        .card14 {
            border-left: 5px solid #cb4335;
        }
        
        #chart_div {
            border: 1px solid #cb4335;
        }
        
        .news {
            border: 1px solid black;
            text-decoration: none;
            border-radius: 5px;
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 0.1%;
            padding-bottom: 0.1%;
            text-align: center;
            color: black;
        }
        
        .expmodal1 {
            margin-top: 4%;
            width: 100%;
            margin-left: 0.2%;
        }
        
        .in1 {
            margin-right: 0.5%;
        }
        
        .in2 {
            margin-left: 0.5%;
        }
        
        .expmodal2 input {
            width: 110%;
        }
        
        .notiz {
            width: 28%;
            text-align: center;
            background: white;
            padding-left: 0%;
            padding-right: 0%;
            border-radius: 20px;
            color: black;
            margin-left: 2%;
            border: 1px solid #e67e22;
        }
        
        .fn1 {
            background: white;
            height: 30em;
            width: 45%;
        }
        
        .fnn {
            background: white;
            width: 100%;
        }
        
        .fn2 {
            background: white;
            width: 55%;
            height: 22em;
        }
        
        .tab1 {
            margin-left: 1%;
            overflow-y: scroll;
        }
        
        textarea {
            border: 3px solid #2c3e50;
        }
        
        .tab1 table {
            width: 99%;
            margin-left: 1%;
        }
        
        .tab1 ul {
            list-style-type: none;
        }
        
        .nott {
            height: 100%;
            overflow-y: scroll;
        }
        
        .nott ul {
            list-style-type: none;
            margin-left: -6%;
        }
        
        .nott ul li {
            border-bottom: 1px solid black;
            margin-bottom: 4%;
            padding-bottom: 4%;
        }
        
        .nott .d1 {
            background: #1a5276;
            text-decoration: none;
            border-radius: 20px;
            padding-top: 1px;
            padding-bottom: 5px;
            padding-right: 5px;
            padding-left: 5px;
            color: white;
        }
        
        .tee {
            background: white;
            padding-left: 2%;
            padding-right: 2%;
            border-radius: 5px;
            color: black;
            margin-left: 2%;
            border: 1px solid white;
        }
        
        .fnn2 h5 {
            font-weight: bold;
        }
        
        .fnn2 {
            background: white;
            padding-left: 2%;
            padding-right: 2%;
            border-radius: 5px;
            color: black;
            margin-left: 2%;
            border: 1px solid white;
        }
        
        .tee h5 {
            font-weight: bold;
        }
        
        .send {
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 18%;
            color: white;
        }
        
        .sends {
            margin-top: 2%;
            background: red;
            border: 1px solid red;
            border-radius: 5px;
            width: 18%;
            color: white;
        }
        
        .del {
            color: red;
            margin-left: 5%;
        }
        
        .app {
            color: #5dc12e;
        }
        
        .content {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 200px;
            text-align: center;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            /*to hide popup initially*/
        }
        
        .sales1 {
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            width: 500px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            /*to hide popup initially*/
        }
        
        .sales2 {
            position: absolute;
            top: 30%;
            left: 58%;
            transform: translate(-50%, -50%);
            width: 500px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
            /*to hide popup initially*/
        }
        
        .tax {
            width: 50%;
            margin-left: 25%;
            border: 2px solid black;
            border-radius: 5px;
            background-color: white;
        }
        
        .tax input {
            margin-left: 5%;
            width: 90%;
            height: 2.4em;
            border-radius: 5px;
            border: 1px solid black;
        }
        
        .tax form label {
            margin-top: 5%;
            margin-left: 5%;
            color: black;
            font-weight: bold;
        }
        
        .tax .send {
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 18%;
            color: white;
            margin-left: 43%;
            margin-bottom: 2%;
        }
        
        .taxtab th {
            border: 1.5px solid black;
        }
        
        .ledger {
            position: absolute;
            margin-top: 20%;
            left: 55%;
            height: max-content;
            transform: translate(-50%, -50%);
            width: 510px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
            /*to hide popup initially*/
        }
        
        .sales3 {
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            width: 500px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
            /*to hide popup initially*/
        }
        
        .bill {
            position: absolute;
            margin-top: 30%;
            left: 55%;
            height: max-content;
            transform: translate(-50%, -50%);
            width: 510px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
            /*to hide popup initially*/
        }
        
        .bill input {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
        }
        
        .sales1 input {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
        }
        
        .ledger input {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
        }
        
        .ledger select {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
            background: white;
        }
        
        .sales3 input {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
        }
        
        .sales1 form label {
            color: black;
            font-weight: bold;
        }
        
        .bill form label {
            color: black;
            font-weight: bold;
        }
        
        .sales3 form label {
            color: black;
            font-weight: bold;
        }
        
        .sales1 h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .bill h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .ledger h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .sales3 h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .sales2 input {
            width: 100%;
            height: 2.4em;
            border-radius: 5px;
        }
        
        .sales2 form label {
            color: black;
            font-weight: bold;
        }
        
        .sales2 h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .sales1 select {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
            background: white;
        }
        
        .bill select {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
            background: white;
        }
        
        .sales3 select {
            width: 100%;
            height: 2.2em;
            border-radius: 5px;
            background: white;
        }
        
        .sales1 form {
            width: 80%;
            margin-left: 10%;
        }
        
        .sales1 .sendd {
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 18%;
            color: white;
        }
        
        .ledger .sendd {
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 18%;
            color: white;
            margin-left: 42%;
        }
        
        .ledgerr {
            margin-bottom: 1%;
            margin-top: 1%;
        }
        
        .leg1 {
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
            color: black;
        }
        
        .leg2 {
            margin-left: 2%;
            color: #d35400;
            font-weight: bold;
            text-decoration: none;
        }
        
        .sales1 .send {
            margin-top: 2%;
            background: #34495e;
            border: 1px solid #34495e;
            border-radius: 5px;
            width: 18%;
            color: white;
            margin-left: 32%;
        }
        
        .sales2 .send {
            margin-top: 2%;
            background: #34495e;
            border: 1px solid #34495e;
            border-radius: 5px;
            width: 18%;
            color: white;
            margin-left: 40%;
        }
        
        .contents {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 200px;
            text-align: center;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            /*to hide popup initially*/
        }
        
        .contentx {
            position: absolute;
            top: 4%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 150px;
            text-align: center;
            background-color: #f2f3f4;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
            border-radius: 5px;
            /*to hide popup initially*/
        }
        
        .close-btn {
            position: absolute;
            right: 20px;
            top: 15px;
            background-color: black;
            color: white;
            border-radius: 50%;
            padding-left: 5px;
            padding-right: 5px;
            cursor: pointer;
        }
        
        .bgg {
            width: 10%;
            background: #5dc12e;
            border-radius: 20px;
        }
        
        .addnewsales {
            text-decoration: none;
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 19%;
            padding-left: 1%;
            padding-right: 1%;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        
        .cart {
            float: right;
            border: 1px solid black;
            border-radius: 5px;
            width: 7%;
            padding-left: 0.8%;
            background: #d7dbdd;
            cursor: pointer;
        }
        
        .car {
            width: 3%;
            padding-left: 4px;
            padding-right: 4px;
            background: red;
            color: white;
            border-radius: 20px;
        }
        
        .car2 {
            border-left-color: 1px solid black;
            margin-left: 15%;
            padding-top: 4px;
            padding-bottom: 4px;
            padding-left: 3px;
            padding-right: 10px;
            background: white;
            border-top-color: white;
            border-bottom-color: white;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        .cartt {
            border: 1px solid orangered;
            border-radius: 5px;
            width: 30%;
            background: red;
        }
        
        .carttt {
            float: right;
            text-decoration: none;
            text-align: center;
            background: #5dc12e;
            margin-right: 3%;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 6%;
            padding-left: 1%;
            padding-right: 1%;
            padding-top: 2.5px;
            padding-bottom: 2.5px;
            color: white;
            cursor: pointer;
        }
        
        .huh {
            background: #2c3e50;
        }
        
        .payf {
            width: 98%;
            margin-left: 1%;
            border-bottom: 3px solid black;
            margin-bottom: 3%;
        }
        
        .tablehead input {
            width: 100%;
            height: 2.3em;
        }
        
        .tablehead {
            width: 100%;
        }
        
        .legsum1 {
            background: #f8f9f9;
            width: 100%;
            border: 1px solid black;
            border-radius: 5px;
        }
        
        .rep {
            background: white;
            border-radius: 5px;
            width: 60%;
            margin-left: 20%;
            margin-top: 2%;
            margin-bottom: 2%;
            border: #16686B solid 1px;
        }
        
        .contt1 {
            background: #16686B;
            padding-bottom: 1%;
        }
        
        .contt4 {
            background: #16686B;
        }
        
        .contt1 .hed {
            text-align: center;
            color: white;
            padding-top: 2%;
            font-family: serif;
        }
        
        .contt4 .foot1 {
            color: white;
            padding-top: 2%;
            font-family: serif;
        }
        
        .contt4 .foot2 {
            color: white;
            padding-top: 2%;
            font-family: serif;
        }
        
        .foott {
            color: white;
        }
        
        .contt1 .hed2 {
            text-align: center;
            color: white;
            padding-top: 1%;
        }
        
        .contt2 {
            margin-top: 1%;
        }
        
        .tabbb {
            margin-top: 2%;
        }
        
        .one {
            padding-left: 2%;
        }
        
        .onee {
            padding-left: 2%;
        }
        
        .ttt {
            width: 97%;
        }
        
        .payroll {
            text-align: center;
        }
        
        #wox1 {
            background: #e5e8e8;
        }
        
        #wox2 {
            background: #f8f9f9;
        }
        
        #wox3 {
            background: #e5e8e8;
        }
        
        #wox4 {
            background: #f8f9f9;
        }
        
        #wox5 {
            background: #e5e8e8;
        }
        
        #wox6 {
            background: #f8f9f9;
        }
        
        #wox7 {
            background: #e5e8e8;
        }
        
        #wox8 {
            background: #f8f9f9;
        }
        
        #wox9 {
            background: #e5e8e8;
        }
        
        #wox10 {
            background: #f8f9f9;
        }
        
        #wox11 {
            background: #e5e8e8;
        }
        
        #wox12 {
            background: #f8f9f9;
        }
        
        .pay th {
            border: 1px solid black;
        }
        
        .pay td {
            border: 1px solid black;
        }
        
        .expenseform {
            position: absolute;
            margin-top: 28%;
            left: 55%;
            height: max-content;
            transform: translate(-50%, -50%);
            width: 510px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
        }
        
        .assetform {
            position: absolute;
            margin-top: 23%;
            left: 55%;
            height: max-content;
            transform: translate(-50%, -50%);
            width: 510px;
            background-color: #e8eae6;
            box-sizing: border-box;
            padding: 10px;
            display: none;
            border-radius: 5px;
            border: 1px solid black;
        }
        
        .expenseform input {
            width: 100%;
            height: 2.8em;
            border-radius: 5px;
        }
        
        .assetform input {
            width: 100%;
            height: 2.8em;
            border-radius: 5px;
        }
        
        .expenseform select {
            width: 100%;
            height: 2.8em;
            border-radius: 5px;
        }
        
        .expenseform h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .assetform h3 {
            text-align: center;
            font-weight: bold;
            font-family: serif;
        }
        
        .payslipp {
            border: 2px solid black;
        }
        
        .cla {
            width: 60%;
        }
        
        .claa {
            width: 68%;
        }
        .mak2{
            display: none;
        }
        .mak3{
            display: none;
        }
        .mak22{
            display: none;
        }
        .mak33{
            display: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        
        @media(max-width: 768px) {
            #topp {
                width: 30.4%;
                background: transparent;
                color: black;
                border: 0.1px solid white;
            }
            .dropp1 {
                margin-left: 3%;
                margin-right: 1%;
            }
            .addnewsales {
                margin-left: 80%;
                text-decoration: none;
                margin-top: 2%;
                background: #5dc12e;
                border: 1px solid #5dc12e;
                border-radius: 5px;
                width: 15%;
                color: white;
                text-align: center;
                cursor: pointer;
            }
        }
        
        @media(max-width:400px) {
            .studdlist {
                overflow-x: scroll;
            }
            .addnewsales {
                margin-left: 62%;
                text-decoration: none;
                margin-top: 2%;
                background: #5dc12e;
                border: 1px solid #5dc12e;
                border-radius: 5px;
                width: 30%;
                color: white;
                text-align: center;
                cursor: pointer;
            }
        }
        

      



    </style>

    
    <!-- Custom styles for this template -->
   
  </head>
  <body>
    

    <header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 naa" href="#" id="topp"><span ><img src="../../../img/skuls4.png"class="imma"></span><span style="color:   #d35400  ;">CLASSIC </span><span style="color:  #1a5276 ;">CARE</span></a>
        <div id="big">
            <button style="background: #707B7C;" class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" onclick="onMenu">
              <span class="navbar-toggler-icon" id="menu" ></span>
            </button>
        </div>
        <span class="form-control form-control-dark w-100" type="text" aria-label="Search"></span>
        <div class="navbar-nav endside" id="userbg">
            <div class="nav-item text-nowrap">

                <ul style="list-style-type:none">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link px-3" href="#" id="user">

                            <i class="fas fa-bell fa-fw bel"></i>
                            <span class="tre" id="pp"></span>

                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Paul Tengey</span>
                            <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" style="height: 2em; width:2em">


                        </a>

                    </li>

                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse sideb">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <pre></pre>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php" id="aa">
                                <span data-feather="home" id="aaa"></span> Dashboard <span class="bet">Beta</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="aa" data-toggle="modal" data-target="#moresales">
                                <span data-feather="file-text" id="aaa"></span> Sales
                            </a>
                        </li>
                        
                         <li class="nav-item">
                            <a class="nav-link" href="requested_expenses.php" id="aa">
                                <span data-feather="file-text" id="aaa"></span> Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="aa" data-toggle="modal" data-target="#invent">
                                <span data-feather="file-text" id="aaa"></span> Inventory
                            </a>
                        </li>

                        <li class="nav-item doit">

                            <div class="dropdown" style="width:100%; background: transparent;">
                                <i data-feather="file-text" id="aaa1" class="pagess"></i>
                                <a class=" dropdown-toggle dropp2" data-toggle="dropdown">Reports
                                <span class="caret"></span></a>

                                <ul class="dropdown-menu menuu">
                                    <span style="margin-bottom:2%;color:  #99a3a4 ; margin-left:5%">Daily Reports</span><br>
                                    <a href="income_schedule.php">
                                        <li id="wok"><i data-feather="file" id="aaa"></i>Income Schedule</li>
                                    </a>
                                    <a href="expenditure.php">
                                        <li id="wok"><i data-feather="file" id="aaa"></i>Expenses schedule </li>
                                    </a>
                                   
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span style="color:gold">Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report" id="aa">
                            <span data-feather="plus-circle" id="aaa"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:display_assetregister()" id="aa">
                                <span data-feather="file-text" id="aaa"></span> Assets
                            </a>
                        </li>
                      

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:display_taxcalculator()" id="aa">
                                <span data-feather="file-text" id="aaa"></span> Tax Calculator
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="aa">
                                <span data-feather="file-text" id="aaa"></span> Social Engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="aa">
                                <span data-feather="layers" id="aaa"></span> Integrations
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="account">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="tees " style="color: black ">Home</h5>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
                    </div>
                </div>
            

      <!-- Content Row1 -->
                    <div class="row" >


                     <!-- Content Row1 -->

                    <!-- Content Row2 -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                                Total Staffs</div>
                                            <div class="h5 mb-0 text-center font-weight-bold  sta" id="staff"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs text-center font-weight-bold text-success text-uppercase mb-1">
                                                Total Patients</div>
                                            <div class="h5 mb-0 text-center font-weight-bold text-gray-800" id="patient"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <a href="requested_expenses.php" class="col-xl-3 col-md-6 mb-4" style="text-decoration:none;color:black;">
                        
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Expenses Request</div>
                                            <div class="h5 mb-0 text-center font-weight-bold text-gray-800" id="ex_id"></div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        
                        </a>


                    </div>
                    
                    <!-- cont row 2 -->

                    

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="height: 22.5em;">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2" style="height: 19.5em;">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- Dashboard Page Content Ends Here -->

                    <!-- Content Row -->
                    
                </div>
                <!-- /.container-fluid -->

            </div>
        </main>
            <!-- End of Main Content -->

            <div id="modal"></div>






            <?php 
             echo"

             <div style='display:none;' id='daat'>$date_final</div>

             ";


             ?>


     


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>



      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>





      

   <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>





    <?php 

     include("../includes/scripts.php");
     include("../includes/footer.php");

     ?>

<script type="text/javascript">
        

        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:document.getElementById('daat').innerText.split(","),

    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
     /* data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],*/
      data:<?php 
         
                 echo("$final");
                  

       ?>

    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Ghc' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Ghc' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

    </script>

   <script type="text/javascript">
    setInterval((
        ()=>{

             $.post("test.php",{sum:1},(res,stcode)=>{
                let data=res.split(",")
             $("#sum").html("GH&cent"+data[0]);
             $("#yearsum").html("GH&cent"+data[1]);
             $("#staff").html(data[2]);
             $("#ex_id").html(data[3]);
             $("#other").html("GH&cent"+data[4]);
             $("#patient").html(data[5]);
             $("#pp").html(data[3]+"+");
            

             })
 
        }

        ),2000)
       
   </script>




    <script src="https://www.w3schools.com/lib/w3data.js"></script>
  
    <!-- Bootstrap core JavaScript-->
   





    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker1").datepicker();
            $("#datepicker2").datepicker();
        });
    </script>



    <script>
        $("#modal").load("modal.php");

        function display_sales() {

            if ($("select.state_select").val() == "Fees") {
                $('#account').load("feesales.html #feesales");
                $("#sidebarMenu").css('display', 'none');

            } else {

                if ($("select.state_select").val() != "Fees")

                    $('#account').load("othersales.html #othersales");
                $("#sidebarMenu").css('display', 'none');
            }


        }

        function onclickpharmacy() {
            $('#account').load("pharmacy.php #pharmaci");
            $("#sidebarMenu").css('display', 'none');
        }

        

        function togglelBillssheet() {
            $('#account').load("bill_sheet.html #billssheet");
            $("#sidebarMenu").css('display', 'none');
        }

        function togglelIncomeSchedule() {
            window.location.href='income_schedule.php'
        }

        function togglelExpensesSchedule() {
           window.location.href='expenditure.php'
        }

        function togglelProfitloss() {
            window.location.href='profitloss.php'
        }

        function display_assetregister() {
            $('#account').load("asset_register.html #assetregister");
            $("#sidebarMenu").css('display', 'none');
        }

        function display_payroll() {
            window.location.href='salary_schedule.php'

        }

        function display_taxcalculator() {
            $('#account').load("taxcalculator.html #taxcalculator");
            $("#sidebarMenu").css('display', 'none');
        }

        function display_payslip() {
            $('#account').load("payslip.html #payslip");
            $("#sidebarMenu").css('display', 'none');
        }




        $(document).ready(function() {

            $("#sidebarMenu").css('display', 'none');

            $("#big").click(function() {
                if ($("#sidebarMenu").css('display') != 'block') {
                    $("#sidebarMenu").css('display', 'block');
                } else if ($("#sidebarMenu").css('display') != 'none') {
                    $("#sidebarMenu").css('display', 'none');
                } else {}
            });
        });
    </script>




    <script type="text/javascript">
        // Function to show and hide the popup
        function togglePopup() {
            $(".content").toggle();
        }

        function toggleReject() {
            $(".contents").toggle();
        }

        function toggleNewSales() {
            $(".sales1 ").toggle();
        }

        function toggleNewSaless() {
            $(".sales3 ").toggle();
            $(".sales2 ").css('display', 'none');
        }

        function toggleNewStudent() {
            $(".sales2 ").toggle();

        }

        function togglebill() {
            $(".bill ").toggle();

        }
    </script>




    <script>
        w3IncludeHTML();
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            var html = '<tr><td><input type="text" item="itemname[]" placeholder="Enter Item" required style="width:100%;height:2.3em;"></td><td><input type="text" amount="amount[]" placeholder="Enter Amount" required style="width:100%;height:2.3em;"></td><td><input type="button" name="remove" value="Remove" style="background:red; color: white; border-color: red; width:100%;height:2.1em;" id="remove"></td></tr>'

            var x = 1;

            $("#add").click(function() {
                $("#table_field").append(html);
            });
            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var htmll = '<tr><td><input type="text" item="itemname[]" placeholder="Enter Item" required style="width:100%;height:2.3em;"></td><td><input type="text" item="itemname[]" placeholder="Enter Quantity" required style="width:100%;height:2.3em;"></td><td><input type="text" amount="amount[]" placeholder="Enter Amount" required style="width:100%;height:2.3em;"></td><td><input type="button" name="remove" value="Remove" style="background:red; color: white; border-color: red; width:100%;height:2.1em;" id="remove"></td></tr>'

            var x = 1;

            $("#adds").click(function() {
                $("#table_fieldd").append(htmll);
            });
            $("#table_fieldd").on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });

        });
    </script>


    


  </body>
</html>
