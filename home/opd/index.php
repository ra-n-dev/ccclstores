<?php 
session_start();
$uname= $_SESSION['receptionist']; 
include("../../db/connection.php");
include("../header.php");



    if(isset($_POST['submit'])){
            $name= $_POST['casecode'];
            $query ="SELECT * FROM customers_table WHERE case_id LIKE '%$name%' ";


            $result =mysqli_query($connect, $query);
            $row =mysqli_fetch_array($result);
            $patient_name = $row['customer_name'];
            $case_id =$row['case_id'];


        //it can be this -- $casecode =$_POST['casecode']; or what i have done below--

            $_SESSION['caseid'] = $_POST['casecode'];

            $casecode= $_SESSION['caseid'];


            if($casecode ===$case_id){
         
            ?>
              <script>window.location.href="../opd/vitals.php"</script>
            <?php

             }else{
                echo"<script>alert('Patient is not recognised, used correct case id')</script>";
            }

           }else{

           $searchkey="";
           

      }
    
    



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>doctor section</title>
 </head>
 <style type="text/css">
 	body{
 		margin: 0;
 		padding: 0;
 		background-image: url(../../image/home3.jpg);
 		background-repeat: no-repeat;
 		background-size: cover;
 		background-position: center;
 		height: 95vh;
 	}
 	.docc2{
 		background: white;
 		height: 50vh;
 		width: 50%;
 		opacity: 0.8;
 		border-radius: 6px;
        position: relative;
 	}
 	.docc2 h2{
 		padding-top: 30px;
 		font-size: 27px;
 	}
 	.docc1{
 		margin-bottom: 0%;
 	}
    .docc1 h2{
        padding-top: 8%;
    }
 	center .docc2 form input{
 		margin-top: 20px;
 		width: 60%;
 		height: 30px;
 	}
 	center .docc2 form .sub{
 		margin-top: 30px;
 		width: 30%;
 		height: 30px;
 		background: #A04000;
 		border: #A04000;
 		color: white;
 		border-radius: 5px;
 	}
 	center .docc2 form label{
 		font-size: 18px;
 	}

    .do nav{
        margin-right: 5%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }

 </style>
 <body>
    <div class="do">
        
        <center>
            <nav>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#services">Our-Services</a></li>
                <li><a href="#folder">Notice</a></li>
            </ul>
        </nav>
        </center>
    </div>
 	<div class="docc1">
 		<h2 style="color:transparent;">Thus</h2>
 	</div>
 	<center>
 	  <div class="docc2">
 		<h2>Start A New Case </h2>
       
          <form method='POST' enctype='multipart/form-data'>
             <label>Patient Unique Case ID</label><br>
             <input type='text' name='casecode' require><br>
             <input class='sub' type='submit' name='submit'>  
          </form>
 	   </div>
 	 </center>	
 
 </body>
 </html>