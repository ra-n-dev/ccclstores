
<?php 
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

</head>
<style type="text/css">

      *body{
        margin: 0;
        padding: 0;
      }  
      .main-menu{
        margin-left:10%;
        background-image: linear-gradient(#F2EFFB,white, white,skyblue,#F2EFFB,#A9F5F2,#A9F5F2,#40E0D0, white,#F2EFFB,white); 
        height: 100vh;
        overflow-x: hidden;
        overflow-y: scroll;
      }
     .main{
      position: absolute;
      width: 200px;
      left: 300px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

     .main i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size:30px;
     }

     .mains{
      position: absolute;
      width: 230px;
      left: 300px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

     .mains i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size: 30px;
     }

       .mainss{
      position: absolute;
      width: 230px;
      left: 300px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

      .mainss i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size: 30px;
     }
     
  




</style>

<body>
	 
   <?php 

     include("include/header.php");
      include("admin/sidenav.php");
      include("db/connection.php");
     

    ?>
     <?php 
    $query ="SELECT * FROM patientvital ";
    $res =mysqli_query($connect, $query);
    $row =mysqli_num_rows($res); 

  ?>
    <div class="main-menu">
      <div class="main" >
       <h4>Admin Dashboard</h4>
       <a style="text-decoration:none;" href="admin.php">
         <div  style="height:110px; width: 200px;background: green; " class="green">
            <?php 
          $ad =mysqli_query($connect,"select * from admin");
          $sum =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $sum ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px;  ">Admin</h4>
        
         <i style="margin-top: -70px; padding-left: 25px;" class="fas fa-users-cog" ></i>
             
       </div>  
       </a>
       
       <a style="text-decoration:none;" href="#final2">
         <div  style="height:110px; width: 200px;background: red; " class="green">
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;">0</h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px; ">Records</h4>
        
         <i style="margin-top: -70px;padding-left: 25px;" class="fas fa-flag"></i>
             
       </div>  
       </a>
       
  </div>


  <div class="mains" style="margin-left:210px;margin-top: 40px;" >
         <a style="text-decoration:none;" href="doctor.php">
         <div  style="height:110px; width: 200px;background: #2E86C1; " class="green">
                   <?php 
          $ad =mysqli_query($connect,"select * from doctors where status ='Approved' ");
          $numz =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $numz ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px; ">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px;  ">Doctors</h4>
        
          <i style="margin-top: -70px;padding-left: 25px;" class="fas fa-user-md"></i>
             
       </div>  
       </a>
        <div>
         <a style="text-decoration:none;" href="job_request.php">
         <div  style="height:110px; width: 200px;background: #FFC300; " class="green">
         <?php 
          $ad =mysqli_query($connect,"select * from doctors where status ='pendding' ");
          $num1 =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $num1; ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px; ">Request</h4>
        
         <i style="margin-top: -70px;padding-left: 25px;"  class="fas fa-book-open"></i>
             
        </div>  
        </a>

        </div>
   
       
  </div>

  <div class="mainss" style="margin-left:430px;margin-top: 40px;" >
      
       
        <a style="text-decoration:none;" href="patient.php">
         <div  style="height:110px; width: 200px;background: #FFC300; " class="green">
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $row ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none; padding-left:9px;">Patient</h4>
        
         <i style="margin-top: -70px;padding-left: 25px;" class="fas fa-procedures"></i>
             
       </div>  
       </a>

       
        <a style="text-decoration:none;" href="#final6">
         <div  style="height:110px; width: 200px;background: green; " class="green">
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;">0</h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none; padding-left:9px;">Income</h4>
        
         <i style="margin-top: -70px;padding-left: 25px;" class="fas fa-money-check-alt"></i>             
       </div>  
       </a>
       
  </div>

    </div>  
</body>
</html>