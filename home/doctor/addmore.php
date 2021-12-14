<?php 
 session_start();
 $uname= $_SESSION['doctor'];
 $caseid= $_SESSION['caseid'];
 include("../../db/connection.php");
 include("../header.php");


 $quer ="SELECT * FROM customers_table WHERE case_id ='$caseid' ";
 $ress =mysqli_query($connect,$quer) or die(mysqli_error($connect));
 $row = mysqli_fetch_array($ress);
 $name =$row['customer_name'];
 
 if(isset($_GET['id'])){
          $id =$_GET['id'];
          $query = "SELECT * FROM consultation_table WHERE case_id ='$id' ";
          $res =mysqli_query($connect, $query) or die(mysqli_error($connect));
          $row =mysqli_fetch_array($res);
          $id = $row['case_id'];
          $name =$row['patient_name'];
              
  }
      


 if(isset($_POST['save'])){

        $spo2 =$_POST['spo2'];
        $temp =$_POST['temp'];
        $healthdetails =$_POST['healthdetails'];
        $pulse =$_POST['pulse'];
        $bp =$_POST['bp'];



        if(isset($_POST['checks'])){
        $diagcheckbox=$_POST['checks'];
        $diag="";

        foreach ($diagcheckbox AS $value) {
            $diag .= $value."," ;
            
        }

       }else{
        $diag ="No diagnosis yet";
       }
        
 
        
       if(isset($_POST['check'])){
        $labcheckbox=$_POST['check'];
        $lab="";

        foreach ($labcheckbox AS $value) {
            $lab .= $value."," ;
            
        }

       }else{
        $lab ="No request yet";
       }

        
        $medicinename =$_POST['medicinename'];
        $quantity=$_POST['quantity'];
        $dosage =$_POST['dosage'];
        $ml =$_POST['ml'];

        $allMedicines = [];
            
        foreach ($medicinename as $key => $value) {
                $allMedicines[] = ["name" => $value, "dosage" => $dosage[$key], "quantity" => $quantity [$key], "ml" =>$ml[$key]];
        }

        $resp = json_encode($allMedicines);


        if(isset($_POST['medicinename'])){
             $drugg=$resp;
             

         }else {
           
          $drugg ="No drugs yet";
        }

        $healthdetails= $_POST['healthdetails'];
        $query = "INSERT INTO consultation_annex_table(prescription,diagnosis,pulse,temp,case_id,patient_name,doc_name,unique_code,update_date,drug_payment_status,lab_payment_status,clinical_history,labs,spo2,bp)VALUES('$drugg','$diag','$pulse','$temp','$id','$name','$uname','$caseid',now(),'not yet','not yet','$healthdetails','$lab','$spo2','$bp')";
        $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
        if($result){
            echo "<html><script> window.location.href='patient_folder.php?$caseid=".$row['patient_name']."';</script></html>";
        }
        
      }

 ?>


 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AddmoretoFolder</title>
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
        position: relative;
    }
    form{
    	background: white;
    	width: 30.5%;
    	margin-top: 0%;
    	border-radius: 5px;
    }
    form .box{
      border:solid 1px black;
      width: 71%;
      height: 30px;
    }
    form .box p{
      margin-top: 5px;
      margin-left: 3px;
    }

    form .vit2{
      display: none;
      height: 60vh;
      width: 90%;

    }
    form .labs{
      display: none;
    }



     .labs{
         background:white;
        height: 70vh;
        width: 60%;
        margin-left: 20%;
        margin-right: 20%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;
       
     }



     .labs .phase1{
        margin-left: 5%;
        background: transparent;
        height: 40vh;
        width: 90%;
     }

      .diag{
         background:white;
        height: 70vh;
        width: 60%;
        margin-left: 20%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;

       
       
     }

     .final{
        background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: 0%;
        display: none;
     }

     .drugs{
        background: white;
        height: 70vh;
        width: 70%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: 2%;
        display: none;
       
     }
     .drugs .phase1{
        margin-left: 0%;
        background: transparent;
        height: 50vh;
        width: 100%;
     }

     .wardx{
        background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: 0%;
        display: none;
   }
    .saa{
         background: white;
        width: 100%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
       
       }
       .contnew{
        background: #AEB6BF;
        height: 20vh;

    }
    .contnew .lab{
        margin-top: 15%;
        background: black;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }
    .contnew .drug{
        margin-top: 15%;
        border-radius: 5px;
        background: #D35400;
        color: white;
        border-color: transparent;
    }

