
 <?php 
   
    session_start();
    $uname= $_SESSION['pharmacist']; 
    include("../../db/connection.php");
    include("../header.php");



    if(isset($_POST['submit'])){
            $name= $_POST['casecode'];
            $query ="SELECT * FROM patient_table WHERE case_id LIKE '%$name%' ";


            $result =mysqli_query($connect, $query);
            $row =mysqli_fetch_array($result);
            $patient_name = $row['name'];
            $case_id =$row['case_id'];


        //it can be this -- $casecode =$_POST['casecode']; or what i have done below--

            $_SESSION['caseid'] = $_POST['casecode'];

            $casecode= $_SESSION['caseid'];


            if($casecode ===$case_id){
         
            ?>
              <script>window.location.href="../doctor/consultation.php"</script>
            <?php

             }else{
                echo"<script>alert('Patient is not recognised, used correct case id')</script>";
            }

           }else{

           $searchkey="";
           

      }
    
    if(isset($_POST['submitfol'])){
            $name= $_POST['casecode'];
            $query ="SELECT * FROM patient_table WHERE case_id LIKE '%$name%' ";


            $result =mysqli_query($connect, $query);
            $row =mysqli_fetch_array($result);
            $patient_name = $row['name'];
            $permanent_id = $row['patient_p_id'];
            $case_id =$row['case_id'];

            echo"<script>alert('$permanent_id')</script>";


        //it can be this -- $casecode =$_POST['casecode']; or what i have done below--

            $_SESSION['caseid'] = $_POST['casecode'];

            $casecode= $_SESSION['caseid'];

             echo"<script>alert('$casecode')</script>";


            if($casecode ===$case_id){
            echo "<html><script> window.location.href='patient_folder.php?$casecode=".$row['name']."';</script></html>";

         
            ?>
            <?php

             }else{
                echo"<script>alert('Patient is not recognised, used correct case id')</script>";
            }

           }else{

           $searchkey="";
           

      }



 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <title>lab section</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
 </head>
 <style type="text/css">
   
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 95vh;
    }

    .pharm1 h2{
        color: #6E2C00;
        font-size: 30px;
        background: white;
        width: 40%;
        padding-left: 20%;

    }
   
    .pharm2{
        background: white;
        height: 33vh;
        width: 45%;
        border-radius: 20px;
        margin-left: 30%;
        margin-right: 20%;
        opacity: 0.8;
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
        border-radius: 20px;
        opacity: 0.8;

    }
    .pat form .search .sub1{
      margin-left: 25%; 
       margin-right: 25%; 
      width:50%;
      height: 28px;
      margin-bottom: 10px;
    }
   .pat form .search .sub2{
      width: 15%;
      height: 34px;
      margin-left: 40%; 
       margin-right: 45%;
       border-radius: 5px;
       background: #2E4053;
    }


    .pat form .search .sub22{
      width: 20%;
      height: 34px;
      margin-left: 40%; 
       margin-right: 45%;
       border-radius: 5px;
       background: #2E4053;
    }
    .tabel1{
     margin-top: 0vh;
    
  
    }
    .som{
        height: 5vh;
    }
    /*table{
        display: block;
        width: 71%;
        margin-left: 15%;
        margin-right: 15%;
        background: white;
        opacity: 0.8;
        overflow-x: hidden;
        height: 38.2%;
        position: relative;

    }
    */
    .complete {
        margin-top: 20px;
        text-align: center;
        margin-left: 4%;
    }
    .complete a{
        padding-top: 10px;
        background: green;
        padding-bottom: 10px;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 5px;
        text-decoration: none;
        color: white;

    }

    .do nav{
        margin-right: 12%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }
    .do{
        margin-top:2% ;
    }

      nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 70px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }
    .pharm2 .pharm3 h2{
        margin-top: 10%;
        padding-left: 32%;
        padding-top: 2%;
    }

    .design{
        background: #D7DBDD;
        width: 52%;
        margin-left: 23%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 5%;
    }
    .design h3{
        width: 99.6%;
        margin-left: 0.2%;
        padding-top: 3%;
        background: #95A5A6;
        height: 7vh;
        text-align: center;
        color: black;
    }







    .shata{
        width: 100%;
        margin-top: -2.8%;
    }
    .wendy {
        width: 100%;
        background:  black;
    }
    .wendy th{
        color: white;
    }
    .shay{
        background: #F0F3F4;
    }
    .shayb{
        background: ;
    }
    button{
        margin-left: 41%;
        width: 17%;
        margin-top: 2%;
        margin-bottom: 2%;
        background: green;
        height: 4vh;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }



    @media  (max-width:900px){
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 100vh;
    }


    .design{
        background: #95A5A6;
        width: 67%;
        margin-left: 17.5%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 15%;
    }
     
    .shata{
        width: 100%;
        margin-top: -7%;
    }



    .pharm2{
        margin-top: 20%;
        background: white;
        height: 33vh;
        width: 60%;
        border-radius: 20px;
        margin-left: 20%;
        margin-right: 20%;
        opacity: 0.8;
    }
     .pharm2 .pharm3 h2{
        margin-top: 10%;
        padding-left: 17%;
        padding-top: 2%;
    }

    


    .pat form .search .sub2{
      height: 34px;
      margin-left: 40%; 
       margin-right: 0%;
       width: 30%;
       border-radius: 5px;
       background: #2E4053;
    }

    nav li {
        margin-right: 30px;
      }

      .do nav{
        margin-right: 16%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }



    }    

