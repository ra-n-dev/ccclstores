
<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Doctor</title>
</head>
<style type="text/css">
	.pro{
		padding-left: 240px;
	}
	.pro h4{
		text-align: center;
	}
	 .eddoc{
      position: absolute;
      width: 400px;
      left: 750px;
      min-height: 90hv;
      transition: 0.5%;
      background: transparent;
      margin: 0;
      padding: 0;
      margin-top: -25%;

     }
     .eddoc input{
     	width: 90%;
     	height: 25px;
     	margin-bottom: 10px;
     }
     .eddoc .edoc{
     	width: 30%;
     }
</style>
<body>
 	<?php 

     include("include/header.php");
     include("admin/sidenav.php");
     include("db/connection.php");
   ?>
	<div class="pro">
		<h4>Doctor's Profile</h4>
		<?php 
         if(isset($_GET['id'])){
         	$id =$_GET['id'];
         	$query = "SELECT * FROM doctors WHERE id ='$id' ";
         	$res =mysqli_query($connect, $query);
         	$row =mysqli_fetch_array($res);
                
         	
         }
		 ?>
		 <div class="pro2">
		 	<h5>ID: <?php echo $row['id'] ?></h5>
		 	<h5>Firstname: <?php echo $row['firstname'] ?></h5>
		 	<h5>Surname: <?php echo $row['surname'] ?></h5>
		 	<h5>Username: <?php echo $row['username'] ?></h5>
		 	<h5>Email: <?php echo $row['email'] ?></h5>
		 	<h5>Phone: <?php echo $row['phone'] ?></h5>
		 	<h5>Date Registered: <?php echo $row['date_reg'] ?></h5>
		 	<h5>Salary: GHC <?php echo $row['salary'] ?></h5>
		 </div>
		 <div class="eddoc">
		 	<form style="background:transparent" method="POST" enctype="multipart/form-data">
		 		<h4>Update Doctor's Salary</h4>
		          <?php 
                     if(isset($_POST['update'])){
                     	$salary =$_POST['salary'];
                     	$q= "UPDATE doctors SET salary='$salary' WHERE id='$id' ";
                     	$resul =mysqli_query($connect, $q);
                     }
		           ?>

		 		<div style="padding-bottom:7px"><label style="color:black">Enter Doctor's Salary</label></div>
		 		<input type="number" name="salary"
		 		autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'] ?>">
		 		<div><input class="edoc" style="background:#3090C7; color: white;" type="submit" name="update" value="Update Salary"></div>
		 	</form>
		 </div>
	</div>

</body>
</html>