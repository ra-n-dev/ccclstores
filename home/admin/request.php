<?php 
session_start();
$uname= $_SESSION['admin']; 
include("../../db/connection.php");
include("../header.php");


if (isset($_GET['id'])){

               
               $id =$_GET['id'];
               $que ="UPDATE expenditure_request_table SET request_status ='approved' WHERE ex_id ='$id' ";
               $resultt = mysqli_query($connect,$que) ;

               
             echo "<script>window.location.href='../admin/request.php'</script>";
            



}

if (isset($_GET['idd'])){
               
               $idd =$_GET['idd'];
               $que ="UPDATE expenditure_request_table SET request_status ='rejected' WHERE ex_id ='$idd' ";
               $resultt = mysqli_query($connect,$que) ;

              echo "<script>window.location.href='../admin/request.php'</script>";



     }


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>admin request</title>
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
        overflow: hidden;
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

    .nono{
        height: 5vh;
        width: 100%;
    }
    .nono h4{
        color: red;
        text-align: center;
        font-style: italic;
        font-size: 20px;
    }

         @media  (max-width:900px){
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 98.5vh;
    }
    .req{
        background: white;
        height: 70vh;
        width: 90%;
        border-radius: 6px;
        opacity: 0.8;
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
}
</style>
 <body>
 
  <header>
        <nav>
        <ul>
            <li><a href="../admin/index.php">Dashboard</a></li>
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

 	 <div class="request" id="request">
        <center>
            
            <div class="req">
                <h3>List of Expenses Requested </h3>
            <div class="list">

            <?php 

               $first = date("Y-m-d", strtotime("first day of this month"));
               $last = date("Y-m-d", strtotime("last day of this month"));
               $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));


              $quer ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status ='pending' ";
              $reess =mysqli_query($connect, $quer);
              //$row =mysqli_fetch_array($reess);


              echo "<table cellpadding='1' cellspacing='2' border='1'>";
              echo"<tr>
                 <th>Spender</th>
                 <th>Purpose</th>
                 <th>Department</th>
                 <th>Amount</th>
                 <th>Request Date</th>
                 <th>Request Status</th>
                 <th>Action</th>
                </tr>";
              if(mysqli_num_rows($reess)<1){
               echo"<h4>There is no monthly expenses request yet</h4>";
              }

               
              while($row = mysqli_fetch_array($reess)){
                $spender =$row['spender_name'];
                $amount =$row['amount'];
                $accountant =$row['accountant_name'];
                $purpose =$row['purpose'];
                $request_date =$row['request_date'];
                $status =$row['request_status'];
                $department =$row['department'];
                $id =$row['ex_id'];


               
                echo"<tr>
                 <td>$spender</td>
                 <td>$purpose</td>
                 <td>$department</td>
                 <td>$amount</td>
                 <td>$request_date</td>
                 <td>$status</td>
                 <td class='buut'><a href='../admin/request?id=$id' class='butt'>Approved</a><a href='../admin/request?idd=$id' class='buttt'>Reject</a></td>
                 

                </tr>";

              }
             echo"</table>";

              ?>
                    
                </div>
                

            </div>
        </center>
        
           

       </div>
 
 </body>
 </html>