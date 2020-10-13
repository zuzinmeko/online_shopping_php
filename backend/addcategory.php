<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	$basepath="img/items/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);
	

	$sql="INSERT INTO categories (name,logo) VALUES(:c_name,:c_logo)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':c_name',$name);
	$stmt->bindParam(':c_logo',$fullpath);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:categorylist.php");
	} else{
		echo "Error";
	}
?>