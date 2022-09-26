<?php
 include("../../../db/connection.php");
  $first = date("Y-m-d", strtotime("first day of this month"));
    $last = date("Y-m-d", strtotime("last day of this month"));
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));


    $ma1 = date('Y-m-d',strtotime('first day of January ' . date('Y')));
    $ma2 = date('Y-m-d',strtotime('last day of December ' . date('Y')));

if(isset($_POST['sum'])){

  $monthsales ="SELECT drugs,charged_for,labs FROM billsheet WHERE caseid_status='expired' AND cash_category='internal' AND datebilled BETWEEN '$first' AND '$last' ";
  $ressult =mysqli_query($connect,$monthsales);
  $medi_sum =0;
  $lab_sum =0;
  $serv_sum =0;
  while ($row =mysqli_fetch_array($ressult)) {
     $medicinename =$row['drugs'];
     $services =$row['charged_for'];
     $lab =$row['labs'];
     $allMedicines = json_decode($medicinename, true);
     $allServices = json_decode($services, true);
     $allLabs = json_decode($lab, true);
     if($medicinename =='no-drugs'){
        echo "";
     }else{

        
        foreach ($allMedicines as $key => $value) {
      // code...
      
       $medi_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }


     if($lab =='no-lab'){
        echo "";
     }else{

        
        foreach ($allLabs as $key => $value) {
      // code...
      
       $lab_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }

     if($services =='no-services'){
        echo "";
     }else{

        
        foreach ($allServices as $key => $value) {
      // code...
      
       $serv_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }
    
  }

    $yearlysales ="SELECT drugs,charged_for,labs FROM billsheet WHERE caseid_status='expired' AND cash_category='internal' AND datebilled BETWEEN '$ma1' AND '$ma2' ";
  $ressult =mysqli_query($connect,$yearlysales);
  $ymedi_sum =0;
  $ylab_sum =0;
  $yserv_sum =0;
  while ($row =mysqli_fetch_array($ressult)) {
     $medicinename =$row['drugs'];
     $services =$row['charged_for'];
     $lab =$row['labs'];
     $allMedicines = json_decode($medicinename, true);
     $allServices = json_decode($services, true);
     $allLabs = json_decode($lab, true);
     if($medicinename =='no-drugs'){
        echo "";
     }else{

        
        foreach ($allMedicines as $key => $value) {
      // code...
      
       $ymedi_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }


     if($lab =='no-lab'){
        echo "";
     }else{

        
        foreach ($allLabs as $key => $value) {
      // code...
      
       $ylab_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }

     if($services =='no-services'){
        echo "";
     }else{

        
        foreach ($allServices as $key => $value) {
      // code...
      
       $yserv_sum+= "{$value['cost']}";
      
    }
    
    // code...

     }
    
  }





  $monthlysales =$medi_sum + $serv_sum + $lab_sum;
  $yearlysales =$ymedi_sum + $yserv_sum + $ylab_sum;

 
 
  

   $monthly ="SELECT sum(total_income),datebilled, patientname FROM billsheet WHERE caseid_status='expired' AND MONTH(datebilled)=MONTH(now()) ";
   $monthlyres =mysqli_query($connect,$monthly) or die($connect);
   $mmon =mysqli_fetch_array($monthlyres);

   $yrly ="SELECT sum(total_income),datebilled FROM billsheet WHERE caseid_status='expired' AND YEAR(datebilled)=YEAR(now()) ";
   $yrlyres =mysqli_query($connect,$yrly) or die($connect);
   $yearly =mysqli_fetch_array($yrlyres);


   $qryy ="SELECT patientname FROM billsheet WHERE cash_category='internal' ";
   $rstt =mysqli_query($connect,$qryy) or die($connect);
   $row =mysqli_fetch_array($rstt);
   $patients =mysqli_num_rows($rstt);

   $other ="SELECT sum(other_cash) FROM billsheet WHERE cash_category='external' AND datebilled BETWEEN '$first' AND '$last' ";
   $otherres =mysqli_query($connect,$other);
   $raaw =mysqli_fetch_array($otherres);

	/*
   $try ="SELECT sum(income) FROM cash_inflow_book WHERE pay_date BETWEEN '$first' AND '$last' " ;
    $trial = mysqli_query($connect,$try);
    $row =mysqli_fetch_array($trial);

    $endofyear ="SELECT sum(income) FROM cash_inflow_book WHERE pay_date BETWEEN '$ma1' AND '$ma2' " ;
    $yeardata = mysqli_query($connect,$endofyear);
    $rowss =mysqli_fetch_array($yeardata);
    */
    $qry ="SELECT count(id) FROM staff_table";
    $rst =mysqli_query($connect,$qry) or die($connect);
    $roww =mysqli_fetch_array($rst);
    $ssum =mysqli_num_rows($rst);


     $quer ="SELECT sum(amount_spent) FROM expenditure_table WHERE expense_date BETWEEN '$first' AND '$last' AND request_status ='approved' ";
     $reess =mysqli_query($connect, $quer);
     $raw =mysqli_fetch_array($reess);

	$ab="$mmon[0],$yearly[0],$roww[0],$raw[0],$raaw[0],$patients[0]";
	echo "$ab";
  echo "$patients";
////echo number_format($ab,2,'.',',');

}



?>