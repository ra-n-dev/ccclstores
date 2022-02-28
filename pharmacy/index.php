<?php 
 include("header.php");
 include("../db/connection.php");
  
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pharmacy dashboard</title>
</head>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],

           <?php 
              $queryy ="SELECT * FROM drugbarchart";
              $res =mysqli_query($connect, $queryy);

              while($row =mysqli_fetch_array($res)){
                    $year =$row['year'];
                    $sales =$row['sales'];
                    $expenses =$row['expenses'];
                    $profit =$row['profit'];
                    ?>
                    ['<?php echo $year;?>',<?php echo $sales; ?>,<?php echo $expenses;?>,<?php echo $profit;?>],
                    <?php
                   }

            ?>
        ]);

        var options = {
          chart: {
            title: 'Classic Care Clinic Pharmacy Performance',
            subtitle: 'Sales, Expenses, and Profit: 2018-2021',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 <style type="text/css">
	
	body{
		background: transparent;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}
	p{
		color: red;
		padding-left: 20px;
	}
	.dash{
		margin-left: 20px;
	}
	.dash2{
		margin-left: 20px;
		margin-top: 10px;
	}

	.dash3{
		margin-left: 20px;
		margin-top: 10px;
	}
	.first1{
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.second1{
		border-radius: 3px;
		margin-top: -100px;
        margin-left: 280px;
        padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.third1{
		margin-top: -100px;
        margin-left: 560px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.fouth1{
		margin-top: -100px;
        margin-left: 840px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.first1 h5{
		margin-top: -15px;
	}
	.second1 h5{
		margin-top: -15px;
	}
	.third1 h5{
		margin-top: -15px;
	}
	.fouth1 h5{
		margin-top: -15px;
	}
	.first1 .progress{
		background:linear-gradient(to right,#48C9B0 , skyblue);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.second1 .progress{
		background:linear-gradient(to right, red , yellow);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.third1 .progress{
		background: linear-gradient(to right, lightpink , skyblue);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.fouth1 .progress{
		background: linear-gradient(to right, yellow, black);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}





   .first2{
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.second2{
		border-radius: 3px;
		margin-top: -100px;
        margin-left: 280px;
        padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.third2{
		margin-top: -100px;
        margin-left: 560px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.fouth2{
		margin-top: -100px;
        margin-left: 840px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.first2 h5{
		margin-top: -15px;
	}
	.second2 h5{
		margin-top: -15px;
	}
	.third2 h5{
		margin-top: -15px;
	}
	.fouth2 h5{
		margin-top: -15px;
	}
	.first2 .progress{
		background:linear-gradient(to right,#000000 , #F39C12);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.second2 .progress{
		background:linear-gradient(to right, #48C9B0 , #DFFF00);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.third2 .progress{
		background: linear-gradient(to right, #EAFAF1  , #641E16);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.fouth2 .progress{
		background: linear-gradient(to right, #6C3483, #3498DB);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}





  .first3{
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.second3{
		border-radius: 3px;
		margin-top: -100px;
        margin-left: 280px;
        padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.third3{
		margin-top: -100px;
        margin-left: 560px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.fouth3{
		margin-top: -100px;
        margin-left: 840px;
		border-radius: 3px;
		padding-top: 2px;
        padding-left: 20px;
		background: white;
		width: 250px;
		height: 100px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.first3 h5{
		margin-top: -15px;
	}
	.second3 h5{
		margin-top: -15px;
	}
	.third3 h5{
		margin-top: -15px;
	}
	.fouth3 h5{
		margin-top: -15px;
	}
	.first3 .progress{
		background:linear-gradient(to right,#F4D03F , #3498DB);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.second3 .progress{
		background:linear-gradient(to right, grey , pink);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.third3 .progress{
		background: linear-gradient(to right, violet , green);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}
	.fouth3 .progress{
		background: linear-gradient(to right, yellow, orange);
		margin-top: -8px;
        width: 70%;
        height: 6px;
        border-radius: 30px;
	}

	.graph{
		margin-left: 20px;
	}
	.graph2{
		margin-left: 50%;
		margin-top: -27%;
	}
	.mk{
		overflow-x: hidden;
		overflow-y: scroll;
		height: 92vh;
		width: 99.8%;
	}

	.mk::-webkit-scrollbar-track {
     -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 20px;
      width: 15px;
      background-color: white;
     }

     .mk::-webkit-scrollbar {
     width: 8px;
     background-color: #F5F5F
    }

    .mk::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 5%;
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, .3);
    background-color: skyblue;
  }

  .mk::-webkit-scrollbar-button {
   height: 25vh;
  }
</style>
<body>
	<div class="mk">
		

	
	<div class="dash">
	<p>Admin dashboard</p>

	<div class=" first1">
		<h4 style="color:#E74C3C;">192</h4>
		<h5>In-Stock</h5>
		<h3 class="progress"></h3>
	</div>	

	<div class=" second1">
		<h4 style="color:#3498DB;">GHC 1500.00</h4>
		<h5>Daily Sales</h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" third1">
		<h4 style="color:#641E16;">5</h4>
		<h5>Daily Patients </h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" fouth1">
		<h4 style="color:#CA6F1E;">GHC 17000.00</h4>
		<h5>Daily Purchase</h5>
		<h3 class="progress"></h3>
	</div>

	</div>


<div class="dash2">

	<div class=" first2">
		<h4 style="color:#6C3483;">19</h4>
		<h5>Out-of-Stock</h5>
		<h3 class="progress"></h3>
	</div>	

	<div class=" second2">
		<h4 style="color:#E74C3C;">GHC 35000.00</h4>
		<h5>Monthly Sales</h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" third2">
		<h4 style="color:#F39C12;">55</h4>
		<h5>Monthly Patients</h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" fouth2">
		<h4 style="color:skyblue;">GHC 87,000.00</h4>
		<h5>Monthly Purchase</h5>
		<h3 class="progress"></h3>
	</div>

  </div>

 <div class="dash3">

	<div class=" first3">
		<h4 style="color:red;">190</h4>
		<h5>Expired-in-Stock</h5>
		<h3 class="progress"></h3>
	</div>	

	<div class=" second3">
		<h4 style="color:#A569BD;">GHC 135000.00</h4>
		<h5>Yearly Sales</h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" third3">
		<h4 style="color:#138D75 ;">455</h4>
		<h5>Yearly Patients</h5>
		<h3 class="progress"></h3>
	</div>
	<div class=" fouth3">
		<h4 style="color:#8E44AD;">GHC 287,000.00</h4>
		<h5>Yearly Purchase</h5>
		<h3 class="progress"></h3>
	</div>

	</div>

	<div class="graph">
		<h3>Ghraphical Representation of Data</h3>
		<div id="barchart_material" style="width: 500px; height: 300px;"></div>
		
	</div>

	<div class="graph2">
		<div id="donutchart" style="width: 500px; height:400px;"></div>
	</div>


  <div id="regions_div" style="width: 900px; height: 500px;"></div>

</div>



    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
            ['Year', 'Sales', 'Expenses', 'Profit'],

           <?php 
              $queryy ="SELECT * FROM drugbarchart";
              $ress =mysqli_query($connect, $queryy);

              while($row =mysqli_fetch_array($ress)){
                    $year =$row['year'];
                    $sales =$row['sales'];
                    $expenses =$row['expenses'];
                    $profit =$row['profit'];
                    ?>
                    ['<?php echo $year;?>',<?php echo $sales; ?>,<?php echo $expenses;?>,<?php echo $profit;?>],
                    <?php
                   }

            ?>
        ]);

        var options = {
          title: 'Most Profitable Month ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>





       <script type="text/javascript">
      google.charts.load('current', {
        'packages':['corechart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

          var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],

           <?php 
              $queryy ="SELECT * FROM drugbarchart";
              $ress =mysqli_query($connect, $queryy);

              while($row =mysqli_fetch_array($ress)){
                    $year =$row['year'];
                    $sales =$row['sales'];
                    $expenses =$row['expenses'];
                    $profit =$row['profit'];
                    ?>
                    ['<?php echo $year;?>',<?php echo $sales; ?>,<?php echo $expenses;?>,<?php echo $profit;?>],
                    <?php
                   }

            ?>
        ]);

        var options = {
        };

        var chart = new google.visualization.LineChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>
