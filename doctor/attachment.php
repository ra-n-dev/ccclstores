<?php 
 session_start();
 include("../db/connection.php");
 include("sidenav.php");
 include("../include/header.php");
    

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../mselect/chosen.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <title>Appointment</title>
</head>
<style type="text/css">
  form{
    margin-top: 10px;
    background: gold;
  }
  form#multiphase{
    border: #000 1px solid;
    padding: 24px;
    width: 350px;
  }
  form#multiphase > #phase2, #phase3, #phase4,#show_all_data{
    display: none;
  }
  #phase3 select{
    width: 330px;
  }
</style>
<body>

  <div style="margin-left:220px">
    <progress id="progressBar" value="0" max="100" style="width: 250px;"></progress>
    <h3 id="status">Phase 1 of 4</h3>

<form id="multiphase" onsubmit="return false">
  <div id="phase1">
      <h3 style=" color: black;">Patient's Medical History</h3>
        <textarea style=" background-color: black; color:white" id="history" name="history" cols="45" rows="15" ></textarea><br>

      <button onclick="processPhase1()" >Continue</button>
   </div>  

   <div id="phase2">
      <label style="color: black;">Health Status</label>
        <select id="healthstatus"  name="healthstatus">
          <option value="admission">Admission</option>
          <option value="detention">Detention</option>
          <option value="opd">OPD</option>
        </select><br>
      <button onclick="processPhase2()" >Continue</button><br>
   </div>
  <div id="phase3">
      <label style="color: black;">Diagnosis</label>
        <select id="diagnosis"  name="diagnosis">
          <option value="ulcer">Ulcer</option>
          <option value="backpain">BackPain</option>
          <option value="fever">Fever</option>
          <option value="malaria">Malaria</option>
          <option value="typhoid">Typhoid</option>
          <option value="daibetes">Daibetes</option>
          <option value="headache">Headache</option>
        </select><br>
     <button onclick="processPhase3()" >Continue</button>
    </div>

   <div id="phase4">
      <label style="color: black;">Allocate Ward</label>
        <select id="ward" required name="ward">
          <option value="emergency-ward">Emergemcy-ward</option>
          <option value="male-ward">Male-ward</option>
          <option value="female-ward">Female-ward</option>
          <option value="children-ward">Children-ward</option>
          <option value="theatre-ward">Theatre-ward</option>
          <option value="delivery-ward">Delivery-ward</option>
          <option value="opd">OPD</option>
        </select><br>
     <button onclick="processPhase4()" >Continue</button>
    </div>
     
     <div id="show_all_data">
       History:<span id="display_history"></span><br>
       Health Status:<span id="display_healthstatus"></span><br>
       Diagnosis:<span id="display_diagnosis"></span><br>
       Ward: <span id="display_ward"></span><br>
       <button name="submit" id="submit">Submit Data</button>
       
     </div>
    </form>
  </div>
  <script>
    var history,diagnosis,healthstatus,ward;
    
    function _(x){
      return document.getElementById(x);
    }

    function processPhase1(){
      history =_("history").value;
      if(history.length > 1){
       
       _("phase1").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value =25;
        _("status").innerHTML ="Phase 2 of 4";
      }else{
        alert("Please enter patient history");
      }

    }

    function processPhase2(){
      healthstatus =_("healthstatus").value;
      if(healthstatus.length > 0){
        _("phase2").style.display ="none";
        _("phase3").style.display ="block";
        _("progressBar").value =50;
        _("status").innerHTML ="Phase 3 of 4";
      }else{
        alert("Please choose healthstatus");
      }
    }

   function processPhase3(){
      diagnosis =_("diagnosis").value;
      if(diagnosis.length > 0){
        _("phase3").style.display ="none";
        _("phase4").style.display ="block";
        _("progressBar").value =75;
        _("status").innerHTML ="Phase 4 of 4";
      }else{
        alert("Please choose diagnosis");
      }
    }

    function processPhase4(){
      ward =_("ward").value;
      if(ward.length > 0){
        _("phase4").style.display ="none";
        _("show_all_data").style.display = "block";
        _("display_history").innerHTML= history;
        _("display_healthstatus").innerHTML = healthstatus;
        _("display_diagnosis").innerHTML = diagnosis;
        _("display_ward").innerHTML = ward;
        _("progressBar").value =100;
        _("status").innerHTML ="Data Overview";
      }else{
        alert("Please allocate ward");
      }
    }

    
     $(document).ready(function(){
       $("#submit").click(function(){
        $.ajax({
          url:"insert.php",
          type:"POST",
          data:$("#multiphase").serialize(),
          success:function(d){
            alert(d);
            $("#multiphase")[0].rest();
          }
        });
       });
     });

  </script>

      <?php 
            if(isset($_POST['save'])){
              $medicinename =$_POST['medicinename'];
              $quantity=$_POST['quantity'];
              $dosage =$_POST['dosage'];
              $history =$_POST['history'];
              foreach ($medicinename as $key => $value) {
                 $query = "INSERT INTO drugs(medicinename,quantity,dosage,history)VALUES('".$value."','".$quantity[$key]."','".$dosage[$key]."','$history')";

              $result =mysqli_query($connect, $query);
              }
            }
            
           ?>

            <?php 
            if(isset($_POST['save'])){
              if(isset($_GET['patient_id']));
              $id=$_GET['patient_id'];
              $medicinename =implode("\n",$_POST['medicinename']);
              $quantity=implode(',',$_POST['quantity']);
              $dosage =implode(',',$_POST['dosage']);
              $history =$_POST['history'];

              $total = $medicinename."\n". $dosage;
             
              $query ="INSERT INTO drugs(medicinename,quantity,dosage,history,patient_id)VALUES('$medicinename','$quantity','$dosage','$total','$id')";
              $result =mysqli_query($connect,$query);
            }
            
           ?>


    <script src="../js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="../mselect/chosen.jquery.min.js"></script>

</body>
</html>