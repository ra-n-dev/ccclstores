    <div class="col">
          <!-- Button trigger modal -->
<button  id = "save1" type="button" class="btn btn-dark rounded-pill text-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Invoice
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Invoice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>