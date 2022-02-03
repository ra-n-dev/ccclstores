<?php 
session_start();

if(isset($_SESSION['doctor'])){


	unset($_SESSION['doctor']);

	header("Location: ../home/index.php");

}elseif(isset($_SESSION['admin'])){
	
	unset($_SESSION['admin']);

	header("Location: ../home/index.php");

}elseif(isset($_SESSION['receptionist'])){

	unset($_SESSION['receptionist']);

	header("Location: ../home/index.php");
}
elseif(isset($_SESSION['pharmacist'])){

	unset($_SESSION['pharmacist']);

	header("Location: ../home/index.php");
}elseif(isset($_SESSION['labtech'])){

	unset($_SESSION['labtech']);

	header("Location: ../home/index.php");
}elseif(isset($_SESSION['account'])){

	unset($_SESSION['account']);

	header("Location: ../home/index.php");
}elseif(isset($_SESSION['store'])){

	unset($_SESSION['store']);

	header("Location: ../home/index.php");
}


 ?>