
<?php 
  session_start();

  include("../db/connection.php");
  include("sidenav.php");
  include("../include/header.php");
   $adb=$_SESSION['doctor'];

  if(isset($_POST['save'])){
       
        if(isset($_GET['patient_id']));
        $id=$_GET['patient_id'];
        $history =$_POST['history'];
        $diagnosis = implode(',',$_POST['diagnosis']);
        $prescription = implode(',',$_POST['prescription']);
        $ward =$_POST['ward'];
        $healthstatus =$_POST['healthstatus'];


        $query ="UPDATE patientvital SET diagnosis='$diagnosis', history='$history', prescription='$prescription' WHERE patient_id='$id' ";
        $result =mysqli_query($connect, $query);

        $queryy = "SELECT * FROM patientvital WHERE patient_id ='$id' ";
          $res =mysqli_query($connect, $queryy);
          $row =mysqli_fetch_array($res);
          $name =$row['name'];

       
        $qqq ="INSERT INTO patienthistory(history,diagnosis,prescription,name,doctor,visitdate,healthstatus,ward)values('$history','$diagnosis','$prescription','$name','$adb',now(),'$healthstatus','$ward')";
        $aba= mysqli_query($connect,$qqq);
        if($aba){
        
           echo "<html><script> window.location.href='patienthistory.php?id=".$row['name']."';</script></html>";
        }
      }


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <link rel="stylesheet" type="text/css" href="../mselect/chosen.min.css">

   

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <title></title>

  <title>Edit Doctor</title>
</head>
<style type="text/css">
   body{
    position: fixed;
   }
  .pro1{
    position: fixed;
    padding-left: 0px;
    width: 83.09%;
    background:black;
    margin-left: 216px;
    margin-top: 0px;
    height: 560px;

  }
   .pro1 .scrollablez .door .diag2{
    margin-left: 36%;
   }

   .pro1 .scrollablez .door .diag2 h3{
    margin-left: -50%;
    padding-top: 10px;
   }
   .pro1 .scrollablez .door .diag2 textarea{
   height: 340px;
   width: 300px;
   resize: none;
   }

    ul li{
    text-decoration: none;
    display: inline;
   }

  .pro1 h4{
    margin-left: 42%;
    color: white;
  }

  .pro1 .cnt{
    background: black;
    color: white;
    margin-top: -40.8%;
    width: 362px;
    margin-left: 0px;
    position: absolute;
    height: 91.6%;
  }

.pro1 .door form input{
    color: black;
    background: yellow;
    margin-left: 23%;
    width: 200px;
    font-size: 18px;
    border: #fff;
}
 
  .pro1 .door .select{
    margin-left: 66.2%;
    width: 346px;
    height: 368px;
    margin-top: -40.4%;
    background: black;
    border-left: solid 4px ;
    border-right: 4px ;

  }
    .pro1 .door .select select{
    width: 310px;

  } 
  .pro1 .door form .inputz{
    margin-left:0%;
    margin-left: 72%;
    border-radius: 5px;
    width: 200px;
    height: 28px;
    background: green;
    color: white;
    margin-top: 0px;
  }
   .scrollablez{
    background: beige;
    margin-top: -10px;
    height:460px;
    width: 98%; 
    overflow-x: hidden;
    overflow-y: scroll;
    position: relative;
    margin-left: 10px;

  }
     .scrollablez::-webkit-scrollbar-track {
     -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 20px;
      width: 15px;
      background-color: white;
     }

     .scrollablez::-webkit-scrollbar {
     width: 8px;
     background-color: #F5F5F5;
    }

    .scrollablez::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 5%;
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, .3);
    background-color: grey;
  }

  .scrollablez::-webkit-scrollbar-button {
   height: 50px;
  }
   .cheese1{
    margin-top: -20px;
    background: beige;
  }
  .cheese1 select{
    width:230px;
    height:25px;
  }
  .cheese2{
    margin-left: 67.8%;
    margin-top: -26px;
    background: beige;
  }
  .cheese2 select{
    width:210px;
    height:25px;
  }

</style>
<body>
  <div class="pro1">
    <h4> Consultation Room</h4>
    <div class="scrollablez" style="">
    <div class="door">
      <form style="background:black;height: 448px;margin-top:3%;" method="POST" enctype="multipart/form-data"> 
        <div class="cheese1">
        <label style="margin-left:1%;color: black;">Health Status</label>
        <select id="cheese1" required name="healthstatus">
          <option value="admission">Admission</option>
          <option value="detention">Detention</option>
          <option value="opd">OPD</option>
        </select>
      </div>

      <div class="cheese2">
         <label style="color: black;">Allocate Ward</label>
        <select id="cheese2" required name="ward">
          <option value="emergency-ward">Emergemcy-ward</option>
          <option value="male-ward">Male-ward</option>
          <option value="female-ward">Female-ward</option>
          <option value="children-ward">Children-ward</option>
          <option value="theatre-ward">Theatre-ward</option>
          <option value="delivery-ward">Delivery-ward</option>
          <option value="opd">OPD</option>
        </select>
      </div> 

       <div class="diag2">
        <h3 style="margin-left: 6%; color: white;">Patient's Medical History</h3>
        <textarea style=" background-color: black; color:white" name="history" cols="45" rows="35" ></textarea><br>

        </div> 

        
        <div class="select">
         <div class="subselect" style="height:173px;margin-top: -40px;border: solid grey 4px;padding-left: 10px;">
          <h3 style="color:white;">Medical Diagnosis</h3>
           <select id="select" name="diagnosis[]" required multiple="multiple"data-placeholder="...select diagnosis...">
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
             </select>

         </div>
          <div style="height:233px; border:solid 4px grey;padding-left: 10px;">
              <h3 style="color:white;height: 10px; padding-left: 20px;">Prescribe Medicine</h3>
              <select data-placeholder="...select medicine..." id="mselect" multiple="multiple" style=" background-color: whitesmoke;" name="prescription[]" class="select2">
               <option name="para">Paracetamol</option>
               <option name= "metro">Metronidazole</option>
               <option name="amox">Amoxiclav 225mg</option>
               <option name="vitamin-C">Vitamin C</option>
               <option name="trmol">Tramadol 50mg</option>
               <option name="penicillin">Penicillin</option>
               <option name="lonart-ds">Lonart DS</option>
               <option name="mag-trycilicate">Magnisium Trycilicate</option>
               <option name="amoxicillin">Amoxicillin 250mg</option>
               <option name="buscoplex">Buscoplex</option>
               <option name="polyfer">Polyfer</option>

             </select>
              
          </div>

       </div>

       <input class="inputz" type="submit" name="save" value="Submit">
      </form>
    </div>
   

     
  
    <?php 
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


          echo "<table  cellpadding =3 border=4  class='cnt'>
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
        $('#mselect').chosen();
         $("#mselect").chosen({no_results_text: "Oops, nothing found!"}); 

      });
     </script>
      
      <script type="text/javascript">
      $(document).ready(function(){
        $('#select').chosen();
         $("#select").chosen({no_results_text: "Oops, nothing found!"}); 

      });
      </script>

     <script>
      document.getElementById("mybtn").addEventListener("click", function(){
     
      document.querySelector(".admitpa").style.display = "flex";
     });
     document.getElementById("imgss").addEventListener("click", function(){
     
    document.querySelector(".admitpa").style.display = "none";
    });


</script>
    
    <script src="../js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="../mselect/chosen.jquery.min.js"></script>

</body>
</html>
