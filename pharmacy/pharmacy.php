<?php 
 session_start();
 include("header.php"); 
 include("../db/connection.php");
    
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pharmacy</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">
</head>
<style type="text/css">
    body{
        margin: 0;
        padding: 0;
        background: #EBEDEF;
        width: 100%;
    }
    .pharm1 h2{
        text-align: center;
        color: #6E2C00;
        font-size: 30px;
    }
    .pharm1 h3{
        text-align: center;
        color: black;
        font-size: 18px;

    }
    .pharm2{
        background: white;
        height: 30vh;
        width: 60%;
        border-radius: 20px;
        margin-left: 20%;
        margin-right: 20%;
    }
    .pharm2  h3{
        padding-top: 2%;
        text-align: center;
    }
    .pharm2 form{
        align-items: center;
       
    }
    .pharm2 form input{
        height: 24px;
    }


    .pat{
    }
    .pat h3{
        
    }
    .pat form .search{
        background: white;
    }
    .pat form .search .sub1{
      margin-left: 25%; 
       margin-right: 25%; 
      width:50%;
      height: 28px;
      margin-bottom: 10px;
    }
   .pat form .search .sub2{
      width: 10%;
      height: 34px;
      margin-left: 45%; 
       margin-right: 45%;
       width: 10%;
       border-radius: 5px;
       background: #2E4053;
    }
    .tabel1{
     margin-top: 30vh;
  
    }
    .som{
        height: 5vh;
    }
    table{
        display: block;
        width: 70%;
        margin-left: 15%;
        margin-right: 15%;
    }
    .complete {
        margin-top: 20px;
        text-align: center;
    }
    .complete a{
        padding-top: 10px;
        background: #2E4053;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
    }

</style>
<body>
    <div class="pharm1">

        <h2>Pharmacist's Section</h2>
        <h3>Pharmacist: Mr. Albert Kumson</h3>
    </div>
   

    
   <div class="pat">

      <?php 
      
     if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        $query ="SELECT * FROM drugs WHERE uniquecode LIKE '%$searchkey%' ";


        $result =mysqli_query($connect, $query);
          echo "
             <div class='pharm2'>
             <h3 style='color:#A04000'>Search Patient by unique codes</h3>
             <form method='POST' enctype='multipart/form-data'>
             <div class='search'>
             <input class='sub1' type='text' name='search' placeholder='Search Patient by Name' value='$searchkey'require>
             <input class='sub2' type='submit' name='action' style=' color: white; border: 1px green;'>
             </div>
       
             </form>
             </div>

             ";
         echo"<div class='som'></div> ";

         echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
             <tr border=0.1>
                <td style='background:#DC7633 ;color:white'>Pateint Name</td>
                <td style='background:#5D6D7E;color:white'>Visit Date</td>
                <td style='background:#DC7633 ;color:white'>Drugs Prescribed</td>
                <td style='background:#5D6D7E;color:white'>Payment Status</td>
      
              </tr>

      
            ";

     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No drugs prescribed for this patient</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
                  $patient_name = $row['patient_name'];
                  $visit_date = $row['visit_date'];
                  $medicinename = $row['medicinename'];
                  $drug_status =$row['drug_status'];

                  $allMedicenes = json_decode($medicinename, true);
              
                  $subTable = "<table style='width:104%;margin-left:-6px'>

                     <tr border=0.1 >
                     <td style='color:black;width:10%'> Medincine</td>
                     <td style='color:black;width:5%'>Dosage</td>
                     <td style='color:black;width:10%'>Quatity</td>

      
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

                         echo "<tr>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px;width:30% '>$patient_name</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px;width:30% '>$visit_date</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; width:30%'>$subTable</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; 10% '>$drug_status</td>
                        ";             
                         echo" </td>

                      </tr>";
                       
               }
                
            echo"</table>";

            echo"<div class='complete'>

                <a href='#'>Complete</a>
         </div>
      ";

     }else{

        $searchkey="";
          echo "
            <div class='pharm2'>
                <h3>Search Patient by unique codes</h3>
             <form method='POST' enctype='multipart/form-data'>
                <div class='search'>
                  <input class='sub1' type='text' name='search' placeholder='Search Patient by Name' value='$searchkey' required>
                  <input class='sub2' type='submit' name='action' style='color: white;  border: 1px green;'>
                </div>
       
      </form>
      </div>

     ";
     echo"<div class='som'></div> ";

     }
    
             // echo $output;

             ?>

   
   </div>


</body>
    
</html>
