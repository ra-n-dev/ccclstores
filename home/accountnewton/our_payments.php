
<?php 
include("../db/connection.php");

$conn = $connect;

 if (isset($_POST['payee1'])) {
   $data = $_POST['payee10'];
    $year1 = date("Y");
    $month1 = date("m");
    $day1 = date("d");

$sql = "INSERT INTO business_payment (pmt_date, item_name, quantity, pmt_amt, customer, describe1, pmt_mode, staff_id, day1, month1, year1) VALUES (now(), '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', 12, '$day1', '$month1', '$year1')";

  mysqli_query($conn,$sql)or die(mysqli_error($conn));
  }
 ?>

<style type="text/css">
        #pmtt1{
                margin-top: 20px;
                margin-left: 100px;
                height: 500px;
                width: 500px;
        }
        #fm1{
                padding:10%;
                color: black;
                font-weight: bold;
        }
        hr{
                color: blue;
                border: 5px solid yellow;
        }
</style>

<div class="row">
   <div class="col-1"></div>
   <div class="col">
<div class="col-6 jumbotron border text-white" id="pmtt1" >
<form class="row g-3 bg-white text-dark " action="" method="POST" id="fm1">
        <caption class="text-warning shadow-sm p-3 mb-5 bg-body rounded">
                <center>PAYMENT DETAILS</center>
        </caption>
        <hr>
  <div class="col-md-6">
    <label for="" class="form-label" >Item Name</label>
    <input type="text" class="form-control shadow rounded" id="" name="payee10[]">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label ">Quantity</label>
    <input type="text" class="form-control shadow rounded" id="" name="payee10[]">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Amount</label>
    <input type="text"class="form-control shadow rounded" id="inputAddress" name="payee10[]">
  </div>
    <div class="col-12">
    <label for="inputAddress" class="form-label">Customer</label>
    <input type="text"class="form-control shadow rounded" id="inputAddress" name="payee10[]">
  </div>
  <div class="col-12">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control shadow rounded" id="" placeholder="" name="payee10[]">
  </div>
  <div class="col">
         <div class="col">
    <label for="inputState" class="form-label">Payment Mode</label>
    <select id="inputState" class="form-select shadow rounded" name="payee10[]">
      <option selected>Choose...</option>
      <option>Cash</option>
      <option>MOMO</option>
      <option>Credit</option>
    </select>
  </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col">
        <center>
              <button id = "savvee" type="submit" class="btn btn-success rounded-pill btn-lg " name="payee1" style="width:300px;">SAVE</button>  
        </center>
  </div>
</form>
 </div>
   </div>    
</div>


