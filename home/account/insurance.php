<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>insurance</title>
</head>
<style type="text/css">
    *{
    	margin: 0;
    	padding: 0;
    	box-sizing: border-box;
    }
	body{
       
        background-image: url(../../image/home6.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 60vh;
        

    }
    .sss{
    	background: white;
    	width: 150px;
    	height: 50px;
    	margin-top: 15%;
    	display: flex;
    	align-items: center;
    	justify-content: space-evenly;
    	box-shadow: 5px 5px 15px, -5px -5px 15px #fff;
    	border-radius: 25px;
    }
    input{
    	height: 50px;
    	width: 150px;
    	appearance: none;
    	position: absolute;
    	z-index: 1;
    	outline: none;
    }
    label{
    	height: 30px;
    	width: 60px;
    	box-shadow: inset 5px 5px 15px, inset -5px -5px 15px #fff;
    	border-radius: 15px;
    	position: relative;
    }

    .menz input{
    	width: 20%;
    	height: 30px;
    	margin-left:40%;
        margin-top: 10%;
    	display: flex;
    }

    label::after{
    	content: "";
    	position: absolute;
    	height: 30px;
    	width: 30px;
    	box-shadow: 1px 1px 3px, 
    	   -1px -1px 3px #fff;
    	border-radius:50%;
    	background: lightgray;
    	left: 0;
    	transition: all 0.5 ease;
    }
    input:checked ~ label::after{
    	left: 30px;
    }
    input:checked ~ span{
    	color: green;
    }

    input:checked ~label::after:::.menz{
    	display: block;
    }
   
</style>
<body>
	<center>
        <div class="sss" onclick="myFunction()">
            <input type="checkbox" name="" >
            <span>Insurance</span>
            <label></label>
        </div>
		

		<div class="menz" id="infos">
		</div>
	</center>




  <script src="../../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    var clicked = 0;
    function myFunction() {
    if(clicked == 0 ) {
    document.getElementById("infos").innerHTML = "<div class='menz'><input type='text' name='numb'></div>";
    clicked = 1;
    } else {
      document.getElementById("infos").innerHTML = "";
      clicked = 0;
   }
  }
</script>
</body>
</html>