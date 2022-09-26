<?php 
 session_start();
 include("../../../db/connection.php");

    $patientnames =$_POST['patientnames'];
    $drugssolds =$_POST['drugs'];
    $drugs =$_POST['drugs'];
    $servicesrendereds =$_POST['servicesz'];
    $labsdones =$_POST['labss'];
    $nhisstatuss =$_POST['nhisstatusx'];
    $nhisnumbers =$_POST['nhisnumberx'];
    $dat =$_POST['datee'];
    if(empty($_SESSION["refreshed_round"])){
              $_SESSION["refreshed_round"]=0;
              }
              $td =date('dmy');
              $tm =date("dmy", time()+86400); 
              $dart =$td . $_SESSION["refreshed_round"]+=1;

    if(!empty($patientnames)){




        if(!empty($drugssolds)){
        $med =json_decode($drugssolds,true);
        //$drugs=[];
        foreach ($med as $key => $value) {
            $daate =date('Y-m-d');


            $medname ="{$value['name']}";
            $category ="{$value['category']}";
            $dosage ="{$value['ml']}";
            $qtysold ="{$value['quantity']}";
            $unit_cp ="{$value['medcostprice']}";
            $totcp =$qtysold * $unit_cp;
            $sp ="{$value['cost']}";
            $unit_sp = $sp/$qtysold;
           // $totsls =$qtysold * $
            $drugs=[];
            $drugs []=["name"=>$medname,"category"=>$category,"dosage"=>$dosage];    


            $resp = json_encode($drugs);
            $quer ="INSERT INTO medstock_table(item_name,quantity,unit_cp,tot_cp,expirydate,supplier,invetdate,invoicenumber,unit_sp,purchaseddate,groupp,status,tot_sls)VALUES(' $resp','$qtysold','$unit_cp','$totcp','none','none','$daate','$dart','$unit_sp','none','sales','pending','$sp')";
            $result =mysqli_query($connect, $quer)or die(mysqli_error($connect)); 
            
        }
           
         }
       // $drugname=[];
        
         $biil ="INSERT INTO billsheet (patientname,nhisstatus,nhisnumber,charged_for,labs,drugs,datebilled,caseid,caseid_status,cash_category,other_cash,cashtype,total_income,costofsales,note)VALUES('$patientnames','$nhisstatuss','$nhisnumbers','$servicesrendereds','$labsdones','$drugssolds','$dat','$dart','pending','internal','0','health','0','0','treatment') ";
        $reez = mysqli_query($connect,$biil)or die(mysqli_error($connect));
      // echo'<script>window.location.href="../dashboard/index.php"</script>';
       ?>
       
        <script>window.location.href="../dashboard/index.php"</script>
    
        <?php
    }

    

    




 ?>