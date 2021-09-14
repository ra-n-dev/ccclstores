      <?php 

      session_start();
      

      include("../include/header.php");
      include("sidenav.php"); 
      include("../db/connection.php");


      $ad=$_SESSION['doctor'];
      $query = "select * from doctors where firstname ='$ad' ";
      $res = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($res);
      $profiles =$row['profile'];
      $username =$row['username'];
      $id =$row['id'];
       $firstname=$row['firstname'];
       $surname=$row['surname'];
       $email=$row['email'];
       $gender=$row['gender'];
       $password=$row['password'];
       $phone=$row['phone'];

       
      
       
       
       ?>
       <?php 

         if(isset($_POST['update'])){
          $profilenew =$_FILES['pic']['name'];
          $query ="UPDATE  doctors SET profile ='$profilenew' WHERE firstname ='$ad' ";
          $res =mysqli_query($connect, $query);
          if($res){
                move_uploaded_file($_FILES['pic']['tmp_name'], "img/$profilenew") ;

          }else{
            echo "<script>alert'update failed'</script>";
          }
         }


        ?>

        <?php 
          if(isset($_POST['edit'])){
            $firstname =$_POST['firstname'];
            $surname =$_POST['surname'];
            $email =$_POST['email'];
            $password =$_POST['password'];
            $confirm_password= $_POST['cpassword'];
            $phone =$_POST['phone'];

            
            if($password ==$confirm_password){
              $query ="UPDATE doctors SET firstname='$firstname',surname ='$surname',email='$email',
              phone='$phone',password='$password' WHERE firstname ='$ad' ";
              
              $result =mysqli_query($connect,$query)or die(mysqli_error($connect));
              
            }else{
              echo "<script>alert('Password did not match ')</script>" ; 
            }
            
          }

         ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Doctor's Profile Page</title>

</head>
<style type="text/css">

  .secondcontain form{
    background: seashell;
    margin-left: 52%;
    margin-right: 3%;
    margin-top: -609px;
    height: 82%;
    border: solid #d4d4d4 2px; 
    
  }
  .secondcontain form input{
    width: 90%;
    height: 30px;
    margin-bottom: 15px;
    margin-left: 3%;
  }
  .secondcontain form label{
    padding-top: 30px;
    color: black;
    margin-left: 3%;
  }
  }
  .imge{
    background: white;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 24px;
  }
  .imge img{
    margin-left:5px;
    width: 60%;
    height: 160px;
    border: solid 10px #d4d4d4;
    border-radius: 20px;
    margin-top: 10px;
    margin-bottom: 6px;
    margin-left: 16%;
  }
  .firstcontain{
    margin-left: 217px;
    width: 415px;
    height: 100vh;
    background:white;
    border: solid 1px #d4d4d4;
  }
  .dox .hd1{
    text-align: center;
    background:transparent;
    margin-left: 50px;
    margin-right: 50px;
    border-radius: 20px;
    font-style: italic;
    color: saddlebrown;
  }
  .pr{
    margin-left: 10px;
    font-size: 18px;
  }
 
  .dox{
    background: white;
  }
  .imge form{
    background:seashell;
  }
  .firstcontain .lab{
    padding-left: 0%; 
    color:black;
  }
</style>
<body>

     <div class="firstcontain">
      
       <div class="imge">

        <form method="POST" enctype="multipart/form-data">
         <?php 
         echo "<img src='img/$profiles' alt='image required'>";
         ?>
          <span title="">
            <label style="padding-left:5%; color:black;">Choose a new picture</label>
            <input style="width:150px" type="file" name="pic" accept="image/*" id="pi">
          </span>
         
         <input style="background:green; color: white; margin-left: 0%;" type="submit" name="update" value="Save">
        </form>

        
      

      </div>
     <div class="dox">

       <h3 class="hd1" >Doctor's Profile</h3>
      
     <div class="pr">
   
      <h5>Firstname: <?php echo $row['firstname'] ?></h5>
      <h5>Surname: <?php echo $row['surname'] ?></h5>
      <h5>Username: <?php echo $row['username'] ?></h5>
      <h5>Email: <?php echo $row['email'] ?></h5>
      <h5>Phone: <?php echo $row['phone'] ?></h5>
      <h5>Date Registered: <?php echo $row['date_reg'] ?></h5>
     
     </div>
      


     </div>


     </div>
     <div class="secondcontain">
        <form enctype="multipart/form-data" method="POST">
          <h3 style="text-align: center; padding-top:15px">Edit Doctor's Details</h3>
        <div><label>Firstname</label></div>
        <input type="text" name="firstname" placeholder="Enter firsname" value="<?php echo $row['firstname'] ?>"><br>

        <div><label>Surname</label></div>
        <input type="text" name="surname" placeholder="Enter surname" value="<?php echo $row['surname'] ?>" ><br>

        <div><label>Email</label></div>
        <input type="text" name="email" placeholder="Enter email" value="<?php echo $row['email'] ?>"><br>

        <div><label>password</label></div>
        <input type="password" name="password" placeholder="Enter password"value="<?php echo $row['password'] ?>"><br>

        <div><label>Confirm password</label></div>
        <input type="password" name="cpassword" placeholder="Enter password" value="<?php echo $row['password'] ?>"><br>

        <div><label>Phone Number</label></div>
        <input type="text" name="phone" placeholder="Enter phone number" value="<?php echo $row['phone'] ?>"><br>

        <input style="background:peru; color: white;font-size: 20px;" type="submit" name="edit" value="Update " >

      </form>
     </div>
    <script type="text/javascript">
      
    </script>
     
</body>
</html>