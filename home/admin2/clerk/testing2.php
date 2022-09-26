

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
            width: 100%;
            color: white;
        }

     .typ{
        margin-top: 11%;
        margin-left:28%;
        font-size: 22px;
        font-family: sans-serif;
     } 
     .bak{
        margin-top: 7%;
        margin-left: 45%;
        margin-bottom: 2%;
     } 

     .bod{
        height: 100%;
     } 
</style>
<body>

</body>
</html>
<?php 
include("../../../db/connection.php");

//$pcode =$_POST['patientcode'];
//echo "$pcode";
//print_r($_POST);


 


$pcode =$_POST['patientcode'];
//echo "$pcode";

$query ="SELECT * FROM billsheet WHERE caseid ='$pcode' ";
$res =mysqli_query($connect,$query);
while ($row =mysqli_fetch_array($res)) {
    $sta =$row['caseid_status'];

    if($sta==='pending'){

        $quer ="SELECT * FROM billsheet WHERE caseid = '$pcode' AND caseid_status ='pending' ";
        $rezolt =mysqli_query($connect,$quer);
   
   // echo"<option value=''  >---select drug name--</option>";
    while($row =mysqli_fetch_array($rezolt)){
        $caseid =$row['caseid'];
        $patientname =$row['patientname'];
        $medicinename =$row['drugs'];
        $services =$row['charged_for'];
        $lab =$row['labs'];
        $nhisnumber =$row['nhisnumber'];
        $nhisstatus =$row['nhisstatus'];
        $billdate =$row['datebilled'];
        $allMedicines = json_decode($medicinename, true);
        $allServices = json_decode($services, true);
        $allLabs = json_decode($lab, true);
       // echo"$patientname<br>";


        echo"
         <form method='POST' enctype='multipart/form-data'  id='clerkkko'>
         
         <div class='row'>
          <div class='col'>Patient Name:<span style='font-weight:bold'> $patientname</span></div>
          <div class='col'>NHIS STATUS: <span  style='font-weight:bold'> $nhisstatus</span></div>
         </div>
         <div class='row'>
          <div class='col'>Date:<span style='font-weight:bold'> $billdate </span></div>
          <div class='col nhiss'>NHIS NUMBER: <span  style='font-weight:bold'> $nhisnumber</span></div>
         </div>
         "; 


         if($services ==='no-services'){
           echo"";
          }else{
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
              $serv_sum =0;
              $servunitcostsum =0;
            foreach ($allServices as $key => $value) {
                $serv_sum+= "{$value['cost']}";
                $servunitcostsum+= "{$value['servunitcost']}";

                echo"

               <tr style='width:100%; background:white; border:2px solid black'>
                <td style='border: 0.1pt solid black;width:25%'>{$value['service']}</td>
                <td style='border: 0.1pt solid white;width:15%'>---</td>
                <td style='border: 0.1pt solid white;width:15%'>---</td>
                <td style='border: 0.1pt solid white;width:15%'>---</td>
                <td style='border: 0.1pt solid white;width:15%'>---</td>
                <td style='border: 0.1pt solid black;width:15%;font-weight:bold'>{$value['cost']}</td>
                </tr> ";
            }
             echo"</table>";
         }

        
         if($medicinename==='no-drugs'){
           echo"";

         }else{
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
             $medi_sum=0;
             $medunitcostsum =0;
            foreach ($allMedicines as $key => $value) {
                $medi_sum+= "{$value['cost']}";
                $medunitcostsum+= "{$value['medcostprice']}";
                $div ="{$value['cost']}" / "{$value['quantity']}";
                echo"

               <tr style='width:100%; background:white; border:2px solid black'>
                <td style='border: 0.1pt solid black;width:50%'>{$value['name']}</td>
                <td style='border: 0.1pt solid black;width:20%'>{$value['category']}</td>
                <td style='border: 0.1pt solid black;width:20%'>{$value['ml']}</td>
                <td style='border: 0.1pt solid black;width:20%'>$div</td>
                <td style='border: 0.1pt solid black;width:20%'>{$value['quantity']}</td>
                <td style='border: 0.1pt solid black;width:18%; font-weight:bold'>{$value['cost']}</td>
                </tr> ";
            }
             echo"</table>";
         }


         if($lab ==="no-lab"){
            echo"";
         }else{
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
            $lab_sum=0;
            $labunitcostsum =0;
            foreach ($allLabs as $key => $value) {
                $lab_sum+= "{$value['cost']}";
                $labunitcostsum+= "{$value['labunitcost']}";
                echo"

                   <tr style='width:100%; background:white; border:2px solid black'>
                    <td style='border: 0.1pt solid black;width:25%'>{$value['lab']}</td>
                    <td style='border: 0.1pt solid white;width:15%'>---</td>
                    <td style='border: 0.1pt solid white;width:15%'>---</td>
                    <td style='border: 0.1pt solid white;width:15%'>---</td>
                    <td style='border: 0.1pt solid white;width:15%'>---</td>
                    <td style='border: 0.1pt solid black;width:15%;font-weight:bold'>{$value['cost']}</td>
                    </tr> ";
            }
            
             echo"</table>";

         }



               if(empty($serv_sum)){
                  $serv_sum = 0;
                }
                if(empty($lab_sum)){
                    $lab_sum = 0;
                }
                if(empty($medi_sum)){
                    $medi_sum = 0;
                }

                if(empty($servunitcostsum)){
                  $servunitcostsum = 0;
                }
                if(empty($medunitcostsum)){
                    $medunitcostsum = 0;
                }
                if(empty($labunitcostsum)){
                    $labunitcostsum = 0;
                }

         $totalbill =$serv_sum + $medi_sum + $lab_sum;
         $totalsalescost =$servunitcostsum + $medunitcostsum + $labunitcostsum;

         echo "<table width='100%'>
              <tr style='width:100%; border:0px solid white'>
                <td style='border: 0pt solid white;width:15%'></td>
                <td style='border: 0pt solid white;width:15%'></td>
                <td style='border: 0pt solid white;width:15%'></td>
                <td style='border: 0pt solid white;width:15%'></td>
                <td style='border: 1pt solid black;width:25%;background:white; font-weight:bold'>Total Bill (GHC)</td>
                <td style='border: 1pt solid black;width:15%;background:white;font-weight:bold'> $totalbill</td>
                </tr> ";

                echo "</table>";



        // echo"$medicinename<br>";


        $medici =json_encode($allMedicines);
        $servvv =json_encode($allServices);
        $labbb =json_encode($allLabs);
        //$patientnames =json_encode($patientname);

         echo "
            <input type='hidden' name='drugs' value='$medici' id='medd'></input>
            <input type='hidden' name='servicesz' value='$servvv' id='servv'></input>
            <input type='hidden' name='labss' value='$labbb' id='labx'></input>
            <input type='hidden' name='pname' value='$patientname' id='ppname'></input>
            <input type='hidden' name='billdat' value='$billdate' id='billdatt'></input>
            <input type='hidden' name='totalbill' value='$totalbill' id='totalbill'></input>
            <input type='hidden' name='totalsalescost' value='$totalsalescost' id='totalsalescost'></input>
            <input type='button' value='Recieve Cash' name='billnow' class='send' onclick=formsubmit()>

         </form>";

  }
    }else{
      // echo "<script>alert('code expires')</script>"; 

       echo "
       <form method='POST' enctype='multipart/form-data' id='expiredd'>
       <div class='bod'>
       <div class='typ'>this code has expired</div>
       <div><input type='submit' value='Back' class='bak'>


       </div>

       <form>

       ";
    }
}


 if($pcode){
   
    
}


 ?>

  <script type="text/javascript">
     
            
            $("#clerkk").on("submit", function (e) {
                $.ajax({  
                url: 'clerkupdate.php',
                type: 'POST',
                data:  $("#clerkk").serialize(), 

                success: function(data) {
            
                //$("#billbody").append(data);
                //$(".myModal1").hide();
                //$('.myModal2').show();
                }
              });
                console.log($("#clerkk").serialize())

             
                return false;
            });


           // $('.myModal1').css('display', 'none');
           // $('.myModal2').css('display', 'block');




            function formsubmit() {
                var medi = document.getElementById('medd').value;
                var servv = document.getElementById('servv').value;
                var labx = document.getElementById('labx').value;
                var paname = document.getElementById('ppname').value;
                var billdatee = document.getElementById('billdatt').value;
                var totalbill = document.getElementById('totalbill').value;
                var totalsalescost =document.getElementById('totalsalescost').value;
                //store all the submitted data in astring.
                var formdata = 'medi=' + medi + '&servv=' + servv + '&labxx=' + labx + '&ppname=' + paname + '&billdatt=' + billdatee + '&totalbill=' + totalbill + '&totalsalescost=' + totalsalescost ;
                // validate the form input
                if (medi == '' ) {
                    alert("Please Enter Medi Name");
                    return false;
                }
                if(servv == '') {
                    alert("Please Enter services id");
                    return false;
                }
                if(labx == '') {
                    alert("Please labs name");
                    return false;
                }

                else {
                // AJAX code to submit form.
                $.ajax({
                     type: "POST",
                     url: "clerkupdate.php", //call storeemdata.php to store form data
                     data: formdata,
                     cache: false,
                     success: function(html) { 
                        //alert(html);
                        alert('Payment was successfull');
                        window.location.replace("../clerk/index.php");
                     }
                     
                });
                }
                return false;
            }



        
   </script>