<?php 
session_start();
$uname= $_SESSION['admin']; 
include("../../db/connection.php");
include("../header.php");
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
    }


    header ul li{
        display: inline;
        text-decoration: none;
    }
  

    nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 70px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
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
    .dash .ad ul li{
        margin-top: 2%;
        padding-bottom: 4%;
        padding-top: 4%;
        color: red;
        display: block;
        width: 50%;
        background: black;
        margin-right: 3%;
    
    }
    .dash .ad ul{

    }

     @media  (max-width: 900px){
    .dash .ad ul li{
        padding-top: 4%;
        padding-bottom: 4%;
        color: red;
        display: block;
        width: 50%;
        background: yellow;
        margin-right: 3%;
        margin-top: 2%;
    }

   }
 </style>
 <body>
 	

    <header>
        <nav>
        <ul>
            <li><a id="das" href="#">Dashboard</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Inventory</a></li>
            <li><a href="#">Staff</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Equipments</a></li>
            <li><a href="#">Dairy</a></li>
            <li><a href="#">Insurance</a></li>
            <li><a href="#">Annoucement</a></li>

        </ul>
       </nav>
    </header>

       <div class="dash" id="dash">
       <center> <h3 class="hd">Admin Dashboard</h3></center>
        <div class="ad">
            <ul>
                <li>Total Staff</li>
                <li>Monthly Sales</li>
                <li>Monthly Expenses</li>
                
            </ul>
        </div>


    </div> 
    
    
 	
 	
 
 </body>
 </html>