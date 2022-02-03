
<?php 
include("../db/connection.php");

$conn = $connect;
$delet_id  = $_GET["userid"];

echo"<h1 class='text-white'>$delet_id</h1>";

$sql = "DELETE FROM asset_schedule WHERE asset_id='$delet_id'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} 
else {
  echo" Nothing deleted";
}
 ?>

    <div class="row">
      <div class="col"></div>
      <div class="col jumbotron">
          <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Details</th>
      <th scope="col">Date</th>
      <th scope="col">Supplier</th>
      <th scope="col">Cost</th>
      <th scope="col">Dep. rate</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include("../db/connection.php");

    $conn = $connect;
    $sql = "SELECT asset_id, date_of_purchase, asset_name, supplier, cost_of_purchase, amount_paid, depreciation_rate FROM asset_schedule";
    $result = $conn->query($sql);

    $counter = 0;
    while($row = $result->fetch_assoc()) {
      $idx = $row['asset_id'];
      $dop = $row['date_of_purchase'];
      $name = $row['asset_name'];
      $supplier = $row['supplier'];
      $cop = $row['cost_of_purchase'];
      $amount_paid = $row['amount_paid'];
      $dep = $row['depreciation_rate'];
    
    print_r("
     
    <tr>
    <th scope='row'>$counter</th>
      <td>AGXHA$idx</td>
      <td>$name</td>
      <td>$dop</td>
      <td>$supplier</td>
      <td>$cop</td>
      <td>$dep</td>
      <td>
        <a href='delete.php?userid=$idx'>
          <button class='btn btn-success btn-sm rounded-pill'>Delete</button>
        </a>

      </td>
    </tr>
"); 
$counter += 1;
 }

?>

  </tbody>
</table>
</div>
<div class="col">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Add New Asset
</button>
        <?php 
    include("modal2.php");
    ?>
    
      </div>
    </div>
