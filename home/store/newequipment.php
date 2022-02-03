<?php 
   include("../../db/connection.php");
   


        
              if(isset($_POST['save'])){
                        if(isset($_POST['save'])){
                    	$password =$_POST['pass'];
                     	$name =$_POST['nam'];
                    	$query = "INSERT INTO newequipment_table(name,price,company)VALUES('$name','$password','50.00')";
                $wes =mysqli_query($connect,$query)or die(mysqli_error($connect));

                if($wes){
                	$_SESSION['status']="You have successfully added data";
                	$_SESSION['status_code']="success";
                }elseif($wes==''){
                    $_SESSION['status']="failed";
                    $_SESSION['status_code']="error";
                    echo'<script>window.location.href="../store/newequipment.php"</script>';
                }
       	   }
              }
  

  	        
      
     

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>equipment page</title>
	
</head>
<style type="text/css">
	h3{
     margin-top: 2%;
	}
	#sav{
		margin-top: 1%;
	}

</style>
<body>
	<center>
		<h3>This is the equipment page</h3>
	      <?php echo $_SESSION['status']; ?>

	<div>
        <form method="POST" enctype="multipart/form-data">
        	<input type="text" name="nam" placeholder="Enter name" id="nam"><br><br>
		    <input type="text" name="pass" placeholder="Enter password" id="pass"><br>
		    <input type="submit" name="save" value="Save" style="background:green;color:white;"  id="sav" onclick="validation()">
        </form>
		

	</div>

	</center>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../../js/jquery-3.6.0.min.js"></script>

    <?php 

     if(isset($_SESSION['status']) && $_SESSION['status']!=''){

     	 ?>
            <script>
		     swal({
               title: "<?php echo $_SESSION['status'] ?>",
               //text: "You clicked the button!",
               icon: "<?php echo $_SESSION['status_code'] ?>",
               button: "Aww yiss!",
              });
	        </script>
         <?php
         unset($_SESSION['status']);
        }


     ?>
	
	

</body>
</html>