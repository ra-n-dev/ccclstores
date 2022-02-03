
 <?php 
    session_start();
    $uname= $_SESSION['doctor']; 
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
            $query ="SELECT * FROM patient_table WHERE patient_perm_id = '$name' ";


            $result =mysqli_query($connect, $query);
            $row =mysqli_fetch_array($result);
            $patient_name = $row['name'];
            $permanent_id = $row['patient_perm_id'];
            $case_id =$row['case_id'];

            echo"<script>alert('$permanent_id')</script>";


        //it can be this -- $casecode =$_POST['casecode']; or what i have done below--

           // $_SESSION['caseid'] = $_POST['casecode'];
            $_SESSION['permanent_id'] = $_POST['casecode'];

            $casecodes= $_SESSION['permanent_id'];

             echo"<script>alert('$casecodes')</script>";


            if($casecodes ===$permanent_id){
            echo "<html><script> window.location.href='patient_folder2.php?$casecodes=".$row['name']."';</script></html>";

         
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
    <title>doctor section</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
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
    }
    .docc2{
        background: white;
        height: 50vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
    }
    .docc3{
        background: white;
        height: 50vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        display: none;
    }
    .docc2 h2{
        padding-top: 30px;
        font-size: 27px;
    }

    .docc3 h2{
        padding-top: 30px;
        font-size: 27px;
    }
    .docc1{
        margin-bottom: 0%;
    }
    .docc1 h2{
        padding-top: 8%;
    }
    center .docc2 form input{
        margin-top: 20px;
        width: 60%;
        height: 30px;
    }
    center .docc2 form .sub{
        margin-top: 30px;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }
    center .docc2 form label{
        font-size: 18px;
    }


    center .docc3 form input{
        margin-top: 20px;
        width: 60%;
        height: 30px;
    }
    center .docc3 form .sub{
        margin-top: 30px;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }
    center .docc3 form label{
        font-size: 18px;
    }

    .do nav{
        margin-right: 5%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }

 </style>
 <body>
    <div class="do">
        
        <center>
            <nav>
            <ul>
                <li><a id="newcase" href="#">New-Case</a></li>
                <li><a id="pfolder" href="#">Patient-Folder</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div>
    <div class="docc1">
        <h2 style="color:transparent;">Thus</h2>
    </div>
    <center>
      <div class="docc2" id="docc2">
        <h2>Start A New Case </h2>
       
          <form method='POST' enctype='multipart/form-data'>
             <label>Patient Unique Case ID</label><br>
             <input type='text' name='casecode' require><br>
             <input class='sub' type='submit' name='submit'>  
          </form>
       </div>

       <div class="docc3" id="docc3">
        <h2>Find Patient Folder </h2>
       
          <form method='POST' enctype='multipart/form-data'>
             <label>Patient Permanent ID</label><br>
             <input type='text' name='casecode' require><br>
             <input class='sub' type='submit' name='submitfol'>  
          </form>
       </div>
     </center>  

     <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
       $("#pfolder").click(function () {
       $("#docc2").css("display", "none");
       $("#docc3").css("display","block");
       
      });

       $("#newcase").click(function () {
       $("#docc3").css("display", "none");
       $("#docc2").css("display","block");
       
      });
   </script>
 </body>
 </html>