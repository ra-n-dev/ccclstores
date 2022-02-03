
<?php 

    session_start();
    $uname= $_SESSION['doctor']; 
    $casecode= $_SESSION['caseid'];
    include("../../db/connection.php");
    include("../header.php");

    $query ="SELECT * FROM patient_table WHERE case_id ='$casecode' ";
    $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
    $row =mysqli_fetch_array($result);

     $id = $row['patient_id'];
          $name =$row['name'];
          $permanent_id =$row['patient_perm_id'];
          $date = $row['reg_date'];
          $age =$row['age'];
          $gender = $row['gender'];
          $pulse =$row['pulse'];
          $temp =$row['temp'];
          $bp =$row['bp'];
          $weight =$row['weight'];
          $height =$row['height'];
          $spo2 =$row['spo2'];
          $phone =$row['contact'];
          $relative_phone = $row['relative_contact'];
          $occupation =$row['occupation'];
          $placeofbirth = $row['placeofbirth'];
          $nationality =$row['nationality'];
          $religion = $row['religion'];
          $dob =$row['dob'];
          $fun = date("Y-m-d ");
  





      if(isset($_POST['save'])){


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

              echo"<script>alert('$drugg')</script>";

             

         }else {
           
          $drugg ="No drugs yet";
        }

        $ward =$_POST['ward'];
        $healthdetails= $_POST['healthdetails'];
        $query = "INSERT INTO consultation_table(prescription,diagnosis,ward,health_status,patient_perm_id,patient_name,doc_name,case_id,visit_date,drug_payment_status,lab_payment_status,health_details,labs)VALUES('$drugg','$diag','$ward','none','$permanent_id','$name','$uname','$casecode','$fun','not yet','not yet','$healthdetails','$lab')";

        $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
     

        $www ="SELECT * FROM consultation_table WHERE case_id ='$casecode' ORDER BY visit_date DESC ";
        $rrs =mysqli_query($connect,$www);
        $row = mysqli_fetch_array($rrs);
        $fffid =$row['case_id'];


        $sql = "INSERT INTO consult_neutral_table(prescription,diagnosis,bp,temp,patient_name,doc_name,case_id,update_date,spo2,pulse,clinical_history,labs,lab_payment_status,drug_payment_status ,patient_perm_id)VALUES('$drugg','$diag','no bp','no temp','$name','$uname','$casecode','$fun','no spo2','no pulse','$healthdetails','$lab','not paid','not paid','$permanent_id')";
        $res =mysqli_query($connect,$sql) or die(mysqli_error($connect)); 


        if($result){
            echo "<html><script> window.location.href='patient_folder.php?$casecode=".$row['name']."';</script></html>";
        }
        
        
      }    

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>consultation room</title>
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
 		height: 65vh;
 		width: 70%;
 		opacity: 0.8;
 		border-radius: 6px;
 	}
 	.docc2 h2{
 		padding-top: 30px;
 		font-size: 27px;
 	}
 	.docc1{
 		margin-bottom: 0%;
 	}
 	.docc1 h2{
 		padding-top: 6%;
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

    .do nav{
        margin-right: 8.5%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
   }
    .docc2 .vitab{
    	float: left;
    	height: 50vh;
    	background: blue;
    	width: 40%;
    }
    .docc2 .main{
    	height: 50vh;
    	background: red;
    }

     .waa{
        background: white;
        height: 45%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
     }
     .saa{
         background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;
       
       }
     .labs{
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


     .labs .phase1{
        margin-left: 5%;
        background: transparent;
        height: 40vh;
        width: 90%;
     }
     .drugs{
        background: white;
        height: 70vh;
        width: 70%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;
       
     }
     .drugs .phase1{
        margin-left: 0%;
        background: transparent;
        height: 50vh;
        width: 100%;
     }

     .ward{
        background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
     }

     .wardd{
        background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;
     }
     .wod{
         background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
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
        margin-top: -2%;
        display: none;
     }

    .contnew{
        background: #AEB6BF;
        height: 20vh;

    }

    .contnewww{
        background: transparent;
        height: 15vh;
        width: 90%;
    }
    .contnew input{
        margin-top: 8%;
        width: 30%;
        height: 30%;
    }
    .contnew .lab{
        background: black;
        border-color: transparent;
        color: white;
        border-radius: 5px;
    }
    .contnew .drug{
        border-radius: 5px;
        background: #D35400;
        color: white;
        border-color: transparent;
    }
   #sub{
    width: 18%;
    height: 5vh;
   }
   #prev{
    width: 20%;
    height: 5vh;
    
   }
   #subm{
    width: 20%;
    height: 5vh;
    
   }
   #diag1{
    width: 20%;
    height: 5vh;
   }

   #diag2{
    width: 20%;
    height: 5vh;
   }
  
   #prevv{
    width: 20%;
    height: 5vh;
    
   }

   #wod1{
    width: 20%;
    height: 5vh;
    
   }


   #wod2{
    width: 20%;
    height: 5vh;
    
   }


   #drugg{
    width: 20%;
    height: 5vh;
    
   }

   #druggg{
    width: 20%;
    height: 5vh;
    
   }


   #priv{
    width: 20%;
    height: 5vh;
    
   }
   #proc{
    width: 20%;
    height: 5vh;
    
   }
 
   #submit{
    width: 20%;
    height: 5vh;
  
   }
   #wardc{
    width: 20%;
    height: 5vh;
    
   }
   #wardcc{
    width: 20%;
    height: 5vh;
    
   }

   .wardx{
    background: white;
        height: 50%;
        width: 50%;
        margin-left: 0%;
        border-radius: 6px;
        overflow-x: auto;
        opacity: 0.8;
        margin-top: -2%;
        display: none;
   }

   .labs{
    display: none;
   }
   .drugs{
    display: none;
   }
   .ward{
    display: none;
   }
  
  .labs .phase1  p {
   background: transparent;
  }
  .labs .labcl1{
    width: 15%;
    height: 5vh;
    background: transparent;
  }
  .labs .labcl2{
    width: 15%;
    height: 5vh;
    background: transparent;
  }

 .ward .phase1 .contnew .wardz input{ 
    width: 30%;
    background: red;

  }
  .wardzz input{
    width: 30%;
  }


