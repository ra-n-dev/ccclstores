
<?php 

 session_start();
    $uname= $_SESSION['admin']; 
    include("../../db/connection.php");
    include("../header.php");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>sales ledger page</title>  
  <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

      
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
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

    header{
        overflow: auto;
        background: white;
        width: 100%;
        
    }
    .hh{
      border-bottom: solid black 2px;
    }


    header ul li{
        display: inline;
        text-decoration: none;

    }
  

    nav {
         overflow: hidden;

        }

    nav li {
         margin-right: 42px;
        padding-right:30px;
        margin-left: -0.6%;

      }

    nav ul {
         list-style: none;
        overflow: hidden
    }

    .sal{
      background: white;
      width: 100%;
      height: 100%;
      border-radius: 5px;
      margin-top: -1.4%;
      opacity: 0.8;
    }
    .sal h2{
      text-align: center;
      padding-top: 2%;
      color: black;
      font-style: italic;
    }
    .cls{
      margin-left: 35%;
      margin-top: 0%;
    }
    .cls input{
      width: 20%;
      height: 4vh;
      margin-right: 3%;
    }
    .cls .sb{

      width: 12%;
      height: 4.5vh;
      background: #40E0D0;
      border-color: #A569BD;
      border-radius: 5px;
    }
   
    .ttt{
      font-size: 18px;
      color: black;
      margin-right: 3%;
      font-style: italic;
    }
    .maa {
      background: transparent;
        width: 98%;
    }
    div.dt-buttons {
        position: relative;
        margin-top: -2%;
      }


</style>
<body>

       <header class="hh">
        <nav>
        <ul>
            <li><a id="dashh" href="../admin/index.php">Dashboard</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="../admin/request.php">Requested-Expenses</a></li>
            <li><a href="../admin/adminexp.php">Make-Expense</a></li>
            <li><a href="../admin/adminreport.php">Reports</a></li>
            <li><a href="#">Equipments</a></li>
            <li><a href="#">Dairy</a></li>
            <li><a href="#">Insurance</a></li>
            <li><a href="#">Analytics</a></li>

        </ul>
       </nav>
    </header>
    <div class="sal">
      <h2>LIST OF PURCHASES</h2>

          
            <form method='POST' enctype='multipart/form-data'>
         <div class='cls'>
            <label class='ttt'>SORT BY DATE:</label>
            <label>Start Date</label>
             <input type='date' name='sdate' required>
             <label>End Date</label>
             <input type='date' name='edate' required>
             <input type='submit' name='sort' value='Submit' class='sb'>
         </div>
    
      </form>
    
      


     <?php 
        if(isset($_POST['sort'])){
         $start_date =date('Y-m-d',strtotime($_POST['sdate'])) ;
         $end_date = date('Y-m-d', strtotime($_POST['edate']));


            echo"<center>";
         echo"<div class='maa'>";

          $sales ="SELECT * FROM cash_inflow_book WHERE pay_date BETWEEN '$start_date' and '$end_date' ";

             $resol = mysqli_query($connect,$sales);

               echo"<table cellspacing=0 cellpadding =1 border=1  class='displayy'  id='table_id' data-sortable='false' data-role='table'>
               <thead>
               <tr border=0.1 >
               <th style='background:black;color:white;width:10%' data-sortable='false'data-format='date' data-format-mask='%d-%m-%y'>Received Date</th>
               <th style='background:black;color:white;width:10%' data-sortable='false'>Patient Name</th>
               <th style='background:black;color:white;width:15%' data-sortable='false'>Purpose</th>
               <th style='background:black;color:white;width:10%' data-sortable='false'>Patient ID</th>
               <th style='background:black;color:white;width:5%' data-sortable='false'>Amount</th>
               
               </tr>
            </thead>";

             if(mysqli_num_rows($resol)<1){
          echo"there is no data";

            }
            while($row = mysqli_fetch_array($resol)){
              $names =$row['patient_name'];
               $amount =$row['income'];
               $patient_id = $row['patient_perm_id'];
                  $purpose = $row['purpose'];
                  $received_date = $row['pay_date'];
                  
      
                     echo"<tbody>";
                      echo "<tr>

                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$received_date</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$names</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$purpose</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$patient_id</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$amount</td>


                        ";
                                                                                                  
                        echo" </td>
                    </tr>";
               echo"</tbody";        
             }

      echo "<tbody></tbody></table>";

      echo"</div>";

        }else{
        

        echo"<div class='maa'>";

          $sales ="SELECT * FROM cash_inflow_book";
             $resol = mysqli_query($connect,$sales);

               echo"<table cellspacing=0 cellpadding =1 border=1  class='displayy'  id='table_id' data-sortable='false' data-role='table'>
               <thead>
               <tr border=0.1 >
               <th style='background:black;color:white;width:10%' data-sortable='false'data-format='date' data-format-mask='%d-%m-%y'>Received Date</th>
               <th style='background:black;color:white;width:10%' data-sortable='false'>Patient Name</th>
               <th style='background:black;color:white;width:15%' data-sortable='false'>Purpose</th>
               <th style='background:black;color:white;width:10%' data-sortable='false'>Patient ID</th>
               <th style='background:black;color:white;width:5%' data-sortable='false'>Amount</th>
               
               </tr>
            </thead>";

             if(mysqli_num_rows($resol)<1){
          echo"there is no data";

            }
            while($row = mysqli_fetch_array($resol)){
              $names =$row['patient_name'];
               $amount =$row['income'];
               $patient_id = $row['patient_perm_id'];
                  $purpose = $row['purpose'];
                  $received_date = $row['pay_date'];
                  
      
                     echo"<tbody>";
                      echo "<tr>

                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$received_date</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$names</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$purpose</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$patient_id</td>
                        <td style=' border: 0.1pt solid black;padding-left:5px;padding-right:5px; '>$amount</td>


                        ";
                                                                                                  
                        echo" </td>
                    </tr>";
               echo"</tbody";        
             }

      echo "<tbody></tbody></table>";

      echo"</div>";
      echo"</center>";
        
        }



         ?>
    </div>



<script src="../../js/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready( function () {

        
    $('#table_id').DataTable({
        "searching":false,
        "paging":true,
        "order":false,
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

            'print',

         ],

       
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