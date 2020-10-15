<?php 
	include 'dbconnect.php';
	$id=$_POST['id'];
	$name=$_POST['name'];
	$fullpath=$_POST['oldphoto'];
	$photo=$_FILES['photo'];

	//echo $codeno;

	if ($photo['size']>0) {
		$basepath="img/brands/";
		$fullpath=$basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}
	
	// echo "$id and $name and $price and $discount and $brand and $subcategory and $description and $oldphoto";

	$sql="UPDATE brands SET  name=:brand_name,photo=:brand_photo WHERE brands.id=:brand_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':brand_id',$id);
	$stmt->bindParam(':brand_name',$name);
	$stmt->bindParam(':brand_photo',$fullpath);
	$stmt->execute();

	header("location:brandlist.php");
 ?>