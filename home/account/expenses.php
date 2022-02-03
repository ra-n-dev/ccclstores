
<?php 
session_start();
    $uname= $_SESSION['account']; 
    include("../../db/connection.php");
    include("../header.php");



         if (isset($_GET['id'])){
               
               $id =$_GET['id'];
               $que ="UPDATE expenditure_request_table SET request_status ='cash released' WHERE ex_id ='$id' ";
               $resultt = mysqli_query($connect,$que) ;

               ?>
              <script>window.location.href="../account/expenses.php"</script>
            <?php



     }



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>expenses</title>
</head>
<style type="text/css">
	 body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 95vh;
    }

   
    


    .pat{
        display: none;
        
    }
    .pat h3{
        
    }
    .pat form .search{
        background: white;
        border-radius: 20px;
        opacity: 0.8;

    }
    .pat form .search .sub1{
      margin-left: 25%; 
       margin-right: 25%; 
      width:50%;
      height: 28px;
      margin-bottom: 10px;
    }
   .pat form .search .sub2{
      width: 15%;
      height: 34px;
      margin-left: 40%; 
       margin-right: 45%;
       border-radius: 5px;
       background: #2E4053;
    }


    .pat form .search .sub22{
      width: 20%;
      height: 34px;
      margin-left: 40%; 
       margin-right: 45%;
       border-radius: 5px;
       background: #2E4053;
    }
    .tabel1{
     margin-top: 0vh;
    
  
    }
    .som{
        height: 5vh;
    }
   
    .complete {
        margin-top: 20px;
        text-align: center;
        margin-left: 4%;
    }
    .complete a{
        padding-top: 10px;
        background: green;
        padding-bottom: 10px;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 5px;
        text-decoration: none;
        color: white;

    }

    .do nav{
        margin-right: 11%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }
    .do{
        margin-top:2% ;
    }

      nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 40px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }
   

    .design{
        background: #D7DBDD;
        width: 52%;
        margin-left: 23%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 5%;
    }
    .design h3{
        width: 99.6%;
        margin-left: 0.2%;
        padding-top: 3%;
        background: #95A5A6;
        height: 7vh;
        text-align: center;
        color: black;
    }







    .shata{
        width: 100%;
        margin-top: -2.8%;
    }
    .wendy {
        width: 100%;
        background:  black;
    }
    .wendy th{
        color: white;
    }
    .shay{
        background: #F0F3F4;
    }
    .shayb{
        background: ;
    }
    button{
        margin-left: 41%;
        width: 17%;
        margin-top: 2%;
        margin-bottom: 2%;
        background: green;
        height: 4vh;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }







    .docc2{
        background: white;
        height: 53vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        
    }
     .docc3{
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
    .docc3 table{
        width: 90%;
        background: white;
    }
    .docc3 table .buut{
        background: green;
    }
    .docc3 table .butt{
        text-decoration: none;
        color: white;
        padding-left: 20%;

    }

    .docc2 .accountselect{
        margin-top: 4%;
        width:40%;
        height:5vh;
    }
    .docc3 .accountselect{
        margin-top: 4%;
        width:40%;
        height:5vh;
    }
    center .docc2 form .sub{
        margin-top: 30px;
        margin-left: -15%;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }

    center .docc3 form .sub{
        margin-top: 30px;
        margin-left: -15%;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }
 
    .docc2 h2{
        padding-top: 30px;
        font-size: 27px;
    }
    .docc3 h2{
        padding-top: 30px;
        font-size: 27px;
    }
     .cf{
        background: white;
        height: 30vh;
        width: 40%;
     }





    .sss{
        background: white;
        width: 150px;
        height: 50px;
        margin-top: -3%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        box-shadow: 5px 5px 15px, -5px -5px 15px #fff;
        border-radius: 25px;
    }
    input{
        height: 50px;
        width: 150px;
        appearance: none;
        position: absolute;
        z-index: 1;
        outline: none;
    }
    label{
        height: 30px;
        width: 60px;
        box-shadow: inset 5px 5px 15px, inset -5px -5px 15px #fff;
        border-radius: 15px;
        position: relative;
    }

    .menz input{
        width: 39%;
        height: 30px;
        margin-left:30%;
        margin-top: 2%;
        display: flex;
        border: 1px solid gray;
    }

    label::after{
        content: "";
        position: absolute;
        height: 30px;
        width: 30px;
        box-shadow: 1px 1px 3px, 
           -1px -1px 3px #fff;
        border-radius:50%;
        background: lightgray;
        left: 0;
        transition: all 0.5 ease;
    }
    input:checked ~ label::after{
        left: 30px;
    }
    input:checked ~ span{
        color: green;
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


    .design{
        background: #95A5A6;
        width: 67%;
        margin-left: 17.5%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 15%;
    }
    .docc2{
        background: white;
        height: 50vh;
        width: 65%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 20%;
        margin-left: -1%;

        
    }
    

    .docc3{
        background: white;
        height: 60vh;
        width: 100%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 20%;
        overflow-y: scroll;
        
    }

    center .docc2 form .sub{
        margin-top: 20px;
        margin-left: -19%;
        width: 35%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;

    }
    .menz input{
        width: 48%;
        height: 30px;
        margin-left:25%;
        margin-top: 2%;
        display: flex;
        border: 1px solid gray;
    }
     
    .shata{
        width: 100%;
        margin-top: -7%;
    }

    .pat form .search .sub2{
      height: 34px;
      margin-left: 40%; 
       margin-right: 0%;
       width: 30%;
       border-radius: 5px;
       background: #2E4053;
    }

  

    .do nav{
         margin-left: 1%;   
        margin-right: 1%;
        background: white;
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
        margin-right: 20px;
        
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }



    }    

</style>

<body>

<div class="do">
        
        <center >
            <nav>
            <ul>
                <li><a id="newcase" href="../account/index.php">Receive-Cash</a></li>
                <li><a id="expenses" href="../account/expenses.php">Requested-Expenses</a></li>
                <li><a id="expenses" href="../account/accountexp.php">Make-Expenses</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>
 <center>
 	 <div class="docc3" id="docc3">
        
       
          <form method='POST' enctype='multipart/form-data'>
            <h2> Account's Portal </h2>
             <h3>QUEUED EXPENSES</h3><br>
             <div class='ddd'>
                 
             <?php 


               $first = date("Y-m-d", strtotime("first day of this month"));
               $last = date("Y-m-d", strtotime("last day of this month"));
               $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));


              $quer ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status ='approved' ";
              $reess =mysqli_query($connect, $quer);
              //$row =mysqli_fetch_array($reess);


              echo "<table cellpadding='1' cellspacing='2' border='1'>";
              if(mysqli_num_rows($reess)<1){
               echo"There is no expenses request available";
              }

               echo"<tr>
                 <th>Spender</th>
                 <th>Purpose</th>
                 <th>Department</th>
                 <th>Amount</th>
                 <th>Request Date</th>
                 <th>Request Status</th>
                 <th>Action</th>
                </tr>";
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
                 <td class='buut'><a href='../account/expenses?id=$id' class='butt'>pay cash</a></td>
                 

                </tr>";

              }
             echo"</table>";

              ?>

             </div> 
             </form>       

             </div>
 </center>
</body>
</html>