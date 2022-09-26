
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style type="text/css">
    .send {
            margin-top: 2%;
            background: #5dc12e;
            border: 1px solid #5dc12e;
            border-radius: 5px;
            width: 18%;
            color: white;
        }
</style>
<body>

</body>
</html>

<?php 
include("../../../db/connection.php");
 $maa ="paul";
 //echo"$maa";


if(isset($_POST['id'])){
    $drugcat =$_POST['id'];
    $quer ="SELECT * FROM pharmacyinventory WHERE category = '$drugcat' GROUP BY medicinename ";
    $rezolt =mysqli_query($connect,$quer);
    echo"<option value=''  >---select drug name--</option>";
    while($row =mysqli_fetch_array($rezolt)){
        $medicinename =$row['medicinename'];
        echo"<option value= $medicinename >$medicinename</option>";
    }
}


  if(isset($_POST['med'])){
 	$medicine =$_POST['med'];
 	$querr ="SELECT * FROM pharmacyinventory WHERE medicinename = '$medicine'  ";
 	$rezoltt =mysqli_query($connect,$querr);
 	echo"<option value='' >---select ML/Mg--</option>";
 	while($row =mysqli_fetch_array($rezoltt)){
 		$medcapacity =$row['capacity'];
 		echo"<option value= $medcapacity >$medcapacity</option>";
 	}
 	
 	echo"$medcapacity";
 	 }


    $patientname = $_POST['patientname'];
    $nhisstatus = $_POST['nhis'];
    //$nhisnumber = $_POST['nhisnumber'];
    //$charges = $_POST['charges'];
   // $labbs = $_POST['labs'];


    //$medicinename = $_POST['medicinename'];
    //$mls = $_POST['ml'];
    //$drugquantity = $_POST['quantity'];
    //$drugcategory = $_POST['drugcategory'];

    if(!empty($_POST['nhisnumber'])){
        $nhisnumber =$_POST['nhisnumber'];

    }else{
        $nhisnumber='---None---';
    }



    if(!empty($_POST['medicinename'])){
        $medicinename =$_POST['medicinename'];

    }else{
        $medicinename='';
    }

    if(!empty($_POST['ml'])){
        $mls =$_POST['ml'];

    }else{
        $mls='';
    }

    if(!empty($_POST['quantity'])){
        $drugquantity =$_POST['quantity'];

    }else{
        $drugquantity='';
    }
    if(!empty($_POST['drugcategory'])){
        $drugcategory =$_POST['drugcategory'];

    }else{
        $drugcategory='';
    }

    if(!empty($_POST['charges'])){
        $charged_for =$_POST['charges'];

    }else{
        $charged_for='';
    } 


    if(!empty($_POST['labs'])){
        $labbs =$_POST['labs'];

    }else{
        $labbs='';
    } 


    if($medicinename && $drugquantity && $mls){
        $alldrugs = [];
                
    foreach ($medicinename as $key => $value) {
        $alldrugs[] = ["name" => $value,"category" => $drugcategory [$key],"quantity" => $drugquantity [$key], "ml" =>$mls[$key]];
    }
    }else{
        $alldrugs='No drugs';
    }
    

 $resp = json_encode($alldrugs);
 //$allMedi = json_decode($resp);
 $allMedi = json_decode($resp, true);


        if($labbs){
        // $labbs=$_POST['labs'];
        $lab="";

        foreach ($labbs AS $value) {
            $lab .= $value."," ;
            
        }

       }else{
        $lab ="No lab";
       }


     if(isset($_POST['charges'])){
        $charges=$_POST['charges'];

        $charged_for="";
        foreach ($charges AS $value) {
            $charged_for .= $value."," ;
            
        }

       }else{
        $charged_for ="No charges";
       }

 
 

/*

if ($patientname) {
     $biil ="INSERT INTO billsheet (patientname,nhisstatus,nhisnumber,charged_for,labs,drugs)VALUES('$patientname','$nhisstatus','$nhisnumber','$charged_for','$lab','$resp')";
     //$reez = mysqli_query($connect,$biil)or die(mysqli_error($connect));
 }
*/

//echo print_r((array($allMedi[1])));




 




//echo "$charged_for";
//echo'<br>';
//echo "$lab";
//echo'<br>';
//echo"$allMedi<br>";
//print_r($allMedi[0]);
//print( gettype($allMedi));
$dat =date('Y-m-d');

