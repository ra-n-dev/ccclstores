
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
                border: 5px solid blue;
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
    <label for="" class="form-label" >ID</label>
    <input type="text" class="form-control shadow rounded" id="" name="customer_id">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label ">Name</label>
    <input type="text" class="form-control shadow rounded" id="" name="customer_name">
  </div>
    <div class="col-md-6">
    <label for="" class="form-label ">Quantity</label>
    <input type="text" class="form-control shadow rounded" id="" name="quantity">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Amount</label>
    <input type="text" class="form-control shadow rounded" id="inputAddress" placeholder="" name="customer_amount">
  </div>
  <div class="col-12">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control shadow rounded" id="" placeholder="" name="description">
  </div>
  <div class="col">
    <label for="inputState" class="form-label">Category</label>
    <select id="inputState" class="form-select shadow rounded" name="payment_category">
      <option selected>Choose...</option>
      <option>Consultation</option>
      <option>Lab</option>
      <option>Drugs</option>
      <option>General</option>
      <option>Others</option>
    </select>
  </div>
  <div class="col">
         <div class="col">
    <label for="inputState" class="form-label">Payment Mode</label>
    <select id="inputState" class="form-select shadow rounded" name="payment_mode">
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
              <button id = "save" type="submit" class="btn btn-success rounded-pill btn-lg " name="save" style="width:300px;">SAVE</button>  
        </center>
  </div>
</form>
 </div>
   </div>    
</div>


