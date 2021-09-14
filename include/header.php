
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>enterprise software</title>



</head>
<style type="text/css">
    .container{
        border-left: solid 1px #000;  border-right: solid 1px #000;
        padding: fixed;
        width: 105%;
        margin-left: 0px;
        background-color:#3090C7;
    }


   nav {
    float: right;
    padding-right: 5%;
    margin: auto;
    word-spacing: 4px;
    top: 0;
    font-size: 20px;


   }


</style>

<body >


   <div class="container">

        <header >
            <nav>
                <ul style="text-decoration-color: white;">

                    <?php 
               
                 
                 if(isset($_SESSION['admin'])){


                    $user = $_SESSION['admin'];

                    echo "
                                          <li>
                         <a style='text-decoration: none; color: gold;margin-left:-1%; margin-right:20px; 'href='user.php'>$user </a>
                         
                         <a style='text-decoration: none;' href='logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                     </li> 

                     "; 
 

                 } elseif(isset($_SESSION['doctor'])){
                      
                     $firstname= $_SESSION['doctor'];

                      echo "

                       
                    

                     <li>
                         <a style='text-decoration: none; color: gold;margin-left:-10%; margin-right:2%; 'href='user.php'>Dr. $firstname </a>
                         
                         <a style='text-decoration: none;color:gold; margin-right:5%' href='logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                     </li> 


                     "; 
                      

                 }



                  else{
                    
                   echo '
                    <a class="ad " href="adminlogin.php">Admin</a>
                    <a href="#">Patient</a>
                    <a href="doctorlogin.php">Doctor</a>
                    <a href="new.php">New</a>';
                 }

                 
                 ?>
                  
                </ul>

            </nav>
        </header>
    </div >
   
</body>
</html>