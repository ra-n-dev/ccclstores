<?php 
session_start();
$caseid= $_SESSION['caseid'];
 $uname= $_SESSION['doctor'];
 include("../../db/connection.php");
 include("../header.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Folder</title>
</head>
<style type="text/css">
	 body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 90vh;
        position: relative;
    }
</style>
<body>
	
	<center>
		<form>
		<h3>Update Patient Information</h3>
		<?php 
         $adb=$_SESSION['doctor'];
         if(isset($_GET['id'])){
          $id =$_GET['id'];
          $query = "SELECT * FROM consultation_table WHERE case_id ='$id' ";
          $res =mysqli_query($connect, $query) or die(mysqli_error($connect));
          $row =mysqli_fetch_array($res);
          $id = $row['case_id'];
          $name =$row['patient_name'];
         


          echo "<table  cellpadding =3 border=2  class='cnt'>
            <tr>
              <th style='color:white;background:black'>Folder number </th>
              <td style ='color:white;font-size: 18px;background:black'>$id</td>
            </tr>
            <tr>
              <th>Name </th>
              <td>$name</td>
            </tr>
           
      
     ";
         }
         echo"</table>";

     ?>
	</form>
	</center>

</body>
</html>