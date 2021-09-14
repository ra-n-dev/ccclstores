
<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Job Request</title>
</head>
<style type="text/css">
    body{
    	position: absolute;
    }
     .dooc{
        margin-left: 240px;
     }

</style>
<body>
	<?php 

     include("include/header.php");
     include("admin/sidenav.php");
     include("db/connection.php");

	 ?>
	

	 <div class="dooc">
            <h3 style="">Doctors job Requests yet to be Approved </h3>
            <?php 

            
             $query ="SELECT * FROM doctors WHERE status ='pendding' ORDER BY date_reg ASC";
             $res = mysqli_query($connect,$query);

             echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
                

                  <tr border=0.1>
                     <th style='border: 0.1pt double;background:#3090C7;color:white;padding-right:5px'>ID</th>
                     <th style='border:0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Firstname</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Surname</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Username</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Email</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Gender</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Phone</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:35px'>Date Registered</th>
                     <th style='border: 0.1pt double ;background:#3090C7;color:white'>Action</th>
                 </tr>

                    ";


             if(mysqli_num_rows($res)<1){
                echo"<tr><td style=' border: 1pt double ;background:#3090C7;color:white;'>No New Job Request</<td></tr>";
             }

             while ($row = mysqli_fetch_array($res)) {
                  $id = $row['id'];
                  $firstname = $row['firstname'];
                  $surname = $row['surname'];
                  $username = $row['username'];
                  $email = $row['email'];
                  $gender = $row['gender'];
                  $phone = $row['phone'];
                  $date_reg = $row['date_reg'];
                  
                 
                 echo "<tr>
                        <td style=' border: 0.1pt solid black;background:#3090C7;color:white;padding-left:5px;padding-right:5px;'>$id</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$firstname</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$surname</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$username</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$email</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$gender</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$phone</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$date_reg</td>";


                         echo  "<td style=' border: 0.1pt solid black;'>";

                         echo" <a href='?updateid=$row[id]' style='background:green; width:100%;color:white;text-decoration:none;padding-right:10px;padding-left:16px;'>Approve</a>";
                       
                         
                         echo"<a href='?rejectid=$row[id]' style='background:red; width:100%;color:white;padding-right:13px;padding-left:16px;text-decoration:none;'>Reject</a>";
                        
                         
                        
                         echo" </td>

                      </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;


             if (isset($_GET['updateid'])){

               $id =$_GET['updateid'];
               $del = mysqli_query($connect,"update doctors set status ='Approved' where id = '$id'");

               if($del){
                    mysqli_close($connect); 
                    
                    exit;   
                }
                    else
             {
                 echo "Error Approving Job request"; 
              }
              
            

           }




             if (isset($_GET['rejectid'])){

               $id =$_GET['rejectid'];
               $del = mysqli_query($connect,"update doctors set status ='Rejected' where id = '$id'");

               if($del){
                    mysqli_close($connect); 
                    
                    exit;   
                }
                    else
             {
                 echo "Error rejecting Job request"; 
              }
              
            

           }

             ?>

            

                    
                    
     </div> 
    

  
      




</body>
</html> 