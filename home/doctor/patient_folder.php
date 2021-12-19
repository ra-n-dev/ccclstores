

<?php 
  session_start();
    $uname= $_SESSION['doctor']; 
    $casecode= $_SESSION['caseid'];
    include("../../db/connection.php");
    include("../header.php");




    $query ="SELECT * FROM patient_table WHERE case_id ='$casecode' ";
    $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
    $row =mysqli_fetch_array($result);

          $id = $row['patient_id'];
          $name =$row['name'];
          $date = $row['reg_date'];
          $age =$row['age'];
          $gender = $row['gender'];
          $pulse =$row['pulse'];
          $temp =$row['temp'];
          $bp =$row['bp'];
          $weight =$row['weight'];
          $height =$row['height'];
          $phone =$row['contact'];
          $relative_phone = $row['relative_contact'];
          $occupation =$row['occupation'];
          $placeofbirth = $row['placeofbirth'];
          $nationality =$row['nationality'];
          $religion = $row['religion'];
          $dob =$row['dob'];



    $queryy = "SELECT * FROM consultation_table  WHERE unique_code  ='$casecode'";
          $code = $row['case_id'];
          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $name =$row['patient_name'];        
       $result =mysqli_query($connect, $queryy);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>patient folder</title>
</head>
<style type="text/css">
	body{
 		margin: 0;
 		padding: 0;
 		background-image: url(../../image/home3.jpg);
 		background-repeat: no-repeat;
 		background-size: cover;
 		background-position: center;
 		height: 95vh;
        position: relative;
 	}
 	.do nav{
        margin-right: 8.5%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
   }
   .pahistory{
      margin-left: 17%;
      margin-right: 10%;
      height: 95vh;
      width: 62.8%;
      overflow-y: scroll;
	  overflow-x: hidden;
      margin-top: 19px;

	}
	.table1{
		width: 100%;
		
	}

	 .pahistory::-webkit-scrollbar-track {
     -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 20px;
      width: 15px;
      background-color: white;
     }

     .pahistory::-webkit-scrollbar {
     width: 8px;
     background-color: #F5F5F5;
    }

    .pahistory::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 5%;
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, .3);
    background-color: grey;
  }

  .pahistory::-webkit-scrollbar-button {
   height: 50px;
  }

  .wan{
    height: 140vh;
    marging-bottom: 10px;
    background: black;

  }
  .wann{
    background: white;
    height: 137vh;
    width: 98%;
    margin-top: -5%;
  }.healthdetails{
    height: 13vh;
    border: solid 1px black;
    width: 74.5%;
  }
  

  .lab{
    height: 13vh;
    border: solid 1px black;
    width: 74.5%;
  }
  .diag{
    height: 13vh;
    border: solid 1px black;
    width: 74.5%;
  }

  .drug{
    height: 13vh;
    border: solid 1px black;
    width: 75%;
  }

  .cnt{
    background: transparent;
  }

  .band{
    height: 78%;
    width: 78%;
    border-radius: 6px;
  }

  @media  (max-width: 500px){
    .pahistory{
      margin-left: 15%;
      margin-right: 10%;
      height: 95vh;
      width: 62.8%;
      overflow-y: scroll;
      overflow-x: hidden;
      margin-top: 19px;

    }

    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 100vh;
        position: relative;
    }

   }
</style>

