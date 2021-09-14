

<?php 
 session_start();

  include("../db/connection.php");
  include("../include/header.php");
  include("sidenav.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <link rel="stylesheet" type="text/css" href="../mselect/chosen.min.css">

   

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
  <title>dynamic field</title>
</head>
<style type="text/css">
  .cont{
    margin-left: 220px;
  }
  form{
    background: beige;
    width: 98%;
  }
  .tablehead{
    border: 1px solid #000;
    margin-top: 0.5%;
    width: 99.3%;
  }
  .tablehead input{
    width: 97%;
  }

  .vitals{
    height: 288px;
    width: 30.9%;
    margin-left: 0%;
    margin-top: 2%;
  }
  .diagnosis{
    background: transparent;
    height: 372px;
    width: 32.1%;
    margin-top: -29.6%;
    margin-left: 67.2%;
  }
  select{
    width: 318px;
    margin: 10px;
  }
 .phase1{
  margin-left: 33.2%;
  margin-top: -29%;
  height:286px ;
 }
 .phase1 textarea{
  height: 327px;
 }
 .cnt{
  width: 107%;
 }
  
  .ward select{
    height: 30px;
    margin-top: 10px;
  }
  .status select{
    height: 30px;
    margin-top: 10px;
  }
  .diag{
    margin-top: 15px;
    height: 40%;
    background:transparent;
    border: 2px solid black;
    padding-left:5px ;
  }
  .ward{
     height: 28.8%;
     background: transparent;
     border: 2px solid black;
     padding-left:5px ;
  }
  .status{
    height: 30%;
    background: transparent;
    border: 2px solid black;
    padding-left:5px ;
  }

  .cont::-webkit-scrollbar-track {
     -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 20px;
      width: 15px;
      background-color: white;
  }

    .cont::-webkit-scrollbar {
     width: 8px;
     background-color: #F5F5F5;
  }

   .cont::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 5%;
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, .3);
    background-color: grey;
  }

  .cont::-webkit-scrollbar-button {
   height: 50px;
  }

