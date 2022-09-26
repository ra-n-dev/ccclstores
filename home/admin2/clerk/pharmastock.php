<?php 
include("../../../db/connection.php");



      $drugname= $_POST['drugname'];
      $supplier= $_POST['supplier'];
      $category= $_POST['drugcategory'];
      $dosage = $_POST['dosage'];
      $quantity =$_POST['quantity'];
      $expirydate =$_POST['expirydate'];
      $totalcost =$_POST['totalcost'];
      $unitsellingprice =$_POST['unitsellingprice'];
      $purchaseddate = $_POST['purchaseddate'];
      $unitcost = round($totalcost/$quantity,2); //this is how i rounded the figure to 2 decimal place.
      $invoicenumber =$_POST['invoicenumber'];
      $stocktype ='medical_stock';
      $daate =date('Y-m-d');
      $itemclass ='purchase';

    
      $drugs []=["name"=>$drugname,"category"=>$category,"dosage"=>$dosage];     
      $resp = json_encode($drugs);
      //$allMedi = json_decode($resp, true);
 
    
      $quer ="INSERT INTO medstock_table(item_name,quantity,unit_cp,tot_cp,expirydate,supplier,invetdate,invoicenumber,unit_sp,purchaseddate,groupp,status,tot_sls,category,dosage)VALUES(' $drugname','$quantity','$unitcost','$totalcost','$expirydate','$supplier','$daate','$invoicenumber','$unitsellingprice','$purchaseddate','$itemclass','expired','0','$category','$dosage')";
      $result =mysqli_query($connect, $quer)or die(mysqli_error($connect));

      

     // $quer ="INSERT INTO stock_table(item_name,category, stocktype,ops_qty,unit_cp,tot_cp,expirydate,supplier,dosage,qtysold,sold_date,cls_qty,cls_cash,invetdate,invoicenumber,unit_sp,purchaseddate,itemclass)VALUES(' $resp','$category','$stocktype','$quantity','$unitcost','$totalcost','$expirydate','$supplier','$dosage','0','not_yet','$quantity',$totalcost,'$daate','$invoicenumber','$unitsellingprice','$purchaseddate','$itemclass')";
      //$result =mysqli_query($connect, $quer)or die(mysqli_error($connect));

     // $quer ="INSERT INTO pharmacyinventory(purchaseddate,medicinename,category,sellingprice,costprice,expirydate,supplier,capacity,groupitem,boxnumber,invetdate,drugquantity)VALUES('none','$drugname','$category','$sellingprice','$costprice','$expirydate','$supplier','$dosage','none','none',now(),'$quantity')";
      //$result =mysqli_query($connect, $quer)or die(mysqli_error($connect));
      

 ?>