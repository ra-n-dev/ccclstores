

<?php 

 include("../../../db/connection.php");
 ?>







<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<style type="text/css">
    .myModal{
        display: none;
    }
</style>



<div class='modal fade adx' id='moresales' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header hed'>
                <h5 class='modal-title ' id='exampleModalLabel' style='color:red; font-family: monospace'>
                    <h3 class="m-0 font-weight-bold " style="text-align: center;font-weight:bold">Choose Sales Category</h3>
                </h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                     <span aria-hidden='true'>×</span>
                    </button>
            </div>

            
            <form method='POST' enctype='multipart/form-data'>
             <div class='modal-body update'>
                    <label>Sales Type</label><br>
                    <select name="state_select" class="state_select">
                            <option value="income">income</option>
                            <option value="Others">Others</option>
                        </select><br>
            </div>
            <div class='modal-footer subbx '>
                <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe'>
                <input type='button' name='sub' value='Submit' class='cancc' id='wwwwe' onclick="display_sales()" data-dismiss='modal'>

            </div>
            </form>
        </div>
    </div>
</div>


   
<div id="jquery">

   <!-- Modal -->
<div id="myModal" class="modal fade myModal1" role="dialog">
    

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
        <div class="row"><h3 style="text-align:center;">Billing Form</h3></div>
     
        <div class="row payf">
                <div class="col">
                    <span>Facility: <a style="font-weight:bold;">Classic Care Clinic Ltd.</a></span><br>
                    <span>Contact:<a style="font-weight:bold;"> +233541994034</a></span>
                </div>
                <div class="col">
                    <span>Email: <a style="font-weight:bold;">classiccare@gmail.com</a></span><br>
                    <span>Bank Account:<a style="font-weight:bold;">  900123000455959</a></span>
                </div>

            </div>
      
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="formmm">
            <label for="patientname">Patient Name</label><br>
            <input type="text" name="patientname" placeholder="Enter patient name" id="patientname" required><br>
            <label for="nhisstate">NHIS State</label><br>

            <select name="nhis" style="margin-bottom: 1%;" onchange="nHis(this)" id="nhis" required >
                <option value="">Select State</option>
                <option value="active">Active</option>
                <option value="non-active">Non-Active</option>
            </select>
            <div id="Nhisnum" class="nhisnumber">
              <label for="nhisnumber">NHIS Number</label><br>
              <input type="text" name="nhisnumber" placeholder="Enter NHIS Number" id="nhisnumber" class="nhisreq">
            </div>
            <label>Charges</label>
            <div>
            <select id="chargechoices-multiple-remove-button" placeholder="Select Items to charge " multiple name="charges[]" >
                <?php 
               
                  $services ="SELECT * FROM services_table";
                  $serv_res =mysqli_query($connect,$services);
                  while($row=mysqli_fetch_array($serv_res)){
                    $servicename =$row['items'];
                    echo"<option value='$servicename'>$servicename</option>";
                  }
                  
                 ?>       
            </select>
          </div>

             <label for="labs" >Labs</label>
            <select name="labz" style="margin-bottom: 1%;" onchange="laBs(this)" id="labs">
                <option value="">Select category</option>
                <option value="bill-labs">Yes</option>
                <option value="no-labs">No</option>
            </select><br>
            <div id="Labsdrop" class="labsdrop">
              <label for="listoflab">List of Labs</label><br>

              <select id="labchoices-multiple-remove-button" placeholder="Select labs to do" multiple name="labs[]">
             
            <?php 
               
                  $labs ="SELECT * FROM labs_table";
                  $lab_res =mysqli_query($connect,$labs);
                  while($row=mysqli_fetch_array($lab_res)){
                    $labname =$row['lab_name'];
                    echo"<option value='$labname'>$labname</option>";
                  }
                  
                 ?>
            </select>

            </div> 
            <label for="drugs">Drugs</label><br>
            <select name="drugs" style="margin-bottom: 1%;" onchange="druDs(this)" id="drugs">
                <option value="">Select category</option>
                <option value="bill-drugs">Yes</option>
                <option value="no-drugs">No</option>
            </select><br>
       
            <div class="f1" id="Drugsdrop" >
              <div class="input-field">
               <table class="tablehead" id="table_fieldd" style="background:#D7DBDD;">
                 <tr style="background:black; color: white; ">    
                   <th>Category</th>
                   <th>Medicine</th>
                   <th> Ml/Mg</th>
                   <th> Quantity</th>
                   <th>Action</th>
                 </tr> 
                 <tr class="aw">
                   
                   <td>
                    <select name="drugcategory[]" onchange="catHis(this)"  style="width:100%" class="mov">
                      <?php 
               
                      $drugs ="SELECT * FROM pharmacyinventory group by category";
                      $drug_res =mysqli_query($connect,$drugs);
                      echo"<option  >---Choose Category--</option>";
                      while($row=mysqli_fetch_array($drug_res)){
                      $medcategory =$row['category'];
                      echo"<option value='$medcategory'>$medcategory</option>";
                     }
                  
                     ?> 
                        
                    </select>

                   </td>
                   <td>
                    <select name="medicinename[]"  onchange="medN(this)" style="width:100%" class="mov">

      
                    </select>
                   </td>

                   
                   <td>
                    <select name="ml[]" style="width:100%"  class="mov" ></select>
                   </td>
                   <td><input type="text" name="quantity[]"  style="width:100%" class="mov"></td>
                   <td><input type="button" name="add" value="Add" style="background:gold; color: white; border-color: gold;width: 100%;height: 24px; color:black;margin-top: 5%;" id="add"></td>
                 </tr>        
          
          
                </table>

               </div>
             </div>
            <span>
                <input type="submit" value="Preview" name="billgen" class="send">
            </span><br>
        </form>
      </div>
    </div>

  </div>
