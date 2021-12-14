<?php 
 include("header.php");
 include("../db/connection.php");
  
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js">
    </script>
</head>
<style type="text/css">
    .pat{
    width: 98.8%;
    margin-left: 5px;
    margin-top: -5%;

  }
  .woo{
      width: 99.7%;
      overflow-x: hidden;
      overflow-y: scroll;
      height: 91vh;
  }

  .woo::-webkit-scrollbar-track {
     -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 20px;
      width: 15px;
      background-color: white;
     }

     .woo::-webkit-scrollbar {
     width: 8px;
     background-color: #F5F5F5;
    }

    .woo::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 5%;
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, .3);
    background-color: skyblue;
  }

  .woo::-webkit-scrollbar-button {
   height: 25vh;
  }
  .addd a{
      border-radius: 20px;
      background: #82E0AA;
       border-color: #82E0AA ;
      padding-top: 15px;
      margin-left: 20px;
      padding-bottom: 15px;
      padding-left: 15px;
      padding-right: 15px;
      margin-left: 89%;
      margin-bottom: 20px;
      text-decoration: none;
      font-size: 18px;
      color: blue;

    }
    .addd{
    padding-top: 3%;
    margin-bottom: 3%;
  }
</style>
<body>
    <div class="woo">
    <div class="addd">

      <a href="addmedicine.php"><i class="fas fa-plus"></i>new</a>
  </div>
    
      <div class="pat">
        <h4 style="margin-left:10px">List of All Drugs in Stock</h4><br>
        <?php 
      $query ="SELECT * FROM drug_inventory_table ORDER BY purchase_date DESC";
      $result =mysqli_query($connect, $query);
       
        echo"<table cellspacing=0 cellpadding =1 border=1  class='display'  id='table_id' data-sortable='false' data-role='table'>
        <thead>
        <tr border=0.1 >
           <th style='background:black;color:white;width:10%' data-sortable='false'data-format='date' data-format-mask='%d-%m-%y'>Purchased Date</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Medicine Name</th>
           <th style='background:black;color:white;width:15%' data-sortable='false'>Quantity</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Supplier</th>
           <th style='background:black;color:white;width:5%' data-sortable='false'>Category</th>
           <th style='background:black;color:white;width:10%' data-sortable='false' data-format='money'>Cost Price</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Selling Price</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>No. Box</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Capacity</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Group Drugs</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Expiry Date</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Update Drug</th>

      
        </tr>
        </thead>
     ";


     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:white;color:black;'>Such medicine is not in stock</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {

                  $purchaseddate = $row['purchase_date'];
                  $medicinename = $row['drug_name'];
                  $drugquantity = $row['quantity'];
                  $supplier = $row['supplier_name'];
                  $category = $row['category'];
                  $costprice = $row['total_cost_price'];
                  $sellingprice =$row['selling_price'];
                  $unitmeasurement=$row['unit_measurement'];
                  $capacity=$row['capacity'];
                  $unitcostprice=$row['unit_cost_price'];
                  $expirydate=$row['expiry_date'];

                     echo"<tbody>";
                      echo "<tr>
                      <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$purchaseddate</td>

                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$medicinename</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$drugquantity</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$supplier</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$category</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$costprice</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$sellingprice</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$unitmeasurement</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$capacity</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$unitcostprice</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$expirydate</td>

                        ";

                         echo  "<td style=' border: 0.1pt solid black;'>";

                         echo" 
                               <a href='editdrug.php?medicine_id=".$row['drug_id']." '> <i class='fas fa-pen-square' style='width:100%;height:100%;font-size:24px;color:green'></i></a>
                               <a href='removedrug.php?medicine_id=".$row['drug_id']." '> <i class='fas fa-trash-alt' style='width:100%;height:100%;font-size:22px;color:red;margin-left:24px;margin-top:-30px'></i></a>
                                

                               
                              
                             
                               ";                       
                                                                                                  
                        echo" </td>
                    </tr>";

                        

               echo"</tbody";        
             }

      echo "
    
    <tbody>

      
    </tbody>
</table>
      ";

     ?>

        
    </div>
        
    </div>
   
    

<script src="../js/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready( function () {

        
    $('#table_id').DataTable({
      dom: 'Bfrtip',
         lengthMenu: [
            [ 5, 25, 50, 100, -1 ],
            [ '5 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
         ],
         buttons: [
            'pageLength',
            'copy',
            {
               extend: 'csv',
               title: 'Drug List'
            },
            {
               extend: 'excel',
               title: 'Drug List'
            },
            {
               extend: 'pdf',
               title: 'Drug List'
            },
            'print'
         ]
   });
} );


</script>

  
   <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
   <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

</body>
</html>