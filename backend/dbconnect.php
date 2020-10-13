<?php 
	$servername="localhost";
	$dbname="onlineshopping";
	$dbuser="root";
	$dbpassword="";

	$dsn="mysql:host=$servername;dbname=$dbname";
	$pdo=new PDO($dsn,$dbuser,$dbpassword);

	try{
		$conn=$pdo;
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connection success";

	}catch(PDOException $e){
		echo "Connected fail:".$e->getMessage();
	}



 ?>