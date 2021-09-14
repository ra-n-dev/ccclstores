<?php 

  include("../db/connection.php");
  header('Content-type:application/vnd-ms-excel');
  $filename ="medicine_list.xls";
  header("Content-Disposition:attachment;filename=\"$filename\"");
 ?>
     <div class="pat">
      <?php 

       $query ="SELECT * FROM pharmacyinventory ORDER BY purchaseddate DESC";
       $searchkey ="";
     
     $result =mysqli_query($connect, $query);
   
     echo"<table cellspacing=0 cellpadding =1 border=1  class='table1'>
        <tr border=0.1 >
           <td style='background:black;color:white;width:10%'>Purchased Date</td>
           <td style='background:black;color:white;width:10%'>Medicine Name</td>
           <td style='background:black;color:white;width:15%'>Quantity</td>
           <td style='background:black;color:white;width:10%'>Supplier</td>
           <td style='background:black;color:white;width:5%'>Category</td>
           <td style='background:black;color:white;width:10%'>Cost Price</td>
           <td style='background:black;color:white;width:10%'>Selling Price</td>
           <td style='background:black;color:white;width:10%'>No. Box</td>
           <td style='background:black;color:white;width:10%'>Capacity</td>
           <td style='background:black;color:white;width:10%'>Group Drugs</td>
           <td style='background:black;color:white;width:10%'>Expiry Date</td>

      
        </tr>
     ";


     if(mysqli_num_rows($result)<1){
      echo"<tr><td style=' border: 1pt double ;background:white;color:black;'>Such medicine is not in stock</<td></tr>";
     }

     while ($row= mysqli_fetch_array($result)) {

                  $purchaseddate = $row['purchaseddate'];
                  $medicinename = $row['medicinename'];
                  $drugquantity = $row['drugquantity'];
                  $supplier = $row['supplier'];
                  $category = $row['category'];
                  $costprice = $row['costprice'];
                  $sellingprice =$row['sellingprice'];
                  $boxnumber=$row['boxnumber'];
                  $capacity=$row['capacity'];
                  $groupitem=$row['groupitem'];
                  $expirydate=$row['expirydate'];

                      echo "<tr>
                      <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$purchaseddate</td>

                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$medicinename</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$drugquantity</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$supplier</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$category</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$costprice</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$sellingprice</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$boxnumber</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$capacity</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$groupitem</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$expirydate</td>

                        ";
                                            
                                                                                                  
                        echo" </td>
                    </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;

             ?>
   
   </div>