</style>
<body>
	<center>
			<h4 style="height:50px"></h4>
		<form method="POST" enctype="multipart/form-data">
    <div class="vit1" id="vit1">
    <h3  style="padding-top:3%">Add more Patient Information</h3>
    <label>Patient Name</label><br>
    <?php 
         echo"<div class='box'> <p>$name</p> </div>";
             
    ?>
    <label>Spo2</label><br>
    <input type="text" name="spo2"><br>
    <label>Pulse</label><br>
    <input type="text" name="pulse"><br>
    <label>Blood Pressure</label><br>
    <input type="text" name="bp"><br>
    <label>Temprature</label><br>
    <input type="text" name="temp" style="margin-bottom:3%"><br>
    <label>Clinical History</label><br>
    <textarea style=" background-color: black; color:white" id="history" name="healthdetails" cols="50" rows="9" required></textarea><br>
    <input type="button" name="next" value="Next" id="next" style="margin-bottom:3%;margin-top:2%; width: 25%; height:26px">
    </div>

   <div class="vit2" id="vit2">
      <h3 style="padding-top:6%">Request form</h3>

      <div class="saa" id="saa">
        <h2>Request & Prescription Form</h2>
       
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Click on the todo button below</h3>
         
            <div class="contnew">
                <input class="lab" id="lab"  type="button" name="lab" value="Laboratory">
                <input class="drug" id="drug" type="button" name="drug" value="Medicine">
                
            </div>

           </div>

           <input id="prev" type="button" name="next" value="Previous" style="margin-top: 5%;margin-bottom: 2%;">
           <input id="submit" type="button" name="save" value="Proceed" style="margin-top: 5%;margin-bottom: 2%;">
            
        </center>
       
     </div> 
    </div>


  </center>

     <div id="labs" class="labs">
        <div>
        <h2 style="text-align:center">Lab. Request Form</h2>
        <h4 style="text-align:center">List of labs Available</h4>
     
         <center>
          <div style="margin-top: 1%; margin-left: 0%;">
            <input class="labcl1" id="labcl1" type="button" name="labbb" value="Previous">
            <input class="labcl2" id="labcl2" type="button" name="labbb" value="Done">
          </div>
        </center>
       
        <div id="phase1" class="phase1">     

            <div class="c1 "style="float:left; margin-left: 10px;">   
             <p>
              <input type="checkbox" name="check[]" value="malaria">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="rbs">RBS <br>
              <input type="checkbox" name="check[]" value="fbc">FBC <br>
              <input type="checkbox" name="check[]" value="abnominal-scan">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="widal">Widal <br>
              <input type="checkbox" name="check[]" value="hepatitis-b">Hepatitis B <br>
              <input type="checkbox" name="check[]" value="malaria-strip">Malaria Strip <br>
              <input type="checkbox" name="check[]" value="h-pylori">H-pylori <br>
              <input type="checkbox" name="check[]" value="acid-reflux">Acid Reflux <br>
              <input type="checkbox" name="check[]" value="x-ray-ls">X-ray-LS <br>
              <input type="checkbox" name="check[]" value="x-ray-sinusis">X-ray-Sinusis <br>
              <input type="checkbox" name="check[]" value="hiv">HIV <br>
             </p>
              
            </div>
              
         <div class="c2 "style="float:left; margin-left: 10px;">
              <p style="float:left;">
              <input type="checkbox" name="check[]" value="value1">Malaria Bloods <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
            </p>
          </div>

        <div class="c3 "style="float:left;margin-left: 10px;">
            <p>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
            </p>

        </div>


        <div class="c4 "style="float:left;margin-left: 10px;">
            <p>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
            </p>

        </div>


        <div class="c5 "style="float: left;margin-left: 10px;">
            <p>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
              <input type="checkbox" name="check[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="check[]" value="value2">RBS <br>
              <input type="checkbox" name="check[]" value="value3">FBC <br>
              <input type="checkbox" name="check[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="check[]" value="value4">Widal <br>
              <input type="checkbox" name="check[]" value="value4">Hepatitis B <br>
            </p>

        </div>
     </div>
        
     </div>
        
     </div>


    <center>
     <div class="wardx" id="wardx">
        <h2>Allocate Patient To A Ward</h2>
       
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Click on the todo button below</h3>
         
           <div class="contnew">
                <input class="wardz1" id="wardz1"  type="button" name="wardz" value="No" style="width:15%;border-radius: 25px;">
                <input class="wardzz1" id="wardzz1" type="button" name="wardzz" value="Yes"style="width:15%;border-radius: 25px">    
            </div>
           </div>
        
           <input id="wardc" type="button" name="next" value="Previous" style="margin-top: 1%;margin-bottom: 2%;">
           <input id="wardcc" type="button" name="save" value="Proceed" style="margin-top: 1%;margin-bottom: 2%;">
            
        </center>
       
     </div>
    </center>

      <center>
     <div class="drugs" id="drugs">
        <h2>Drug Prescription Form</h2>
       
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Prescribe all drugs for patients here</h3>
         
            <div class="contnewww">


            <div class="f1">
              <div class="input-field">
               <table class="tablehead" id="table_field" style="background:#D7DBDD;">
                 <tr style="background:black; color: white; ">
                   <th>Medicine</th>
                   <th>Dosage</th>
                   <th> Ml/Mg</th>
                   <th> Quantity</th>
                   <th>Add or Remove</th>
                 </tr> 
                 <tr class="aw">
                   <td><input type="text" name="medicinename[]"></td>
                   <td><input type="text" name="dosage[]"></td>
                   <td><input type="text" name="ml[]"></td>
                   <td><input type="text" name="quantity[]"></td>
                   <td><input type="button" name="add" value="Add" style="background:gold; color: white; border-color: gold;width: 100%;height: 24px; color:black" id="add"></td>
                 </tr>        
          
          
                </table>

                <input id="drugg" type="button" name="previo" value="Previous" style="margin-top: 1%;margin-bottom: 2%;">
                <input id="druggg" type="button" name="save" value="Proceed" style="margin-top: 1%;margin-bottom: 2%;">
               </div>
             </div>



                
            </div>

           </div>
            
        </center>
       
     </div>
    </center> 


    <div id="diag" class="diag">
        <div>
        <h2 style="text-align:center">Diagnosis Form</h2>
        <h4 style="text-align:center">List of diagnosis Available</h4>
     
         <center>
          <div style="margin-top: 1%; margin-left: 0%;">
             <input id="diag1" type="button" name="next" value="Previous" style="margin-top: 1%;margin-bottom: 2%;">
           <input id="diag2" type="button" name="save" value="Proceed" style="margin-top: 1%;margin-bottom: 2%;">
          </div>
        </center>
       
        <div id="phase1" class="phase1">    

            <div class="c1 "style="float:left; margin-left: 10px;">   
             <p>
              <input type="checkbox" name="checks[]" value="malaria">Malaria <br>
              <input type="checkbox" name="checks[]" value="asthma">Asthma <br>
              <input type="checkbox" name="checks[]" value="medicalexams">General medical exam <br>
              <input type="checkbox" name="checks[]" value="hypertension">Hypertension <br>
              <input type="checkbox" name="checks[]" value="hyperlipidemia">Hyperlipidemia <br>
              <input type="checkbox" name="checks[]" value="hepatitis-b">Hepatitis<br>
              <input type="checkbox" name="checks[]" value="diabetes">Diabetes <br>
              <input type="checkbox" name="checks[]" value="backpain">Back Pain <br>
              <input type="checkbox" name="checks[]" value="obesity">Obesity <br>
              <input type="checkbox" name="checks[]" value="allegic-rhinitis">Allergic rhinitis <br>
              <input type="checkbox" name="checks[]" value="osophagitis">Reflux esophagitis <br>
              <input type="checkbox" name="checks[]" value="hiv">HIV <br>
             </p>
              
            </div>
              
         <div class="c2 "style="float:left; margin-left: 10px;">
              <p style="float:left;">

              <input type="checkbox" name="checks[]" value="respiratory_problems">Respiratory problems<br>
              <input type="checkbox" name="checks[]" value="hypothyroidism">Hypothyroidism <br>
              <input type="checkbox" name="checks[]" value="Visual_refractive_errors">Visual refractive errors <br>
              <input type="checkbox" name="checks[]" value="abnominal_pain">Abdominal pain <br>
              <input type="checkbox" name="checks[]" value="osteoarthritis">Osteoarthritis <br>
              <input type="checkbox" name="checks[]" value="myositis/fibromyalgia">Fibromyalgia / myositis <br>
              <input type="checkbox" name="checks[]" value="malaise_and_fatigue">Malaise and fatigue<br>
              <input type="checkbox" name="checks[]" value="pain_in_joint">Pain in joint<br>
              <input type="checkbox" name="checks[]" value="acute_lary">Acute laryngopharyngitis <br>
              <input type="checkbox" name="checks[]" value="acute_maxillary_sinusitis">Acute maxillary sinusitis <br>
              <input type="checkbox" name="checks[]" value="depressive_disorder">Major depressive disorder<br>
              <input type="checkbox" name="checks[]" value="acute_bronchitis">Acute bronchitis<br>
            </p>
          </div>

        <div class="c3 "style="float:left;margin-left: 10px;">
            <p>

              <input type="checkbox" name="checks[]" value="acute_bronchitis">Acute bronchitis <br>
              <input type="checkbox" name="checks[]" value="depressive_disorder">Depressive disorder <br>
              <input type="checkbox" name="checks[]" value="nail_fungus">Nail fungus <br>
              <input type="checkbox" name="checks[]" value="coronary_atherosclerosis">Coronary atherosclerosis <br>
              <input type="checkbox" name="checks[]" value="urinary_tract_infection">Urinary tract infection <br>
              <input type="checkbox" name="checks[]" value="insulin_resistance">Insulin Resistance <br>
              <input type="checkbox" name="checks[]" value="macular_depression">Macular Depression <br>
              <input type="checkbox" name="checks[]" value="alzheimer's_disease">Alzheimer Disease <br>
              <input type="checkbox" name="checks[]" value="atrial_fibrillation">Atrial Fibrillation <br>
              <input type="checkbox" name="checks[]" value="chronic_kidney_disease">Chronic Kidney Disease <br>
              <input type="checkbox" name="checks[]" value="melanomal/skin cancer">Melanomal/Skin cancer <br>
              <input type="checkbox" name="checks[]" value="multiple_sclerosis">Multiple Sclerosis<br>
            </p>

        </div>


        <div class="c4 "style="float:left;margin-left: 10px;">
            <p>
              <input type="checkbox" name="checks[]" value="spina_bifida">Spina Bifida <br>
              <input type="checkbox" name="checks[]" value="stroke">Stroke <br>
              <input type="checkbox" name="checks[]" value="liver_failure">Liver Failure <br>
              <input type="checkbox" name="checks[]" value="lupus">Lupus <br>
              <input type="checkbox" name="checks[]" value="leukemia">Leukemia<br>
              <input type="checkbox" name="checks[]" value="kidney_failure">Kidney Failure<br>
              <input type="checkbox" name="checks[]" value="fibriods">Fibriods<br>
              <input type="checkbox" name="checks[]" value="cancer">Cancer <br>
              <input type="checkbox" name="checks[]" value="cataracts">Cataracts <br>
              <input type="checkbox" name="checks[]" value="chronic_pain">Chronic Pain <br>
              <input type="checkbox" name="checks[]" value="autism">Autism <br>
              <input type="checkbox" name="checks[]" value="influenza">Influenza <br>
            </p>

        </div>


        <div class="c5 "style="float: left;margin-left: 10px;">
            <p>
              <input type="checkbox" name="checks[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="checks[]" value="value2">RBS <br>
              <input type="checkbox" name="checks[]" value="value3">FBC <br>
              <input type="checkbox" name="checks[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="checks[]" value="value4">Widal <br>
              <input type="checkbox" name="checks[]" value="value4">Hepatitis B <br>
              <input type="checkbox" name="checks[]" value="value1">Malaria Blood <br>
              <input type="checkbox" name="checks[]" value="value2">RBS <br>
              <input type="checkbox" name="checks[]" value="value3">FBC <br>
              <input type="checkbox" name="checks[]" value="value4">Abdominal scan <br>
              <input type="checkbox" name="checks[]" value="value4">Widal <br>
              <input type="checkbox" name="checks[]" value="value4">Hepatitis B <br>
            </p>

        </div>
     </div>
        
     </div>
        
     </div>

    <center>
       <div class="final" id="final">
        <h2>Save Patients Information</h2>
       
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Click on the todo button below</h3>
            <center>
             <div class="contnew">
                <h1 style="color:transparent;height: 3vh;margin-top:1vh"></h1>
              <center>
                
                <input id="finbk" class="finbk" type="button" name="final" value="Back"style="width: 50px; height: 50px; margin-top: -1%; border-radius:30px" >
                <input type="submit" class="finsv" name="save" value="Save" style="width: 50px; height: 50px; margin-top: -1%; border-radius:30px"><br>
                <h1 style="color:transparent;height: 4vh;margin-top:1vh"></h1>
              </center>  
              </div>
            </center>
             <h1 style="color:transparent;height: 4vh;margin-top:1vh"></h1>

           </div>
            
        </center>
       
     </div>
    </center>

	</form>
	</center>
	 <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>


      $("#next").click(function () {
       $("#vit1").css("display", "none");
       $("#diag").css("display","block");
       
      });

      $("#diag1").click(function () {
       $("#diag").css("display", "none");
       $("#vit1").css("display","block");
       
      });


      $("#diag2").click(function () {
       $("#diag").css("display", "none");
       $("#vit2").css("display","block");
       
      });


      $("#submit").click(function () {
       $("#saa").css("display", "none");
       $("#final").css("display", "block");
      });

     $("#prev").click(function () {
       $("#diag").css("display", "block");
       $("#vit2").css("display","none");
       
      });

     $("#lab").click(function () {
      $("#waa").css("display", "none");
       $("#vit2").css("display","none");
       $("#labs").css("display","block");
       $("#drugs").css("display","none");
       
      });
      $("#labcl1").click(function () {
       $("#waa").css("display", "none");
       $("#vit2").css("display","block");
       $("#labs").css("display","none");
       $("#drugs").css("display","none");
       
      });

       $("#labcl2").click(function () {
       $("#waa").css("display", "none");
       $("#vit2").css("display","none");
       $("#labs").css("display","none");
       $("#final").css("display","block");
       $("#drugs").css("display","none");
       $("#bk").css("display","none");
       $("#fwd").css("display","none");
            
      });

       $("#drug").click(function () {
       $("#waa").css("display", "none");
       $("#vit2").css("display","none");
       $("#labs").css("display","none");
       $("#drugs").css("display","block");
       
      });

      $("#drugg").click(function () {
       $("#vit2").css("display", "block");
       $("#drugs").css("display", "none");
      });

      $("#druggg").click(function () {
       $("#final").css("display", "block");
       $("#drugs").css("display", "none");
      });


      $("#submit").click(function () {
       $("#vit2").css("display", "none");
       $("#final").css("display", "block");
      });
      
      $("#finbk").click(function () {
       $("#final").css("display", "none");
       $("#vit2").css("display", "block");
       $("#saa").css("display", "block");
      });
     
   
   </script>   

   <script type="text/javascript">
    $(document).ready(function () {
      var html ='<tr><td><input type="text" name="medicinename[]" required style="width:96%;height:20px;margin-left:-1px;margin-top:-10px"></td><td><input type="text" name="dosage[]" required style="width:96%;height:20px;margin-left:-1px;margin-top:-10px"></td><td><input  name="ml[]" required style="width:96%;height:20px;margin-left:-1px;margin-top:-10px"></td><td><input name="quantity[]" required style="width:96%;height:20px;margin-left:-1px;margin-top:-10px"></td><td><input type="button" name="remove" value="Remove" style="background:red; color: white; border-color: red; width:100%;height:24px;margin-left:-1px;margin-top:-10px;" id="remove"></td></tr>'

      var x = 1;

      $("#add").click(function(){
         $("#table_field").append(html);
      });
      $("#table_field").on('click','#remove',function(){
         $(this).closest('tr').remove();
      });

    });
   </script>  

</body>
</html>