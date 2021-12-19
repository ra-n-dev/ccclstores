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


    .dash .ad ul li a{
        text-decoration: none;
       
        padding-top: 5vh;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
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
        margin-top: -30%;
        padding-top: 5vh;
        margin-bottom: 32%;
        padding-bottom: 5vh;
        padding-left: 3%;
        padding-right: 2%;
        border-radius: 6px;
        color: red;
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
        margin-top: -60%;
        padding-top: 5vh;
        margin-bottom: 62%;
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
        margin-top: -90%;
        padding-top: 5vh;
        margin-bottom: 92%;
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

    .dash .add ul li{
        margin-top: 2%;
        margin-bottom: 4%;
        padding-top: 4%;
        color: red;
        display: block;
        width: 50%;
        background: black;
        margin-right: 3%;
        margin-left: 0%;
    
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
                <li><a href="#">Total Staff</a></li>
                <li><a href="#">Doris</a></li>
                <li><a href="#">Monthly Expenses</a></li>
                
            </ul>
        </div>

        <div class="add">
            <ul>
                <li><a href="#">Total Staff</a></li>
                <li><a href="#">Monthly Sales</a></li>
                <li><a href="#">Monthly Expenses</a></li>
                
            </ul>
        </div>
        

        <div class="addd">
            <ul>
                <li><a href="#">Total Staff</a></li>
                <li><a href="#">Monthly Sales</a></li>
                <li><a href="#">Monthly Expenses</a></li>
                
            </ul>
        </div>

        <div class="adddd">
            <ul>
                <li><a href="#">Total Staff </a></li>
                <li><a href="#">Monthly Sales</a></li>
                <li><a href="#">Monthly Expenses</a></li>
                <li><a href="#"><span>Rice/Banku</span></a></li>
                
            </ul>
        </div>

       </div> 
    


    
 	
 	
 
 </body>
 </html>