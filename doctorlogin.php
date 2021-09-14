
 <?php 
 session_start();
 include("db/connection.php");
 
   
 if(isset($_POST['logins'])){

    
    $password = $_POST['password'];
    $firstname=$_POST['firstname'];

    $error=array();

    $q ="SELECT * FROM doctors WHERE firstname ='$firstname' AND password ='$password' ";
    $qq =mysqli_query($connect, $q);

    $row = mysqli_fetch_array($qq);

    if($row['status']=="pendding"){
        $error['login'] ="<h4  style='text-align: center; background:peachpuff; height: 30px; width: 70%;margin-left:15%;padding-top:5px;'>Please wait for the admin to confirm<h4>";
    }else if($row['status']=="Rejected"){
        $error['login'] = "<h4  style='text-align: center; background:peachpuff; height: 30px; width: 70%;margin-left:15%;padding-top:5px;'>Admin rejected you try again later<h4>";
    } else

    if(count($error)==0){
        
         $query = " select * from doctors where firstname='$firstname' and password = '$password'";

         $result = mysqli_query($connect,$query);



         if(mysqli_num_rows($result) == 1){

            $_SESSION['doctor']=$firstname;
            echo "<script>alert('you have login as an doctor')</script>";

            header("Location: doctor/index.php");

            exit();
            
        }else{

          echo "<script>alert('Invalid Account')</script>";   
        }
    }

}

if(isset($error['login'])){
    $l =$error['login'];
    $show ="<h5 background :red; text-align:center;>$l<h5>";
}else{
    $show="";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Doctor login</title>
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
        height: 55px;
        background: transparent;
        overflow: auto;
        margin-top: 0px;
        overflow: hidden;
        
    }



    .forms{
    	background-color: beige;
    	align-items: center;
        margin-left: 30%;
 		padding-top: 2%;
    	
    	width: 450px;
    	min-height: 60vh;
    }
    .forms .docform{
     background-color: transparent;


    }
    .forms .docform .bb{
     width: 380px;
     margin-bottom: 10px;
     height: 25px;

    }
    .forms .docform .bbb{
    	margin-left: 20px;

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


    <div class="forms">

        <div><?php echo $show; ?></div>

         <form class="docform" method="POST"  enctype="multipart/form-data">
          
         <div class="bbb">
         <h3 style="margin-left: 33%;">Doctor Login</h3>

         <div style="padding-bottom: 8px;"><label >FirstName</label></div>
         <input class="bb" placeholder="Please enter username" type="text" name="firstname" required>
         <div style="padding-bottom: 8px;"><label >Password</label></div>
         <input class="bb" autocomplete="off" type="password" name="password" required >

         <div>
         	<input style="background:green;color: white;" type="submit" name="logins" value="Login">
         </div>

         <p>You dont have an account? <a style="list-style-type: none; text-decoration:none" href="apply.php">Apply Now !!!</a></p>
         </div>

         </form>
    	

    </div>

</body>
</html>