
<?php 
  session_start();

 ?>
<?php 
 include("db/connection.php");
 
 if(isset($_POST['apply'])){

    $firstname=$_POST['firstname'];
    $surname =$_POST['surname'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $qualification =$_POST['qualification'];
    $gender =$_POST['gender'];
    $phone =$_POST['phone'];
    $password = $_POST['pass'];
    $confirm_passward =$_POST['con_pass'];

    if($password == $confirm_passward){

     $query ="INSERT INTO doctors(firstname,surname,username,email,qualification,gender,phone,password,salary,date_reg,status,profile)values('$firstname','$surname','$username','$email','$qualification','$gender','$phone','$password','30.00',Now(),'pendding','doc.jpg') ";

     $result =mysqli_query($connect,$query)or die(mysqli_error($connect));

     if($result){

       echo "Doctor's application was successfull";
       header("Location: doctorlogin.php");

       }else{

       echo "Error in registration";
       }



        }else{
    
        echo "password did not match";
     }

 

 }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title> Doc Apply </title>
</head>
<style type="text/css">
	
	 body{

        background-image: url(image/bg8.jpg);
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }

        .containered{
        width: 100%;
        margin: auto;
        background: transparent;
        overflow: auto;
        margin-top: 0px;
        overflow: hidden;
        
    }
    .foom form input{
        width: 90%;
        height: 25px;
    }

     .foom form .sub{
        width: 100px;
    }

    .foom form select{
         width: 91%;
         height: 32px;
    }
    .foom{
     margin-left:5%;
     height: 100vh;
    }
 

</style>
<body>
	 <div class="containered">
        <header>
            <h2>Hospital Management System</h2>
            <nav>
                <ul style="text-decoration-color: white;">
               
                   <li ><a href="index.php">Home</a></li>
                    <li > <a href="patient.php">Patient</a></li>
                    <li ><a href="new.php">OPD</a></li>
                 
                </ul>

            </nav>
        </header>
    </div >
    <div class="containerr">

        <h3 style="text-align: center; padding-top: 20px;">Apply Now !!!</h3>
        <div class="foom">
            
            <form style="background: transparent;" method="post">
                <div> <label>Firstname</label></div>
               
                <input type="text" name="firstname" placeholder="Enter firsname" autocomplete="off">

                 <div style="margin-top:8px"><label>Surname</label></div>
                <input type="text" name="surname" placeholder="Enter surname" autocomplete="off">

               <div style="margin-top:8px"> <label>Username</label></div>
                <input type="text" name="username" autocomplete="off" placeholder="Enter username">

                <div style="margin-top:8px"> <label>Email</label></div>
                <input type="email" name="email" autocomplete="off" placeholder="Enter email">

                <div style="margin-top:8px"> <label>Qualification</label></div>
                <input type="text" name="qualification" autocomplete="off" placeholder="Enter level of qualification">

                <div style="margin-top:8px"> <label>Select Gender</label></div>
                 <select name="gender">
                     <option value="Select Gender"></option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>

                 </select>

                 <div style="margin-top:8px"> <label>Phone Number</label></div>
                 
                  <input type="number" name="phone" autocomplete="off" placeholder="Enter phone number">


                <div style="margin-top:8px"> <label>Select Country</label></div>
                 <select name="country">
                     <option value="Select Counrty"></option>
                     <option value="Ghana">Ghana</option>
                     <option value="USA">USA</option>
                     <option value="Russia">Russia</option>
                     <option value="India">India</option>
                     <option value="Cuba">Cuba</option>
                     <option value="England">England</option>

                 </select>

                 <div style="margin-top:8px"> <label >Password</label></div>
                 
                  <input type="password" name="pass" autocomplete="off">


                  <div style="margin-top:8px"> <label>Confirm Password</label></div>
                 
                  <input type="password" name="con_pass" autocomplete="off" placeholder="Confirm password">

                  <div style="margin-top: 10px;">
                    <input class="sub" style="background-color:green; color:white;" type="submit" name="apply" value="Apply Now">
                   </div>

                   <p>Already have an account? <a style="text-decoration:none;" href="doctorlogin.php">Click Here !!!</a></p>
                 
                  


                

            </form>
        </div>
        

    </div>

</body>
</html>