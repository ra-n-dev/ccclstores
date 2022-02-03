<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>trying something</title>
</head>
<style type="text/css">
    body{
    	background:#1B6CFB ;
    }

	.drop{
		margin-top: 13%;
		margin-left: 40%;
		position: relative;
		height: 180px;
		width: 180px;
		background: #54ABFB;
		border-radius: 51% 49% 48% 52% / 62% 44% 56% 38%;
		opacity: 1;
		border: 2px solid #3d93ff;
	}

     
	.drop::before {
		margin-top: 37%;
		margin-left: -20%;
		content: "";
		position: absolute;
		opacity: 0.2;
		height: 70%;
		width: 70%;
		background: blue;
		border-radius: 51% 49% 48% 52% / 62% 44% 56% 38%;
		box-shadow: -20px 30px 16px #1B6CFB, -40px 60px 32p #1b6cfb, inset -6px 6px 10px #1B6CFB, inset 2px 6px 10px #1a74e5, inset 20px -20px 22px white; inset 40px -40px 44px #a8ceff;
	}
	.drop::after {
		content: "";
		position: absolute;
		height: 40px;
		width: 40px;
		background: #E6FDFB;
		border-radius: 44% 56% 46% 54% / 36% 50% 50% 64%;
		left: 130px;
		top: 40px;
		box-shadow: 16px 40px 0 -10px white;
		opacity: 0.8;
	}
</style>
<body>
	<h3>Trying something here</h3>

	<div class="drop">
		
	</div>
	<div>
		
		<?php 

          $date=date_create("2013-03-15");
          date_sub($date,date_interval_create_from_date_string("40 days"));
          echo date_format($date,"Y-m-d");

		 ?>
	</div>


</body>
</html>