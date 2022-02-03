<?php 

 session_start();
    $uname= $_SESSION['store']; 
    include("../../db/connection.php");
    include("../header.php");

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Store</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/../js/jquery.dataTables.js"></script>

</head>

 <style type="text/css">
    
   body{
    margin: 0;
    padding: 0;
    background-image: url(../../image/home3.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 95vh;
    
    }

    nav .ll{
    }


      .do nav{
        margin-right: 1%;
        background:  white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }
    .do{
        margin-top:2% ;
    }

      nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 60px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }

  
  .addd a{
      border-radius: 20px;
      background: #A9DFBF;
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

 table thead tr th{
    border: solid 0.1px grey;
    background:#ABB2B9 ;
    width: 100%;
  }

table tbody tr td{
    border-color: #D5D8DC;
    background: #EBEDEF;
    border-color: red;
    border: solid 0.1px #E5E7E9;
    opacity: 0.8;
  }
  table{
    border-color:  #D5D8DC;
    margin-left: 5%;
  }
  .pat h3{
    color: black;
    width: 20%;
    padding-left: 1%;
  }

  .pat{
    background: white;
    border-radius: 6px;
    opacity: 0.8;
    padding-left: 0.2%;
    padding-right: 0.4%;
    padding-top: 0.5%;
    width: 97%;
    margin-left: 1%;
    margin-top: 3%;

  }



@media  (max-width:900px){
     body{
    margin: 0;
    padding: 0;
    background-image: url(../../image/home3.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 125vh;
    
    }
   .pat table{
    border-color:  #D5D8DC;
    margin-top: 3%;
  }
  .pat h3{
    color: black;
    width: 40%;
    padding-left: 1%;
  }
   
     nav li {
        margin-right: 30px;
      }

      .do nav{
        margin-right: 20%;
        background: white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;

    }

  h4{
    margin-top:-8%;
    margin-left:10px ;
  }


   .pat{
    background: white;
    border-radius: 6px;
    opacity: 0.8;
    padding-left: 0.2%;
    padding-right: 0.4%;
    padding-top: 0.5%;
    width: 97%;
    margin-left: 1%;
    margin-top:20%;
     overflow-x: scroll;

  }

 


}
   
</style>
<body>

    <div class="do">
        
        <center >
            <nav>
            <ul>
                <li class="ll"><a id="medicines" href="index.php">Medicines</a></li>
                <li class="ll"><a id="newcase" href="addnew.php">New-Drug</a></li>
                <li class="ll"><a id="newcase" href="newequipment.php">New-Equipment</a></li>
                <li class="ll"><a id="expense" href="storeexpense.php">Expense</a></li>
                <li class="ll"><a id="pfolder" href="#">Notices</a></li>
                <li class="ll"><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>

    

   <div class="woo">
    
    
      <div class="pat">
        <h3 >List of All Drugs in Stock</h3><br>
        <?php 
      $query ="SELECT * FROM drug_available_table ORDER BY purchase_date DESC";
      $result =mysqli_query($connect, $query);
       
        echo"<table cellspacing=0 cellpadding =1 border=1  class='displayy'  id='table_id' data-sortable='false' data-role='table'>
        <thead>
        <tr border=0.1 >
           <th style='color:indigo;width:10%' data-sortable='false'data-format='date' data-format-mask='%d-%m-%y'>Purchased Date</th>
           <th style='color:#17202A;' data-sortable='false'>Medicine Name</th>
           <th style='color:#154360;' data-sortable='false'>Quantity</th>
           <th style='color:#641E16;' data-sortable='false'>Supplier</th>
           <th style='color:#17202A;' data-sortable='false'>Category</th>
           <th style='color:#1B4F72;' data-sortable='false' data-format='money'>Cost Price</th>
           <th style='color:#641E16;' data-sortable='false'>Selling Price</th>
           <th style='color:#154360;' data-sortable='false'>No. Box</th>
           <th style='color:#17202A;' data-sortable='false'>Capacity</th>
           <th style='color:red' data-sortable='false'>Group Drugs</th>
           <th style='color:#4A235A;' data-sortable='false'>Expiry Date</th>
           <th style='color:green;width:10%;height:10%' data-sortable='false'>Action</th>

      
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
                  $sellingprice =$row['unit_selling_price'];
                  $unitmeasurement=$row['unit_measurement'];
                  $capacity=$row['capacity'];
                  $unitcostprice=$row['unit_cost_price'];
                  $expirydate=$row['expiry_date'];

                     echo"<tbody>";
                      echo "<tr style='background:transparent'>
                      <td style='padding-left:5px;padding-right:5px; '>$purchaseddate</td>

                        <td style=' padding-left:5px;padding-right:5px; '>$medicinename</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$drugquantity</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$supplier</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$category</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$costprice</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$sellingprice</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$unitmeasurement</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$capacity</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$unitcostprice</td>
                        <td style=' padding-left:5px;padding-right:5px; '>$expirydate</td>

                        ";

                         echo  "<td>";

                         echo" 
                               <a href='editdrug.php?medicine_id=".$row['drug_id']." '> <i class='fas fa-pen-square' style='height:10%;font-size:24px;color:green;background:grey'></i></a>
                               <a href='removedrug.php?medicine_id=".$row['drug_id']." '> <i class='fas fa-trash-alt' style='height:10%;font-size:24px;color:red;margin-left:24px;margin-top:-30px'></i></a>
                                

                               
                              
                             
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
   
    

<script src="../../js/jquery-3.6.0.min.js"></script>

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