echo"
 <form method='POST' enctype='multipart/form-data' action='doo.php'>
 
 <div class='row'>
  <div class='col'>Patient Name:<span style='font-weight:bold'> $patientname</span></div>
  <div class='col'>NHIS STATUS: <span  style='font-weight:bold'> $nhisstatus</span></div>
 </div>
 <div class='row'>
  <div class='col'>Date:<span style='font-weight:bold'> $dat </span></div>
  <div class='col nhiss'>NHIS NUMBER: <span  style='font-weight:bold'> $nhisnumber</span></div>
 </div>
 ";



 if(!empty($_POST['charges'])){
    
   
     echo "<table width='100%'>
     <tr style='width:100%; background:white; border:2px solid black'>
      <th style='border: 0.1pt solid black;width:50%'>Services</th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid black;width:20%'></th>
      <th style='border: 0.1pt solid black;width:20%'>Price(GHC)</th>
     </tr>

     ";
     $servicess =[];
     $servunitcostt=[];
     $wwwx =$_POST['charges'];
     $waxx =$_POST['charges'];
     $charge_sum =0;
     foreach ($wwwx as $key => $value) {

        if(!empty($_POST['nhisnumber']) && $_POST['nhis']=='active'){

            $serv ="SELECT nhis_charges FROM services_table WHERE items ='$value'  ";
            $ite =mysqli_query($connect,$serv);
            while($row=mysqli_fetch_array($ite)){
            $charge =$row['nhis_charges'];
            //echo"$charge";

           }
           array_push($servicess, $charge);


        }else{

            $serv ="SELECT charges,unit_cost FROM services_table WHERE items ='$value'  ";
            $ite =mysqli_query($connect,$serv);
            while($row=mysqli_fetch_array($ite)){
            $charge =$row['charges'];
            $servunit_cost =$row['unit_cost'];
            //echo"$charge";

             }
             array_push($servicess, $charge);
             array_push($servunitcostt, $servunit_cost);

        }

        $charge_sum =$charge_sum + $charge;
      echo"
       <tr style='width:100%; background:white; border:2px solid black'>
        <td style='border: 0.1pt solid black;width:25%'>$value</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid black;width:15%;font-weight:bold'>$charge</td>
        </tr> ";
    }
    echo"</table>";

    $charrges =[];
    foreach ($waxx as $key => $values) {
      $charrges[]=["service"=>$values,"cost"=>$servicess[$key],"servunitcost"=>$servunitcostt[$key]];
    }

    $services =json_encode($charrges);
}


  if(!empty($_POST['medicinename']) && !empty($_POST['quantity']) && !empty($_POST['ml'])){
  
     
     echo "<table width='100%'>

     <tr style='width:100%; background:white; border:2px solid black'>
      <th style='border: 0.1pt solid black;width:50%'>Drug-Name</th>
      <th style='border: 0.1pt solid black;width:20%'>Category</th>
      <th style='border: 0.1pt solid black;width:20%'>ML/MG</th>
      <th style='border: 0.1pt solid black;width:20%'>Unit Price(GHC)</th>
      <th style='border: 0.1pt solid black;width:20%'>Quantity</th>
      <th style='border: 0.1pt solid black;width:20%'>Total Price(GHC)</th>
     </tr>

     ";

      $cost =[];
      $mmedcostprice=[];
      $medi_sum = 0;
      foreach ($allMedi as $key => $value){
        
        $medi ="SELECT sellingprice,costprice FROM pharmacyinventory WHERE medicinename ='{$value['name']}' AND capacity='{$value['ml']}' ";
        $sellmedi =mysqli_query($connect,$medi);
        while ($row = mysqli_fetch_array($sellmedi)){
               $sell =$row['sellingprice'];
               $medcostprice =$row['costprice'];
               
        }
       // $allMedi['cost'] = "$sell";
        $prod =$sell * "{$value['quantity']}";
        array_push($cost,$prod);
        array_push($mmedcostprice,$medcostprice);
        $medi_sum =$medi_sum + $prod;     
     
     echo"

       <tr style='width:100%; background:white; border:2px solid black'>
        <td style='border: 0.1pt solid black;width:50%'>{$value['name']}</td>
        <td style='border: 0.1pt solid black;width:20%'>{$value['category']}</td>
        <td style='border: 0.1pt solid black;width:20%'>{$value['ml']}</td>
        <td style='border: 0.1pt solid black;width:20%'>$sell</td>
        <td style='border: 0.1pt solid black;width:20%'>{$value['quantity']}</td>
        <td style='border: 0.1pt solid black;width:18%; font-weight:bold'>$prod</td>
        </tr> ";

    }


   


    echo"</table>";


    $results = [];
                
    foreach ($medicinename as $key => $value) {

        $results[] = ["name" => $value,"category" => $drugcategory [$key],"quantity" => $drugquantity [$key], "ml" =>$mls[$key],"cost" =>$cost[$key],"medcostprice" => $mmedcostprice[$key]];
    }

    $totmedi =json_encode($results);

}

