
<?php 
 session_start();
  include("../db/connection.php");
  if(isset($_POST['save'])){
  	$username =$_POST['user'];
  	$password= $_POST['pass'];
  	$usertype =$_POST['usertype'];
    
    $query = "SELECT * FROM staff_table WHERE username ='$username' AND password ='$password' AND usertype ='$usertype'";
    $res =mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row =mysqli_fetch_array($res);
    $uname = $row['username'];
    $pass =$row['password'];
    $utype =$row['usertype'];
  	 
    if($pass= $row['password']){
    	echo"<script>alert('you have login as ".$row['usertype']." ')</script>";
    	if($row['usertype']==='admin'){
    		$_SESSION['admin']=$uname;
        // echo"<script>alert('welcome to the admin page ')</script>";
         ?>
       	<script>window.location.href="../home/admin2/index.php"</script>
       	<?php
    	}else if($row['usertype'] ==='doctor'){
    		$_SESSION['doctor']=$uname;
    		//echo"<script>alert('welcome to the doctors page ')</script>";
    		echo'<script>window.location.href="../home/doctor/index.php"</script>';
       	
       	
    	}else if($row['usertype']==='account'){

    		$_SESSION['account']=$uname;
    	//	echo"<script>alert('welcome to the labtech page ')</script>";
    		//echo"<script>alert('welcome to the pharmacy page ')</script>";
    		echo'<script>window.location.href="../home/account/index.php"</script>';

    	}else if($row['usertype']==='nurse'){
    		$_SESSION['nurse']=$uname;
    		echo"<script>alert('welcome to the nurse page ')</script>";

    	}else if($row['usertype']==='labtech'){

    		$_SESSION['labtech']=$uname;
    	//	echo"<script>alert('welcome to the labtech page ')</script>";
    		//echo"<script>alert('welcome to the pharmacy page ')</script>";
    		echo'<script>window.location.href="../home/laboratory/index.php"</script>';

    	}else if($row['usertype']==='pharmacist'){

    		$_SESSION['pharmacist']=$uname;
    		//echo"<script>alert('welcome to the pharmacy page ')</script>";
    		echo'<script>window.location.href="../home/pharmacy/index.php"</script>';

    	}else if($row['usertype']==='receptionist'){

    		$_SESSION['receptionist']=$uname;
    		//echo"<script>alert('welcome to the reception page ')</script>";
    		$_SESSION['receptionist']=$uname;
         ?>
       	<script>window.location.href="../home/opd/index.php"</script>
       	<?php
    	}else if($row['usertype']==='store'){

    		$_SESSION['store']=$uname;
    		//echo"<script>alert('welcome to the reception page ')</script>";
    		$_SESSION['store']=$uname;
         ?>
       	<script>window.location.href="../home/store/index.php"</script>
       	<?php
    	}{
    		echo"<script>alert('wait for admin to approve your section ')</script>";
    	}
    }else{
    	echo"<script>alert('invalid account ')</script>";
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Homepage</title>
	    <link rel="icon" href="../image/cccl4.png">

</head>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
		background-image: url(../image/home6.jpg);
		background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 95vh;
	}
    .homcon1 h1{
      margin-top: 7%;	
      margin-left: 20%;
      width: 35%;
    }


	.homcon2{
		background: white;
		width: 20%;
		margin-left: 10%;
		margin-top: 10%;
		height: 40vh;
		position: absolute;
		border-radius: 6px;
		z-index: 999;
		opacity: .7;
		box-shadow: ;
		box-shadow: 1px 1px 1px red;
		padding-left: 14px;
		padding-right: 10px;



	}
	.homcon3{
      background: white;
		width: 20%;
		margin-left: 70%;
		margin-top: 10%;
		height: 40vh;
		position: absolute;
		border-radius: 6px;
		z-index: 999;
		opacity: .7;
		box-shadow: ;
		box-shadow: 1px 1px 1px red;
		padding-left: 14px;
		padding-right: 10px;
	}

	.homcon2 h2{
		padding-top: 3px;
		color: black;
		text-decoration: underline;
	}

	.homcon3 h2{
		padding-top: 3px;
		color: black;
		text-decoration: underline;
	}
	header ul li{
		display: inline;
		text-decoration: none;
	}
	header {
        overflow: hidden
    }

	nav {
 		 overflow: hidden;
  		display: inline-block;
  		float: left;
 		 margin-left: 70px;
		}

	nav li {
  		margin-right: 70px;
  		float: left;
	  }

	nav ul {
 		 list-style: none;
  		overflow: hidden
	}
	.bod2{
		background: white;
		width: 30%;
		height: 55vh;
		margin-left: 15%;
		border-radius: 5px;
		margin-top: 15%;
		position: fixed;
		opacity: .6;
		display: none;
	}
	.bod2 center h2{
		padding-top: 2%;
		text-decoration: underline;
	}
	.bod2sub1{
		border: solid 1px red;
		height: 38vh;
		width: 25.3%;
		margin-left: 2%;
		margin-bottom: 2%;
		position: fixed;

	}
	.bod2 form input{
        width: 90%;
        height: 30px;
        margin-left: 2.5%;
	}
	.bod2 form .subb{
		width: 40%;
		margin-left: 30%;
		padding-right: 2%;
		background: green;
		border-color: transparent;
		color: white;
		border-radius: 5px;
	}
	.bod2 form label{
		margin-left: 2.5%;
        color: black; 
	}
	.bod2 form select{
		width: 92.2%;
        height: 35px;
        margin-left: 2.5%;
	}
	.bod2 img{
		position: absolute;
 		background: red;
 		height: 30px;
 		width: 30px;
 		border-radius: 20px;
 		margin-left: 97%;
 		margin-top: -6%;
 	}
</style>
<body>
 <div class="bod1" id="bod1">
 	<header>
 		<nav>
 		<ul>
 			<li><a id="login" href="#">Login</a></li>
 			<li><a href="#">Services</a></li>
 			<li><a href="#">Structure</a></li>
 			<li><a href="#">Contact</a></li>
 			<li><a href="#">Notice</a></li>
 		</ul>
 	   </nav>
 	</header>
 	<div class="homcon1">
 	<h1>Welcome to Classic Care Clinic</h1>	
 	</div>
 	
 	<div class="homcon2">
 		<center><h2>Our Mission</h2></center>
 		<h3>At Classic Care Clinic, it has been our desire to save lives</h3>
 		
 	</div>
 	<div class="homcon3">
 		<center><h2>Our Vission</h2></center>
 		<h3>At Classic Care Clinic,our priority is to Provide Quality Health Care</h3>
 		
 	</div>

 </div>

 <div class="bod2" id="bod2">
 	<a id="close" href=""><img src="../image/close1.png" alt="image is required"></a>
 	<center><h2>Staff Login Form</h2></center>	
 	
 	<div class="bod2sub1">
 		<form method="POST"  enctype="multipart/form-data">
 			<label >Username:</label><br>
 			<input type="text" name="user"><br>
 			<label>Password:</label><br>
 			<input type="text" name="pass"><br>
 			<label>Usertype:</label><br>
 			<select name="usertype" style="margin-bottom:20px">
 			 <option value="admin">admin</option>	
 			 <option value="doctor">doctor</option>
 			 <option value="account">account</option>
 			 <option value="nurse">nurse</option>
 			 <option value="receptionist">receptionist</option>
 			 <option value="labtech">labtech</option>
 			 <option value="store">Store</option>
 			 <option value="pharmacist">pharmacist</option>
 			</select><br>
 			<input class="subb" type="submit" name="save">
 			
 		</form>
 	</div>
 	
 </div>
 <script src="../js/jquery-3.6.0.min.js"></script>
 <script>
        $("#login").click(function () {
       $("#bod1").css("display", "none");
       $("#bod2").css("display","block");
       
      });
     $("#close").click(function () {
       $("#bod2").css("display", "block");
       $("#bod1").css("display","none");
       
      });
 </script>

</body>
</html>