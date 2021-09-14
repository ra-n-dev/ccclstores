 <nav style="background-color: deeppink; height: 60px;">
    	<div>
    		<ul style="padding-top: 20px;">
		    <a style="padding-right: 45%; font-size: 180%;">Hospital Management System</a>
		    <a href="#">Admin</a>
		    <a href="#">Patient</a>
		    <a href="#">Doctor</a>
		    <a href="new.php">New</a>
		
	        </ul>
    	</div>
    </nav>
	
	<div class="img">
	<div class="col-md-4 mx-1 shadow"></div>
		<img src="image/doc1.jpg">
		<img src="image/doc2.jpg">
		<img src="image/doc4.jpg">
		<img src="image/doc5.jpg">


</div>








<center>
        <div class="test">
        <a href="https://www.facebook.com">
            <img  src="image/doc1.jpg">
            <h3>Test</h3>
        </a>
            <a href="https://www.facebook.com">
                <img src="image/doc2.jpg">
                <h3>Test</h3>
            </a>
           
                <a href="https://www.facebook.com">
                    <img src="image/bg6.jpg">
                    <h3>Test</h3>
                </a>
          </div>
    </center>
  
    <!this is the administrators page>   

 <div class="main">
        <h4>Admin Dashboard</h4>
       <div  style="height: 90px; background: green; width:150px" class="green"; >
             
                  <div>
                   
                   <?php 

                    $ad = mysqli_query($connect, " select * from admin");

                    $num = mysqli_num_rows($ad);

                    ?>
                  <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size: 15px"><?php echo $num; ?></h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Admin</h5>
                  <a href="">
                  	 <i style="margin-top: -70px;" class="fas fa-users-cog" ><a href="#admin"></a></i>

                  </a>

                 
  
              </div>
           </a>  
       </div>



       <div style="height: 90px; background: red; width:150px" class="green" ;>
              <div>
                 <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size: 15px;">0</h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Records</h5>

                  <i style="margin-top: -70px;" class="fas fa-flag"></i>
              </div>             
        </div>

       
    </div>

   <div class="mains">
         <div style="height: 90px; background: #2E86C1; width:150px; margin-left:200px; margin-top:64px;" class="green" ;>


                  <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size: 15px;">0</h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Doctors</h5>

                  <i style="margin-top: -70px;" class="fas fa-user-md"></i>
           </div>

        <div style="height: 90px; background: #FFC300; width:150px; margin-left:200px; margin-top:22px;" class="green" ;>


                  <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size: 15px;">0</h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Job Request</h5>


                  <i style="margin-top: -70px;"  class="fas fa-book-open"></i>


              
       </div>

   </div>

   <div class="mainss">
       <div style="height: 90px; background: #FFC300; width:150px; margin-left:400px; margin-top:64px; " class="green" ;>


                  <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size: 15px;">0</h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Patient</h5>

                  <i style="margin-top: -70px;" class="fas fa-procedures"></i>
              
       </div>


        <div style="height: 90px; background: green; width:150px; margin-left:400px; margin-top:22px; " class="green" ;>


                  <h5 style="padding-top: 8px; color: white; margin-left:40px; font-size:15px;">0</h5>

                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total</h5>
                  <h5 style="margin-top: -10px; color: white; margin-left:20px;">Total Income</h5>

                  <i style="margin-top: -70px;" class="fas fa-money-check-alt"></i>
              
       </div>

    </div>







    