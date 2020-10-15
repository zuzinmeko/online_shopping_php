<?php 
	include 'dbconnect.php';
	$id=$_POST['id'];
	$name=$_POST['name'];
	$fullpath=$_POST['oldphoto'];
	$photo=$_FILES['photo'];

	//echo $codeno;

	if ($photo['size']>0) {
		$basepath="img/categories/";
		$fullpath=$basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}
	
	//echo "$id and $name and  $fullpath";

	$sql="UPDATE categories SET  name=:category_name,logo=:category_photo WHERE categories.id=:category_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':category_id',$id);
	$stmt->bindParam(':category_name',$name);
	$stmt->bindParam(':category_photo',$fullpath);
	$stmt->execute();

	header("location:categorylist.php");
 ?>