<body>

   <div class="pahistory">
	  <?php 
	  if(isset($_GET["$casecode"])){
          $name =$_GET["$casecode"];
      $queryy = "SELECT * FROM consultation_table  WHERE unique_code  ='$casecode' ORDER BY visit_date DESC";

      /* $queryy = "SELECT consultation_table.col1 AS case_id, consultation_table.col2 AS prescription, consultation_table.col3 As diagnosis, consultation_table.col4 AS ward, consultation_table.col5 AS health_status, consultation_table.col6 AS patient_id, consultation_table.col7 AS visit_date, consultation_table.col8 AS doc_name, consultation_table.col9 AS patient_name, consultation_table.col10 AS unique_code, consultation_table.col11 AS drug_payment_status, consultation_table.col12 AS lab_payment_status, consultation_table.col13 AS health_details, consultation_table.col14 AS labs, consultation_annex_table.col1 AS patient_id, consultation_annex_table.col2 AS case_id, consultation_annex_table.col3 AS unique_code, consultation_annex_table.col4 AS patient_name, consultation_annex_table.col5 AS spo2, consultation_annex_table.col6 AS pulse, consultation_annex_table.col7 AS temp, consultation_annex_table.col8 AS bp, consultation_annex_table.col9 AS clinical_history, consultation_annex_table.col10 AS diagnosis, consultation_annex_table.col11 AS prescription, consultation_annex_table.col12 AS labs, consultation_annex_table.col13 AS undate_date, consultation_annex_table.col14 AS drug_payment_status,consultation_annex_table.col15 AS lab_payment_status, consultation_annex_table.col16 AS doc_name FROM consultation_table, consultation_annex_table WHERE consultation_table.case_id = consultation_annex_table.case_id";
     */ 

          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);

          $name =$row['patient_name'];
          $history =$row['health_details'];
          $medicinename =$row['prescription'];
          $ward =$row['ward'];
          $diagnosis =$row['diagnosis'];
          $healthstatus=$row['health_status'];
          $doctor =$row['doc_name'];
          $visit_date =$row['visit_date'];
          $results='naming ceremoney';
          $ass =$row['case_id'];
          

       $result =mysqli_query($connect, $queryy);



           if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient history yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)){
                  $ass =$row['case_id'];
                  $id = $row['case_id'];
                  $name = $row['patient_name'];
                  $history = $row['health_details'];
                  $medicinename = $row['prescription'];
                  $diagnosis = $row['diagnosis'];
                  $healthstatus = $row['health_status'];
                  $ward =$row['ward'];
                  $lab =$row['labs'];
                  $doctor =$row['doc_name'];
                  $visit_date =$row['visit_date'];
                  $allMedicines = json_decode($medicinename, true);
                  $drugg =$row['prescription'];
                  // loop through the medicines and use it to created the nested table
                  // you can style the table however you like

                  $subTable = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                     <tr border=0.1 >
                     <td style='background:black;color:white;width:4%'> Drug Name</td>
                     <td style='background:gold;color:black;width:5%'>Dosage</td>
                     <td style='background:gold;color:black;width:5%'>ML/MG</td>
                     <td style='background:indigo;color:white;width:10%'>Quantity</td>

      
                     </tr>
                  ";
                  if(!$drugg== null){                    
                    

                    foreach ($allMedicines as $key => $value) {

                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black'>

                        <td style='border: 0.1pt solid black;width:100%'>{$value['name']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['dosage']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['ml']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['quantity']}</td>
                         </tr>
                         ";
                  }
                  $subTable = "$subTable </table>";

                  }else{

                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black'>

                        <td style='border: 0.1pt solid black;width:60%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                         </tr>
                         ";
                  
                    $subTable = "$subTable </table>";

                  }
                  



                   $vitalTable = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                        <th>Height</th>
                        <th>Pulse</th>
                        <th>Weight</th>
                        <th>Temp</th>
                        <th>BP</th>
                       


      
                     </tr>
                  ";

                 
                    $vitalTable = "$vitalTable <tr style='width:100%; background:white; border:2px solid black'>

                            <td>$height</td>
                            <td>$pulse</td>
                            <td>$weight</td>
                            <td>$temp</td>
                            <td>$bp</td>
                           
                         </tr>
                         ";
                
                  $vitalTable = "$vitalTable </table>";













                   $vital2Table = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                        <th>Gender</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th>Occupation</th>
                        <th>Religion</th>


      
                     </tr>
                  ";

                 
                    $vital2Table = "$vital2Table <tr style='width:100%; background:white; border:2px solid black'>

                            <td>$gender</td>
                            <td>$age</td>
                            <td>$date</td>
                            <td>$occupation</td>
                            <td>$religion</td>
                         </tr>
                         ";
                
                  $vital2Table = "$vital2Table </table>";














                  echo"
                <center><div class='wan'><br>
                    <div class='wann'>
                    <h3 style='padding-top:3%'>$name's Folder</h3>
                    <h3 style='margin-top:-2%'>Ward : $ward</h3>
                    <h3 style='margin-top:-2%'>Doctor: Dr. $doctor</h3>
                    <h3 style='margin-top:-2%'>Health-Status: Discharged</h3>
                    <div style='border-bottom:2px solid black'></div><br>




                    <div style='border:2px solid black' class='band'><br>

                <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Patient Vitals</th>
                </tr>
                <tr>
                   <td>$vitalTable</td>
                </tr>
                <tr>
                   <td>$vital2Table</td>
                </tr>
               </table>


               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Clinical History</th>
                </tr>
                <tr>
                   <td>$history</td>
                </tr>

               </table>



               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Diagnosis</th>
                   <th>Lab</th>
                </tr>
                <tr>
                   <td>$diagnosis</td>
                   <td>$lab</td>
                </tr>

               </table>



               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Drugs Prescribed</th>
                </tr>
                <tr>
                   <td>$subTable</td>
                </tr>
               </table><br>";





              echo "<a href='updatefolder.php?id=".$id." ' style='background:black;padding-top:5px;padding-bottom:5px; width:100%;color:white;text-decoration:none;padding-right:27px;padding-left:27px;border-radius:6px;'>Update</a>
               <a href='addmore.php?id=".$id." ' style='background:gold;padding-top:5px;padding-bottom:5px; width:100%;color:black;text-decoration:none;padding-right:15px;padding-left:15px;border-radius:6px;'>Add More</a>

               <br>
                    </div> 
                    

                

             </center>";

                                    
                  }           
               }  
             ?>
	 
     <!-- SELECT * FROM `consultation_annex_table` WHERE case_id=111 -->
     <!-- use this query to fetch newly added data and use the results to create the table -->
     <!-- replace 111 with the case_id or consultation table id -->

       <?php 

          
      if(isset($_GET["idd"])){
      $sen =$_GET['idd'];
      $queryy = "SELECT * FROM consultation_annex_table  WHERE case_id  ='$sen' ORDER BY update_date DESC";
     


          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
           
          $namez =$row['patient_name'];
          $history =$row['clinical_history'];
          $medicinename =$row['prescription'];
          $bp =$row['bp'];
          $diagnosis =$row['diagnosis'];
          $doctor =$row['doc_name'];
          $update_date =$row['update_date'];
          $results='naming ceremoney';
          $spo2 =$row['spo2'];
          

       $result =mysqli_query($connect, $queryy);



           if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient history yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)){
                  $id = $row['case_id'];
                  $name = $row['patient_name'];
                  $history = $row['clinical_history'];
                  $medicinename = $row['prescription'];
                  $diagnosis = $row['diagnosis'];
                  $lab =$row['labs'];
                  $doctor =$row['doc_name'];
                  $update_date =$row['update_date'];
                  $allMedicines = json_decode($medicinename, true);
                  $drugg =$row['prescription'];
                  $spo2 =$row['spo2'];
                  // loop through the medicines and use it to created the nested table
                  // you can style the table however you like

                  $subTable = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                     <tr border=0.1 >
                     <td style='background:black;color:white;width:4%'> Drug Name</td>
                     <td style='background:gold;color:black;width:5%'>Dosage</td>
                     <td style='background:gold;color:black;width:5%'>ML/MG</td>
                     <td style='background:indigo;color:white;width:10%'>Quantity</td>

      
                     </tr>
                  ";
                  if(!$drugg== null){                    
                    

                    foreach ($allMedicines as $key => $value) {

                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black'>

                        <td style='border: 0.1pt solid black;width:100%'>{$value['name']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['dosage']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['ml']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['quantity']}</td>
                         </tr>
                         ";
                  }
                  $subTable = "$subTable </table>";

                  }else{

                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black'>

                        <td style='border: 0.1pt solid black;width:60%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                        <td style='border: 0.1pt solid black;width:40%'>none</td>
                         </tr>
                         ";
                  
                    $subTable = "$subTable </table>";

                  }
                  



                   $vitalTable = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                        <th>SPO2</th>
                        <th>Pulse</th>
                        <th>Weight</th>
                        <th>Temp</th>
                        <th>BP</th>
                       


      
                     </tr>
                  ";

                 
                    $vitalTable = "$vitalTable <tr style='width:100%; background:white; border:2px solid black'>

                            <td>$spo2</td>
                            <td>$pulse</td>
                            <td>$weight</td>
                            <td>$temp</td>
                            <td>$bp</td>
                           
                         </tr>
                         ";
                
                  $vitalTable = "$vitalTable </table>";













                   $vital2Table = "<table style='width:100%;margin-left:0px' cellpadding =3 border=1 class='med'>

                        <th>Gender</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th>Occupation</th>
                        <th>Religion</th>


      
                     </tr>
                  ";

                 
                    $vital2Table = "$vital2Table <tr style='width:100%; background:white; border:2px solid black'>

                            <td>$gender</td>
                            <td>$age</td>
                            <td>$update_date</td>
                            <td>$occupation</td>
                            <td>$casecode</td>
                         </tr>
                         ";
                
                  $vital2Table = "$vital2Table </table>";














                  echo"
                <center><div class='wan'><br>
                    <div class='wann'>
                    

                    <div style='border:2px solid black' class='band'><br>

                <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Patient Vitals</th>
                </tr>
                <tr>
                   <td>$vitalTable</td>
                </tr>
                <tr>
                   <td>$vital2Table</td>
                </tr>
               </table>


               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Clinical History</th>
                </tr>
                <tr>
                   <td>$history</td>
                </tr>

               </table>



               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Diagnosis</th>
                   <th>Lab</th>
                </tr>
                <tr>
                   <td>$diagnosis</td>
                   <td>$lab</td>
                </tr>

               </table>



               <table style='width:75%;margin-left:-6px' cellpadding =3 border=2 class='med'>
                <tr>
                   <th>Drugs Prescribed</th>
                </tr>
                <tr>
                   <td>$subTable</td>
                </tr>
               </table><br>


               <a href='updatefolder.php?id=".$id." ' style='background:black;padding-top:5px;padding-bottom:5px; width:100%;color:white;text-decoration:none;padding-right:27px;padding-left:27px;border-radius:6px;'>Update</a>
               <a href='addmore.php?id=".$id." ' style='background:gold;padding-top:5px;padding-bottom:5px; width:100%;color:black;text-decoration:none;padding-right:15px;padding-left:15px;border-radius:6px;'>Add More</a>

               <br>
                    </div> 
                    

                

             </center>";
                  
                                    
                  } 
       
               }  
             ?>



	 </div>

     
</body>
</html>