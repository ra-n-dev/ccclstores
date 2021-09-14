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
       $queryy = "SELECT * FROM patienthistory  WHERE name  ='$name' ORDER BY  visitdate desc";
          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $name =$row['name'];
        
       $result =mysqli_query($connect, $queryy);
     }
    ?>
   <h3 class="wawa"><?php echo"$name's Folder" ?></h3>


	 <div class="pahistory">
	  <?php 
	  if(isset($_GET['id'])){
          $name =$_GET['id'];
       $queryy = "SELECT * FROM patienthistory  WHERE name  ='$name' ORDER BY  visitdate desc";
      

          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $doctor =$row['doctor'];
          $name =$row['name'];
          $history =$row['history'];
          $diagnosis =$row['diagnosis'];
          $prescription =$row['prescription'];
          $date =$row['visitdate'];
          $ward =$row['ward'];
          $healthstatus =$row['healthstatus'];
          

       $result =mysqli_query($connect, $queryy);


        echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
        <tr border=0.1 >
           <td style='background:#3090C7;color:white;width:10%'>Doctor's Name</td>
           <td style='background:#3090C7;color:white;width:10%'>Paitent Name</td>
           <td style='background:#3090C7;color:white;width:15%'>Patient's Medical History</td>
           <td style='background:#3090C7;color:white;width:10%'>Medical Diagnosis</td>
           <td style='background:#3090C7;color:white;width:5%'>Drugs Prescribed</td>
           <td style='background:#3090C7;color:white;width:10%'>Date of Visit</td>
           <td style='background:#3090C7;color:white;width:10%'>Patient-Ward</td>
           <td style='background:#3090C7;color:white;width:10%'>Health-Status</td>

      
        </tr>
     ";

           if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient history yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
     	          $doctor = $row['doctor'];
                  $name = $row['name'];
                  $history = $row['history'];
                  $diagnosis = $row['diagnosis'];
                  $prescription = $row['prescription'];
                  $date = $row['visitdate'];
                  $ward =$row['ward'];
                  $healthstatus=$row['healthstatus'];
                  
     	                 echo "<tr>
     	                <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>Dr.$doctor</td>

                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$name</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$history</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$diagnosis</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$prescription</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$date</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$ward</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$healthstatus</td>
                        ";
                                                 
                        echo" </td>
                    </tr>";                        
                  }           
                 echo"</table>";
               }  
             ?>
	 	
         <h3>Patient History is Here!!! <?php echo"$name,$date " ?></h3>
	 	<?php 
         if(isset($_GET['id'])){
          $id =$_GET['id'];
          $query = "SELECT * FROM patientvital WHERE name ='$name' ";
          $res =mysqli_query($connect, $query);
          $row =mysqli_fetch_array($res);
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
          $phone =$row['phone'];
          $relative_phone = $row['relative_phone'];
          $occupation =$row['occupation'];
          $placeofbirth = $row['placeofbirth'];
          $nationality =$row['nationality'];
          $religion = $row['religion'];
          $dob =$row['dob'];
          $history=$row['history'];


          echo "<table  cellpadding =3 border=4  class='cnt'>
            <tr>
              <th style='color:red;background:white'>Data Required </th>
              <td style ='color:red;font-size: 18px;background:white'>Patient Vitals</td>
              <th style='color:red;background:white'>Patient History </th>
              <td style ='color:red;font-size: 18px;background:white'>$id</td>
            </tr>
            <tr>
              <th>Name </th>
              <td>$name</td>

            </tr>
            <tr>
              <th>First Visit </th>
              <td>$date</td>
            </tr>
            <tr>
              <th>Age </th>
              <td>$age</td>
            </tr>
            <tr>
              <th>Gender </th>
              <td>$gender</td>
            </tr>
            <tr>
              <th>Occupation </th>
              <td>$occupation</td>
            </tr>
            <tr>
              <th>Nationality </th>
              <td>$nationality</td>
            </tr>
            <tr>
              <th>Religion </th>
              <td>$religion</td>
            </tr>
             <tr>
              <th>Pulse </th>
              <td>$pulse</td>
            </tr>
             <tr>
              <th>Temperature </th>
              <td>$temp</td>
            </tr>
             <tr>
              <th>Blood Pressure </th>
              <td>$bp</td>
            </tr>
             <tr>
              <th>Weight </th>
              <td>$weight</td>
            </tr>
             <tr>
              <th>Height </th>
              <td>$height</td>
            </tr>
          
         
      
     ";
         }
         echo"</table>";
      
       

     ?>
     <h3>Patient History is Here!!! <?php echo"$name,$date " ?></h3>
	 </div>



 
</body>
</html>