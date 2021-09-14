
<?php 
  session_start();
  include("include/header.php");
  include("db/connection.php");

  if(isset($_POST['save'])){
  	$patientname=$_POST['name'];
  	$occupation =$_POST['occupation'];
  	$placeofbirth =$_POST['placeofbirth'];
  	$temperature=$_POST['temp'];
  	$religion =$_POST['religion'];
  	$relative_phone=$_POST['relative_phone'];
  	$dob =$_POST['dob'];
  	$nationality =$_POST['nationality'];
  	$weight =$_POST['weight'];
  	$pulse =$_POST['pulse'];
  	$bp =$_POST['bp'];
  	$phone= $_POST['phone'];
  	$age =$_POST['age'];
  	$gender =$_POST['gender'];
  	$height =$_POST['height'];
  	$married_status=$_POST['married_status'];

  	

  	$query = "	INSERT INTO patientvital(name,occupation,placeofbirth,reg_date,temp,religion,relative_phone,dob,nationality,weight,pulse,bp,phone,age,gender,height,marriedstatus,history,diagnosis,prescription)value('$patientname','$occupation','$placeofbirth',now(),'$temperature','$religion','$relative_phone','$dob','$nationality','$weight','$pulse','$bp','$phone','$age','$gender','$height','$married_status','No medical history yet','No medical diagnosis yet','No medicine prescribed yet')";
  	$result =mysqli_query($connect, $query) or die(mysqli_error($connect));
  	if($result){
  		header("Location:index.php");

  	}else{
  		echo "<script>alert('Patient vitals failed to save')</script>";
  	}

  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>enterprise software</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style type="text/css">
body{
 margin: 0;
 padding: 0;
 position: relative;
    
}
	form{
		background: transparent;
		height: 100vh;
	}
	form input{
		height: 24px;
		width: 15%;
		margin: 0;
	}
	.connt{
		position: absolute;
	}
	.field1{
		margin-top: 10px;
		margin-left: 10px;
	}
	.field1 input{
		width: 260px;
		margin-bottom: 10px;
	}
	.field1 label{
		color: black;
		font-size: 18px;
	}
	.field2{
		margin-left: 300px;
		margin-top: -242px;
	}
	.field2 input{
		width: 260px;
		margin-bottom: 10px;
	}
	.field2 label{
		color: black;
		font-size: 18px;
	}
	.field3{
		margin-left: 590px;
		margin-top: -242px;
	}
	.field3 input{
		width: 260px;
		margin-bottom: 10px;
	}
	.field3 label{
		color: black;
		font-size: 18px;
	}
	.field4{
		margin-left: 880px;
		margin-top: -242px;
	}
	.field4 input{
		width: 260px;
		margin-bottom: 10px;
	}
	.field4 label{
		color: black;
		font-size: 18px;
	}
	
	.field5{
	  margin-top: 10px;
	  margin-left: 10px;
	}
	.field5 input{
		width: 193px;
		font-size: 20px;
		height: 40px;
		color: white;
	}
	.vit h3{
		text-align: center;
		font-size: 28px;
		text-decoration: underline;
	}


</style>
<body >
	<div class="vit">
		<h3>New Patient Vitals</h3>
	</div>
	<div class="connt">
		<form method="POST" enctype="multipart/form-data">
		
		<div class="field1">

			<div><label>Paitent Name</label></div>
			<input placeholder="Name" type="text" name="name">

			<div><label>Occupation</label></div>
			<input placeholder="Occupation" type="text" name="occupation">

			<div><label >Place of Birth</label></div>
			<input placeholder="Birthplace" type="text" name="placeofbirth">


			<div><label>Height</label></div>
			<input placeholder="Height" type="text" name="height">
		</div>


		<div class="field2">
			<div><label >Temperature</label></div>
			<input placeholder="Temp." type="text" name="temp">


			<div><label >Religion</label></div>
			<input placeholder="Religion" type="text" name="religion">

			<div><label >Relative Tel.</label></div>
			<input placeholder="Telephone" type="text" name="relative_phone">


			<div><label >Date of Birth</label></div>
			<input placeholder="DoB" type="text" name="dob">
		</div>


		<div class="field3">
			<div><label>Married Satus</label></div>
			<input placeholder="status" type="text" name="married_status">


			<div><label>Nationality</label></div>
			<input  placeholder="Nationality" type="text" name="nationality">

			<div><label>Weight(Kg)</label></div>
			<input placeholder="Weight" type="text" name="weight">


			<div><label >Pulse</label></div>
			<input placeholder="Pulse" type="text" name="pulse">
		</div>

		<div class="field4">
			<div><label>Blood Pressure</label></div>
			<input placeholder="BP" type="text" name="bp">



			<div><label>Telephone</label></div>
			<input  placeholder="Telephone" type="text" name="phone">
             

            <div><label >Age</label></div>
			<input placeholder="Age" type="text" name="age">


             <div><label>Gender:</label></div>
             <select style="width:262px;height: 30px;" name="gender">
                <option value="Select Gender"></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>

             </select>

			
		</div>


		<div  class="field5">
			<input style="background-color: green;" type="submit" name="save" value="Submit Vitals">
		</div>
</form>
		
	</div>
	
</body>
</html>
