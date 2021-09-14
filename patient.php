<?php 
 session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Total Patient</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

</head>
<style type="text/css">
	
	.pat{
		margin-left: 240px;
	}
	.pat h3{
		
	}
</style>
<body>
	<?php 
	  include("include/header.php");
      include("admin/sidenav.php");
      include("db/connection.php");
	 ?>
   <div class="pat">
   <h3>List of All Patient</h3>
   <?php 
     $query ="SELECT * FROM patientvital";
     $result =mysqli_query($connect, $query);
    echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
        <tr border=0.1>
           <td style='background:#3090C7;color:white ;border-color:#3090C7'>ID</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7'>Name</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7'>Occupation</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7'>Phone Number</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7'>Gender</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7'>Age</td>
           <td style='background:#3090C7;color:white;border-color:#3090C7;'>Registration Date</td>      
        </tr>

      
     ";

     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
     	          $id = $row['patient_id'];
                  $name = $row['name'];
                  $occupation = $row['occupation'];
                  $phone = $row['phone'];
                  $gender = $row['gender'];
                  $age = $row['age'];
                  $reg_date = $row['reg_date'];
     	                 echo "<tr>
                        <td style=' border: 0.1pt solid black;background:#3090C7;color:white;padding-left:5px;padding-right:5px;'>$id</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$name</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$occupation</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$phone</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$gender</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$age</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$reg_date</td>
                        ";


                         echo  "<td style=' border: 0.1pt solid black;'>";                       
                                                 
                         echo" </td>

                      </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;

             ?>
   
   </div>


</body>
</html>