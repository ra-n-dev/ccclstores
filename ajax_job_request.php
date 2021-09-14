
<?php 
  session_start();

 ?>
<?php 
include("db/connection.php");


$query ="SELECT * FROM doctors WHERE status ='pendding' ORDER BY date_reg ASC";

$res =mysqli_query($connect,$query);

$output ="";

$output .="
    <table>

    <tr>
     <th>ID</th>
     <th>Firstname</th>
     <th>Surname</th>
     <th>Username</th>
     <th>Email</th>
     <th>Gender</th>
     <th>Phone</th>
     <th>Date Registered</th>
     <th>Action</th>

    </tr>


";
   if(mysqli_num_rows($res)<1){

   	$output .="

       <tr>
         <td colspan '8'>No job Request Yet.</td>
       </tr>
   ";
   }

   while($row= mysqli_fetch_array($res)){
   	$output .="

       <tr>
         <td>".$row['id']."</td>
         <td>".$row['firstname']."</td>
         <td>".$row['surname']."</td>
         <td>".$row['username']."</td>
         <td>".$row['email']."</td>
         <td>".$row['gender']."</td>
         <td>".$row['phone']."</td>
         <td>".$row['date_reg']."</td>
         <td>
           <div style ='width:30%'>
             <button id= ' ".$row['id']."  ' style='background:green'>Approve</button>
           </div>
            <div style ='width:30%'>

              <button id= ' ".$row['id']."  'style='background:red'>Reject</button>
             
           </div>
         </td>
   	";
   }
     $output .= "

      </tr>
      </table>
     "


 ?>