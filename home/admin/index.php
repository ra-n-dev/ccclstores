<?php 
session_start();
$uname= $_SESSION['admin']; 
include("../../db/connection.php");
include("../header.php");




$qry ="SELECT * FROM multi_login";
$rst =mysqli_query($connect,$qry) or die($connect);
$row =mysqli_fetch_array($rst);
$ssum =mysqli_num_rows($rst);
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
     
 //look below this codes makes sense.

    $first = date("Y-m-d", strtotime("first day of this month"));
    $last = date("Y-m-d", strtotime("last day of this month"));
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));
    


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


    }else{
        echo"No data available";
    }

    // look above this codes makes sense.
    

    $flax ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status='cash released' ";
    $fla =mysqli_query($connect,$flax);
    $row =mysqli_fetch_array($fla);
    $lol =mysqli_num_rows($fla);
    $sweet =$row['amount'];

    if(mysqli_num_rows($fla)>=0){
        $normal_expenses =0;
        foreach ($fla as $row) {
        
            $pay =$row['amount'];
            $normal_expenses =$normal_expenses + $pay;

        }


    }else{
        echo"No data available";
    }


   $month_expenses =$normal_expenses;
   $monthly_net =$sum - $month_expenses
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>doctor section</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
 </head>
 <style type="text/css">
 	body{
 		margin: 0;
 		padding: 0;
 		background-image: url(../../image/home3.jpg);
 		background-repeat: no-repeat;
 		background-size: cover;
 		background-position: center;
 		height: 100vh;
 	}
 	
    header{
        overflow: auto;
        background: white;
        width: 100%;
    }


    header ul li{
        display: inline;
        text-decoration: none;

    }
  

    nav {
         overflow: hidden;

        }

    nav li {
        margin-right: 42px;
        padding-right:30px;
        margin-left: -0.6%;

      }

    nav ul {
         list-style: none;
        overflow: hidden
    }

    .request{
        display: none;
    }

    .dash{
        background: white;
        opacity: 0.8;
        height: 73vh;
        width: 80%;
        border-radius: 6px;
        margin-left:10%;
    }
    .dash .hd{
        padding-top: 20px;
        padding-bottom: 30px;
    }


    .dash .ad ul li a{
        text-decoration: none;
       
        padding-top: 5vh;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: indigo;
        display: block;
        width: 13%;
        background: #7FB3D5;
        margin-right: 0%;
        margin-top: 2%;
        margin-left: 7%;
    
    }


    .dash .add ul li{
        
     list-style: none;
    } 

    .dash .ad ul li{
        
     list-style: none;
    }
     .dash .add ul li a{
        text-decoration: none;
        margin-top: -33.8%;
        padding-top: 5vh;
        margin-bottom: 35.8%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: white;
        display: block;
        width: 13%;
        background: #212F3D;
        margin-left: 28%;
    
    }



    .dash .addd ul li{
        
     list-style: none;
    }
     .dash .addd ul li a{
        text-decoration: none;
        margin-top: -68.5%;
        padding-top: 5vh;
        margin-bottom: 70.5%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 13%;
        background: #58D68D;
        margin-left: 49%;
    
    }

    .dash .adddd ul li{
        
     list-style: none;
    }
     .dash .adddd ul li a{
        text-decoration: none;
        margin-top: -102.8%;
        padding-top: 5vh;
        margin-bottom: 104.8%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 13%;
        background: #F5B041;
        margin-left: 70%;
    
    }

    .dash .ad ul{

    }
    .req h3{
        padding-top: 4%;
    }

    .req{
        background: white;
        height: 70vh;
        width: 70%;
        border-radius: 6px;
        opacity: 0.8;
    }
  
       .req{
        background: white;
        height: 60vh;
        width: 80%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        display: block;
        overflow-y: scroll;
        
    }
    .req table{
        width: 80%;
        background: white;
    }
    .req table .buut{
        background: transparent;
        width: 15%;
    }
    .req table .butt{
        text-decoration: none;
        color: white;
        padding-left: 0%;
        background: green;
        border-color: green;
        margin-right: 2%;
        padding-right: 1%;
        padding-bottom: 2%;
        padding-top: 2%;

    }
    .req table .buttt{
        text-decoration: none;
        color: white;
        padding-left: 0%;
        background: red;
        padding-left: 8%;
        padding-right: 8%;
        border-color: red;
        padding-bottom: 2%;
        padding-top: 2%;

    }


     @media  (max-width:900px){
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 150vh;
    }

    .dash{
        background: white;
        opacity: 0.8;
        height: 117vh;
        width: 80%;
        border-radius: 6px;
        margin-left:10%;
    }
   
    .dash .ad ul li a{
        text-decoration: none;
       
        padding-top: 5vh;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 35%;
        background: #7FB3D5;
        margin-right: 0%;
        margin-top: 2%;
        margin-left: 2%;
    
    }

    

         .dash .add ul li a{
        text-decoration: none;
        margin-top: -87.5%;
        padding-top: 5vh;
        margin-bottom: 89.5%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 35%;
        background: #212F3D;
        margin-left: 49%;
    
    }

    .dash .addd ul li a{
        text-decoration: none;
        margin-top: -87.5%;
        padding-top: 5vh;
        margin-bottom: 89.5%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 36%;
        background: #58D68D;
        margin-left: 2%;
    
    }

    .dash .adddd ul li a{
        text-decoration: none;
        margin-top: -172.5%;
        padding-top: 5vh;
        margin-bottom: 174.5%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
        display: block;
        width: 35%;
        background: #F5B041;
        margin-left: 49%;
    
    }

   }
 </style>
 <body>
 	

    <header>
        <nav>
        <ul>
            <li><a id="dashh" href="#">Dashboard</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="../admin/request.php">Requested-Expenses</a></li>
            <li><a href="../admin/adminexp.php">Make-Expense</a></li>
            <li><a href="../admin/adminreport.php">Reports</a></li>
            <li><a href="#">Equipments</a></li>
            <li><a href="#">Dairy</a></li>
            <li><a href="#">Insurance</a></li>
            <li><a href="#">Analytics</a></li>

        </ul>
       </nav>
    </header>

       <div class="dash" id="dash">
       <center> <h3 class="hd">Admin Dashboard</h3></center>
        <div class="ad">
            <ul>
                <li><a href="staff.php"><div style="padding-left:10%">Total Staff</div> <div style="padding-left:30%"><?php echo "$ssum" ?></div> </a></li>
                <li><a href="#"> <div style="padding-left:10%">Monthly Sales</div>  <div style="padding-left: 10%"><?php echo"GHC $sum.00" ?></div> </a></li>
                <li><a href="#"><div style="padding-left:10%">Monthly Expenses</div>  <div style="padding-left: 10%"><?php echo"GHC $month_expenses.00" ?></div> </a></li>
                
            </ul>
        </div>

        <div class="add">
            <ul>
                <li><a href="#"><div style="padding-left:10%">Total Patient</div> <div style="padding-left:30%"><?php echo "$ssumm" ?></div> </a></li>
                <li><a href="#"> <div style="padding-left:15%">Yearly Sales</div>  <div style="padding-left: 10%"><?php echo"GHC 8,000.00" ?></div> </a></li>
                <li><a href="#"><div style="padding-left:10%">Yearly Expenses</div>  <div style="padding-left: 10%"><?php echo"GHC 57,000.00" ?></div> </a></li>
                
            </ul>
        </div>
        

        <div class="addd">
            <ul>
                <li><a href="#"><div style="padding-left:10%">Total Drug in stock</div> <div style="padding-left:30%"><?php echo "$drug_quantity" ?></div> </a></li>
                <li><a href="#"> <div style="padding-left:0%">Total expired Drugs</div>  <div style="padding-left: 25%"><?php echo"$sam" ?></div> </a></li>
                <li><a href="#"><div style="padding-left:0%">Total Value of Drugs</div>  <div style="padding-left: 10%"><?php echo"GHC $drug_sell.00" ?></div> </a></li>
                
            </ul>
        </div>

        <div class="adddd">
            <ul>
                <li><a href="#"><div style="padding-left:18%">Total Dept</div> <div style="padding-left:15%"><?php echo "GHC 800.00" ?></div> </a></li>
                <li><a href="#"> <div style="padding-left:0%">Monthly Profit/Loss</div>  <div style="padding-left: 10%"><?php echo"GHC $monthly_net.00" ?></div> </a></li>
                <li><a href="#"><div style="padding-left:10%">Yearly Profit/Loss</div>  <div style="padding-left: 10%"><?php echo"GHC 70,00.00" ?></div> </a></li>
                
            </ul>
        </div>

       </div> 



      
    


    
 	
 	
     <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
       $("#requestt").click(function () {
       $("#dash").css("display", "none");
       $("#request").css("display","block");
       
      });

       $("#dashh").click(function () {
       $("#request").css("display", "none");
       $("#dash").css("display","block");
       
      });
   </script>
 </body>
 </html>