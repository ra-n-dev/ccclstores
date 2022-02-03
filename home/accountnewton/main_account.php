<?php 
include("../db/connection.php");

$conn = $connect;

if (isset($_POST['save'])){
	$id = $_POST['customer_id'];
	$name = $_POST['customer_name'];
	$amount = $_POST['customer_amount'];
	$description = $_POST['description'];
	$category = $_POST['payment_category'];
	$mode = $_POST['payment_mode'];
	

$sql = "INSERT INTO customer_payment (payment_date, customer_name, amount, description, category, payment_mode, patient_id, case_id) VALUES (now(), '$name', '$amount', '$description', '$category', '$mode', '$id', '12')";

$res =mysqli_query($conn,$sql)or die(mysqli_error($conn));


}

if (isset($_POST['add_new_asset'])){
	$cols = $_POST['asset_cols'];

$sql1 = "INSERT INTO asset_schedule (date_of_purchase, asset_name, details, supplier, cost_of_purchase, amount_paid, payment_mode, depreciation_rate) VALUES ($cols[1], '$cols[2]', '$cols[3]', '$cols[4]', '$cols[5]', '$cols[6]', '$cols[7]', '$cols[8]')";

$res1 =mysqli_query($conn,$sql1)or die(mysqli_error($conn));
}

function getLastID()
{	include("../db/connection.php");
	$conn = $connect;
	$sql = "SELECT payment_id FROM customer_payment";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // output data of each row
	$idx = [];
  	while($row = $result->fetch_assoc()) {
  		array_push($idx, $row['payment_id']);
    //echo "<h1 id='h1'> ".$row['payment_id']." </h1>";
  			}
  	return $idx[count($idx)-1];
	}
}

function getCustomerID(){
	if (isset($_POST['search11'])) {
		$idx1 = $_POST['search_res'];
		//echo $idx1;
	$assoc = [];
	
	include("../db/connection.php");
	$conn = $connect;
	$sql = "SELECT consult_id, case_id, patient_name, patient_id, prescription, doc_name, drug_payment_status, lab_payment_status FROM consultation WHERE case_id = $idx1 ORDER BY visit_date DESC";
	$result = $conn->query($sql);

	#return ($result->fetch_assoc());

	if ($result) {
	while($row = $result->fetch_assoc()) {
		array_push($assoc, $row);
    		//echo "<p>".$row["case_id"]."</p>";
    		}
    #$assoc2 = $assoc[0];
    if ($assoc){
    	return $assoc[0];
    }
    
  		}
	}
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Account Dash Board</title>
 	<?php 
 		include("bootstrap.php");
 	 ?>

 	<style type="text/css">
 		#h1{
 			color: white;
 		}
 		#search_form{
 			border-radius:2%;
 			margin-top: 10%;
 			border: 2px solid blueviolet;
 			margin-bottom: 4%;
 			text-align: center;
 			width: 350px;
 		}
 		#card1{
 			margin-top: 20px;
 			width: 387px;
 			border: 0px;
 		}
 		.col-2{
 			height: 1000px;
 			width: 400px;
 			display: ;
 		}
 		li{
 			margin-bottom: 0px;

 		}
 		#row-1{
 			margin-top: 0px;
 		}
 		#submit1{
 			width: ;
 		}
 		.nav-link{
 			height:40px;
 			color: yellow;
 		}

 		
 	</style>
 </head>

 <body class="">

 	<main id="main">
 	<div class="row row-1">
 		<div class="col-2 bg-danger">
 		 	<center>
 				<form method="POST">
 					<input id="search_form" class="rounded-pill" type="text" name="search_res" placeholder="Please enter case ID">
 					<br>
 					<input onclick ="" id="submit1" class="btn btn-primary rounded-pill" type="submit" name="search11" value="Search">
 				</form>

 				<div id="search_results1" class="jumbotron bg-dark text-white rounded-pill">
 					<?php $var = getCustomerID();
 							if ($var) {
 							
 								echo($var['patient_name']. ":   ".$var['drug_payment_status']);
 								echo("<br>");
 								
 							}else{
 								echo "No results found";
 							}
 					?>
 				</div>
 			</center>

 		<div class="card bg-danger" id="card1">
  			<ul class="list-group list-group-flush">
  			  <li class="btn btn-primary list-group-item">STAFF</li>
  			  <li class="btn btn-primary list-group-item" onclick="payment_oders()">PAYMENTS</li>
  			  <li class="btn btn-primary list-group-item" onclick="asset_schedule()">ASSET SCHEDULE</li>
  			 <li class="btn btn-primary list-group-item">
  			 <div class="dropdown">
  				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">REPORTS</button>
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  				  <li><a class="dropdown-item" href="accounts_reports.php">Sales</a></li>
  				  <li><a class="dropdown-item" href="report1.php">Payment</a></li>
  				  <li><a class="dropdown-item" href="inventory_report.php">Inventory</a></li>
  				</ul>
			</div>
			</li>
  			</ul>
		</div>
 		</div>
 		<div class="col bg-dark" id="page1">
 			<?php 
 			$num11 = getLastID();
 			echo "
 				<button type='button' class='btn btn-primary' style='margin-top:10px;'>
  					LastID <span class='badge bg-secondary'>$num11</span>
				</button>
				";
 				
 				include("payment_data.php");
 			 ?>
 		</div>
 </div>
 	</main>

 	<script type="text/javascript">
 		if ( window.history.replaceState ) {
 			 window.history.replaceState( null, null, window.location.href );
			}

		idx0 = document.getElementById("opt0")
		idx00 = document.getElementById("opt00")
		if (idx0.innerHTML == "not yet"){
			idx00.innerHTML = "paid"
		}else{
			document.getElementById("select0").className = "nav-link disabled"
			document.getElementById("iddd11").className = "nav-link disabled"
		}

		idx1 = document.getElementById("opt1")
		idx11 = document.getElementById("opt11")
		if (idx1.innerHTML == "not yet"){
			idx11.innerHTML = "paid"
		}else{
			document.getElementById("select1").className = "nav-link disabled"
			document.getElementById("iddd12").className = "nav-link disabled"
		}

 		function change_body() {
 			html = `<?php include("other_payments.php"); ?>`
 			main = document.getElementById("page1")
 			main.innerHTML = html;
 		}

 		function asset_schedule() {
 			html = `<?php include("asset_schedule.php"); ?>`
 			main = document.getElementById("page1")
 			main.innerHTML = html; 
 		}

 		function search_results() {
 			html = <?php getCustomerID(); ?>
 			sech = document.getElementById("search_results1")
 			sech.innerHTML = html

 		}

 		function payment_oders() {
 			html = `<?php include("our_payments.php"); ?>`
 			main = document.getElementById("page1")
 			main.innerHTML = html
 			 		}
 	</script>
 </body>
 </html>