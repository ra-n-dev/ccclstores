<?php 
  include('bootstrap.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Account Section</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
      $( function() {
    var tags = [
    "KUMI ISAAC",
    "Ahemdabad",
    "TENGEY",
    "Uttar Pradesh",
    "Himachal Pradesh",
    "PAUL",
    "Kerela",
    "Maharashtra",
    "Gujrat",
    "Rajasthan",
    "Bihar",
    "Tamil Nadu",
    "Haryana"
    ];

     $( "#tags" ).autocomplete({
      source: tags
    });
  } );
  </script>
  <style type="text/css">

    .jumbotron{
      height: 400px;
      width: 100%;
      border-radius: 10%;
    }
    .border{
      width: 300px;
      height: 50px;
      margin-top: 100px;
      margin-bottom: 10px;
    }
    .w1{
      font-size: 30px;
      margin-bottom: 1%;
      margin-top: 20px;
      font-weight: bold;
    }
    .btn{
      border: 2px solid yellow;
      width: 100px;
      color: black;
    }
    #{
      color: blueviolet;
    }
  </style>
</head>
<body class="bg-dark">
  <div class="row">
    <div class="col"></div>
  <div class="col">
  <center>
    <h1>This is the account page</h1>
  </center>
  
  <center class="jumbotron bg-danger">
    <form action="search_results.php">
      <label class="text-center text-warning w1">Please Enter Customer ID</label>
      <br>
      <input id="tags" class="border border-warning rounded-pill text-center text-danger" type="text" name="search">
      <br>
      <input class="btn btn-primary rounded-pill" type="submit" name="submit" value="Search">
    </form>
  </center>
    </div>
    <div class="col"></div>
  </div>




</body>
</html>