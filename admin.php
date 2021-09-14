
<?php 
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>edit admin</title>
</head>
<style type="text/css">
	.alladmin{
      position: absolute;
      width: 400px;
      left: 300px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

     .addadmin{
      position: absolute;
      width: 400px;
      left: 750px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
      margin: 0;
      padding: 0;

     }

     
    
     .table1{

     }
</style>
<body>
	<?php 
      include("include/header.php");
      include("admin/sidenav.php");
      include("db/connection.php");
    
	 ?>
          <div style="width:400px;" class="alladmin">
            <h5 style="text-align: center;">All Admin</h5>
            <?php 

             $ad = $_SESSION['admin'];
             $query = "select * from admin where username != '$ad' ";
             $res = mysqli_query($connect,$query);

             $output = "<table class='table1'>
                  <tr>
                    <th style='width: 200px;border: 1pt double;cospan'5';>ID</th>
                    <th style='width:500px;border: 1pt double ;'>username</th>
                    <th style='border: 1pt double ;'>Action</th>

                    <tr>

                    ";


             if(mysqli_num_rows($res)<1){
                $output .= "<tr><td style='width: 900px; border: 1pt double ;'>No New Admin</<td></tr>";
             }

             while ($row = mysqli_fetch_array($res)) {
                  $id = $row['id'];
                  $username =$row['username'];
                  $output .=
                  "<tr>
                        <td style='padding-left:40px; border: 0.1pt solid black; box-sizing: 50px;'>$id</td>
                        <td style=' border: 0.1pt solid black;box-sizing: 50px; text-align: center;'>$username</td>
                        <td style=' border: 0.1pt solid black;box-sizing: 50px;'>
                            <a href='admin.php?id=$id'><button type='submit';id='$id' style='background-color:red;color:white;border-color:red'>Remove</button></a>
                        </td>

                        

                        ";
             }

             $output .=
              "</tr>
                
            </table>";
 
              echo $output;


             if (isset($_GET['id'])){
               $id =$_GET['id'];
               $del = mysqli_query($connect,"delete from admin where id = '$id'");

               if($del){
                    mysqli_close($connect); 
                    
                    exit;   
                }
                    else
             {
                 echo "Error deleting record"; 
              }
              
            

           }

             ?>

            

                    
                    
     </div> 
     <button type="submit" name="remove">Remove</button>

     <div class="addadmin">

       <?php 
         
         if(isset($_POST['add'])){
            $uname = $_POST['uname'];
            $pass =$_POST['pass'];
            $image =$_FILES['img']['name'];

            $error =array();

            if(empty($uname)){
                $error['u'] = "Enter Admin Username";
            }else if(empty($pass)){
                $error['u'] = "Enter Admin Password";

            }else if(empty($image)){
                $error['u'] = "Enter Admin Picture";
            }

            if (count($error)==0){

             $q = "insert into admin (username,password,profile) values('$uname','$pass','$image')";
             $result = mysqli_query($connect,$q);
             if($result){
                move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
             }else{

             }

            }

         }

          if(isset($error['u'])){
            $er =$error['u'];
            $show = "<h5 style ='background-color:red text-align:center;padding-top:10px;padding-left:5px;color:red;'>$er</h5>";

          }else{

            $show ="";

          }
    
        ?>

            <h5 style="text-align:center;">Add Admin</h5>  
            <form action="#" method="POST" enctype="multipart/form-data">
             <div>
                 <?php 

                   echo $show;
                  ?>
             </div>   
             <div class="form">
                   <div style="padding-bottom: 5px; padding-top:10px;"><label style="padding-left:5PX">Username</label></div> 
                    <input style="width:90%" class="form-control" type="text" name="uname">
             </div>

            <div style="padding-bottom: 10px; padding-top: 7px;" class="form">
                    
                    <div><label style="padding-left:5px;">Password</label></div> 
                    <input  style="width:90%" class="form-control" type="password" name="pass">
            </div>

             <div class="form">
                    <label style="padding-left:5px;">Add Admin picture</label>
                    <input class="form-control" type="file" name="img" style="">
                </div><br>
                <input style="background-color:green; color:white" type="submit" name="add" value="Add New Admin">



            </form>
     </div>
    
    

        


</body>
</html>




