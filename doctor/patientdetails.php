<?php 
 session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patient Details</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

</head>
<style type="text/css">
	
	.pat{
		margin-left: 240px;
	}
	.pat h3{
		
	}
    .pat form .search{
        background: white;
    }
    .pat form .search .sub1{
      width: 300px;
      height: 28px;
    }
   .pat form .search .sub2{
      width: 65px;
      height: 34px;
      margin-left: -4px;
    }
</style>
<body>
	<?php 
       include("../db/connection.php");
       include("../include/header.php");
       include("sidenav.php");
	 ?>
   <div class="pat">
   <h3>List of All Patient</h3>
      <?php 

     if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        $query ="SELECT * FROM patient_table WHERE name LIKE '%$searchkey%' ";
     }else{
       $query ="SELECT * FROM patient_table ORDER BY reg_date DESC";
       $searchkey ="";
     }
     $result =mysqli_query($connect, $query);
     echo "
     <form method='POST' enctype='multipart/form-data'>
     <div class='search'>
           <input class='sub1' type='text' name='search' placeholder='Search Patient by Name' value='$searchkey'>
           <input class='sub2' type='submit' name='action' style='background: green; color: white; width:65px; border: 1px green;'>
     </div>
       
      </form>

     ";


    echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
        <tr border=0.1>
           <td style='background:#3090C7;color:white'>ID</td>
           <td style='background:#3090C7;color:white'>Name</td>
           <td style='background:#3090C7;color:white'>Occupation</td>
           <td style='background:#3090C7;color:white'>Phone Number</td>
           <td style='background:#3090C7;color:white'>Gender</td>
           <td style='background:#3090C7;color:white'>Age</td>
           <td style='background:#3090C7;color:white'>Registration Date</td>
           <td style='background:#3090C7;color:white'>Action</td>
      
        </tr>

      
     ";

     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No patient yet</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {
     	          $id = $row['patient_id'];
                  $name = $row['name'];
                  $occupation = $row['occupation'];
                  $phone = $row['contact'];
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

                         echo" 
                               <a href='folder.php?patient_id=".$row['patient_id']." ' style='background:green;width:100%;color:white;text-decoration:none;padding-right:16px;padding-left:6px;'>Folder</a>
                              
                             
                               ";                       
                                                 
                         echo" </td>

                      </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;

             ?>
   
   </div>


</body>
</html>