
 	<style type="text/css">
 		.jumbotron{
 			margin-top: 30px;
 			color: yellow;
 			padding: 20px;
 		}
 		#save{
 			width: 100%;
 		}
 		#save1{
 			width: 100px;
 			margin-top: 30px;
 			margin-left: 200px;
 		}
    #jumb3{
      width: 100px;
      height: 300px;
      margin-left: 40px;
      margin-right: 40px;
    }
    #hide1{
      display: none;
    }
    table{
      width: 100%;
      height: 100%;
    }
    #cent1{
      font-weight: bold;
      font-style: italic;n
    }
    #iddd11, #iddd12{
      width: 87px;
    }
    #take_data{
      margin-top: 20px;
    }
 	</style>
 <div class="row">
 
    <?php 
      ##include("invoice1.php");
  include("../db/connection.php");
  $conn = $connect;

   if (isset($_POST['paid_fees'])) {
   $data = $_POST['pmtt11'];

    $year1 = date("Y");
    $month1 = date("m");
    $day1 = date("d");
$sql = "INSERT INTO customer_payment 
        (patient_id, case_id, customer_name, quantity, drug_name, amount, category, description, payment_mode, payment_date, day1, month1, year1) 
VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]','$data[6]', '$data[7]','$data[8]', now(), '$day1', '$month1', '$year1')";

mysqli_query($conn,$sql)or die(mysqli_error($conn));

$idxc2 = $_POST['hidden0'];
$ch1 = $data[6];


if ($ch1 == 'Drug'){
  $sql2 = "UPDATE consultation SET drug_payment_status = 'paid' WHERE consult_id=$idxc2";
       mysqli_query($conn, $sql2);
}
elseif ($ch1 == 'Lab') 
{
  $sql2 = "UPDATE consultation SET lab_payment_status = 'paid' WHERE consult_id=$idxc2";
       mysqli_query($conn, $sql2);
}

$ch2 = $data[4];
$old_quan = $data[3];


$sql3 = "SELECT quantity FROM drug_inventory WHERE drug_name = '$ch2'";
$result3 = $conn->query($sql3);

$quan1 = 0;
if ($result3){
  while ($row = $result3->fetch_assoc()){
    $quan1 = $row['quantity'];
  }
$new_quan1 = $quan1 - $old_quan;
}

$sql4 = "UPDATE drug_inventory SET quantity = '$new_quan1' WHERE drug_name='$ch2'";
  mysqli_query($conn, $sql4);
    }
  
    
     ?>

 		<div class="col text-white  bg-white text-danger jumbotron" id="jumb3">
      <center>
  <table class="table caption-top table-dark">
  <caption class="text-warning" id="cent1"><center>CUSTOMER DETAILS</center></caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Prescription</th>
      <th>DR</th>
      <th>Drugs</th>
      <th>Lab</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>

      <?php $var = getCustomerID();
              if ($var) {
                $counter = 1;

                  $case = $var['case_id'];
                  $pname = $var['patient_name'];
                  $dr = $var['doc_name'];
                  $pres = $var['prescription'];
                  $d_status = $var['drug_payment_status'];
                  $l_staus = $var['lab_payment_status'];
                  
                  $encode1 = $var['consult_id'];
                  $json = json_encode($var);
          echo "
        
          <tr>
          <th scope='row'>1</th>
          <td>$case</td>
          <td>$pname</td>
          <td>$pres</td>
          <td>$dr</td>
          <td>$d_status</td>
          <td>$l_staus </td>
          
          <td><button class='btn-success' onclick = 'add_form()'>Pay</button></td>
          </tr>
          ";} 
     ?>
  </tbody>
</table>

  <div id="take_data" class=""></div>
      </center>
 		</div>
 	</div>
  </div>

<script type="text/javascript">
  function add_form() {
    html = `<?php include("modal3.php"); ?>`
    main = document.getElementById("take_data")
    main.innerHTML = html;
  }
</script>
