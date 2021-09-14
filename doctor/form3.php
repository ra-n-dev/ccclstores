<?php 
  session_start();
  include("../db/connection.php");
  include("sidenav.php");
  include("../include/header.php");

  if(isset($_POST['submit'])){
  	foreach ($_POST as $key => $value) {
  		$_SESSION['info'][$key] =$value;
  	}

  	$keys =array_keys($_SESSION['info']);

  	if(in_array('submit',$keys)){
  		unset($_SESSION['info']['submit']);
  	}
  	echo "<html><script> window.location.href='submit.php';</script></html>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form3</title>
</head>
<style type="text/css">
	.multiform{
		margin-left: 219.8px;
		background: beige;
		height: 100vh;
		width: 100%;
	}
</style>
<body>
	<div class="multiform">
		<form action="" method="POST">
			<label>Address</label><br>
			<input type="text" name="address" value="<?= isset($_SESSION['info']['address'])? $_SESSION['info']['address'] : ''?>"><br>
			<label>Age</label><br>
			<input type="text" name="age" value="<?= isset($_SESSION['info']['age'])? $_SESSION['info']['age'] : ''?>"><br>
			<input type="submit" name="submit" value="Submit">
			<a href="form2.php">Previous</a>
		</form>
		
	</div>

</body>
</html>