
 <?php 
    session_start();
    $uname= $_SESSION['account']; 
    include("../../db/connection.php");
    include("../header.php");

    if(isset($_POST['back'])){
        echo'<script>window.location.href="../account/index.php"</script>';
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
        margin-right: 14%;
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
    .shayy{
        height: 10vh;
        background: #F0F3F4;
    }
    .shayb{
        background: ;
    }
   .beads{
        margin-left: 41%;
        width: 17%;
        margin-top: 2%;
        margin-bottom: 2%;
        background: #273746;
        height: 5vh;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }






    .docc2{
        background: white;
        height: 40vh;
        width: 50%;
        opacity: 0.8;
        border-radius: 6px;
        position: relative;
        margin-top: 5%;
        
    }

    .docc2 .accountselect{
        width:40%;
        height:5vh;
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
 
    .docc2 h2{
        padding-top: 30px;
        font-size: 27px;
    }
     .cf{
        background: white;
        height: 30vh;
        width: 40%;
     }
     .din h4{
        background:  white;
        margin-left: 0%;
        height: 5vh;
        padding-top: 3%;
        padding-left:19%;
        margin-top: -0.3%;
        border: solid 3px #ABB2B9;
        color: black;
     }


    @media  (max-width:900px){
   body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 95vh;
    }
    nav li {
        margin-right: 30px;
      }

    .design{
        background: #95A5A6;
        width: 93%;
        margin-left: 4.5%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 15%;
    }
     .beads{
        margin-left: 38%;
        width: 25%;
        margin-top: 2%;
        margin-bottom: 2%;
        background: #273746;
        height: 5vh;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }
    .din h4{
        background:  white;
        margin-left: 0%;
        height: 5vh;
        padding-top: 3%;
        padding-left:0%;
        margin-top: -0.3%;
        border: solid 3px #ABB2B9;
        color: black;
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
        margin-right: 22%;
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
                <li><a id="pfolder" href="#">In-Patient</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>
      
   <div class="pat">



      <?php 
      
     if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        $_SESSION['searchkey'] =$_POST['search'];
        $query ="SELECT * FROM consult_neutral_table WHERE case_id ='$searchkey' ";

        $result =mysqli_query($connect, $query);

        //try this work flow. once the doctor does first consultation, save data into consultation table and neutral table. any new vitals and consutation on same case should go to consultation annex and now update the neutral table. in this case pharmacy and lab should fetch data from updated neutral table.

         echo"<div class='som'></div> ";
     
     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No lab request for this patient</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {


        echo" <form method='POST' enctype='enctype/form-data' action='labb.php'>";
                  $patient_name = $row['patient_name'];
                  $visit_date = $row['update_date'];
                  $lab_status =$row['lab_payment_status'];
                  $labs =$row['labs'];
                  $numb =$row['idd'];

                  // echo"<script>alert('$labs')</script>";

     //Beginning of code for subtable as a variable


                
             $request=explode(',', $row['labs']);//exploding the coma separated user email to make array of user email
                if($lab_status ==="not paid"){

                

                 $tttable= "<table border=1 style='width:100%'><tr><th>Lab Name</th><th>Price</th></tr>";
                 $sum =0;

                 for($i=0;$i<count($request);$i++){

                    $vaa =$request[$i];

                    $querrry =" SELECT * FROM labs_table WHERE lab_name = '$vaa' LIMIT 1";
                        $rrr = mysqli_query($connect, $querrry);         
                        $row = mysqli_fetch_array($rrr);
                        $price =$row['cost'];
                        $sum =$sum +$price;

                        $_SESSION['cost']=$sum;
                        

                 $tttable= "$tttable <tr>";
                 $tttable="$tttable <td>".$request[$i]."</td>"; //display user name
                 $tttable="$tttable <td>$price</td>";
                 $tttable="$tttable </tr>";  



                }

                $tttable="$tttable</table>";
                 $tttable = "$tttable  <div class='din'><h4>Total Amount to Pay:   GHC $sum.00</h4></div> ";

                 echo"<div class='design'>
                    

                      <h3>Classic Care Clinic  Accounts Portal</h3>

                      <table class='shata'>
                       <tr class='wendy'>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Lab Request</th>
                       </tr>
                       <tr class='shay'>
                        <td>$patient_name</td>
                        <td>$visit_date</td>
                        <td>$tttable</td>


                      </table>

                      <input type='submit' value ='Receive Cash' class='beads' name='receive'>

                     

                      </div><br>";  


            }elseif($lab_status ==="paid"){
                



                 echo"<div class='design'>
                    

                      <h3>Classic Care Clinic  Accounts Portal</h3>

                      <table class='shata'>
                       <tr class='wendy'>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Lab Request</th>
                       </tr>
                       <tr class='shayy'>
                       <td>$patient_name</td>
                       <td>$visit_date</td>
                        <td>No lab request</td>


                      </table>

                      <input type='submit' value ='Back' class='beads' name='back'>

                     

                      </div><br>";  

            
               
            }



   //End of code        
            


                     

               }

               echo" </form>";
    
       }else{

         $searchkey="";
           echo "
            <div class='pharm2'>
                <div class='pharm3'>

                <h2>Account Section</h2>
               </div>
                <h3>Search Patient's Lab by unique code</h3>
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
