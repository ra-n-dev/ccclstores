<?php 
  session_start();
  include("../../db/connection.php");
  $cash_received =$_SESSION['cost'];
   $cat = $_SESSION['category'];
    $insur_consult =$_SESSION['insur_consult_price'];
    $insurnumb =$_SESSION['insurance'];
    $case_id =$_SESSION['searchkey'];
   // echo"$case_id";
         

        $kweryo ="SELECT * FROM consult_neutral_table WHERE case_id ='$case_id' ";
        $rezoltt =mysqli_query($connect, $kweryo);
        $row =mysqli_fetch_array($rezoltt);
        $client =$row['patient_name'];
        $case_code =$row['case_id'];
        $fun = date("Y-m-d ");
        


        $kwery ="SELECT * FROM customers_table WHERE case_id ='$case_id' ";
        $rezolt =mysqli_query($connect, $kwery);
        $row =mysqli_fetch_array($rezolt);
        $name =$row['customer_name'];

        $permanent_id =$row['patient_perm_id'];
      
        $queri ="UPDATE customers_table SET  category = '$cat',pay_labs = '$cash_received.00',visit_date ='$fun',insurance_number ='$insurnumb' WHERE patient_perm_id ='$permanent_id' ";
            $rez =mysqli_query($connect, $queri);


            $querii ="UPDATE consult_neutral_table SET  lab_payment_status = 'paid'  WHERE case_id ='$case_id' ";
            $rezo =mysqli_query($connect, $querii);

            
            $query ="INSERT INTO cash_inflow_book(patient_name,pay_date,purpose,income,patient_perm_id)VALUES('$name','$fun','$cat','$cash_received.00','$permanent_id')";
            $wwr =mysqli_query($connect, $query) or die(mysqli_error($connect));

           if($rez){
           echo'<script>window.location.href="../account/index.php"</script>';
        }
 

 ?>