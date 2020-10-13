<?php 
 	include 'dbconnect.php';

 	$id=$_GET['id'];

 	$sql="DELETE FROM categories WHERE categories.id=:category_id";
 	$stmt=$pdo->prepare($sql);
 	$stmt->bindParam(':category_id',$id);
 	$stmt->execute();

 	if ($stmt->rowCount()) {
 		header("location:categorylist.php");

		}else{
			echo "Error";
		}

 ?>