<?php 
	session_start();
	unset($_SESSION['loginuser']);
	header("location:login.php");

 ?>