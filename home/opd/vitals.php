<?php 
 session_start();
 $uname= $_SESSION['receptionist']; 
 $caseid= $_SESSION['caseid'];
 include("../../db/connection.php");
 include("../header.php");


 $quer ="SELECT * FROM customers_table WHERE case_id ='$caseid' ";
 $ress =mysqli_query($connect,$quer) or die(mysqli_error($connect));
 $row = mysqli_fetch_array($ress);
 $name =$row['customer_name'];
 $permanent_id =$row['patient_perm_id'];
 $case_id =$row['case_id'];


 if(isset($_POST['submit'])){
  if(empty($_SESSION["refreshed_round"])){
  $_SESSION["refreshed_round"]=0;
  }
  $contact = $_POST['contact'];
  $placeofbirth = $_POST['placeofbirth'];
  $marital_status = $_POST['marital_status'];
  $occupation = $_POST['occupation'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $relative_contact = $_POST['relative_contact'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];
  $height = $_POST['height'];
  $pulse = $_POST['pulse'];
  $sop2 = $_POST['sop2'];
  $temp = $_POST['temp'];
  $bp = $_POST['bp'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $fun = date("Y-m-d ");
 // $td =date('dmy');
  //$dart =$td . $_SESSION["refreshed_round"]+=1;




  $query = "INSERT INTO patient_table(name,contact,placeofbirth,marital_status,occupation,dob,age,relative_contact,nationality,religion,height,pulse,spo2,temp,bp,gender,weight,reg_date,patient_perm_id,case_id)VALUES('$name','$contact','$placeofbirth','$marital_status','$occupation','$dob','$age','$relative_contact','$nationality','$religion','$height','$pulse','$sop2','$temp','$bp','$gender','$weight','$fun','$permanent_id','$case_id')";

  $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
  if($result){
    echo"<script>alert('successfully sent data into database')</script>";
     ?>
        <script>window.location.href="../opd/index.php"</script>
        <?php
  }else{
    echo"<script>alert('wasn't successfully)</script>";
  }


 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>vitals.php</title>
</head>
<style type="text/css">
		body{
 		margin: 0;
 		padding: 0;
 		background-image: url(../../image/home2.jpg);
 		background-repeat: no-repeat;
 		background-size: cover;
 		background-position: center;
 		height: 95vh;
 	}
     .vit{
    	background: white;
    	width: 75.4%;
    	height: 82vh;
    	border-radius: 6px;
    	opacity: 0.8;
    	margin-left: 12%;
    	position: fixed;
    }
    .vit h2{
    	text-decoration: underline;
    	padding-top: 10px;
    	text-align: center;
    }
    .vit .cl3{
      color: black;
      margin-top: -2%;
    }

    .null{
    	color: transparent;
    	margin-bottom: 5.8%;
    }
    .fom form .cl1{
    	margin-top: 2%;
    	margin-left: 22%;
    	position: relative;
    }
    .fom form .cl1 input{
    	width: 70%;
    	height: 25px;
    }

    .fom form .cl1 select{
    	width: 71.1%;
    	height: 32px;
    }
   
    .vit .fom{
    	border: solid 1px red;
    	height: 66vh;
    	margin-left: 5%;
    	margin-right: 5%;
    }

    #fff3{
    	display: none;
    }
    #ff2{
    	display: none;
    }

     #f1 #next{
      background: #A04000;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 10%;

    }

    #ff2 #previous1{
      background: #A04000;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 10%;

    }
    #ff2 #more{
      background: #A04000;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 10%;
      margin-left: 1%;
    }


    #fff3 #previous2{
      background: #A04000;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 10%;

    }
    #fff3 #submit{
      background: #A04000;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 10%;
      margin-left: 1%;
    }
    #f1 .cl1 .box{
      border:solid 1px black;
      width: 71%;
      height: 30px;
    }

    #f1 .cl1 .box p{
      margin-top: 5px;
      margin-left: 3px;
    }

	</style>
<body>
	<div class="null">man</div>	
	  <div class="vit">
		<h2>Patient Vitals</h2>

		<div class="fom">
        
        <form method="POST" enctype="multipart/form-data">
        	<section id="f1">
          		<div class="cl1">
          		 <h3>Patinet-info</h3>
        		<label>Patient-Name</label><br>
             <?php 
               echo"<div class='box'> <p>$name</p> </div>";
             
              ?>
        		<label>Occupation</label><br>
        		<input type="text" name="occupation"><br>
        		<label>Place of Birth</label><br>
        		<input type="text" name="placeofbirth"><br>
        		<label>Contact</label><br>
        		<input type="text" name="contact"><br>
            <label>Height</label><br>
            <input type="text" name="height"><br>
        		<label>Marrital status</label><br>
        		<select name="marital_status">
        			<option value="single" >single</option>
        			<option value="married" >married</option>
        		</select> 
        	    </div><br>
        	     <center><input id="next" type="button" name="save" value="Next" ></center>
 
		</section>

	    <section id="ff2">
	    	 
	    	    <div class="cl1">
          		<h3>More Patient-info</h3>
        		<label>Religion</label><br>
        		<input type="text" name="religion"><br>
        		<label>Nationality</label><br>
        		<input type="text" name="nationality"><br>
        		<label>Relative Contact</label><br>
        		<input type="text" name="relative_contact"><br>
        		<label>Date of Birth</label><br>
        		<input type="text" name="dob"><br>
        		<label>Age</label><br>
        		<input type="text" name="age"><br> 
               </div><br>
                 <center><input id="previous1" type="button" name="save" value="Previous"><input id="more" type="button" name="save" value="Next"></center> 	
        	
           
	    </section>

	    <section id="fff3">
	    	 
          	<div class="cl1" id="cl3">
              <h3 class="cl3"> final Patient-info</h3>
        		<label>SPO2</label><br>
        		<input type="text" name="sop2"><br>
        		<label>Pulse</label><br>
        		<input type="text" name="pulse"><br>
        		<label>Weight</label><br>
        		<input type="text" name="weight"><br>
        		<label>Temperature</label><br>
        		<input type="text" name="temp"><br>
        		<label>Blood Pressure</label><br>
        		<input type="text" name="bp"><br>
        		<label>Gender</label><br>
        		<select name="gender">
        			<option value="male" >male</option>
        			<option value="female" >female</option>
        		</select> 
        	   </div><br>
        	     <center><input id="previous2" type="button" name="save" value="Previous"><input id="submit" type="submit" name="submit" value="Submit"></center>  	
        	
  
	    </section>

        </form>

		     

		</div>
        

	  </div>

	 <script src="../../js/jquery-3.6.0.min.js"></script>

     <script >
      $("#next").click(function () {
       $("#f1").css("display", "none");
       $("#ff2").css("display","block");
       
      });

     $("#more").click(function () {
       $("#fff3").css("display", "block");
       $("#f1").css("display","none");
       $("#ff2").css("display","none");
       
      });

     $("#previous1").click(function () {
       $("#fff3").css("display", "none");
       $("#f1").css("display","block");
       $("#ff2").css("display","none");
       
      });

       $("#previous2").click(function () {
       $("#fff3").css("display", "none");
       $("#f1").css("display","none");
       $("#ff2").css("display","block");
       
      });

      $("#submit").click(function () {
       $("#f1").css("display", "none");
       $("#ff2").css("display","none");
       $("#fff3").css("display","block");

      });

   </script>

</body>
</html>