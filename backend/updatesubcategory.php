<?php 
	include 'dbconnect.php';
	$id=$_POST['id'];
	$name=$_POST['name'];
	//echo $codeno;

	
	//echo "$id and $name and  $fullpath";

	$sql="UPDATE subcategories SET  name=:subcategory_name WHERE subcategories.id=:subcategory_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':subcategory_id',$id);
	$stmt->bindParam(':subcategory_name',$name);
	//$stmt->bindParam(':category_id',$id);
	$stmt->execute();

	header("location:subcategorylist.php");
 ?>