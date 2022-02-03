
<?php 

 session_start();
    $uname= $_SESSION['admin']; 
    include("../../db/connection.php");
    include("../header.php");

    if(isset($_POST['proceed'])){
        
     $report =$_POST['report'];
     if($report =='sales_ledger'){
           echo'<script>window.location.href="../admin/sales_report.php"</script>';

     }elseif($report =='purchase_ledger'){
        echo'<script>window.location.href="../admin/purchase_report.php"</script>';
     }elseif($report =='general_ledger'){
        echo"<script>alert('This is the general ledger')</script>";
     }elseif($report =='assets'){
        echo"<script>alert('This is the Assets reports page')</script>";
     }elseif($report =='stock'){
        echo"<script>alert('This is the Stock reports page')</script>";
     }else{
            ?>
              <script>window.location.href="../admin/adminreport.php"</script>
            <?php
     }


    }

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>store expense</title>
</head>
<style type="text/css">
    
   body{
    margin: 0;
    padding: 0;
    background-image: url(../../image/home3.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 95vh;
    
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
    .requi{
        background: white;
        height: 50vh;
        width: 50%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 5%;
        padding-top: 1%;
        border:solid 5px #40E0D0;
    }
    .requi form h2{
     font-style: italic;
     padding-top: 9%;
    }
    .requi form{
        background: #F6DDCC;
        width: 95%;
        height: 85%;
    }
    .requi form select{
        width: 65%;
        height: 13%;
        border-radius: 5px;
    }
    
    .requi form .sb{
        width: 20%;
        height: 11%;
        background: #2C3E50;
        color: white;
        border-color: #40E0D0;
        border-radius: 5px;

    }


    @media  (max-width:900px){
       body{
    margin: 0;
    padding: 0;
    background-image: url(../../image/home3.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 95vh;
    
    }


      .do nav{
        margin-right: 1%;
        background:  white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;
        width: 98%;

    }
    .do{
        margin-top:2% ;
    }

      nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 28px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }
    .requi{
        background: white;
        height: 50vh;
        width: 70%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 25%;
        padding-top: 1%;
    }
    .requi form h2{
     font-style: italic;
     padding-top: 2%;
    }
    .requi form{
        background: skyblue;
        width: 95%;
        height: 85%;
    }
    .requi form input{
        width: 65%;
        height: 5%;
    }
    .requi form .pp{
        width: 65%;
        height: 10%;
        margin-bottom: 3%;
        border-radius: 5px;
    }
    .requi form .am{
        width: 65%;
        height: 10%;
        margin-bottom: 8%;
        border-radius: 5px;
    }
    .requi form .sb{
        width: 20%;
        height: 11%;
        background: #2980B9;
        color: white;
        border-color: #2980B9;
        border-radius: 5px;

    }
    }    
</style>

<body>
    <header>
        <nav>
        <ul>
            <li><a id="dashh" href="../admin/index.php">Dashboard</a></li>
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
    <center>
    <div class="requi">
        <form method="POST" enctype="multipart/form-data">
            <h2>Generating Reports</h2>

            <select name="report">
                <option value="sales_ledger">Sales Ledger</option>
                <option value="purchase_ledger">Purchase Ledger</option>
                <option value="general_ledger">General Ledger</option>
                <option value="assets">Assets</option>
                <option value="stock">Stock</option>
                <option value="operating_expenses">Operating Expenses</option>
                <option value="liabilities">Liabilities</option>
                <option value="operative_revenue">Operative Revenue</option>
            </select><br><br>
            <input type="submit" name="proceed" value="Proceed" class="sb"><br>

        </form>
    </div>  
    </center>
    

</body>
</html>