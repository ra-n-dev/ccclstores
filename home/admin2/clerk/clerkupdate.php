<?php 
include("../../../db/connection.php");

   // print_r($_POST);
	$med =$_POST['medi'];
	$serv =$_POST['servv'];
	$labx =$_POST['labxx'];
    $pname =$_POST['ppname'];
    $billdate =$_POST['billdatt'];
    $totalmoney =$_POST['totalbill'];
    $totalcost =$_POST['totalsalescost'];
    $totalbill =json_decode($totalmoney,true);
    $totalsalescost =json_decode($totalcost,true);
	$allMedicines = json_decode($med, true);
	$allServices =json_decode($serv,true);
	$allLabs =json_decode($labx,true);
   // echo"$totalbill";
   // echo"$serv ";
   // echo"$labx ,";
    //echo"$pname,";
    //echo"$billdate,";
   
    	if($med ===null){
          echo"";
        }else{
            foreach ($allMedicines as $key => $value) {
            $medname ="{$value['name']}";
            $medcategory ="{$value['category']}";
            $medimls ="{$value['ml']}";
            $qquantity ="{$value['quantity']}";

           $dra ="SELECT * FROM pharmacyinventory WHERE medicinename ='$medname' AND capacity='$medimls' AND category='$medcategory' ";
           $drares =mysqli_query($connect,$dra);
           while ($row=mysqli_fetch_array($drares)) {
            $idd =$row['medicine_id'];
            $quant =json_decode($row['drugquantity']);
           }
    
            $quantity =$quant-$qquantity;
            //echo"$medname";
            //echo"$medcategory";
            //echo"$medimls";
            //echo"$quantity";
            //echo"$idd";
            // code...

            $sec ="SELECT * FROM billsheet WHERE drugs ='$med' AND patientname ='$pname' AND datebilled ='$billdate' ";
            $sec2 =mysqli_query($connect,$sec);
            while ($row=mysqli_fetch_array($sec2)) {
                $codesta =$row['caseid_status'];
                $ide =$row['bill_id'];
            }
             
            // echo"=$codesta";

            


            $updat ="UPDATE pharmacyinventory SET drugquantity='$quantity' WHERE medicine_id = '$idd' ";
            $updateres =mysqli_query($connect,$updat)or die(mysqli_error($connect));
            
            //echo"$updat";


            $updatt ="UPDATE billsheet SET caseid_status='expired', total_income='$totalbill',costofsales='$totalsalescost' WHERE bill_id = '$ide' ";
            $updatebil =mysqli_query($connect,$updatt)or die(mysqli_error($connect));
            
        }
        }
    	


   
    	if($serv ===null){
          echo"";
        }else{
            foreach ($allServices as $key => $value) {
            $servname ="{$value['service']}";
            $servcost ="{$value['cost']}";
            //echo "($servname=$pname=$billdate)";

            $secc ="SELECT * FROM billsheet WHERE charged_for ='$serv' AND patientname ='$pname' AND datebilled ='$billdate' ";

            //echo "$secc";
            $secv =mysqli_query($connect,$secc);
            while ($row =mysqli_fetch_array($secv)) {
                $idee =$row['bill_id'];
                //echo"$idee,";
            }



            $updattx ="UPDATE billsheet SET caseid_status='expired', total_income='$totalbill',costofsales='$totalsalescost' WHERE bill_id = '$idee' ";
            $updatebilx =mysqli_query($connect,$updattx)or die(mysqli_error($connect));
           // echo "$updattx";
        }
        //echo"$servname,"; 
        //echo"$servcost";
         
        
        }



   
        if($labx === null){
          echo "";
        }else{
            foreach ($allLabs as $key => $value) {
            $labname ="{$value['lab']}";
            $labcost ="{$value['cost']}";
            // code...

             $serc ="SELECT * FROM billsheet WHERE labs ='$labx' AND patientname ='$pname' AND datebilled ='$billdate' ";

            //echo "$secc";
            $sercc =mysqli_query($connect,$serc);
            while ($row =mysqli_fetch_array($sercc)) {
                $ideee =$row['bill_id'];
                //echo"$idee,";
            }

            $updatt ="UPDATE billsheet SET caseid_status='expired', total_income='$totalbill',costofsales='$totalsalescost' WHERE bill_id = '$ideee' ";
            $updatebil =mysqli_query($connect,$updatt)or die(mysqli_error($connect));
            //echo "$updatt";
        }
       // echo"$labcost";
        }


    //echo"$updatt,";
    //echo "$ide";

    //echo"$updattx";

 ?>
