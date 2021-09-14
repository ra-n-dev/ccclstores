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
  	echo "<html><script> window.location.href='form3.php';</script></html>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form2</title>
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
			<label>Phone</label><br>
			<input type="text" name="phone" value="<?= isset($_SESSION['info']['phone'])? $_SESSION['info']['phone'] : ''?>"><br>
			<label>Email</label><br>
			<input type="text" name="email" value="<?= isset($_SESSION['info']['email'])? $_SESSION['info']['email'] : ''?>"><br>
			<input type="submit" name="next" value="Next">
			<a href="reports.php">Previous</a>
		</form>
		
	</div>

</body>
</html>