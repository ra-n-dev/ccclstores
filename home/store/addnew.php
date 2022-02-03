<?php 

session_start();
$uname= $_SESSION['store']; 
    include("../../db/connection.php");
    include("../header.php");


   if(isset($_POST['submit'])){
              $medicinename =$_POST['medicinename'];
              $quantity =$_POST['quantity'];
              $purchaseddate =$_POST['purchaseddate'];
              $measure = $_POST['unitmeasurement'];
              $category=$_POST['category'];
              $capacity =$_POST['capacity'];
              $totalcostprice =$_POST['total_cost_price'];
              $totalsellingprice=$_POST['total_selling_price'];
              $expirydate = $_POST['expirydate'];
              $unitcostprice = $_POST['unit_cost_price'];
              $unitsellingprice = $_POST['unit_selling_price'];
              $suppliername = $_POST['supplier'];
              $invoicenumber = $_POST['invoice'];
              $fun = date("Y-m-d ");

              //echo"<script>alert('purch== $purchaseddate <br> ex==$expirydate')</script>";


              $kwery ="SELECT * FROM drug_available_table WHERE drug_name ='$medicinename' ";
              $rezolt =mysqli_query($connect, $kwery);
              $row =mysqli_fetch_array($rezolt);
              $name =$row['drug_name'];
              $capacityx =$row['capacity'];
              $categoryx =$row['category'];

              
              //checking for expiry of drugs before inserting. 
              $mx =(int)$expirydate -(int)$fun;
              

               if($mx ==0){
                  $expired_status ="expired";
                 // echo"<script>alert('$expired_status')</script>";
                }elseif($mx>=1){
                  $expired_status ="active";
                   //echo"<script>alert('$expired_status')</script>";
                }
              
              


              if($medicinename =="$name" && $category ==$categoryx && $capacity ==$capacityx){
               // echo"<script>alert('$name,$category,$capacity')</script>";

                $query = "INSERT INTO drug_inventory_table(drug_name,quantity,purchase_date,unit_measurement,category,capacity,total_cost_price,total_selling_price,stock_date,expiry_date,unit_cost_price,unit_selling_price,supplier_name,invoice_number,expired_status)VALUES('$medicinename','$quantity ','$purchaseddate','$measure','$category','$capacity','$totalcostprice','$totalsellingprice','$fun','$expirydate','$unitcostprice','$unitsellingprice','$suppliername','$invoicenumber','$expired_status')";

                 $result =mysqli_query($connect, $query) or die(mysqli_error($connect));



                 $queryy = "UPDATE drug_available_table SET drug_name ='$medicinename', quantity='$quantity',purchase_date ='$purchaseddate',unit_measurement ='$measure',category='$category',capacity='$capacity',total_cost_price ='$totalcostprice',total_selling_price ='$totalsellingprice',stock_date='$fun',expiry_date='$expirydate',unit_cost_price='$unitcostprice',unit_selling_price='$unitsellingprice',supplier_name='$suppliername',invoice_number='$invoicenumber',expired_status='$expired_status' WHERE drug_name ='$medicinename' AND category ='$category' AND capacity='$capacity' ";

                $resultt =mysqli_query($connect, $queryy) or die(mysqli_error($connect));



                }else{
                  //echo"<script>alert('insert')</script>";

                  $query = "INSERT INTO drug_inventory_table(drug_name,quantity,purchase_date,unit_measurement,category,capacity,total_cost_price,total_selling_price,stock_date,expiry_date,unit_cost_price,unit_selling_price,supplier_name,invoice_number)VALUES('$medicinename','$quantity ','$purchaseddate','$measure','$category','$capacity','$totalcostprice','$totalsellingprice', '$fun','$expirydate','$unitcostprice','$unitsellingprice','$suppliername','$invoicenumber')";

                 $result =mysqli_query($connect, $query) or die(mysqli_error($connect));


                 $query = "INSERT INTO drug_available_table(drug_name,quantity,purchase_date,unit_measurement,category,capacity,total_cost_price,total_selling_price,stock_date,expiry_date,unit_cost_price,unit_selling_price,supplier_name,invoice_number,expired_status)VALUES('$medicinename','$quantity','$purchaseddate','$measure','$category','$capacity','$totalcostprice','$totalsellingprice','$fun','$expirydate','$unitcostprice','$unitsellingprice','$suppliername','$invoicenumber','$expired_status')";

                 $result =mysqli_query($connect, $query) or die(mysqli_error($connect)); 


             }
                
               if($result){
                echo "<html><script> window.location.href='index.php'</script></html>";
               }
         
               
            }  

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>add new drug</title>
	    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<style type="text/css">
	body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 95vh;
    }
     .do nav{
        margin-right: 12%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }
    .do{
        margin-top:2% ;
    }


    .main{
 		background:white;
 		margin-top: 3%;
 		height: 500px;
 		margin-right: 5%;
 		border-radius: 10px;
 		margin-bottom: 3%;
 		opacity: 0.8;
 		width: 70%;
 		margin-left: 15%;
 	}
 	
 	.main h3{
 		color: red;
 		margin-top: -10px;
 		padding-left: 20px;
 	}
 	.main p{
 		margin-top: -20px;
 		padding-left: 20px;
 		color: #AEB6BF;
 	}
 	
 	.main h2{
 		text-align: center;
 		margin-top: -10px;
 		color: #1C2833;
 	}
 	.don{

      border-radius: 5px;
      border-color: transparent;
      margin-top: 4%;
 	}
 	

 	.vit{
    	background: white;
    	width: 47.4%;
    	height: 87vh;
    	border-radius: 6px;
    	opacity: 0.8;
    	margin-left: 25%;
    	position: fixed;
      margin-top: 4%;
    }
    .vit h2{
    	text-decoration: underline;
    	padding-top: 10px;
    	text-align: center;
    }
    .vit .cl3{
      color: black;
      margin-top: -2%;
    }

    .null{
    	color: transparent;
    	margin-bottom: 5.8%;
    }
    .fom form .cl1{
    	margin-top: 2%;
    	margin-left: 5%;
    	position: relative;
    }
    .fom form .cl1 input{
    	width: 92%;
    	height: 25px;
    }

    .fom form .cl1 select{
    	width: 95%;
    	height: 32px;
    }
   
    .vit .fom{
    	border: solid 1px red;
    	height: 50vh;
    	margin-left: 25%;
    	margin-right: 5%;
      width: 50%;
    }

    #fff3{
    	display: none;
      margin-top: 12%;
    }
    #ff2{
    	display: none;
    }

     #f1 #next{
      background:#D35400;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 30%;
      height: 4.5vh;
      margin-top: 1%;

    }

    #ff2 #previous1{
      background: black;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 30%;
      height: 4.5vh;
      margin-top: -3%;

    }
    #ff2 #more{
      background:green;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
       margin-top: -3%;
    }

    .vit h3{
      color: red;
      margin-left: 39.9%;
      margin-top: -1%;
    }
    .vit .wog{
      color: #ABB2B9;
      margin-top: -2%;
      margin-left: 30%;
    }

   
    .vit .vra{
      height: 18.5%;
      width: 16%;
      border-radius: 22px;
      margin-left: 41%;
      padding-top: 3%;
    }

     #fff3 p{
      color: #2874A6;
      text-align: center;
      font-size: 24px;
     }

    #fff3 #previous2{
      background:#D35400;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
       margin-top: -1%;

    }
    #fff3 #submit{
      background:green;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
       margin-top: -1%;
    }
    #f1 .cl1 .box{
      border:solid 1px black;
      width: 71%;
      height: 30px;
    }

    #f1 .cl1 .box p{
      margin-top: 5px;
      margin-left: 3px;
    }
    .cl1 input{
      margin-bottom: 2%;
    }
    .cl1 select{
       margin-bottom: 2%;
    }

    .vit .cll{
      margin-left: 99.5%;
      height: 30px;
      width: 30px;
      margin-top: -5%;
      border-radius: 40px;
    }
  

 	    @media  (max-width:900px){
    body{
        margin: 0;
        padding: 0;
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }


  .vit{
      background: white;
      width: 74.4%;
      height: 82vh;
      border-radius: 6px;
      opacity: 0.8;
      margin-left: 12%;
      position: fixed;
      margin-top: 15%;
    }
    .vit .vra{
      height: 17%;
      width: 23%;
      border-radius: 22px;
      margin-left: 40%;
      padding-top: 3%;
    }
     .vit h3{
      color: red;
      margin-left: 35.9%;
      margin-top: -1%;
    }


    .vit .wog{
      color: #ABB2B9;
      margin-top: -2%;
      margin-left: 18%;
    }
    .vit .fom{
      border: solid 1px red;
      height: 51vh;
      margin-left: 5%;
      margin-right: 5%;
      width: 90%;
    }
    #fff3{
      margin-top: 8%;
    }
    #f1 #next{
      background:#D35400;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 30%;
      height: 4.5vh;
      margin-top: 1%;

    }


    #ff2 #previous1{
      background: black;
      color: white;
      border-color: transparent;
      border-radius: 5px;
      width: 30%;
      height: 4.5vh;

    }
    #ff2 #more{
      background:green;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
    }

    #fff3 #previous2{
      background:#D35400;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
       margin-top: -1%;

    }
    #fff3 #submit{
      background:green;
      color: white;
      border-radius: 5px;
      border-color:transparent ;
      width: 30%;
      margin-left: 1%;
      height: 4.5vh;
       margin-top: -1%;
    }
    .vit .cll{
      margin-left: 98%;
      height: 30px;
      width: 30px;
      margin-top: -5%;
      border-radius: 40px;
    }

      .main{
 		background:white;
 		margin-top: 17%;
 		height: 500px;
 		margin-right: 5%;
 		border-radius: 10px;
 		margin-bottom: 3%;
 		opacity: 0.8;
 		width: 70%;
 		margin-left: 15%;
 	}

 	}  
}
</style>
<body>

	



	  <div class="vit">
      <a href="index.php"><img src="../../image/close1.png" alt="image is required" class="cll"></a>
      <img src="../../image/cc.jpg" class="vra">
      <h3>Add Medicine</h3>
      <h3 class="wog">Use this form to add medicine</h3>
      
		<div class="fom">
        
        <form method="POST" enctype="multipart/form-data">

        	<section id="f1">
          		<div class="cl1">
          		 
        		<label>Medicine Name</label><br>
             <input type="text" name="medicinename" placeholder="Enter name of drugs"><br> 
        		<label>Category</label><br>
        		<select name="category">
        			<option value="tablet">Tab</option>
        			<option value="sryp" >Syrup</option>
        			<option value="injection" >Injection</option>
        			<option value="iv-fluid" >IV-fluids</option>
              <option value="capsules" >Capsulse</option>
              <option value="suppository" >Suppository</option>
        			<option value="cream/gel" >Cream/Gel</option>
              <option value="suspension" >Suspension</option>
        		</select><br>
        		<label>Capacity</label><br>
        		<input type="text" name="capacity" placeholder="Enter vol of drug 100mg or 100ml"><br>
            <label>Supplier</label><br>
            <input type="text" name="supplier" placeholder="company_name"><br>
        		<label>Quantity</label><br>
        		<input type="text" name="quantity" placeholder="Enter numb. of drugs"><br> 
        	    </div>
        	     <center><input id="next" type="button" name="save" value="Next" ></center>
 
		</section>

	    <section id="ff2">
	    	 
	    	    <div class="cl1">
            <label>Measure</label><br>
            <select id="groupitem"  name="unitmeasurement" placeholder="Choose one item below">
               <option value="single">Single Medicine </option>
               <option value="box">Box of Medicine</option>
               <option value="bottle">Bottle of Medicine</option>
            </select><br>
            <label>Purchase Date</label><br>
            <input type="date" id="datepicker" name="purchaseddate"><br>
            <label>Expiry Date</label><br>
            <input type="date" id="datepicker" name="expirydate"><br>   		
        		<label>Unit Cost Price</label><br>
        		<input type="text" name="unit_cost_price" placeholder="Enter unit cost"><br>
        		<label>Unit Selling Price</label><br>
        		<input type="text" name="unit_selling_price" placeholder="Enter unit selling price"><br>
        		
            
               </div><br>
                 <center><input id="previous1" type="button" name="save" value="Previous"><input id="more" type="button" name="save" value="Next"></center> 	
        	
           
	    </section>

	    <section id="fff3">
             <?php 
                echo "<p class='ddd'>Saving new drug <br> into the system</p>";

              ?>
	    	     
          	<div class="cl1" id="cl3">
        		<label>Total Cost Price</label><br>
        		<input type="text" name="total_cost_price" placeholder="Enter total cost price"><br>
        		<label>Total Selling Price</label><br>
        		<input type="text" name="total_selling_price" placeholder="Enter total selling price"><br>
        		<label>Receipt Invoice</label><br>
        		<input type="text" name="invoice" placeholder="Enter Receipt Invoice"><br> 
        	   </div><br>
        	     <center><input id="previous2" type="button" name="save" value="Previous"><input id="submit" type="submit" name="submit" value="Submit"></center>  	
        	
  
	    </section>

        </form>

		     

		</div>
        

	  </div>

	 <script src="../../js/jquery-3.6.0.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


     <script >
      $("#next").click(function () {
       $("#f1").css("display", "none");
       $("#ff2").css("display","block");
       
      });

     $("#more").click(function () {
       $("#fff3").css("display", "block");
       $("#f1").css("display","none");
       $("#ff2").css("display","none");
       
      });

     $("#previous1").click(function () {
       $("#fff3").css("display", "none");
       $("#f1").css("display","block");
       $("#ff2").css("display","none");
       
      });

       $("#previous2").click(function () {
       $("#fff3").css("display", "none");
       $("#f1").css("display","none");
       $("#ff2").css("display","block");
       
      });

      $("#submit").click(function () {
       $("#f1").css("display", "none");
       $("#ff2").css("display","none");
       $("#fff3").css("display","block");

      });

   </script>

   <script type="text/javascript">
   	 flatpickr("input[style =date]", {dateFormat: 'Y-m-d'});
   </script>


</body>
</html>