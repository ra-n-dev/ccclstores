<?php 
include("header.php");
include("../db/connection.php");
  

   if(isset($_POST['submit'])){
              $medicinename =$_POST['medicinename'];
              $drugquantity =$_POST['drugquantity'];
              $purchaseddate =$_POST['purchaseddate'];
              $groupitem = $_POST['groupitem'];
              $category=$_POST['category'];
              $capacity =$_POST['capacity'];
              $costprice =$_POST['costprice'];
              $expirydate = $_POST['expirydate'];
              $boxnumber = $_POST['boxnumber'];
              $supplier = $_POST['supplier'];

                 $query = "INSERT INTO pharmacyinventory(medicinename,drugquantity,purchaseddate,groupitem,category,capacity,costprice,sellingprice,invetdate,expirydate,boxnumber,supplier)VALUES('$medicinename','$drugquantity ','$purchaseddate','$groupitem','$category','$capacity','$costprice','soon',now(),'$expirydate','$boxnumber','$supplier')";

                $result =mysqli_query($connect, $query) or die(mysqli_error($connect));
                
               if($result){
                echo "<html><script> window.location.href='medicinals.php'</script></html>";
               }
            }
           

 ?>



            
           
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
 	<title>add medicine</title>
 </head>
 <style type="text/css">
 	body{
 		background: #F2F3F4;
 	}
 	.main{
 		background:white;
 		margin-top: 3%;
 		height: 500px;
 		margin-left: 5%;
 		margin-right: 5%;
 		border-radius: 10px;
 		margin-bottom: 3%;
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
 	.fom{
 		background: transparent;
 		height: 80%;
 		margin-left: 130px;
 		margin-right: 20px;
 		padding-left: 10px;
 		padding-top: 0px;
 	}

 	.fom .fom1 input{
      height: 25px;
      width: 40%;
      margin-bottom: 20px;
 	}
 	.fom .fom1 label{
 		font-size: 20px;
 		color:#D35400;
 	}
 	.fom .fom1 select{
 		height: 30px;
      width: 40.7%;
      margin-bottom: 20px;
 	}
 	.fom2{
 		margin-left: 43%;
 		margin-top: -37.5%;
 	}

 	.fom .fom2 input{
      height: 25px;
      width: 75%;
      margin-bottom: 20px;
 	}
 	.fom .fom2 label{
 		font-size: 20px;
 		color:#D35400;
 	}
 	.fom .fom2 select{
 		height: 30px;
      width: 76%;
      margin-bottom: 20px;
 	}
 	.main h2{
 		text-align: center;
 		margin-top: -20px;
 		color: #1C2833;
 	}
 	.done{
 		width: 120px;
 		margin-left: 37%;
 		height: 30px;
 	}
 	.main img{
 		background: red;
 		height: 30px;
 		width: 30px;
 		border-radius: 20px;
 		margin-left: 98.5%;
 		margin-top: -1%;
 	}
 </style>
 <body>

 	<div class="main">
 		<a href="medicinals.php"><img src="../image/close1.png" alt="image is required"></a>
 		<h3>Add Medicine</h3>
 		<p>Use this form to add medicine</p>
 		<h2>Classic Care Clinic Drugs Inventories</h2>
 		

 			<form class="fom" method="POST" enctype="multipart/form-data">
 				<div class="fom1">
 				<label>Medicine Name</label><br>
 				<input type="text" name="medicinename" placeholder="Enter Medicine name"><br>	
                <label>Medicine Type</label><br>
 				<select id="category"  name="category">
 					<option>....choose one category....</option>
 					<option value="tab">Tablet</option>
 					<option value="capsules">Capsules</option>
 					<option value="syrup">Syrup</option>
               <option value="suspension">Suspension</option>
 					<option value="cream">Cream</option>
 					<option value="injectables">Injectables</option>
 				</select><br>

 				<label>Capacity</label><br>
 				<input type="text" name="capacity" placeholder="Enter capacity e.g 250mg"><br>	
 				<label>Cost Price</label><br>
 				<input type="text" name="costprice" placeholder="Enter cost price of drug"><br>
 				<label>Purchased Date</label><br>
 				<input type="text" name="purchaseddate" placeholder="Enter the day the drug was purchased"><br>
 				</div>


 			<div class="fom2">
 				<label>Supplier</label><br>
 				<input type="text" name="supplier" placeholder="Enter company that supplied drug"><br>	
                <label>Group</label><br>
 				<select id="groupitem"  name="groupitem">
 					<option>........Choose one item below........</option>
 					<option value="single">Single Medicine </option>
 					<option value="box">Box of Medicine</option>
 					<option value="bottle">Bottle of Medicine</option>
 				</select><br>
	
 				<label>Total Box/Bottle of Drug</label><br>
 				<input type="text" name="boxnumber" placeholder="Enter total boxes of drug"><br>
 				<label>Quantity of Drug</label><br>
 				<input type="text" name="drugquantity" placeholder="Enter total number of drug"><br>
 				<label>Expiry Date</label><br>
 				<input type="text" name="expirydate" placeholder="Enter Expiry Date of drug"><br>
 					
 				</div>
 				<input class="done" type="submit" name="submit" value="Done" style="background:green;border-color:green;color: white;">
 				
 				
 			</form>
 	
 		
 		
 	</div>
 
 </body>
 </html>