</div>





   <!-- Modal -->
<div id="myModal2" class="modal fades myModal2" role="dialog">
    <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
        <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
        <div class='row'><h3 style='text-align:center;'>Billing Form</h3></div>
     
        <div class='row payf'>
                <div class='col'>
                    <span>Facility: <a style='font-weight:bold;'>Classic Care Clinic Ltd.</a></span><br>
                    <span>Contact:<a style='font-weight:bold;'> +233541994034</a></span>
                </div>
                <div class='col'>
                    <span>Email: <a style='font-weight:bold;'>classiccare@gmail.com</a></span><br>
                    <span>Bank Account:<a style='font-weight:bold;'>  900123000455959</a></span>
                </div>

        </div>
      
      <div class='modal-body' id="billbody" style="margin-top: -4%;">
        
      </div>
    </div>

  </div>
    

</div>

</div>





<div class="modal ledger shadow" id='cash' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Cash Book</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="cashbook" class="sendd "  >
            </span><br>

        </form>
    </div>

</div>



<div class="modal ledger shadow" id='income_schedule' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Income Schedule</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="income_schedule" class="sendd "  >
            </span><br>

        </form>
    </div>

</div>


<div class="modal ledger shadow" id='medstock' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Medical Stock</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="medstock" class="sendd "  >
            </span><br>

        </form>
    </div>

</div>


<div class="modal ledger shadow" id='nonmedstock' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Non-Medical Stock</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="nonmedstock" class="sendd "  >
            </span><br>

        </form>
    </div>

</div>


<div class="modal ledger shadow" id='expendi' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Expenses Schedule</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="expsearch" class="sendd" >
            </span><br>

        </form>
    </div>

</div>

<div class="modal ledger shadow" id='profitlosss' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Profit & Loss</h3>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date" name="startdate1"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date" name="enddate1"><br>

                </div>

            </div>


            <span>
                <input type="submit" value="Search" name="profloss" class="sendd " >
            </span><br>

        </form>
    </div>

</div>


