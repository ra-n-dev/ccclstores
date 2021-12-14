<?php 
 include("header.php");
 include("../db/connection.php");

 if(isset($_POST['submit'])){
            $company_name =$_POST['company_name'];
            $contact =$_POST['contact'];
            $address =$_POST['address'];
            $payment_status =$_POST['payment_status'];
         $query ="INSERT INTO drugsuppliers(company_name,contact,address,payment_status)VALUES('$company_name','$contact','$address','$payment_status')";
         $result =mysqli_query($connect,$query) or die(mysqli_error($connect));
         if($result){
            echo "<script>alert('The supplier is added sucessfully')</script>";
         }else{
            echo "<script>alert('something went wrong')</script>";
         }
      }
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
      width: 100%;
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
   

    }
    .addd{
    padding-top: 3%;
    margin-bottom: 3%;
  }

  body{
        background: #F2F3F4;
    }
    .main{
        background:white;
        margin-top: 3%;
        height: 500px;
        margin-left: 5%;
        margin-right: 5%;
        border-radius: 10px;
        margin-bottom: 3%;
        display: none;
    }
    
    .main h3{
        color: red;
        margin-top: -10px;
        padding-left: 20px;
    }
    .main p{
        margin-top: -20px;
        padding-left: 20px;
        color: #AEB6BF;
    }

    .fom{
        background: transparent;
        height: 80%;
        margin-left: 19%;
        width: 60%;
        margin-right: 20px;
        padding-left: 10px;
        padding-top: 0px;
    }
     .fom .fom1{
        background: transparent;
        width: 100%;
     }
    .fom .fom1 input{
      margin-left: 15%; 
      height: 27px;
      width: 70%;
      margin-bottom: 20px;
    }
    .fom .fom1 label{
        margin-left: 15%;
        font-size: 20px;
        color:#D35400;
    }
    .fom .fom1 select{
      margin-left: 15%; 
      height: 31px;
      width: 71.3%;
      margin-bottom: 20px;

    }
  
  
    .main h2{
        text-align: center;
        margin-top: -20px;
        color: #1C2833;
    }
    .done{
        width: 120px;
        height: 30px;
    }
    .main img{
        background: red;
        height: 30px;
        width: 30px;
        border-radius: 20px;
        margin-left: 98.5%;
        margin-top: -1%;
    }
    .pat ul {
        list-style: none;
        display: flex; 
        width: 100%; 

      }
      .pat ul li{
        margin-top: 2%;
        width: 100%;

      }

      .pat ul li a{
        margin-right:2% ;
        padding-top: 1%;
        padding-left: 1%;
        padding-right: 1%;
        padding-bottom: 1%;
        margin-left: 65%;
        text-decoration: none;
        background: lightblue;
        border-radius: 5px;
        margin-top: 5%;
      }
      .pat ul li h4{
        margin-top: -2%;
      }
</style>
<body>
    <div class="woo">
    <div class="addd">

  </div>
    
      <div class="pat">
        <ul>
            <li><h4 style="margin-left:10px">List of All Drug Suppliers to Classic Care Clinic</h4><br></li>
            <li><a id="new" href="#"><i class="fas fa-plus"></i>new</a></li>
        </ul>

        
        
    </div>
    <div class="main" id="add">
        <a id="back" href="#"><img src="../image/close1.png" alt="image is required"></a>
        <h3>Add Drug Spplier</h3>
        <p>Use this form to add supplier</p>
        <h2>Classic Care Clinic Drug Suppliers Add Section</h2>
        

            <form class="fom" method="POST" enctype="multipart/form-data">
                <div class="fom1">
                <label>Company Name</label><br>
                <input type="text" name="company_name" placeholder="Enter suppier name"><br>   
                <label>contact</label><br>
                <input type="text" name="contact" placeholder="Enter phone number"><br>

                <label>Address</label><br>
                <input type="text" name="address" placeholder="Enter company address"><br>  
                <label>Payment Satus</label><br>
                <select  name="payment_status">
                    <option>........Choose one item below........</option>
                    <option value="single">Full payment </option>
                    <option value="box">Part Payment</option>
                    <option value="bottle">Credit</option>
                </select><br>
                </div>
                <center>
                    <input class="done" type="submit" name="submit" value="Done" style="background:green;border-color:green;color: white;">
                </center>
                
                
            </form>
    
        
        
    </div>
    <div class="lists" id="list">
        <h3>Here is the list</h3>
        <?php 
          $query ="SELECT * FROM drugsuppliers ";
          $result =mysqli_query($connect,$query);

        echo"<table cellspacing=0 cellpadding =1 border=1  class='display'  id='table_id' data-sortable='false' data-role='table'>
        <thead>
        <tr border=0.1 >
           <th style='background:black;color:white;width:10%' data-sortable='false'>Company Name</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Address</th>
           <th style='background:black;color:white;width:15%' data-sortable='false'>Contact</th>
           <th style='background:black;color:white;width:10%' data-sortable='false'>Payment Status</th>
      
        </tr>
        </thead>
     ";

       if(mysqli_num_rows($result)<1){
        echo"<tr><td style=' border: 1pt double ;background:white;color:black;'>Such medicine is not in stock</<td></tr>";
       }  

        while ($row= mysqli_fetch_array($result)) {

                  $company_name = $row['company_name'];
                  $address = $row['address'];
                  $contact = $row['contact'];
                  $payment_status = $row['payment_status'];
                 

                     echo"<tbody>";
                      echo"<div>
                        <ul>
                         <li>$company_name</li>
                         <li>$address</li>
                         <li>$contact</li>
                         <li>$payment_status</li>

                        </ul>


                      ";
                      echo"</div>";

                        

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

     $("#new").click(function () {
       $("#list").css("display", "none");
       $("#add").css("display","block");
       
      });
     $("#back").click(function () {
       $("#list").css("display", "block");
       $("#add").css("display","none");
       
      });


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