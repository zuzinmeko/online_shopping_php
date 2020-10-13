<?php 
 	include 'dbconnect.php';

 	$id=$_GET['id'];

 	$sql="DELETE FROM subcategories WHERE subcategories.id=:sub_id";
 	$stmt=$pdo->prepare($sql);
 	$stmt->bindParam(':sub_id',$id);
 	$stmt->execute();

 	if ($stmt->rowCount()) {
 		header("location:subcategorylist.php");

		}else{
			echo "Error";
		}

 ?>