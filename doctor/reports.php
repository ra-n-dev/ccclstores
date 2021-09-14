<?php 
  session_start();
  include("../db/connection.php");
  include("sidenav.php");
  include("../include/header.php");

  if(isset($_POST['next'])){
  	foreach ($_POST as $key => $value) {
  		$_SESSION['info'][$key] =$value;
  	}

  	$keys =array_keys($_SESSION['info']);

  	if(in_array('next',$keys)){
  		unset($_SESSION['info']['next']);
  	}
  	echo "<script> window.location.href='form2.php';</script>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form1</title>
</head>
<style type="text/css">
body{
	background: beige;
		height: 100vh;
		width: 100%;
}
	.multiform{
		margin-top: 20px;
		margin-left: 219.8px;
		
	}
	form{
		background: transparent;
	}
</style>
<body>
	<div class="multiform">
		<form action="" method="POST">
			<label>First Name</label><br>
			<input type="text" name="fname" value="<?= isset($_SESSION['info']['fname'])? $_SESSION['info']['fname'] : ''?>"><br>
			<label>Last Name</label><br>
			<input type="text" name="lname" value="<?= isset($_SESSION['info']['lname'])? $_SESSION['info']['lname'] : ''?>"><br>
			<input type="submit" name="next" value="Next">
		</form>


	</div>

</body>
</html>