.aw  input{
    width: 96%;
    height: 20px;
    margin-top: -10px;
    margin-left: -1px;
}

.ad{
    width: 96%;
    height: 20px;
    margin-top: -10px;
    margin-left: -1px; 
}





   @media  (max-width: 500px){
    .labs .phase1{
        background: transparent;
        height: 150vh;
        width: 90%;
     }

   }
</style>
<body>
	 <div class="do">
        <nav>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#folder">Patient-Folder</a></li>
                <li><a href="#folder">Notice</a></li>
            </ul>
        </nav>
     </div>
 	<div class="docc1">
 		<center><h1 style="color:transparent;height: 17vh;margin-top:3vh"></h1></center>
 		
 	</div>

    <form method="POST">
         <center>
      <div class="waa" id="waa">
        <h2>Patient's Vitals</h2>
        <?php 
         echo"<table  cellpadding =3 border=2 style='width:40%; position: relative;overflow-x:auto' class='cnt'>
          <tr>

            <th>Name</th>
            <th>SPO2</th>
            <th>Pulse</th>
            <th>Weight</th>
            <th>Temp</th>
            <th>Religion</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Date</th>
            <th>Occupation</th>
          </tr>

          <tr>
          <td>$name</td>
          <td>$spo2</td>
          <td>$pulse</td>
          <td>$weight</td>
          <td>$temp</td>
          <td>$religion</td>
          <td>$gender</td>
          <td>$age</td>
          <td>$date</td>
          <td>$occupation</td>
          </tr>


         </table>";


         ?>
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Patient's Medical Details</h3>
         
            <textarea style=" background-color: black; color:white" id="history" name="healthdetails" cols="78" rows="9" required></textarea><br>

           </div>

           <input id="sub" type="button" name="next" value="Next" style="margin-top: 1%;margin-bottom: 2%;">
            
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

           <input id="prev" type="button" name="next" value="Previous" style="margin-top: 1%;margin-bottom: 2%;">
           <input id="submit" type="button" name="save" value="Proceed" style="margin-top: 1%;margin-bottom: 2%;">
            
        </center>
       
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



     <center>
       <div class="wod" id="wod">
        <h2>Allocate Patient To A Ward</h2>
       
        <center>
           <div id="phase1" class="phase1">
            <h3 style=" color: black;">Click on the todo button below</h3>
         
           <div class="contnew">
               
                <h1 style="color:transparent;height: 4vh;margin-top:3vh"></h1>
                <select class="wardselect" id="wardselected" name="ward" style="width:40%;height:24%;">
                    <option value="opd">OPD</option>
                    <option value="male-ward">Male-Ward</option>
                    <option value="female-ward">Female-ward</option>
                    <option value="children-ward">Children-Ward</option>
                    <option value="delivery-ward">Delivery-ward</option>
                    <option value="theatre-ward">Theatre-Ward</option>
                </select>
                
                
            </div>

           </div>
        
           <input id="wod1" type="button" name="next" value="Previous" style="margin-top: 1%;margin-bottom: 2%;">
           <input id="wod2" type="button" name="save" value="Proceed" style="margin-top: 1%;margin-bottom: 2%;">
            
        </center>
       
     </div>
    </center>



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
   

   <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
        $("#sub").click(function () {
       $("#waa").css("display", "none");
       $("#diag").css("display","block");
       
      });
       

       $("#diag1").click(function () {
       $("#diag").css("display", "none");
       $("#waa").css("display","block");
       
      });

       $("#diag2").click(function () {
       $("#diag").css("display", "none");
       $("#saa").css("display","block");
       
      });
       
       $("#submit").click(function () {
       $("#saa").css("display", "none");
       $("#final").css("display", "block");
      });

     $("#prev").click(function () {
       $("#diag").css("display", "block");
       $("#saa").css("display","none");
       
      });

     $("#lab").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","none");
       $("#labs").css("display","block");
       $("#drugs").css("display","none");
       
      });

     $("#drug").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","none");
       $("#labs").css("display","none");
       $("#drugs").css("display","block");
       
      });

     $("#labcl1").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","block");
       $("#labs").css("display","none");
       $("#drugs").css("display","none");
       
      });

     $("#labcl2").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","none");
       $("#labs").css("display","none");
       $("#wardx").css("display","block");
       $("#drugs").css("display","none");
       $("#bk").css("display","none");
       $("#fwd").css("display","none");
            
      });

     
      $("#prevv").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","none");
       $("#labs").css("display","block");
       $("#ward").css("display","none");
       $("#drugs").css("display","none");

       
      });


      $("#wardz").click(function () {
       $("#waa").css("display", "none");
       $("#saa").css("display","none");
       $("#labs").css("display","none");
       $("#ward").css("display","none");
       $("#drugs").css("display","none");
       $("#wardselect").css("display","none");
       $("#final").css("display","block");

       
      });


      $("#wardzz").click(function () {
       
       $("#ward").css("display", "none");
       $("#wardd").css("display", "block");
      });

      $("#priv").click(function () {
       $("#wardd").css("display", "none");
       $("#ward").css("display", "block");
      });


      $("#proc").click(function () {
       $("#wardd").css("display", "none");
       $("#final").css("display", "block");
      });

       $("#finbk").click(function () {
       $("#saa").css("display", "block");
       $("#final").css("display", "none");
      });

       $("#drugg").click(function () {
       $("#saa").css("display", "block");
       $("#drugs").css("display", "none");
      });

       $("#druggg").click(function () {
       $("#wardx").css("display", "block");
       $("#drugs").css("display", "none");
      });

       $("#wardc").click(function () {
       $("#wardx").css("display", "none");
       $("#saa").css("display", "block");
      }); 

       $("#wardcc").click(function () {
       $("#wardx").css("display", "none");
       $("#final").css("display", "block");
      });


       $("#wardz1").click(function () {
       $("#wardx").css("display", "none");
       $("#final").css("display", "block");
      });


       $("#wardzz1").click(function () {
       $("#wardx").css("display", "none");
       $("#wod").css("display", "block");
      });
   

      $("#wod1").click(function () {
       $("#wardx").css("display", "block");
       $("#wod").css("display", "none");
      });

      $("#wod2").click(function () {
       $("#wod").css("display", "none");
       $("#final").css("display", "block");
      });


   </script>
   <script type="text/javascript">
       $(document).ready(function() {
           $("#labs #select-all").click(function () {
               $("#labs input[type='checkbox']").prop('checked',this.checked);
           })
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