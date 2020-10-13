<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	$basepath="img/items/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);
	

	$sql="INSERT INTO brands (name,photo) VALUES(:brand_name,:brand_photo)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':brand_name',$name);
	$stmt->bindParam(':brand_photo',$fullpath);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:brandlist.php");
	} else{
		echo "Error";
	}
?>