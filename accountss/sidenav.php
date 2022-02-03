
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <script src="../js/jquery-3.6.0.min.js"></script>

</head>
<style type="text/css">

    body{
        overflow: hidden;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        width: 100%;

    }

  

    .side-bar{
        position: fixed;
        height: 100vh;
        width: 17%;
        top: 0;
        left: 0;
        overflow-y: auto;
        background:#3090C7;


    }
    .side-bar .menu{
        position: fixed;
        width: 17%;
        margin-top: 10px;
        
       
    }
    .side-bar .menu .item {
        position: relative;
        cursor: pointer;

    }
    .side-bar .menu .item a {
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        display: block;
        padding: 0px 0px;
        line-height: 40px;

    }
    .side-bar .menu .item a:hover{
       background:#696969 ;
       transition: 0.3s ease;
    }
    .side-bar .menu .item i{
        margin-left: 5%;
        margin-right: 5%;
    }
    .side-bar .menu .item a .dropdown{
       position: absolute;
       right: 0;
       margin-top: 6%;
       transition: 0.3s ease; 
    }
    .side-bar .menu .item .sub-menu{
      background: rgba(255, 255, 255, 0.1);
      display: none;
    }
    .side-bar .menu .item .sub-menu a{
      padding-left: 33%;
    }
    .rotate{
        transform: rotate(90deg);
    }
    .hms h4{
        margin-left: 3%;
        color: #fff;
    }
    .logo img{
        width: 50%;
        margin-left: 10%;
        border-radius: 20%;
        height: 100px;
    }
</style>
<body>
 
  
  <div class="side-bar">
      <div class=" hms"><h4>Clinic Management System</h4></div>
      <div class="logo">
          <img src="../image/cccl4.png" alt="image is required">
      </div>
      <div class="menu">
          <div class="item"><a href="index.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
          <div class="item"><a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a></div>
          <div class="item">
            <a class="sub-btn" href="#"><i class="fas fa-procedures"></i>Patient
                <i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a id="try" href="#item1" class="sub-item">New Patient</a>
                    <a href="#" class="sub-item" onclick="show()">Folder</a>
                    <a href="patientdetails.php" class="sub-item">All patient</a>
                </div>
          </div>
          <div class="item"><a href="attachment.php"><i class="fas fa-calendar"></i>Appointment</a></div>
          <div class="item"><a href="reports.php"><i class="fas fa-book-open"></i>Report</a></div>
          <div class="item"><a href="pharmacy.php"><i class="fas fa-laptop-medical"></i>Pharmacy</a></div>
          <div class="item"><a href="../account/index.php"><i class="fas fa-cog"></i>Settings</a></div>

      </div>

  </div>

   <script type="text/javascript">
       $(document).ready(function(){
        $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });

       });
   </script>

   <script type="text/javascript">
     function show(){
        window.location="patientdetails.php";
     };
   </script>

   <script> 
    $(document).ready(function() { 
        $('#try').ajaxForm(function() { 
           alert('form was submitted');
        }); 
  
    }); 
</script> 
</body>
</html>