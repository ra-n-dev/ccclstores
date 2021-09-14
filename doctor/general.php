<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient History</title>
</head>
<style type="text/css">
	.pahistory{
      margin-left: 218px;
      height: 90vh;
      width: 82.8%;
      overflow-y: scroll;
	  overflow-x: hidden;
    margin-top: -19px;

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
  .wawa{
    background:#3090C7;
    text-align: center;
    height: 40px;
    margin-top: 1px;
    border-left: solid 1px white;
    border-right: solid 1px white;
    margin-left: 218px;
    color: beige;
    padding-top: 10px;
  }

</style>
<body>
	<?php 
	include("../db/connection.php");
	include("../include/header.php");
	include("sidenav.php");
	$doc=$_SESSION['doctor'];
   
	 ?>


   <?php 
      if(isset($_GET['id'])){
       $name =$_GET['id'];
       $queryy = "SELECT * FROM drugs  WHERE patient_name  ='$name'";
          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $name =$row['patient_name'];        
       $result =mysqli_query($connect, $queryy);
     }
    ?>
   <h3 class="wawa"><?php echo"$name's Folder" ?></h3>


	 <div class="pahistory">
	  <?php 
	  if(isset($_GET['id'])){
          $name =$_GET['id'];
       $queryy = "SELECT * FROM drugs  WHERE patient_name  ='$name' ORDER BY visit_date DESC";
      

          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $name =$row['patient_name'];
          $history =$row['history'];
          $medicinename =$row['medicinename'];
          $ward =$row['ward'];
          $diagnosis =$row['diagnosis'];
          $healthstatus=$row['healthstatus'];
          $doctor =$row['doctor'];
          $visit_date =$row['visit_date'];
          

       $result =mysqli_query($connect, $queryy);


        echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
        <tr border=0.1 >
           <td style='background:#3090C7;color:white;width:10%'>Date Attendend</td>
           <td style='background:#3090C7;color:white;width:10%'>Doctor</td>
           <td style='background:#3090C7;color:white;width:15%'>Patient's Medical History</td>
           <td style='background:#3090C7;color:white;width:10%'> Prescription</td>
           <td style='background:#3090C7;color:white;width:5%'>Diagnosis</td>
           <td style='background:#3090C7;color:white;width:10%'>Health Status</td>
           <td style='background:#3090C7;color:white;width:10%'>Ward</td>

      
        </tr>
     ";

           if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient history yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
                  $name = $row['patient_name'];
                  $history = $row['history'];
                  $medicinename = $row['medicinename'];
                  $diagnosis = $row['diagnosis'];
                  $healthstatus = $row['healthstatus'];
                  $ward =$row['ward'];
                  $doctor =$row['doctor'];
                  $visit_date =$row['visit_date'];
                  $allMedicenes = json_decode($medicinename, true);
                  
                  // loop through the medicines and use it to created the nested table
                  // you can style the table however you like
                  $subTable = "<table style='width:104%;margin-left:-6px'>

                     <tr border=0.1 >
                     <td style='background:black;color:white;width:10%'> Medincine</td>
                     <td style='background:gold;color:black;width:5%'>Dosage</td>
                     <td style='background:indigo;color:white;width:10%'>Quatity</td>

      
                     </tr>
                  ";

                  foreach ($allMedicenes as $key => $value) {
                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black'>

                        <td style='border: 0.1pt solid black;width:60%'>{$value['name']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['dosage']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['quantity']}</td>
                         </tr>
                         ";
                  }
                  $subTable = "$subTable </table>";
                  
     	                 $table= "<tr>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$visit_date</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>Dr.$doctor</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$history</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$subTable</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$diagnosis</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$healthstatus</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$ward</td>
                        ";
                                                 
                        echo"$table </td>
                    </tr>";                        
                  }           
                 echo"</table>";
               }  
             ?>
	 
	 </div>



 
</body>
</html>