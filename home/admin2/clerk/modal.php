
<div id="boot" class="boott"></div>


<div class='modal fade adx myModal1' id='moresales' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header hed'>
                <h5 class='modal-title ' id='exampleModalLabel' style='color:red; font-family: monospace'>
                    <h3 class="m-0 font-weight-bold " style="text-align: center;font-weight:bold">Receive Cash</h3>
                </h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                     <span aria-hidden='true'>×</span>
                    </button>
            </div>

            <div class="fform">
            <div class='modal-body update'>
                <div class="mak1">
                    <label>Cash Category</label><br>
                    <select name="state_select" class="state_select" onchange="choose(this)">
                            <option value="">select category</option>
                            <option value="internal">internal</option>
                            <option value="Other_income">Other_income</option>
                        </select><br>
                </div> 
                
                <div class="mak2">
                    <form method='POST' enctype='multipart/form-data' id="clerkform1">
                    <label>Search Patient</label><br>
                    <input type="text" name="patientcode" placeholder="Enter Unit Code"><br>

                    <div class='modal-footer subbx '>
                     <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe' style="background:black;">
                     <input type='submit' name='clerk1' value='Submit' class='cancc' id='wwwwe' >

                    </div>
                   </form>
                </div>
                <div class="mak3">
                    <form method='POST' enctype='multipart/form-data' id="clerkform2">
                    <label>Name of funder</label><br>
                    <input type="text" name="funder" placeholder="Enter name of person" id="funder"><br>
                    <label>Type</label><br>
                    <select name="cash_purpose" class="state_select" id="purpose" >
                            <option value="">select cash-type</option>
                            <option value="water">water</option>
                            <option value="malt">malt</option>
                            <option value="returns">returns</option>
                            <option value="investment">investment</option>
                        </select><br>
                    <label>Description</label><br>
                    <input type="text" name="description" placeholder="Give a brief note" id="description"><br>
                    <label>Amount</label><br>
                    <input type="text" name="amount" placeholder="Enter amount" id="amount"><br>   


                    <div class='modal-footer subbx '>
                     <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe' style="background:black;">
                     <input type='submit' name='other' value='Submit' class='cancc' id='wwwwe'>

                      </div>
                    </form>
                   
                </div>       
            </div>
            <div class='modal-footer  virt' style="width:100%">
                <input type="button"  name="back" value="Back" style="width:100%; color: white;background: #5dc12e;border: 1px solid #5dc12e; border-radius: 5px;" data-dismiss='modal' aria-label='Close'>
            </div><br>
            </div>
        </div>
    </div>
</div>


