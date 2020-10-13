<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$category=$_POST['category'];
	$sql="INSERT INTO subcategories (name,category_id) VALUES(:s_name,:s_category)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':s_name',$name);
	$stmt->bindParam(':s_category',$category);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:subcategorylist.php");
	} else{
		echo "Error";
	}
?>