</style>
<body>


     <div class="do">
        
        <center >
            <nav>
            <ul>
                <li><a id="newcase" href="#">New-Case</a></li>
                <li><a id="pfolder" href="#">Patient-Folder</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>

   

    
   <div class="pat">

      <?php 
      
     if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        $query ="SELECT * FROM consult_neutral_table WHERE unique_code LIKE '%$searchkey%' ";

        $result =mysqli_query($connect, $query);

        //try this work flow. once the doctor does first consultation, save data into consultation table and neutral table. any new vitals and consutation on same case should go to consultation annex and now update the neutral table. in this case pharmacy and lab should fetch data from updated neutral table.

         echo"<div class='som'></div> ";
     
     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No lab request for this patient</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
                  $numb =$row['idd'];
                  $patient_name = $row['patient_name'];
                  $visit_date = $row['update_date'];
                  $medicinename = $row['prescription'];

                  $allMedicenes = json_decode($medicinename, true);

     //Beginning of code for subtable as a variable
                  $subTable = "<table class='tt' style='width:100%;margin-left:0px;' border 1px solid black, cellpadding=0 cellspacing='1' >

                     <tr border=0 >
                     <th style='width:10%;'> Medincine</th>
                     <th style='width:5%;'>Dosage</th>
                     <th style='width:10%;'>Quatity</th>

      
                     </tr>
                  ";

                  foreach ($allMedicenes as $key => $value) {
                    $subTable = "$subTable <tr style='width:100%; background:white; border:2px solid black' >

                        <td style='border: 0.1pt solid black;width:60%'>{$value['name']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['dosage']}</td>
                        <td style='border: 0.1pt solid black;width:40%'>{$value['quantity']}</td>
                         </tr>
                         ";
                  }
                  $subTable = "$subTable </table>";

   //End of code        
            


                     echo"<div class='design'>

                      <h3>Welcome to Classic Care Clinic  Pharmacy Portal</h3>

                      <table class='shata'>
                       <tr class='wendy'>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Prescription</th>
                       </tr>
                       <tr class='shay'>
                        <td>$numb.</td>
                        <td>$visit_date</td>
                        <td>$patient_name</td>
                        <td>$subTable</td>


                      </table>

                      <button>Done</button>

                      </div><br>";

               }
    
       }else{

         $searchkey="";
           echo "
            <div class='pharm2'>
                <div class='pharm3'>

                <h2>Despensary Section</h2>
               </div>
                <h3>Search Patient by unique codes</h3>
             <form method='POST' enctype='multipart/form-data'>
                <div class='search'>
                  <input class='sub1' type='text' name='search' placeholder='Search Patient by Name' value='$searchkey' required>
                  <input class='sub2' type='submit' name='action' style='color: white;  border: 1px green;width:20%'>
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
