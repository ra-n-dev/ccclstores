<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title text-warning " id="exampleModalLabel">
            <center class="text-warning">Add New Assets</center>
          </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-info">
        <form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">No.</label>
    <input type="text" class="form-control" id="inputEmail4" name="asset_cols[]">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Date</label>
    <input type="text" class="form-control" id="inputPassword4" name="asset_cols[]">
  </div>
   <div class="col-12">
    <label for="inputAddress" class="form-label">Asset Name/Type</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="" name="asset_cols[]">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Details</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="" name="asset_cols[]">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Supplier</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="" name="asset_cols[]">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Cost</label>
    <input type="text" class="form-control" id="inputCity" name="asset_cols[]">
  </div>
    <div class="col-md-6">
    <label for="inputCity" class="form-label">Amount Paid</label>
    <input type="text" class="form-control" id="inputCity" name="asset_cols[]">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Payment</label>
    <select id="inputState" class="form-select" name="asset_cols[]">
      <option selected>Choose...</option>
      <option>Cash</option>
      <option>MOMO</option>
      <option>Credit</option>
    </select>
  </div>
    <div class="col-md-6">
    <label for="inputCity" class="form-label">Dep. rate</label>
    <input type="text" class="form-control" id="inputCity" name="asset_cols[]">
  </div>
   <div class="col-12">
    <button type="submit" class="btn btn-success" name="add_new_asset">Save</button>
  </div>
</form>
      </div>
    </div>
  </div>
</div>