<div class='modal fade adx myModal1' id='invent' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header hed'>
                <h5 class='modal-title ' id='exampleModalLabel' style='color:red; font-family: monospace'>
                    <h3 class="m-0 font-weight-bold " style="text-align: center;font-weight:bold">Stock Inventory Form</h3>
                </h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                     <span aria-hidden='true'>×</span>
                    </button>
            </div>

            <div class="fform">
            <div class='modal-body update'>
                <div class="mak1">
                    <label>Stock Type</label><br>
                    <select name="state_select" class="state_select" onchange="stock(this)">
                            <option value="">select category</option>
                            <option value="pharmacy">drug_stock</option>
                            <option value="other_stock">other_stock</option>
                        </select><br>
                </div> 
                
                <div class="mak22">
                    <form method='POST' enctype='multipart/form-data' id="stockform1">
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
                          <label>Purchased Date</label><br>
                          <input type="date" name="purchaseddate" placeholder="Enter Cost Price"><br>
                          <label>Total Cost Price</label><br>
                          <input type="text" name="totalcost" placeholder="Enter Cost Price"><br>
                         </div>

                        <div class="col">
                            <label>Supplier</label><br>
                             <input type="text" name="supplier" placeholder="Enter drug name"><br>
                             <label>Dosage</label><br>
                             <input type="text" name="dosage" placeholder="Enter dosage (Ml/Mg)"><br>
                             <label>Expiry Date</label><br>
                             <input type="date" name="expirydate" placeholder="Enter drug name"><br>
                             <label>Invoice Number</label><br>
                             <input type="text" name="invoicenumber" placeholder="Enter Cost Price"><br>
                            <label>Unit Selling Price</label><br>
                            <input type="text" name="unitsellingprice" placeholder="Enter unit selling Price"><br>
                        </div>
                        
                    </div>


                    <div class='modal-footer subbx '>
                     <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe' style="background:black;">
                     <input type='submit' name='clerk1' value='Submit' class='cancc' id='wwwwe' >

                    </div>
                   </form>
                </div>
                <div class="mak33">
                    <form method='POST' enctype='multipart/form-data' id="stockform2">
                    <div class="row">
                        <div class="col">
                          <label>Item Name</label><br>
                          <input type="text" name="itemname" placeholder="Enter item name"><br>
                          <label>Purchased Date</label><br>
                          <input type="date" name="purchaseddate"><br>
                          <label>Supplier</label><br>
                          <input type="text" name="supplier" placeholder="Enter Supplier Name"><br>
                          <label>Invoice Number</label><br>
                          <input type="text" name="invoicenumber" placeholder="Enter Invoice Number"><br>
                          <label>Item Class</label><br>
                          <select name="itemclass" class="state_select">
                             <option value="expenses">Expenses</option>
                             <option value="asset">Asset</option>
                          </select><br>
                          
                          
                         </div>

                        <div class="col">
                             <label>Quantity</label><br>
                             <input type="text" name="quantity" placeholder="Enter drug quantity"><br>
                             <label>Unit Cost</label><br>
                             <input type="text" name="unitcost" placeholder="Enter unit cost"><br>
                             <label>Total Cost</label><br>
                             <input type="text" name="totalcost" placeholder="Enter total cost"><br>
                             <label>Unit Selling Price</label><br>
                             <input type="text" name="unitsellingprice" placeholder="Enter Unit Selling Price"><br>
                             <label>Expiry Date</label><br>
                             <input type="date" name="expirydate"><br>
                        
                        </div>
                        
                    </div>
   


                    <div class='modal-footer subbx '>
                     <input type='button' value='Back' class='pro' data-dismiss='modal' id='wwwwe' style="background:black;">
                     <input type='submit' name='other' value='Submit' class='cancc' id='wwwwe'>

                      </div>
                    </form>
                   
                </div>       
            </div>
            <div class='modal-footer  virtt' style="width:100%">
                <input type="button"  name="back" value="Back" style="width:100%; color: white;background: #5dc12e;border: 1px solid #5dc12e; border-radius: 5px;" data-dismiss='modal' aria-label='Close'>
            </div><br>
            </div>
        </div>
    </div>
</div>



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

<div class='modal-body' id="stockpharm" style="margin-top: -4%;">
<div class='modal-body' id="stockother" style="margin-top: -4%;">    





<div class="modal ledger shadow" id='income_schedule' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <button type='button' data-dismiss='modal' aria-label='Close' class="close-btn" style="border:1px solid transparent;">
        ×
    </button>
    <h3>Income Schedule</h3>
    <div>
        <form>
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date"><br>

                </div>

            </div>


            <span>
                <input type="button" value="Search" name="search" class="sendd " onclick="togglelIncomeSchedule()" data-dismiss='modal' aria-label='Close'>
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
        <form>
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date"><br>

                </div>

            </div>


            <span>
                <input type="button" value="Search" name="search" class="sendd " onclick="togglelExpensesSchedule()" data-dismiss='modal' aria-label='Close'>
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
        <form>
            <div class="row">
                <div class="col">
                    <label>Start Date</label><br>
                    <input type="date"><br>
                </div>
                <div class="col">
                    <label>End Date</label><br>
                    <input type="date"><br>

                </div>

            </div>


            <span>
                <input type="button" value="Search" name="search" class="sendd " onclick="togglelProfitloss()" data-dismiss='modal' aria-label='Close'>
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
        <form>
            <div class="row payf">


            </div>

            <label>Name of Staff</label><br>
            <input type="text" placeholder="Enter Item Name"><br>
            <label>Gross Salary</label><br>
            <input type="text" placeholder="Enter total Amount"><br>
            <pre></pre>
            <span>
                <input type="submit" value="Submit" name="approve" class="send">
            </span><br>

        </form>
    </div>

