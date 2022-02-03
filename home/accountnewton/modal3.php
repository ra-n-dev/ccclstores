<?php 
 
 ?>

<style type="text/css">
  #fm3{
    border: 3px solid white;
    width: 100px;
  }
</style>

<form class="row g-3 bg-warning text-dark " action="" method="POST" id="fm2">
        <caption class="text-warning shadow-sm p-3 mb-5 bg-body rounded">
                <center>PAYMENT DETAILS</center>
        </caption>
        <hr>
    <?php $var = getCustomerID();
              if ($var) {
               $case = $var['case_id'];
               $name_cus = $var['patient_name'];
               $cus_id = $var['patient_id'];

    echo "<input type='text' name='hidden0' style='display:none' value='$case'>

  <div class='col-md-6'>
    <label for='' class='form-label'>Customer ID</label>
    <input type='text' class='form-control nav-link disabled shadow rounded' id='' name='pmtt11[]' value = '$cus_id'>
  </div>

  <div class='col-md-6'>
    <label for='' class='form-label'>Case ID</label>
    <input type='text' class='form-control nav-link disabled shadow rounded' id='' name='pmtt11[]' value = '$case'>
  </div>

  <div class='col-md-6'>
    <label for='' class='form-label'>Customer Name</label>
    <input type='text' class='form-control nav-link disabled shadow rounded' id='' name='pmtt11[]' value = '$name_cus'>
  </div>
    ";
             }?>
  <div class="col-md-6">
    <label for="" class="form-label ">Quantity</label>
    <input type="text" class="form-control shadow rounded" id="" name="pmtt11[]">
  </div>
   <div class="col-md-6">
    <label for="" class="form-label ">Drug Name</label>
    <input type="text" class="form-control shadow rounded" id="" name="pmtt11[]">
  </div>
    <div class="col-md-6">
    <label for="" class="form-label ">Amount</label>
    <input type="text" class="form-control shadow rounded" id="" name="pmtt11[]">
  </div>
  <div class="col-6">
    <label for="inputState" class="form-label">Category</label>
    <select id="inputState" class="form-select shadow rounded" name="pmtt11[]">
      <option selected>Choose...</option>
      <option>Drug</option>
      <option>Lab</option>
    </select>
  <div class="">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control shadow rounded" id="" placeholder="" name="pmtt11[]">
  </div>
  </div>
  <div class="col">
         <div class="col-6">
    <label for="inputState" class="form-label">Payment Mode</label>
    <select id="inputState" class="form-select shadow rounded" name="pmtt11[]">
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
              <button id = "" type="submit" class="btn btn-success rounded-pill btn-lg " name="paid_fees" style="width:300px;">SAVE</button>  
        </center>
  </div>
</form>