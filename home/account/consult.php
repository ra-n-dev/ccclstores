<?php 
    session_start(); 
    $uname= $_SESSION['account']; 
    include("../../db/connection.php");
    include("../header.php");

    $cat = $_SESSION['category'];
    $insur_consult =$_SESSION['insur_consult_price'];
    $insurnumb =$_SESSION['insurance'];

    if(isset($_POST['receive'])){
        $card_num =$_POST['card_num'];
        $payment_mode =$_POST['payment_mode'];
        $cash_received ="$insur_consult";
        $fun = date("Y-m-d ");

        $kwery ="SELECT * FROM customers_table WHERE patient_perm_id ='$card_num' ";
        $rezolt =mysqli_query($connect, $kwery);
        $row =mysqli_fetch_array($rezolt);
        $name =$row['customer_name'];

        $permanent_id =$row['patient_perm_id'];

           if(empty($_SESSION["case_idd"])){
              $_SESSION["case_idd"]=0;
              }elseif ($_SESSION["case_idd"]>=1000){
                 $_SESSION["case_idd"]=0;
        }

              $dd =date('d');
              $case_id =$dd.$_SESSION['case_id']+=1;

        if($card_num == $permanent_id ){
            $queri ="UPDATE customers_table SET pay_consultation = '$cash_received',pay_folder_consul ='0.00', category = '$cat', payment_mode ='$payment_mode',pay_drugs ='0.00',pay_labs = '0.00',pay_scan = '0.00',pay_review = '0.00',visit_date ='$fun',insurance_number ='$insurnumb',case_id ='$case_id' WHERE patient_perm_id ='$card_num' ";
            $rez =mysqli_query($connect, $queri);

            $query ="INSERT INTO cash_inflow_book(patient_name,pay_date,purpose,income,patient_perm_id)VALUES('$name','$fun','$cat','$cash_received','$permanent_id')";
            $wwr =mysqli_query($connect, $query) or die(mysqli_error($connect));


            if($rez){
                echo'<script>window.location.href="../account/index.php"</script>';
            }
            
             //echo"you can update the customer_name";

        }else{
            $err ="This patient does not have folder";
            echo"<script>alert('$err')</script>";
        }

        
    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>consultation payment</title>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
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
    .do nav{
        margin-right: 12%;
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
        margin-right: 70px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }


        .docc2{
        background: white;
        height: 71vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        
    }

    .docc2 .accountselect{
        width:44%;
        height:5.5vh;
        border-radius: 5px;
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
 
    .docc2 h2{
        padding-top: 30px;
        font-size: 27px;
    }
    .wop{
    	background: white;
    	border: 1px solid black;
    	border-radius: 4px;
    	height: 5vh;
    	width: 43.5%;
    }
    form{
        border-radius: 5px; 
    	background: #E5E7E9;
    	width:88% ;
    	height: 63vh;
    	margin-top: -2%;
    }
    .momo{
    	height: 15%;
    	width: 13%;
    	padding-right: 2%;
    }
    .cash{
    	height: 15%;
    	width: 13%;
    	padding-right: 2%;
    }
    .visa{
    	height: 15%;
    	width: 13%;
    }
    input{
    	width: 42.5%;
    	height: 8%;
    	border-radius: 5px;
    	border: 1px black solid;
    }

    .btn{
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
        height: 100vh;
    }

     .docc2{
        background: white;
        height: 71vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 20%;
        
    }

    nav li {
        margin-right: 50px;
        float: left;
      }
       center .docc2 form .sub{
        margin-top: 10px;
        width: 40%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }
}
   

</style>
<body>

	<div class="do">
        
        <center >
            <nav>
            <ul>
                <li><a id="newcase" href="#">New-Case</a></li>
                <li><a id="pfolder" href="#">In-Patient</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>

    <center>
        <div class="docc2" id="docc2"><br>
        
       
          <form method='POST' enctype='multipart/form-data'>
            <h2> Account's Portal </h2>
             <h3>Consultation Payment</h3>
             <span ><img class="momo" src="../imgg/momo1.jpg"><img class="cash" src="../imgg/cash6.png"><img class="visa" src="../imgg/visaa.png"></span><br>
              <label>Hospital Card Number</label><br>
             <input type="text" name="card_num" placeholder="Enter Card Number"><br>
             <label>Payment Mode</label><br>
             <select class="accountselect" id="wardselected" name="payment_mode" style="">
                 <option value="cash">Cash</option>
                 <option value="momo">Momo </option>
                 <option value="visa">Visa</option>
                 <option value="cheque">Cheque</option>
             </select><br>
             <span>Cash Payable<div class="wop"><?php echo"<div class='btn'>$insur_consult</div>" ?></div></span>
             
             <input class='sub' type='submit' name='receive' value="Receive Cash">  
          </form>
       </div>
    </center>

</body>
</html>