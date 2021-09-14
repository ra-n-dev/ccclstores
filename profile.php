
<?php 
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admin profile</title>
</head>
<style type="text/css">
body{

	background: transparent;
 	background-image: url(image/bg16.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    min-height: 700px;




 	
    }
	
	.profil{
      position: absolute;
      width: 410px;
      left: 213px;
      min-height: 95hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
      margin-top: -19px;
     }
     .fom{
      position: absolute;
      width: 400px;
      left: 613px;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
      margin: 0;
      padding: 0;
      margin-top: 0px;
      overflow: hidden;

     }
      .fom form{

      	padding-left: 0px;
      	padding-top: 25px;
      }

      .fom form input{
      	width: 360px;
      	margin-bottom: 10px;
      }
  

</style>
<body>
	<?php 

      include("include/header.php");
      include("admin/sidenav.php");
      include("db/connection.php");

      $ad = $_SESSION['admin'];
      $query = "select * from admin where username = '$ad' ";
      $res = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($res);
      $profiles =$row['profile'];
      $username =$row['username'];




	 ?>
	 <div class="profil" style="background-color:#3090C7;">
	 	<h4 style="padding-left:20%; word-spacing: 10px"><?php echo $username; ?> Profile</h4>

	  
   <?php 


         
         if(isset($_POST['add'])){
        
            $profile =$_FILES['phot']['name'];

            $error =array();
            if(empty($profile)){
              
                $error['u'] = "Enter Admin Picture";
            }else{
              
             
              $q = "UPDATE admin SET profile = '$profile' where username = '$ad' ";
             $result = mysqli_query($connect,$q)or die (mysqli_error($connect));
             if($result){
                move_uploaded_file($_FILES['phot']['tmp_name'], "img/$profile") ;
                echo "success";
                header("Location:index.php");
                
                    }else{


                      echo "not success";

                   }
 
               }
              
           }


    
     ?>


	 	<form enctype="multipart/form-data" method="POST" style=" background-color: lavenderblush;border-radius: 15px 50px 0px;"  action="" >
	 		<?php 

              echo "<img src='img/$profiles' style='height:220px; width:310px'; ";
	 		 ?>

	 		 <br><br>

	 		 <div>
	 		 	<label>UPDATE PROFILE</label>
	 		 	 <input class="form-control" type="file" name="phot" style="width: 310px;" accept="image/* ">

	 		 	<input type="text" name="old_photo" value="<?php echo $profiles ?>">
	 		 </div>
	 		 <br>
	 		 <input style="background-color:green; margin-bottom: 30px; color: white; margin-left: 5px;" type="submit" name="add" value="UPDATE" >

	 	</form>
	 	
	 </div>
	 <div class="fom">	

	 	<form style="background-color: lavenderblush; height:373px;border-radius: 0px 0px 30px;" method="post" enctype="multipart/form-data">

             <?php 

              if(isset($_POST['update'])){


              $username =$_POST['username'];
              $password =$_POST['password'];
              $confirmpassword =$_POST['cpassword'];
              $profile =$_FILES['phot']['name'];

              $error =array();
              if(empty($profile)){
              
                $error['u'] = "Enter Picture";
              }else if(empty($password)){
                $error['u'] = "Enter Password";

              }else if(empty($username)){
                $error['u'] = "Enter Username";
              }

              else if($password ==$confirmpassword){
              
             
              $q = "UPDATE admin SET profile = '$profile', username ='$username',password ='$password' where username = '$ad' ";
             $result = mysqli_query($connect,$q)or die (mysqli_error($connect));
             if($result){
                move_uploaded_file($_FILES['phot']['tmp_name'], "img/$profile") ;
                echo "<script>alert('success')</script>";
             }else{


               echo "not success";

             }


            }
             
             }

              ?>


         <h1 style=" background:transparent; color: #3090C7;margin-left:-12px;height: 40px; ">Update Admin Profile</h1>

	 		   <div><label>username</label></div>
	 		   <input type="text" name="username" value="<?php echo $row['username'] ?>">

	 		   <div><label>Password</label></div>
	 	       <input type="password" name="password"value="<?php echo $row['password'] ?>">

	 	       <div><label>Confirm Password</label>
               </div>
	 		   <input type="password" name="cpassword" value="<?php echo $row['password'] ?>">

	 		   <div><label>Profile Picture</label></div>
	 		   <input type="file" name="phot" accept="/image* " required>
	 	      <div><input style="background:#3090C7; color: white;" type="submit" name="update" value="UPDATE"></div>

	 		
	 	</form>
   </div>

</body>
</html>