<?php 
	include('bootstrap.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Invoice</title>
</head>
<body>
	<center>
		<h2>HOSPITAL INVOICE</h2>
	</center>
<div class="row">
	<div class="col"></div>
	<div class="col">
<div class="card text-white bg-primary mb-3 border-dark">
  	<div class="card-header">
  	  	Name:............................................
  	  	<br>
  	  	Date:..........................
  	  	<br>
  	  	Amount(GHC):............
  	</div>
  	<div class="card-body ">
 <table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Details</th>
      <th scope="col">Units</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Paracetamol</td>
      <td>10</td>
      <td>1000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Bicko</td>
      <td>4</td>
      <td>50</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Multivite</td>
      <td>6</td>
      <td>200</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td><h6>Total</h6></td>
      <td></td>
      <td><h6>1250</h6></td>
    </tr>
  </tbody>
</table>
  <div class="card-footer">
    Signature:....................................
  </div>	
  	</div>
</div>
	</div>
	<div class="col"></div>
</div>




</body>
</html>