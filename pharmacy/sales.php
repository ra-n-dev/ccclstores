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
    $diet =date('dmy'); 

       echo"<br>";

       session_start();
       if(empty($_SESSION["refreshed_round"])){
          $_SESSION["refreshed_round"]=0;
        }
          $_SESSION["refreshed_round"]++;
          $dart =$_SESSION["refreshed_round"]++;
        echo "$diet" . $_SESSION["refreshed_round"];

        echo"<br>";
        echo"$dart";
     
    ?>


</body>
</html>