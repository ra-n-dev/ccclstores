<?php 
    $query = "SELECT * FROM multi_login ";
    $res =mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row =mysqli_fetch_array($res);
    $uname = $row['username'];
    $pass =$row['password'];
    $utype =$row['usertype'];
 ?>
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
        margin-left: 0px;
        background-color:black;
    }


  
    nav {
         overflow: hidden;
        display: inline-block;
        float: right;
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

</style>

<body >


   <div class="container">

        <header >
            <nav>
                <ul style="text-decoration-color: white;text-decoration: none; ">

             <?php    

                 if(isset($_SESSION['admin'])){ 


                    $uname = $_SESSION['admin'];

                    echo "
                      <li>
                         <a style='text-decoration: none; color: black;margin-left:-1%; margin-right:20px; '#>$uname </a>
                         
                         <a style='text-decoration: none;' href='../logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                      </li> 
                      "; 
                    } elseif(isset($_SESSION['doctor'])){
                      
                     $uname= $_SESSION['doctor'];

                      echo "
                     <li>
                         <a style='text-decoration: none; color: black;margin-left:-25%; padding-right:15%; 'href='#'>Dr. $uname</a>
                         
                         <a style='text-decoration: none;color:black; margin-right:5%' href='../logout.php'><i class='fas fa-sign-out-alt'></i>Sign-out</a>
                     </li>
                     "; 
                      

                 }elseif(isset($_SESSION['account'])){
                      
                     $uname= $_SESSION['account'];

                      echo "
                     <li>
                         <a style='text-decoration: none; color: gold;margin-left:-10%; margin-right:2%; 'href='#'>$uname </a>
                         
                         <a style='text-decoration: none;color:gold; margin-right:5%' href='../home/logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                     </li>
                     "; 
                      

                 }else if(isset($_SESSION['nurse'])){

                    $uname= $_SESSION['nurse'];
                    echo "
                        <li>
                         <a style='text-decoration: none; color: gold;margin-left:-1%; margin-right:20px; 'href='#'>$uname </a>
                         
                         <a style='text-decoration: none;' href='logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                       </li> 
                       "; 

                 }else if(isset($_SERVER['labtech'])){
                    $uname= $_SESSION['labtech'];
                    echo "
                        <li>
                         <a style='text-decoration: none; color: gold;margin-left:-1%; margin-right:20px; 'href='#'>$uname</a>
                         
                         <a style='text-decoration: none;' href='logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                       </li> 
                       ";

                 }else if(isset($_SESSION['receptionist'])){
                    $uname= $_SESSION['receptionist'];
                    echo "
                        <li>
                         <a style='text-decoration: none; color: black;margin-left:-1%; margin-right:20px; 'href='#'>$uname </a>
                         
                         <a style='text-decoration: none;' href='../logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                       </li> 
                       ";

                 }else if(isset($_SESSION['pharmacist'])){
                    $uname= $_SESSION['pharmacist'];
                    echo "
                        <li>
                         <a style='text-decoration: none; color: gold;margin-left:-1%; margin-right:20px; 'href='#'>$pharmacist</a>
                         
                         <a style='text-decoration: none;' href='logout.php'><i class='fas fa-sign-out-alt'></i>sign-out</a>
                       </li> 
                       ";

                 }



                  else{
                    
                   echo '
                    <a class="ad " href="adminlogin.php">Admin</a>
                    <a href="#">Patient</a>
                    <a href="doctorlogin.php">Doctor</a>';
                 }

                 
                 ?>
                  
                </ul>

            </nav>
        </header>
    </div >
   
</body>
</html>