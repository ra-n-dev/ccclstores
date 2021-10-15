<?php 
 include("header.php");
 include("../db/connection.php");

 if(isset($_POST['add'])){
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
        margin-left: 130px;
        margin-right: 20px;
        padding-left: 10px;
        padding-top: 0px;
    }

    .fom .fom1 input{
      height: 25px;
      width: 40%;
      margin-bottom: 20px;
    }
    .fom .fom1 label{
        font-size: 20px;
        color:#D35400;
    }
    .fom .fom1 select{
        height: 30px;
      width: 40.7%;
      margin-bottom: 20px;
    }
    .fom2{
        margin-left: 43%;
        margin-top: -37.5%;
    }

    .fom .fom2 input{
      height: 25px;
      width: 75%;
      margin-bottom: 20px;
    }
    .fom .fom2 label{
        font-size: 20px;
        color:#D35400;
    }
    .fom .fom2 select{
        height: 30px;
      width: 76%;
      margin-bottom: 20px;
    }
    .main h2{
        text-align: center;
        margin-top: -20px;
        color: #1C2833;
    }
    .done{
        width: 120px;
        margin-left: 37%;
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
</style>
<body>
    <div class="woo">
    <div class="addd">

      <a href="addmedicine.php"><i class="fas fa-plus"></i>new</a>
  </div>
    
      <div class="pat">
        <h4 style="margin-left:10px">List of All Drug Suppliers to Classic Care Clinc</h4><br>

        
        
    </div>
    <div class="main">
        <a href="medicinals.php"><img src="../image/close1.png" alt="image is required"></a>
        <h3>Add Medicine</h3>
        <p>Use this form to add medicine</p>
        <h2>Classic Care Clinic Drugs Inventories</h2>
        

            <form class="fom" method="POST" enctype="multipart/form-data">
                <div class="fom1">
                <label>Company Name</label><br>
                <input type="text" name="company_name" placeholder="Enter suppier name"><br>   
                <label>contact</label><br>
                <input type="text" name="contact" placeholder="Enter phone number"><br>

                <label>Address</label><br>
                <input type="text" name="address" placeholder="Enter company address"><br>  
                <label>Payment_Satus</label><br>
                <select  name="payment_status">
                    <option>........Choose one item below........</option>
                    <option value="single">Full payment </option>
                    <option value="box">Part Payment</option>
                    <option value="bottle">Credit</option>
                </select><br>
                <label>Purchased Date</label><br>
                <input type="text" name="purchaseddate" placeholder="Enter the day the drug was purchased"><br>
                </div>


            <div class="fom2">
                <label>Supplier</label><br>
                <input type="text" name="supplier" placeholder="Enter company that supplied drug"><br>  
                <label>Group</label><br>
                <select id="groupitem"  name="groupitem">
                    <option>........Choose one item below........</option>
                    <option value="single">Single Medicine </option>
                    <option value="box">Box of Medicine</option>
                    <option value="bottle">Bottle of Medicine</option>
                </select><br>
    
                <label>Total Box/Bottle of Drug</label><br>
                <input type="text" name="boxnumber" placeholder="Enter total boxes of drug"><br>
                <label>Quantity of Drug</label><br>
                <input type="text" name="drugquantity" placeholder="Enter total number of drug"><br>
                <label>Expiry Date</label><br>
                <input type="text" name="expirydate" placeholder="Enter Expiry Date of drug"><br>
                    
                </div>
                <input class="done" type="submit" name="submit" value="Done" style="background:green;border-color:green;color: white;">
                
                
            </form>
    
        
        
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