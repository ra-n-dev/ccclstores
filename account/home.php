
<?php 
 session_start();

 ?>
     <?php 
       include("../db/connection.php");
      
       

     ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>


    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

    <script src="../js/jquery-3.6.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
		function changeurl(url, title) {
    var new_url = '/' + url;
    window.history.pushState('data', title, "profile.php/");
    
}
	</script>



</head>
<style type="text/css">
 .containered{
        width: 100%;
        height: 305px;
        background: transparent;
        overflow: auto;
        margin-top: 0;
        overflow: hidden;
        
    }
      .main{
      position: absolute;
      width: 200px;
      min-height: 100hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

     .main i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size:40px;
     }
     .mains{
      position: absolute;
      width: 230px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

     .mains i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size: 40px;

     }

       .mainss{
      position: absolute;
      width: 230px;
      min-height: 90hv;
      background: #f5f5f5;
      transition: 0.5%;
      background: transparent;
     }

      .mainss i{
        margin:20px 90px 80px 100px;
        color: white;
        overflow: hidden;
        font-size: 40px;
     }
     
   
</style>
<body>

	<div>
	    <div class="main" >
       <h4>Doctor's Dashboard</h4>
      
       <a style="text-decoration:none;" onclick="changeurl()" href="/">
         <div  style="height:110px; width: 200px;background: #2E86C1; " class="green">
            <?php 
           
          $ad =mysqli_query($connect,"select * from doctors");
          $sum =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration:none;padding-left:9px; padding-top: 20%;">My Profile</h4>
        
         <i style="margin-top: -50px; padding-left: 25px; " class="fas fa-user-circle" ></i>
             
       </div>  
       </a>
       
       <a style="text-decoration:none;" href="#final2">
         <div  style="height:110px; width: 200px;background: red; " class="green">
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;">0</h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px; ">Records</h4>
        
         <i style="margin-top: -90px;padding-left: 30px;" class="fas fa-flag"></i>
             
       </div>  
       </a>
       
  </div>


  <div class="mains" style="margin-left:210px;margin-top: 40px;" >
        <a style="text-decoration:none;" href="patientdetails.php">
         <div  style="height:110px; width: 200px;background: #FFC300; " class="green">
          <?php 

           $ad =mysqli_query($connect,"select * from patientvital");
          $sum =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $sum ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px;">Total</h4>
        <h4 style="color:white; text-decoration: none; padding-left:9px;">Patient</h4>
        
         <i style="margin-top: -90px;padding-left: 35px;" class="fas fa-procedures"></i>
             
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
        
         <i style="margin-top: -90px;padding-left: 37px;"  class="fas fa-book-open"></i>
             
        </div>  
        </a>

        </div>
   
       
  </div>

  <div class="mainss" style="margin-left:420px;margin-top: 40px;" >
      
       <a style="text-decoration:none;" href="doctor.php">
         <div  style="height:110px; width: 200px;background: green; " class="green">
                   <?php 
          $ad =mysqli_query($connect,"select * from doctors where status ='Approved' ");
          $numz =mysqli_num_rows($ad);
          
         ?>
        <h4 style="color:white; text-decoration: none;padding-left:13px; padding-top: 5px;"><?php echo $numz ?></h4>
        <h4 style="color:white; text-decoration:none;padding-left:9px; ">Total</h4>
        <h4 style="color:white; text-decoration: none;padding-left:9px;  ">Appointment</h4>
        
          <i style="margin-top: -90px;padding-left: 45px;" class="fas fa-calendar"></i>
             
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