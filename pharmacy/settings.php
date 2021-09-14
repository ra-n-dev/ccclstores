<?php 
 include("header.php");
 include("../db/connection.php");
  
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/all.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">


  <title>medicine list</title>


  
<script>
$(document).ready(function() {
   $('#summary').dataTable({
      dom: 'Bfrtip',
         lengthMenu: [
            [ 10, 25, 50, 100, -1 ],
            [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
         ],
         buttons: [
            'pageLength',
            'copy',
            {
               extend: 'csv',
               title: 'Drug_List'
            },
            {
               extend: 'excel',
               title: 'Drug_List'
            },
            {
               extend: 'pdf',
               title: 'Drug_List'
            },
            'print'
         ]
   });
});
</script>

</head>
<style type="text/css">

  body{
    margin: 0;
    padding: 0;
    position: fixed;
  }

  h4{
    font-family: sans-serif;
    font-weight: bold;
  }

  .hedd{
    background: black;
    height: 45px;
    margin-left: 20px;
    margin-right: 20px;
  }
  .tabless{
    margin-left: 5px;

    

  }
  .pat{
    width: 99.8%;

  }

   .pat form .search{
        background: white;
        margin-bottom: 10px;
        margin-top: -3%;
    }
    .pat form .search .sub1{
      width: 350px;
      height: 28px;
      border-bottom-left-radius: 5px;
      border-top-left-radius:5px ;
    }
   .pat form .search .sub2{
      width: 65px;
      height: 34px;
      margin-left: -4px;
      border-bottom-right-radius: 5px;
      border-top-right-radius:5px ;
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
      margin-left: 87%;
      margin-bottom: 20px;
      text-decoration: none;
      font-size: 20px;
      color: blue;

    }

    .eppp a{
      border-radius: 20px;
      background: #82E0AA;
       border-color: #82E0AA ;
      padding-top: 15px;
      margin-left: 20px;
      padding-bottom: 15px;
      padding-left: 15px;
      padding-right: 15px;
      margin-left: 75%;
      margin-bottom: 20px;
      text-decoration: none;
      font-size: 20px;
      color: blue;

    }
    .pat a{
      background: transparent;


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
  .addd{
    margin-top: -1%;
    margin-bottom: 2%;
  }

  .eppp{
    margin-top: -3.7%;
    margin-bottom: 2%;
  }
</style>
<body>
  <div class="woo">
    
  
 <h4 style="margin-left:10px">List of All Drugs in Stock</h4><br>
 <div class="med">
  <div class="addd">

      <a href="addmedicine.php" >AddNew
      

      </a>
  </div>
   <div class="eppp">

      <a href="medi_download.php" target="_blank">Export File
      

      </a>
  </div>
  <div class="tabless">
    <div class="pat">
      <?php 

     if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        $query ="SELECT * FROM pharmacyinventory WHERE medicinename LIKE '%$searchkey%' ";
     }else{
       $query ="SELECT * FROM pharmacyinventory ORDER BY purchaseddate DESC";
       $searchkey ="";
     }
     $result =mysqli_query($connect, $query);
     echo "
     <form method='POST' enctype='multipart/form-data'>
     <div class='search'>
           <input class='sub1' type='text' name='search' placeholder='Search Medicine by Name' value='$searchkey'>
           <input class='sub2' type='submit' name='action' style='background: green; color: white; width:65px; border: 1px green;'>
     </div>
       
      </form>

     ";

     echo"<table cellspacing=0 cellpadding =1 border=1  class='table1' id='summary'>
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
           <td style='background:black;color:white;width:10%'>Update Drug</td>

      
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

                         echo  "<td style=' border: 0.1pt solid black;'>";

                         echo" 
                               <a href='editdrug.php?medicine_id=".$row['medicine_id']." '> <i class='fas fa-pen-square' style='width:100%;height:100%;font-size:24px;color:green'></i></a>
                               <a href='removedrug.php?medicine_id=".$row['medicine_id']." '> <i class='fas fa-trash-alt' style='width:100%;height:100%;font-size:22px;color:red;margin-left:24px;margin-top:-30px'></i></a>
                                

                               
                              
                             
                               ";                       
                                                                                                  
                        echo" </td>
                    </tr>";

                        

                       
             }

            
                
            echo"</table>";
 
             // echo $output;

             ?>
   
   </div>
  </div>
   
 </div>

 </div>


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




  
   

