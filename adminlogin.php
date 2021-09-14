
 <?php 
       session_start();
        
         $host ="localhost";
         $user ="root";
         $password ="";
         $dbname ="ccclhms";
         $connect =mysqli_connect($host,$user,$password,$dbname);

       if(isset($_POST['login'])){

        $username =$_POST['adminusername'];
        $password =$_POST['adminpassword'];


        $error =array();

        if(empty($username)){

            $error['admin'] = "Enter username";

        }else if(empty($password)){


            $error['admin'] = "Enter password";

        } 

        if (count($error)==0){

         $query = " select * from admin where username = '$username' and password = '$password'";

         $result = mysqli_query($connect,$query);



         if(mysqli_num_rows($result) == 1){
            
            echo "<script>alert('you have login as an admin')</script>";


            $_SESSION['admin'] = $username;
            header("Location: administration.php");

            exit();

         } else {

           echo "<script>alert('invalid username or password')</script>";

         }

        }

       }



       ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>adminlogin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
 <style type="text/css">
 	   body{

        background-image: url(image/bg8.jpg);
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }
 	.adform{
 		background: #e3e3e3;
 		height: 80%;
 		width: 40%;
 		background-color: #e3e3e3;
 		margin-left: 30%;
 		padding-top: 2%;


 	}
 	input{
 		width: 78%;
 		height: 23px;
 		margin-bottom: 10px;
 		margin-top: 3px;
 		
 	}


    .hd5{
    	margin-left: 0%;
    	font-size: 20px;
    }
     
     .nav2{
     	
     	background-color: transparent;
     	float: left;
     	width: 100%;
     	padding-left: 25px;

     }
       ul a:hover{
       color: green;
     }

     p{
       font-size: 23px;
       font-family: sans-serif;
       color: red;
     }
     .im{
        width: 50%;
        height: 120px;
     }
     .newcontainer{
        padding-left: 7%;
     }

     .alert{
        color: red;
     }
     .containered{
        width: 100%;
        height: 55px;
        background: transparent;
        overflow: auto;
        margin-top: 0px;
        overflow: hidden;
        
    }


 </style>
<body>


  <div class="containered">
        <header>
            <h2>Hospital Management System</h2>
            <nav>
                <ul style="text-decoration-color: white;">

               
                   <a href="index.php">Home</a>
                    <a href="#">Patient</a>
                    <a href="logout">Doctor</a>
                    <a href="new.php">New</a>
                 
                </ul>

            </nav>
        </header>
    </div >
	
	        	<div class="adminlog ">
        		
        		<form class="adform" method="POST">

                    <center><img class="im" src="image/adm.jpg">
                     <h5 class="hd5">Classic Care Clinic Administrator</h5>

                    </center>

                    <div class="newcontainer">

        
                 <div class="alert "> 
                     <?php 
                       
                       if(isset($error['admin'])){

                        $show = $error['admin'];

                       }else{

                        $show ="";
                       }

                       echo $show;

                      ?>
                    </div>
                       
                        
                        
                    <div>
                        <label  for="adminusername">Username</label>
                    </div>
                    <div>
                        <input type="text" name="adminusername" placeholder="username" >
                    </div>
                    
                    
                    <div>
                    <label  for="adminpassword">Password</label>
                    </div>

                    <div>
                        <input type="password" name="adminpassword" placeholder="password" >
                    </div>
                



                    <input style="background-color:green; color: white; width: 80px; height: 30px; " type="submit" name="login" class="buts" type="submit" value="Login">
                    
                   



                    <p>Don't share your login Details</p>
                    </div>
                     

        			
        		</form>
        		
        	</div>
	        
        	

</body>
</html>