</style>
<body>
  <div class="cont">
    <form class="insert-form" id="insert_form" method="post" action="" >
      <hr>
       <h3 style="margin-left: 40%;">Consultation Room</h3>
      <hr>
      <div class="vitals" style="background:transparent;">
      <div style="margin-top:-20px;">
         <?php 
         $adb=$_SESSION['doctor'];
         if(isset($_GET['patient_id'])){
          $id =$_GET['patient_id'];
          $query = "SELECT * FROM patientvital WHERE patient_id ='$id' ";
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


          echo "<table  cellpadding =3 border=2  class='cnt'>
            <tr>
              <th style='color:white;background:black'>Folder number </th>
              <td style ='color:white;font-size: 18px;background:black'>$id</td>
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
      </div>
    
     </div>
     <div id="phase1" class="phase1">
        <h3 style=" color: black;margin-left: 60px;">Patient's Medical History</h3>
        <textarea style=" background-color: black; color:white" id="history" name="history" cols="45" rows="21" ></textarea><br>

     </div> 
     <div class="diagnosis">
      <div class="diag">
          <h3 style="color:black;">Medical Diagnosis</h3>
           <select id="select" name="diagnosis[]" required multiple="multiple" data-placeholder="...............select diagnosis.............">
              <option vlaue="medicalexams" >General medical exam</option>
               <option value="hypertension">Hypertension</option>
               <option value="hyperlipidemia">Hyperlipidemia</option>
               <option value="asthma">Asthma</option>
               <option value="diabetes">Diabetes</option>
               <option value="backpain">Back pain</option>
               <option value="anxiety">Anxiety</option>
               <option value="obesity">Obesity</option>
               <option value="malaria">Malaria</option>
               <option value="rhinitis">Allergic rhinitis</option>
               <option value="esophagitis">Reflux esophagitis</option>
               <option value="respiratoryproblems">Respiratory problems</option>
               <option value="hypothyroidism">Hypothyroidism</option>
               <option value="Visualrefractiveerrors">Visual refractive errors</option>
               <option value="osteoarthritis">Osteoarthritis</option>
               <option value="myositis">Fibromyalgia / myositis</option>
               <option value="fatigue">Malaise and fatigue</option>
               <option value="painjoint">Pain in joint</option>
               <option value="acute">Acute laryngopharyngitis</option>
               <option value="maxillarysinusitis">Acute maxillary sinusitis</option>
               <option value="depressivedisorder">Major depressive disorder</option>
               <option value="bronchitis">Acute bronchitis</option>
               <option value="depressive">Depressive disorder</option>
               <option value="nailfungus">Nail fungus</option>
               <option value="atherosclerosis">Coronary atherosclerosis</option>
               <option value="urinaryinfection">Urinary tract infection</option>
             </select><br>

      </div>
          

           <div class="status">
              <label style="margin-left:1%;color: black;">Health Status</label>
              <select id="cheese1" required name="healthstatus">
                
                <?php 

                   $qry ="SELECT * FROM dropdownlist";
                   $res =mysqli_query($connect,$qry);
                   while($row =mysqli_fetch_array($res)){
                    echo'<option>'.$row['healthstatuslist'].'</option>';
                   }
                  
                 ?>
               </select><br>
           </div>
               

            <div class="ward">
              <label style="color: black;">Allocate Ward</label>
              <select id="cheese2" required name="ward">
             
                  <?php 

                   $qry ="SELECT * FROM dropdownlist";
                   $res =mysqli_query($connect,$qry);
                   while($row =mysqli_fetch_array($res)){
                    echo'<option>'.$row['wardlist'].'</option>';
                   }
                  
                 ?>
              </select>

            </div>
              
       
     </div>

      <div class="input-field">
        <table class="tablehead" id="table_field">
          <tr style="background:black; color: white; ">
            <th>Medicine Name</th>
            <th>Dosage</th>
            <th> ml</th>
             <th>Add or Remove</th>
          </tr>
           <?php 
            if(isset($_POST['save'])){
              if(isset($_GET['patient_id']));
              $id=$_GET['patient_id'];
              $medicinename =$_POST['medicinename'];
              $ward =$_POST['ward'];
              $healthstatus =$_POST['healthstatus'];
              $diagnosis = implode(',',$_POST['diagnosis']);
              $quantity=$_POST['quantity'];
              $dosage =$_POST['dosage'];
              $history =$_POST['history'];
              $qq ="SELECT * FROM patientvital WHERE patient_id='$id'";
              $res=mysqli_query($connect,$qq);
              $row = mysqli_fetch_array($res);
              $name = $row['name'];
              $fourrandomdigit = mt_rand(1000,9999);

              $allMedicenes = [];
            
              foreach ($medicinename as $key => $value) {
                $allMedicenes[] = ["name" => $value, "dosage" => $dosage[$key], "quantity" => $quantity [$key]];
              }
              $resp = json_encode($allMedicenes);

                 $query = "INSERT INTO drugs(medicinename,diagnosis,ward,healthstatus,history,patient_id,patient_name,doctor,uniquecode,visit_date)VALUES('".$resp."','$diagnosis ','$ward','$healthstatus','$history','$id','$name','$adb','$fourrandomdigit',now())";
              echo"<script>alert('$query')</script>";
              $result =mysqli_query($connect, $query);
              $qqq ="SELECT * FROM drugs WHERE patient_id='$id'";
              $ress=mysqli_query($connect,$qqq);
              $row = mysqli_fetch_array($ress);
              $patient_name = $row['patient_name'];
              if($result){
        
              echo "<html><script> window.location.href='general.php?id=".$row['patient_name']."';</script></html>";
               }
            }
            
           ?>
         
          <tr>
            <td><input type="text" name="medicinename[]" required></td>
            <td><input type="text" name="dosage[]" required></td>
            <td><input type="text" name="quantity[]" required></td>
            <td><input type="button" name="add" value="Add" style="background:gold; color: white; border-color: gold;width: 100%; color:black" id="add"></td>
          </tr>
          
        </table>
        <div style="margin-left:43%;margin-top:10px">
          <input type="submit" name="save" value="Save Data" style="background:green; color: white; border-color:green" id="save">
        </div>
      </div>
      
    </form>
    
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      var html ='<tr><td><input type="text" name="medicinename[]" required ></td><td><input type="text" name="dosage[]" required></td><td><input type="text" name="quantity[]" required></td><td><input type="button" name="remove" value="Remove" style="background:red; color: white; border-color: red; width:100%" id="remove"></td></tr>'

      var x = 1;

      $("#add").click(function(){
         $("#table_field").append(html);
      });
      $("#table_field").on('click','#remove',function(){
         $(this).closest('tr').remove();
      });

    });
  </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#cheese1').chosen();
      });
     </script>
      <script type="text/javascript">
      $(document).ready(function(){
        $('#cheese2').chosen();

      });
     </script>

   <script type="text/javascript">
      $(document).ready(function(){
        $('#select').chosen();
         $("#select").chosen({no_results_text: "Oops, nothing found!"}); 

      });
    </script>
    <script src="../js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="../mselect/chosen.jquery.min.js"></script>


</body>
</html>