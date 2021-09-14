
<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>enterprise software</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

<style type="text/css">
    
    body{

        background-image: url(image/bg8.jpg);
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }
   

    

    .container2 .gallery2 .tt{
        width: 470px;
        margin-left: 50px;
    }

      .container1 .gallery1w .t{
        width: 430px;
        margin-left: 0px;
        margin-right: 0px;


       
        
    }
    .container1 .gallery1z .i3{
        width: 470px;

    }

     .container .gallery1 .ix{
        width: 380px;

    }

   .containered{
        width: 100%;
        height: 55px;
        background: transparent;
        overflow: auto;
        margin-top: 0px;
        overflow: hidden;
        
    }
 


</style>
</head>

<body >
   
     <div class="containered">
        <header>
            <h2>Hospital Management System</h2>
            <nav>
                <ul style="text-decoration-color: white;">
               
                   <li ><a href="adminlogin.php">Admin</a></li>
                    <li ><a href="doctorlogin.php">Doctor</a></li>
                    <li > <a href="nurse/index.php">Nurse</a></li>
                    <li > <a href="pharmacy/index.php">Pharmacy</a></li>
                    <li ><a href="opd.php">OPD</a></li>
                 
                </ul>

            </nav>
        </header>
    </div >

    <div class="container2">
        <div class="gallery2">
            <img src="image/bg9.jpg">
       </div>  

          <div class="gallery2">
            <img  src="image/bg10.jpg">
        </div>  

         <div class="gallery2">
            <img class="tt"src="image/bg11.jpg">    
        </div>  
     </div>


   <div class="container1">
        <div class="gallery1">
            <img class="ix" src="image/doc1.jpg">
         <div desc>
             We are hiring Doctors!!
         </div>
            <button class="butd">Apply</button>
       </div>  

          <div class="gallery1w">
            <img class="t" src="image/doc2.jpg">
            <div desc>
            See our Doctors!!
          </div>
           <button class="butr">Request</button>
        </div>  

         <div class="gallery1z">
            <img class="i3" src="image/bg6.jpg">
            <div desc>
             Classic Care Clinic Insurance Policy here!!
            </div>
             <button class="buti">See Details</button>
        </div>  
      </div>
    </div>
</body>
</html>