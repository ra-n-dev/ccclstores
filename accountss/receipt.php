
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>store expense</title>
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


      .do nav{
        margin-right: 8%;
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
        margin-right: 52px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }
    .requi{
    	background: white;
    	height: 50vh;
    	width: 50%;
    	border-radius: 5px;
    	opacity: 0.8;
    	margin-top: 5%;
    	padding-top: 1%;
    }
    .requi form h2{
     font-style: italic;
     padding-top: 2%;
    }
    .requi form{
    	background: skyblue;
    	width: 95%;
    	height: 85%;
    }
    .requi form input{
    	width: 65%;
    	height: 5%;
    }
    .requi form .pp{
    	width: 65%;
    	height: 10%;
    	margin-bottom: 3%;
    	border-radius: 5px;
    }
    .requi form .am{
    	width: 65%;
    	height: 10%;
    	margin-bottom: 3%;
    	border-radius: 5px;
    }
    .requi form .sb{
    	width: 20%;
    	height: 11%;
    	background: #2980B9;
    	color: white;
    	border-color: #2980B9;
    	border-radius: 5px;

    }


    @media  (max-width:900px){
       body{
    margin: 0;
    padding: 0;
    background-image: url(../../image/home3.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 95vh;
    
    }


      .do nav{
        margin-right: 1%;
        background:  white;
        opacity: 0.8;
        border-radius: 5px;
        position: relative;
        width: 98%;

    }
    .do{
        margin-top:2% ;
    }

      nav {
         overflow: hidden;
        float: right;
        }

    nav li {
        margin-right: 28px;
        float: left;
      }

    nav ul {
         list-style: none;
        overflow: hidden
    }
    .requi{
        background: white;
        height: 50vh;
        width: 70%;
        border-radius: 5px;
        opacity: 0.8;
        margin-top: 25%;
        padding-top: 1%;
    }
    .requi form h2{
     font-style: italic;
     padding-top: 2%;
    }
    .requi form{
        background: skyblue;
        width: 95%;
        height: 85%;
    }
    .requi form input{
        width: 65%;
        height: 5%;
    }
    .requi form .pp{
        width: 65%;
        height: 10%;
        margin-bottom: 3%;
        border-radius: 5px;
    }
    .requi form .am{
        width: 65%;
        height: 10%;
        margin-bottom: 8%;
        border-radius: 5px;
    }
    .requi form .sb{
        width: 20%;
        height: 11%;
        background: #2980B9;
        color: white;
        border-color: #2980B9;
        border-radius: 5px;

    }
    }    
</style>

<body>
	<div class="do">
        
        <center >
            <nav>
            <ul>
                <li><a id="newcase" href="../account/index.php">Receive-Cash</a></li>
                <li><a id="expenses" href="../account/expenses.php">Requested-Expenses</a></li>
                <li><a id="expenses" href="../account/accountexp.php">Make-Expenses</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        </center>
    </div><br><br>
    <center>
    <div class="requi">
    	<form method="POST" enctype="multipart/form-data">
    		<h2>Expenses Requisition Form</h2>

    		<label>Purpose</label><br>
    		<input type="text" name="purpose" placeholder="what will you use the money for?" class="pp"><br>
    		<label>Amount</label><br>
    		<input type="text" name="amount" placeholder="Enter amount needed" class="am"><br>
    		<input type="submit" name="request" value="Request" class="sb"><br>

    	</form>
    </div>	
    </center>
    

</body>
</html>