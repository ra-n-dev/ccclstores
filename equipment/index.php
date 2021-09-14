<?php 
  session_start();
  include("../db/connection.php");
  include("../include/header.php");
  include("sidenav.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>equipment</title>
	<script src="../js/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

</head>
<body>

  <script type="text/javascript">
  	function loadContact(){
     history.pushState({},"","contact");
     document.getElementById("contact").innerHTML="the man is still waiting for you. He wants to take everything before going. He told me how you multreated him the last time he came around for his items";
     document.getElementById("name").innerHTML="";
  		document.getElementById("product").innerHTML="";

     
  	}
  	function loadProduct(){
     history.pushState({},"","product");
     document.getElementById("contact").innerHTML="";
  		document.getElementById("name").innerHTML="";
     document.getElementById("product").innerHTML="These things are delaying me kor. All I need is a proper dashboard navigation and am suffering like this";
     
  	}

  	function loadNames(){
  		history.pushState("page","title","name/");
  		document.getElementById("contact").innerHTML="";
  		document.getElementById("product").innerHTML="";
  		document.getElementById("name").innerHTML="<?php 
       echo"<h1>my name is paul</h1>";
      

  		 ?>";

  	}

  </script>
   <div style="margin-left:220px">
   	<p>this is the equipment page</p>
   <a onClick="loadContact()" id="cont" href="#">Contact</a>
	 <a onClick="loadProduct()" href="#">Product</a>
	 <a onClick="loadNames()" href="#">Names</a>
   </div>
	
	 <div id="contact">
	 	
	 </div>
	 <div id="product">
	 </div>
	 <div style="margin-left:220px" id="name">
	 	
	 </div>

</body>
</html>