<div class="modal assetform shadow" id='assetform' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>

    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>


    <h3>Asset Form</h3>
    <div>
        <form>
            <div class="row payf">


            </div>
            <label>Purchase Date</label><br>
            <input type="date"><br>
            <label>Name of Item</label><br>
            <input type="text" placeholder="Enter Item Name"><br>
            <label>Asset No.</label><br>
            <input type="text" placeholder="Enter code"><br>
            <label>Quantity</label><br>
            <input type="text" placeholder="Enter quantity"><br>
            <label>Unit Price</label><br>
            <input type="text" placeholder="Enter unit price"><br>
            <label>Total Amount</label><br>
            <input type="text" placeholder="Enter total Amount"><br>
            <pre></pre>
            <span>
                <input type="submit" value="Submit" name="approve" class="send">
            </span><br>

        </form>
    </div>

</div>


<div class="modal assetform shadow" id='salaryform' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>

    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>


    <h3>Salary Form</h3>
    <div>
        <form method="POST" enctype='multipart/form-data'>
            <div class="row payf">


            </div>

            <label>Name of Staff</label><br>
            <input type="text" name="staffname" placeholder="Enter Item Name"><br>
            <label>Gross Salary</label><br>
            <input type="text" name="gross" placeholder="Enter total Amount"><br>
            <pre></pre>
            <span>
                <input type="submit" value="Submit" name="salary" class="send" >
            </span><br>

        </form>
    </div>

</div>





<div class='modal fade adxx' id='inventory' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header hed'>
                <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
                ×
            </button>


           <h3 style="margin-left: 30%;">Inventory Form</h3>
            </div>

            <div class="row payf">
                <div class="col">
                    <span>Facility: <a style="font-weight:bold;">Classic Care Clinic Ltd.</a></span><br>
                    <span>Contact:<a style="font-weight:bold;"> +233541994034</a></span>
                </div>
                <div class="col">
                    <span>Email: <a style="font-weight:bold;">classiccare@gmail.com</a></span><br>
                    <span>Bank Account:<a style="font-weight:bold;">  900123000455959</a></span>
                </div>

            </div>

            
             <form method='POST' enctype='multipart/form-data'>
                <div class='modal-body update'>

                    <div class="row">
                        <div class="col">
                          <label>Drug-Name</label><br>
                          <input type="text" name="drugname" placeholder="Enter drug name"><br>
                          <label>Quantity</label><br>
                          <input type="text" name="quantity" placeholder="Enter drug quantity"><br>
                          <label>Drug-Category</label><br>
                          <select name="drugcategory" class="state_select">
                             <option value="tablet">Tablet</option>
                             <option value="syrup">Syrup</option>
                          </select><br>
                          <label>Cost Price</label><br>
                          <input type="text" name="costprice" placeholder="Enter Cost Price"><br>
                         </div>

                        <div class="col">
                            <label>Supplier</label><br>
                             <input type="text" name="supplier" placeholder="Enter drug name"><br>
                             <label>Dosage</label><br>
                             <input type="text" name="dosage" placeholder="Enter dosage (Ml/Mg)"><br>
                             <label>Expiry Date</label><br>
                          <input type="date" name="expirydate" placeholder="Enter drug name"><br>
                            <label>Selling Price</label><br>
                          <input type="text" name="sellingprice" placeholder="Enter Cost Price"><br>
                        </div>
                        
                    </div>

                    
               </div>
            <div class='modal-footer subbx '>
                <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe' style="background:black;">
                <input type='submit' name='invsub' value='Submit' class='cancc' id='wwwwe'>

            </div>
            </form>
        </div>
    </div>
</div>




<script >


        function nHis(answer){
           if(answer.value =='active'){
            //alert('ok')
            //document.getElementById('Nhisnum').css('display','block');
            $('.nhisnumber').css('display', 'block');
            $('.nhisreq').attr('required','required');
           }else{
            if(answer.value =='non-active'){ 
              if ($('.nhisreq').attr('required')) {
                    $('.nhisreq').removeAttr('required');
                }  
             $('.nhisnumber').css('display', 'none');
            }
           }

        }


        function laBs(answer){
           if(answer.value =='bill-labs'){
            //alert('ok')
            //document.getElementById('Nhisnum').css('display','block');
            $('.labsdrop').css('display', 'block');
           }else{
            if(answer.value =='no-labs'){
             $('.labsdrop').css('display', 'none');
            }
           }

        }



