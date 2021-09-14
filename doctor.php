
<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Total Doctors</title>
</head>
<style type="text/css">
	.doc{
		margin-left: 240px;
	}
	.popup{
		background: rgba(0, 0, 0, 6.0);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		display: none;
		justify-content: center;
		align-items: center;
	}
	.popup-content{
		height: 250px;
		width: 500px;
		background: #fff;
		padding: 20px;
		border-radius: 5px;
		position: relative;
		


	}
	.imgs{
		border-radius: 26px;
		height: 60px;
		width: 60px;
		margin-left: 45%;
	}
	.imgss{
		position: absolute;
		border-radius: 26px;
		height: 20px;
		width: 20px;
		margin-left: 510px;
		top: -14px;
		cursor: pointer;
	}
	.popup label{
		color: deeppink;
	}
</style>
<body>
  
 	<?php 

     include("include/header.php");
     include("admin/sidenav.php");
     include("db/connection.php");
   ?>
   <div class="doc">
   	<h3>List of Doctors working for Classic Care Clinic Ltd.</h3>
            <?php 

            
             $query ="SELECT * FROM doctors WHERE status ='Approved' ORDER BY date_reg ASC";
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
                     <th style='border: 0.1pt double ;background:#3090C7;color:white;padding-right:5px'>Salary</th>
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
                  $salary = $row['salary'];
                  
                 
                 echo "<tr>
                        <td style=' border: 0.1pt solid black;background:#3090C7;color:white;padding-left:5px;padding-right:5px;'>$id</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$firstname</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$surname</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$username</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$email</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$gender</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$phone</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$date_reg</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$salary</td>
                        ";


                         echo  "<td style=' border: 0.1pt solid black;'>";

                         echo" 
                               <a href='edit.php?id=".$row['id']." ' style='background:green;width:100%;color:white;text-decoration:none;padding-right:16px;padding-left:6px;'>Edit</a>
                              
                             
                               ";                       
                                                 
                         echo" </td>

                      </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;

             ?>
              

                <a id ='mybtn' href='#' style='background:green;width:100%;color:white;text-decoration:none;padding-right:16px;padding-left:6px;'>Add</a>
           
               

   	
   </div>

   <form class="popup">	
     <div class="popup-content">
     	<img class="imgss" src="image/close1.png" alt="image is required">
     	<img class="imgs" src="image/doc1.jpg" alt="image is required">
     	<p style="margin-top:-10px">Edit Doctor's Details</p>
     	<div style="margin-bottom: 10px;">
     		 <label>Firstname</label>
     		 <input type="text" name="firstname">
     		 <label style="margin-left: 20px;">Firstname</label>
     	     <input type="text" name="firstname">
     	</div>
     	<div style="margin-bottom: 10px;">
     		 <label>Firstname</label>
     		 <input type="text" name="firstname">
     		 <label style="margin-left: 20px;">Firstname</label>
     	     <input type="text" name="firstname">
     	</div>
     	<div style="margin-bottom: 10px;">
     		 <label>Firstname</label>
     		 <input type="text" name="firstname">
     		 <label style="margin-left: 20px;">Firstname</label>
     	     <input type="text" name="firstname">
     	</div>
     	<div style="margin-bottom:17px;">
     		 <label >Firstname</label> 
     		 <input type="text" name="firstname">
     		 <label style="margin-left: 20px;">Firstname</label>
     	     <input type="text" name="firstname">
     	</div>
     	<input style="background:green;color:white;width:100px;" type="submit" name="edit" value="Edit">
     	
     	
     </div>
   </form>
<script>
document.getElementById("mybtn").addEventListener("click", function(){
     
	document.querySelector(".popup").style.display = "flex";
});
document.getElementById("imgss").addEventListener("click", function(){
     
    document.querySelector(".popup").style.display = "none";
});


</script>

</body>
</html>