</div>

<script type="text/javascript">
    function choose(answer) {
         if(answer.value =='internal'){
            //alert('ok')
            //document.getElementById('Nhisnum').css('display','block');
            $('.mak2').css('display', 'block');
            $('.mak3').css('display', 'none');
            $('.virt').css('display', 'none');
           // $('.nhisreq').attr('required','required');
           }if(answer.value =='Other_income'){  
             $('.mak2').css('display', 'none');   
             $('.mak3').css('display', 'block');
             $('.virt').css('display', 'none');
            
           }else{
            if(answer.value==''){
               $('.mak3').css('display', 'none');
               $('.mak2').css('display', 'none'); 
               $('.virt').css('display', 'block'); 
            }
            
           }
    }

    function stock(answer) {
         if(answer.value =='pharmacy'){
            //alert('ok')
            //document.getElementById('Nhisnum').css('display','block');
            $('.mak22').css('display', 'block');
            $('.mak33').css('display', 'none');
            $('.virtt').css('display', 'none');
           // $('.nhisreq').attr('required','required');
           }if(answer.value =='other_stock'){  
             $('.mak22').css('display', 'none');   
             $('.mak33').css('display', 'block');
             $('.virtt').css('display', 'none');
            
           }else{
            if(answer.value==''){
               $('.mak33').css('display', 'none');
               $('.mak22').css('display', 'none'); 
               $('.virtt').css('display', 'block'); 
            }
            
           }
    }
</script>

 <script type="text/javascript">






            function pCode(answer){
                    var patientcode =answer.value
                    $.ajax({
                     data:{pcode:patientcode},   
                     type:'POST',
                     url:'testing2.php',
                     success:function (ress) {
                        //value = document.getElementById('medmg')
                        //value.innerHTML= `${ress}`
                        result = answer.parentElement.nextElementSibling.children[0]
                        result.innerHTML= `${ress}`
                     }
                  });
                    
                }
     
            
            $("#clerkform1").on("submit", function (e) {
                $.ajax({  
                url: 'testing2.php',
                type: 'POST',
                data:  $("#clerkform1").serialize(), 
                        
                success: function(data) {
    
            
                $("#billbody").append(data);
                $(".myModal1").hide();
                $('.myModal2').show();
                }
              });
                console.log($("#clerkform1").serialize())

             
                return false;
            });
            


            $("#clerkform2").on("submit", function (e) {
                $.ajax({  
                url: 'experi.php',
                type: 'POST',
                data:  $("#clerkform2").serialize(), 
                        
                success: function(data) {
    
            
                $("#billbody").append(data);
                //alert(data);
                 alert('Payment was successfull');
                 window.location.replace("../clerk/index.php");
                //$(".myModal1").hide();
                //$('.myModal2').show();
                }
              });
               // console.log($("#clerkform2").serialize())

             
                return false;
            });



            $("#stockform1").on("submit", function (e) {
                $.ajax({  
                url: 'pharmastock.php',
                type: 'POST',
                data:  $("#stockform1").serialize(), 
                        
                success: function(data) {
    
            
                $("#stockpharm").append(data);
                 //alert(data);
                 alert('Drug has been added successfully');
                 $("#stockform1")[0].reset();
                 //window.location.replace("../clerk/index.php");
                //$(".myModal1").hide();
                //$('.myModal2').show();
                }
              });
               // console.log($("#clerkform2").serialize())

             
                return false;
            });

            $("#stockform2").on("submit", function (e) {
                $.ajax({  
                url: 'otherstock.php',
                type: 'POST',
                data:  $("#stockform2").serialize(), 
                        
                success: function(data) {
    
            
                $("#stockother").append(data);
                //alert(data);
                 alert('Item has been added successfully');
                 $("#stockform2")[0].reset();
                 //window.location.replace("../clerk/index.php");
                //$(".myModal1").hide();
                //$('.myModal2').show();
                
                }
                
              });
               // console.log($("#stockform2").serialize())

             
                return false;
            });





           // $('.myModal1').css('display', 'none');
           // $('.myModal2').css('display', 'block');



        
   </script>