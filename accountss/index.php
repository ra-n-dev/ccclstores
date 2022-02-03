<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>account index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <script src="../js/jquery-3.6.0.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			// set trigger and container variables

			var trigger = $('#nav ul li a'),
			container = $('#content');
			//fire on click
			trigger.on('click', function(){
				//set $this for re-use. set target from data attribute
				var $this = $(this),
				target =$this.data('target');
				//Load target page into container
				container.load(target + '.php');
				//stop normal link behavior
				return false;
			});
		});
	</script>

</head>
<style type="text/css">
    .menu{
    	background:#3090C7;
    	width: 17%;
		height: 100vh;
		margin-top: -20.3px;
        margin-left: -8px;
    }
	#nav ul{
		overflow: hidden;
		padding: 0;
		list-style-type:none ;

	}
	#nav ul li{
       position: relative;
        cursor: pointer;
        width: 500%;

	}
	#nav ul li a {
		display: inline-block;
		padding: 10px 15px;
		width: 17%;
		color: white;
		text-decoration: none;
	}
	#nav ul li a:hover{
       background:#696969 ;
       transition: 0.3s ease;
       width: 17.5%;
    }

	#content {
		margin-top: -50.5%;
		margin-left: 206px;
		height: 102vh;
		background: beige;
		padding-top: 10px;
		padding-left: 10px;
		width: 83.3%;
	}
	.hms h4{
		padding-top: 10px;
        margin-left: 3%;
        color: #fff;
    }
    .logo img{
        width: 50%;
        margin-left: 10%;
        border-radius: 20%;
        height: 100px;
    }
    a i{
    	color: white;
    	padding-right: 5%;
    }
</style>
<body>

	<script type="text/javascript">
		function loadDashboard(){
			history.pushState({},"","home.php/");
		}

		function loadProfile(){

			history.pushState({},"","/dbclass/account/profile.php");
		}
		function loadPatient(){

			history.pushState({},"","/dbclass/account/patient.php");
		}
		function loadAppointment(){

			history.pushState({},"","/dbclass/account/attachment.php");
		}
		function loadPharmacy(){
			history.pushState({},"","/dbclass/account/pharmacy.php");
		}
		function loadReport(){
			history.pushState({},"","/dbclass/account/report.php");
		}
		function loadSetting(){
			history.pushState({},"","/dbclass/account/settings.php");
		}
	</script>
    <div class="menu">
    	<div class=" hms"><h4>Clinic Management System</h4></div>
        <div class="logo">
          <img src="../image/cccl4.png" alt="image is required">
        </div>
    	<nav id="nav">
		<ul>
			<li><a onClick="loadDashboard()" href=""><i class="fas fa-desktop"></i>Dashboard</a></li>
			<li><a onClick="loadProfile()" href="#" data-target="profile"><i class="fas fa-user-circle"></i>Profile</a></li>
			<li><a onClick="loadPatient()" href="#" data-target="patient"><i class="fas fa-procedures"></i>Patient</a></li>
			<li><a onClick="loadAppointment()" href="#" data-target="attachment"><i class="fas fa-calendar"></i>Appointment</a></li>
			<li><a  onClick="loadPharmacy()" href="#" data-target="pharmacy"><i class="fas fa-laptop-medical"></i>Pharmacy</a></li>
			<li><a onClick="loadReport()" href="#" data-target="report"><i class="fas fa-book-open"></i>Report</a></li>
			<li><a onClick="loadSetting()" href="#" data-target="settings"><i class="fas fa-cog"></i>Settings</a></li>
		</ul>
		
	</nav>
    </div>
	
	<div id="content">
		<?php include('home.php'); ?>
		
	</div>
	

</body>
</html>