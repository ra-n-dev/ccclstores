
<?php 
 session_start();
  include("db/connection.php");
  if(isset($_POST['save'])){
  	$username =$_POST['user'];
  	$password= $_POST['pass'];
  	$usertype =$_POST['usertype'];
    
    $query = "SELECT * FROM multi_login WHERE username ='$username' AND password ='$password' AND usertype ='$usertype'";
    $res =mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row =mysqli_fetch_array($res);
    $uname = $row['username'];
    $pass =$row['password'];
    $utype =$row['usertype'];
  	 
    if($pass= $row['password']){
    	echo"<script>alert('you have login as ".$row['usertype']." ')</script>";
    	if($row['usertype']==='admin'){
    		$_SESSION['admin']=$uname;
        // echo"<script>alert('welcome to the admin page ')</script>";
         ?>
       	<script>window.location.href="admin.php"</script>
       	<?php
    	}else if($row['usertype'] ==='doctor'){
    		$_SESSION['doctor']=$uname;
    		//echo"<script>alert('welcome to the doctors page ')</script>";
    		echo'<script>window.location.href="doctor/index.php"</script>';
       	
       	
    	}else if($row['usertype']==='nurse'){
    		echo"<script>alert('welcome to the nurse page ')</script>";
    	}else{
    		echo"<script>alert('wait for admin to approve your section ')</script>";
    	}
    }else{
    	echo"<script>alert('invalid account ')</script>";
    }




  	if($res){
       while($row=mysqli_fetch_array($res)){
       	echo'<script>alert("you have successfully login as '.$row['usertype'].'")</script>';
       }
       if($usertype= "admin"){
       	?>
       	<script>window.location.href="admin.php"</script>
       	<?php

       }else if($usertype= "doctor"){
       	?>
       	<script>window.location.href="doctor/index.php"</script>
       	<?php

       }else if($usertype= "nurse"){
          ?>
       	<script>window.location.href="opd.php"</script>
       	<?php
       }else{
       	echo "<script>alert('no such user in our system')</script>";
       }
  	}
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>multilogin</title>
</head>
<body>
		<form method="POST"  enctype="multipart/form-data">
			<table>
				<tr> 
				<td>Username:<input type="text" name="user" placeholder="Enter username"></td>
			   </tr>
			   <tr>
			   	<td>Password:<input type="text" name="pass" placeholder="Enter user password"></td>
			   </tr>
			   <tr>
			   	<td>
			   		Select user type:<select name="usertype">
			   			<option value="admin">admin</option>
			   			<option value="doctor">doctor</option>
			   			<option value="nurse">nurse</option>
			   		</select>
			   	</td>
			   </tr>
			   <tr>
			   	<td><input type="submit" name="save" value="Login"></td>
			   </tr>
			</table>
		</form>
	<script src="../js/jquery-3.6.0.min.js"></script>

</body>
</html>