if(!empty($_POST['labs'])){
     echo "<table width='100%'>
     <tr style='width:100%; background:white; border:2px solid black'>
      <th style='border: 0.1pt solid black;width:50%'>Lab-Name</th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid white;width:20%'></th>
      <th style='border: 0.1pt solid black;width:20%'></th>
      <th style='border: 0.1pt solid black;width:20%'>Price(GHC)</th>
     </tr>

     ";
     $www =$_POST['labs'];
     $lab_sum =0;
     $alllabs=[];
     foreach ($www as $key => $value) {
       $laab ="SELECT cost,unit_cost FROM labs_table WHERE lab_name ='$value'  ";
        $llab =mysqli_query($connect,$laab);
        while($row=mysqli_fetch_array($llab)){
            $larb =$row['cost'];
            $unitcostlab =$row['unit_cost'];
            //echo"$charge";

        }

        $alllabs[] = ["lab" => $value,"cost" => $larb,"labunitcost" => $unitcostlab];
        $llab = json_encode($alllabs);

        $lab_sum =$lab_sum + $larb;

      echo"

       <tr style='width:100%; background:white; border:2px solid black'>
        <td style='border: 0.1pt solid black;width:25%'>$value</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid white;width:15%'>---</td>
        <td style='border: 0.1pt solid black;width:15%;font-weight:bold'>$larb</td>
        </tr> ";
    }

    echo"</table>";
}

if(empty($charge_sum)){
    $charge_sum = 0;
}
if(empty($lab_sum)){
    $lab_sum = 0;
}
if(empty($medi_sum)){
    $medi_sum = 0;
}



$totalbill =$charge_sum + $medi_sum + $lab_sum;

  

echo "<table width='100%'>
      <tr style='width:100%; border:0px solid white'>
        <td style='border: 0pt solid white;width:15%'></td>
        <td style='border: 0pt solid white;width:15%'></td>
        <td style='border: 0pt solid white;width:15%'></td>
        <td style='border: 0pt solid white;width:15%'></td>
        <td style='border: 1pt solid black;width:25%;background:white; font-weight:bold'>Total Bill (GHC)</td>
        <td style='border: 1pt solid black;width:15%;background:white;font-weight:bold'> $totalbill</td>
        </tr> ";

echo" </table>";




echo"<div>";

if(!empty($totmedi)){
  $drugssold =$totmedi;
}else{
    $drugssold ='no-drugs';
}
if(!empty($services)){
  $servicesrendered =$services;
}else{
    $servicesrendered ='no-services';
}
if(!empty($llab)){
  $labsdone =$llab;
}else{
    $labsdone ='no-lab';
}
if(!empty($medcostprice)){
  $medcostprice =$medcostprice;
}else{
    $medcostprice ='no-drugs';
}
if(!empty($servunit_cost)){
  $servunit_cost =$servunit_cost;
}else{
    $servunit_cost ='no-services';
}
if(!empty($unitcostlab)){
  $unitcostlab=$unitcostlab;
}else{
    $unitcostlab="no-lab";
}

//print_r($totmedi);
//echo "<br>";
//print_r($services);
//echo "<br>";
//print_r($llab);
//echo "<br>";
   

echo"
<input type='hidden' name='drugs' value='$drugssold'></input>
<input type='hidden' name='servicesz' value='$servicesrendered'></input>
<input type='hidden' name='labss' value='$labsdone'></input>
<input type='hidden' name='patientnames' value='$patientname'></input>
<input type='hidden' name='nhisnumberx' value='$nhisnumber'></input>
<input type='hidden' name='nhisstatusx' value='$nhisstatus'></input>
<input type='hidden' name='datee' value='$dat'></input>

<input type='hidden' name='medunitcost' value='$medcostprice'></input>
<input type='hidden' name='servunitcost' value='$servunit_cost'></input>
<input type='hidden' name='labcostprice' value='$unitcostlab'></input>

<input type='submit' value='BillNow' name='billnow' class='send'>

</div>
</form>";








 ?>





