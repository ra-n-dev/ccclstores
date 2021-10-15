<?php 
 include("header.php");
  
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sales</title>
</head>
<body>
    <p>This is the Sales Page</p>
    <?php

       session_start();
       if(empty($_SESSION["refreshed_round"])){
          $_SESSION["refreshed_round"]=0;
        }
          $td =date('dmy');
          $tm =date("dmy", time()+86400); 
          $dart =$td . $_SESSION["refreshed_round"]+=1;
         echo "$dart <br>"; 
         
        
        
         
    ?>
    <?php 
      $td =date('dmy');
       
      echo $tm."<br>";
      if($td ==$tm){
         $_SESSION["refreshed_round"]=0;
      }
      $wee =$tm.$_SESSION["refreshed_round"];
      echo"$wee <br>";
          
     ?>

   


</body>
</html>