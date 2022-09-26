<?php 

include("../../../db/connection.php");

      $itemname= $_POST['itemname'];
      $supplier= $_POST['supplier'];
      $quantity =$_POST['quantity'];
      $purchaseddate =$_POST['purchaseddate'];
      $expirydate =$_POST['expirydate'];
      $totalcost =$_POST['totalcost'];
      $unitcost =$_POST['unitcost'];
      $unitsellingprice = $_POST['unitsellingprice'];
      $invoicenumber =$_POST['invoicenumber'];
      $stocktype ='non_medical_stock';
      $daate =date('Y-m-d');
      $itemclass =$_POST['itemclass'];


      $quer ="INSERT INTO stock_table(item_name,category, stocktype,ops_qty,unit_cp,tot_cp,expirydate,supplier,dosage,qtysold,sold_date,cls_qty,cls_cash,invetdate,invoicenumber,unit_sp,itemclass,purchaseddate)VALUES('$itemname','none','$stocktype','$quantity','$unitcost','$totalcost','$expirydate','$supplier','none','0','not_yet','$quantity','$totalcost','$daate','$invoicenumber','$unitsellingprice','$itemclass','$purchaseddate')";
      $result =mysqli_query($connect, $quer)or die(mysqli_error($connect));

 ?>