/*

        $(document).ready(function() {

    $('input[type="checkbox"]').change(function() {

        if ($('input[type="text"]').attr('required')) {
            $('input[type="text"]').removeAttr('required');
        } 

        else {
            $('input[type="text"]').attr('required','required');
        }

    });

});
*/







        function druDs(answer){
           if(answer.value =='bill-drugs'){
            //alert('ok')
            //document.getElementById('Nhisnum').css('display','block');
            $('.f1').css('display', 'block');
            $('.mov').attr('required','required');

           }else{
            if(answer.value =='no-drugs'){
                if ($('.mov').attr('required')) {
                    $('.mov').removeAttr('required');
                }   
             $('.f1').css('display', 'none');
            }
           }

        }

        function catHis(answer){
            var medcategory =answer.value
            $.ajax({
             data:{id:medcategory},   
             type:'POST',
             url:'testing.php',
             success:function (res) {
                
                //alert(result.value)
                //value = document.getElementById('medname')
                
               // console.log(result)
                //console.log(value)
                result = answer.parentElement.nextElementSibling.children[0]
                result.innerHTML= `${res}`
             }
          });
            
           
        }
        function medN(answer){
            var meddname =answer.value
            $.ajax({
             data:{med:meddname},   
             type:'POST',
             url:'testing.php',
             success:function (ress) {
                //value = document.getElementById('medmg')
                //value.innerHTML= `${ress}`
                result = answer.parentElement.nextElementSibling.children[0]
                result.innerHTML= `${ress}`
             }
          });
            
        }











        $(document).ready(function(){
    
         var multipleCancelButton = new Choices('#labchoices-multiple-remove-button', {
         removeItemButton: true,
         maxItemCount:5,
         searchResultLimit:5,
         renderChoiceLimit:5
       }); 
      });

      $(document).ready(function(){
    
         var multipleCancelButton = new Choices('#chargechoices-multiple-remove-button', {
         removeItemButton: true,
         maxItemCount:5,
         searchResultLimit:5,
         renderChoiceLimit:5
       }); 
      });
       

    </script>

    <script type="text/javascript">
    $(document).ready(function () {
      var html =`<tr class="aw">
                    <td>
                       <select name="drugcategory[]"  onchange="catHis(this)" required>
                       <?php 
               
                      $drugs ="SELECT * FROM pharmacyinventory group by category";
                      $drug_res =mysqli_query($connect,$drugs);
                      echo"<option value=''>--Choose a category--</option>";
                      while($row=mysqli_fetch_array($drug_res)){
                      $medcategory =$row['category'];
                      echo"<option value='$medcategory'>$medcategory</option>";
                     }
                  
                     ?> 
                       </select>
                    </td>
                    <td>
                       <select name="medicinename[]" onchange="medN(this)" required></select>
                    </td>
                    <td>
                     
                       <select name="ml[]" required></select>
                    </td>
                    <td>
                        <input name="quantity[]" placeholder="Enter drug quantity" required>
                    </td>
                    <td>
                        <input type="button" name="remove" value="Remove" style="background:red; color: white; border-color: red; width:100%;height:24px;margin-left:-1px;margin-top:-10px;" id="remove">
                    </td>
                </tr>`

      var x = 1;

      $("#add").click(function(){
         $("#table_fieldd").append(html);
      });
      $("#table_fieldd").on('click','#remove',function(){
         $(this).closest('tr').remove();
      });

    });
   </script>


   <script type="text/javascript">
     
            
            $("#formmm").on("submit", function (e) {
                $.ajax({  
                url: 'testing.php',
                type: 'POST',
                data:  $("#formmm").serialize(),         
                success: function(data) {
            
                $("#billbody").append(data);
                $(".myModal1").hide();
                $('.myModal2').show();
                }
              });
                console.log($("#formmm").serialize())

             
                return false;
            });


           // $('.myModal1').css('display', 'none');
           // $('.myModal2').css('display', 'block');



        
   </script>


  
