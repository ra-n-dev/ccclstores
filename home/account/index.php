
 <?php 
    session_start();
    $uname= $_SESSION['account']; 
    include("../../db/connection.php");
    include("../header.php");



    if(isset($_POST['submit'])){
            $name= $_POST['casecode'];
            $query ="SELECT * FROM patient_table WHERE case_id = '$name' ";


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

           // echo"<script>alert('$permanent_id')</script>";


        //it can be this -- $casecode =$_POST['casecode']; or what i have done below--

            $_SESSION['caseid'] = $_POST['casecode'];

            $casecode= $_SESSION['caseid'];

            // echo"<script>alert('$casecode')</script>";


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




      if(isset($_POST['account'])){
        $todo =$_POST['category'];
        $category =$_POST['category'];
        $_SESSION['category'] = $category;



        if(empty($_POST['insurnumber'])){
            $insurnumb="No NHIS";
            $insur_price ="50.00";
            $insur_consult ="20.00";
           // echo"<script>alert('$insurnumb')</script>";
        }elseif($_POST['insurnumber']>0){
            $insurnumb=$_POST['insurnumber'];
            $insur_price ="30.00";
            $insur_consult ="15.00";
           // echo"<script>alert('$insurnumb')</script>";

        }else{
            $insurnumb="NHIS";
            $insur_price ="30.00";
            $insur_consult ="20.00";
           // echo"<script>alert('$insurnumb')</script>";


        }



        $_SESSION['insur_price']="$insur_price";
         $_SESSION['insur_consult_price']="$insur_consult";
        $_SESSION['insurance']="$insurnumb";

        if($todo ==='new-folder'){
            echo'<script>window.location.href="../account/folder.php"</script>';
          // echo'<script>alert("this is consultation and folder")</script>';
        }elseif($todo==='consultation'){
            //echo'<script>alert("this is consultation and folder payment")</script>';  
            echo'<script>window.location.href="../account/consult.php"</script>';
        }elseif($todo==='drug'){
            echo'<script>window.location.href="../account/drug.php"</script>';
           // echo'<script>alert("this is drugs payment")</script>';  
        }elseif($todo==='lab'){
            echo'<script>window.location.href="../account/lab.php"</script>';  
        }elseif($todo==='bills'){
            //echo'<script>alert("this is bills payment")</script>';
            echo'<script>window.location.href="../account/bill.php"</script>';  
        }else{
        echo"<script>alert('nothing found')</script>";

      }
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

   
    


    .pat{
        display: none;
        
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
        margin-right: 10%;
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
        margin-right: 40px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
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







    .docc2{
        background: white;
        height: 53vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        
    }
     .docc3{
        background: white;
        height: 60vh;
        width: 80%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        display: none;
        overflow-y: scroll;
        
    }
    .docc3 table{
        width: 100%;
        background: white;
    }
    .docc3 table .buut{
        background: green;
    }
    .docc3 table .butt{
        text-decoration: none;
        color: white;
        padding-left: 20%;

    }

    .docc2 .accountselect{
        margin-top: 4%;
        width:40%;
        height:5vh;
    }
    .docc3 .accountselect{
        margin-top: 4%;
        width:40%;
        height:5vh;
    }
    center .docc2 form .sub{
        margin-top: 30px;
        margin-left: -15%;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }

    center .docc3 form .sub{
        margin-top: 30px;
        margin-left: -15%;
        width: 30%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;
    }
 
    .docc2 h2{
        padding-top: 30px;
        font-size: 27px;
    }
    .docc3 h2{
        padding-top: 30px;
        font-size: 27px;
    }
     .cf{
        background: white;
        height: 30vh;
        width: 40%;
     }





    .sss{
        background: white;
        width: 150px;
        height: 50px;
        margin-top: -3%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        box-shadow: 5px 5px 15px, -5px -5px 15px #fff;
        border-radius: 25px;
    }
    input{
        height: 50px;
        width: 150px;
        appearance: none;
        position: absolute;
        z-index: 1;
        outline: none;
    }
    label{
        height: 30px;
        width: 60px;
        box-shadow: inset 5px 5px 15px, inset -5px -5px 15px #fff;
        border-radius: 15px;
        position: relative;
    }

    .menz input{
        width: 39%;
        height: 30px;
        margin-left:30%;
        margin-top: 2%;
        display: flex;
        border: 1px solid gray;
    }

    label::after{
        content: "";
        position: absolute;
        height: 30px;
        width: 30px;
        box-shadow: 1px 1px 3px, 
           -1px -1px 3px #fff;
        border-radius:50%;
        background: lightgray;
        left: 0;
        transition: all 0.5 ease;
    }
    input:checked ~ label::after{
        left: 30px;
    }
    input:checked ~ span{
        color: green;
    }




    @media  (max-width:900px){
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 98.5vh;
    }


    .design{
        background: #95A5A6;
        width: 67%;
        margin-left: 17.5%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 15%;
    }
    .docc2{
        background: white;
        height: 55vh;
        width: 85%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 20%;
        margin-left: -1%;

        
    }
    .docc2 .accountselect{
        width:50%;
        height:5vh;
    }


    center .docc2 form .sub{
        margin-top: 20px;
        margin-left: -19%;
        width: 35%;
        height: 30px;
        background: #A04000;
        border: #A04000;
        color: white;
        border-radius: 5px;

    }
    .menz input{
        width: 48%;
        height: 30px;
        margin-left:25%;
        margin-top: 2%;
        display: flex;
        border: 1px solid gray;
    }
     
    .shata{
        width: 100%;
        margin-top: -7%;
    }

    .pat form .search .sub2{
      height: 34px;
      margin-left: 40%; 
       margin-right: 0%;
       width: 30%;
       border-radius: 5px;
       background: #2E4053;
    }

      
    .do nav{
         margin-left: 1%;   
        margin-right: 1%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;
        width: 98%;

    }
     nav li {
        margin-right: 20px;
        float: left;
      }



    }    

</style>
<body>


     <div class="do">
        
        <center >
            <nav>
            <ul>
                <li><a id="newcase" href="../account/index.php">Receive-Cash</a></li>
                <li><a  href="../account/expenses.php">Requested-Expenses</a></li>
                <li><a  href="../account/accountexp.php">Make-Expenses</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>

    <center>
        <div class="docc2" id="docc2">
        
       
          <form method='POST' enctype='multipart/form-data'>
            <h2> Account's Portal </h2>
             <h3>TO DO TASK</h3><br>

             <div class="sss" onclick="myFunction()">
               <input type="checkbox" name="" >
               <span>Insurance</span>
               <label></label>
             </div>

             <div class="menz" id="infos">
             </div>
             <select class="accountselect" id="wardselected" name="category" style="">
                 <option value="new-folder">Folder & Consultation</option>
                 <option value="consultation">Consultation </option>
                 <option value="lab">Review</option>
                 <option value="lab">Lab</option>
                 <option value="scan">Scan</option>
                 <option value="drug">Drug</option>
                 <option value="bills">Bills</option>
             </select><br>
             
             <input class='sub' type='submit' name='account'>  
          </form>
       </div>
          
       
    </center>


    
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
                  $patient_name = $row['patient_name'];
                  $visit_date = $row['update_date'];
                  $lab_status =$row['lab_payment_status'];
                  $labs =$row['labs'];
                  $numb =$row['idd'];

     //Beginning of code for subtable as a variable
                
             $Request=explode(',', $row['labs']);//exploding the coma separated user email to make array of user email

                 $tttable= "<table border=1 style='width:100%'><tr><th>Request</th><th>Payment Status</th></tr>";
                 for($i=0;$i<count($Request);$i++){

                 $tttable= "$tttable <tr>";
                 $tttable="$tttable <td>".$Request[$i]."</td>"; //display user name
                 $tttable="$tttable <td>$lab_status</td>";
                 $tttable="$tttable </tr>";        
                }
                $tttable="$tttable</table>";

   //End of code        
            


                     echo"<div class='design'>

                      <h3>Classic Care Clinic  Accounts Portal</h3>

                      <table class='shata'>
                       <tr class='wendy'>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Request</th>
                       </tr>
                       <tr class='shay'>
                        <td>$numb.</td>
                        <td>$visit_date</td>
                        <td>$patient_name</td>
                        <td>$tttable</td>


                      </table>

                      <button>Done</button>

                      </div><br>";

               }
    
       }else{

         $searchkey="";
           echo "
            <div class='pharm2'>
                <div class='pharm3'>

                <h2>Account Section</h2>
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

     <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
       $("#expenses").click(function () {
       $("#docc2").css("display", "none");
       $("#docc3").css("display","block");
       
      });

       $("#newcase").click(function () {
       $("#docc3").css("display", "none");
       $("#docc2").css("display","block");
       
      });
   </script>

  <script type="text/javascript">
    var clicked = 0;
    function myFunction() {
    if(clicked == 0 ) {
    document.getElementById("infos").innerHTML = "<div class='menz'><input type='text' name='insurnumber' placeholder='Enter Insurance Number'></div><br><br>";
    clicked = 1;
    }else {
      document.getElementById("infos").innerHTML = "";
      clicked = 0;
   }
  }
</script>


</body>
    
</html>
